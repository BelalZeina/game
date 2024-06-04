<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Role;
use Illuminate\Http\Request;

class SupervisorController extends Controller
{
    public function __construct()
    {

        $this->middleware('permission:admins-read')->only(['index']);
        $this->middleware('permission:admins-create')->only(['create', 'store']);
        $this->middleware('permission:admins-update')->only(['edit', 'update']);
        $this->middleware('permission:admins-delete')->only(['destroy']);

    }

    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 10); // Default to 10 if not specified
        $data  = Admin::whereDoesntHave('roles', function($query) {
            $query->where('name', 'owner');
        })->paginate($perPage);
        return view("dashboard.supervisor.index",compact("data"));
    }


    public function create()
    {
        $roles=Role::all();
        return view("dashboard.supervisor.create",compact("roles"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'required|string|min:8',
        ]);
        $data = $request->except('password' , 'img' );

        $data['password'] = bcrypt($request->password) ;

        if ($request->hasFile('img')) {
            $data['img'] = UploadImage($request->file('img'),"images");
        }

        $admin =Admin::create($data);
        $admin->syncRoles([$request->role]);

        return redirect(route('supervisors.index'))->with('success', __('models.added_successfully'));
    }


    public function show($id)
    {
        $data=Admin::find($id);
        return view("dashboard.supervisor.show",compact("data"));
    }


    public function edit($id)
    {
        $data=Admin::find($id);
        $roles=Role::all();
        return view("dashboard.supervisor.edit",compact("data",'roles'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'nullable|string|min:8',
        ]);
        $admin =Admin::find($id);
        $data = $request->except('password' , 'img' );

        $data['password'] =$request->password? bcrypt($request->password): $admin->password ;

        if ($request->hasFile('img')) {
            $data['img'] = UploadImage($request->file('img'),"users");
        }
        $admin->update($data);
        $admin->syncRoles([$request->role]);
        return redirect(route('supervisors.index'))->with('success', __('models.edited_successfully'));
    }


    public function destroy($id)
    {
        $admin =Admin::find($id);
        $admin->delete();
        return redirect(route('supervisors.index'))->with('success', __('models.deleted_successfully'));

    }

    public function deleteSelected(Request $request)
    {
        $ids = $request->ids;
        foreach ($ids as $id) {
            $admin = Admin::find($id);
            if ($admin) {
                $admin->delete();
            }
        }
        return response()->json(['success' => true]);
    }
}
