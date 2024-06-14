<?php

namespace App\Http\Controllers\Dashboard;

use App\Exports\SupervisorsExport;
use App\Http\Controllers\Controller;
use App\Imports\SupervisorsImport;
use App\Models\Admin;
use App\Models\Level;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

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
        // $perPage = $request->get('per_page', 10); // Default to 10 if not specified
        $data  = Admin::whereDoesntHave('roles', function($query) {
            $query->where('name', 'owner');
        })->get();
        return view("dashboard.supervisor.index",compact("data"));
    }


    public function create()
    {
        $levels=Level::all();

        $roles=Role::all();
        return view("dashboard.supervisor.create",compact("roles","levels"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'required|string|min:8',
        ]);
        $data = $request->except('password' , 'img',"levels");

        $data['password'] = bcrypt($request->password) ;

        if ($request->hasFile('img')) {
            $data['img'] = UploadImage($request->file('img'),"images");
        }

        $admin =Admin::create($data);
        $levels=$request->levels;
        $admin->levels()->sync($levels);
        $admin->syncRoles([$request->role]);

        return redirect(route('supervisors.index'))->with('success', __('models.added_successfully'));
    }


    public function show($id)
    {
        $data=Admin::find($id);
        return view("dashboard.supervisor.show",compact("data","levels"));
    }


    public function edit($id)
    {
        $levels=Level::all();
        $data=Admin::find($id);
        $roles=Role::all();
        return view("dashboard.supervisor.edit",compact("data",'roles',"levels"));
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
        $levels=$request->levels;
        $admin->levels()->sync($levels);
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

    public function export()
    {
            return Excel::download(new SupervisorsExport(), 'supervisors.xlsx');
    }

    public function import(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:xlsx,xls,csv,CSV|max:10240',
        ]);
        // If validation fails, return the validation errors
        if ($validator->fails()) {
            return redirect()->route('supervisors.index')->with('error', $validator->errors()->first());
        }
        $file = $request->file('file');
        $done=Excel::import(new SupervisorsImport, $file);
        if($done){
            return redirect()->route('supervisors.index')->with('success', 'تم تحميل الملف بنجاح.');
        }else{
            return redirect()->route('supervisors.index')->with('error', 'يرجى مطابقة البيانات البجدول المرفق ,والتاكد من وجودها في قواعد البيانات');
        }
    }
}
