<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:users-read')->only(['index']);
        $this->middleware('permission:users-create')->only(['create', 'store']);
        $this->middleware('permission:users-update')->only(['edit', 'update']);
        $this->middleware('permission:users-delete')->only(['destroy']);
    }
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 10); // Default to 10 if not specified
        $data = User::paginate($perPage);
        return view("dashboard.users.index", compact("data"));
    }


    public function create()
    {
        return view("dashboard.users.create", );

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'required|string|min:8',
        ]);
        $data = $request->except('password', 'img');

        $data['password'] = bcrypt($request->password);

        if ($request->hasFile('img')) {
            $data['img'] = UploadImage($request->file('img'), "images");
        }

        $admin = User::create($data);

        return redirect(route('users.index'))->with('success', __('models.added_successfully'));
    }


    public function show($id)
    {
        $data = User::find($id);
        return view("dashboard.users.show", compact("data"));
    }


    public function edit($id)
    {
        $data = User::find($id);
        return view("dashboard.users.edit", compact("data"));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'nullable|string|min:8',
        ]);
        $admin = User::find($id);
        $data = $request->except('password', 'img');

        $data['password'] = $request->password ? bcrypt($request->password) : $admin->password;

        if ($request->hasFile('img')) {
            $data['img'] = UploadImage($request->file('img'), "users");
        }
        $admin->update($data);
        return redirect(route('users.index'))->with('success', __('models.edited_successfully'));
    }


    public function destroy($id)
    {
        $admin = User::find($id);
        $admin->delete();
        return redirect(route('users.index'))->with('success', __('models.deleted_successfully'));

    }

    public function deleteSelected(Request $request)
    {
        $ids = $request->ids;
        // return response()->json(['success' => true ,"ids"=> $ids]);
        foreach ($ids as $id) {
            $admin = User::find($id);
            if ($admin) {
                $admin->delete();
            }
        }
        return response()->json(['success' => true]);
    }
    public function active(Request $request,$id)
    {
        $selectedOption = $request->date;
        $user = User::find($id);

        if ($user) {
            $currentDate = Carbon::now();

            // Calculate new expiration date based on the selected option
            if ($selectedOption == '1') {
                if($user->active==1||$user->active==2){
                    return redirect()->back()->with('error' , __('models.invalid_selection'));
                }
                $newExpireAt = $currentDate->copy()->addDay();
                $active = 1;
            } elseif ($selectedOption == '2') {
                if($user->active==1||$user->active==2){
                    return redirect()->back()->with('error' , __('models.invalid_selection'));
                }
                $newExpireAt = $currentDate->copy()->addDays(2);
                $active = 2;
            } elseif ($selectedOption == '30') {
                $newExpireAt = $currentDate->copy()->addMonth();
                $active = 30;
            } else {
                // If no valid option is selected, return with an error message
                return redirect()->back()->with('error' , __('models.invalid_selection'));
            }

            //  Check if the user is currently active and adjust the new expiration date accordingly
            if (($user->active==1||$user->active==2 ) && $user->expire_at < now()) {
                $newExpireAt = $currentDate->copy()->addDays((30-$user->active));
            }

            // Update the user record
            $user->update([
                'active' => $active,
                'expire_at' => $newExpireAt,
            ]);
        }

        return redirect(route('users.index'))->with('success', __('models.active_successfully'));
    }
}
