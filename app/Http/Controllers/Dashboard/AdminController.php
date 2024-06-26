<?php

namespace App\Http\Controllers\Dashboard;

use App\Exports\AdminExport;
use App\Http\Controllers\Controller;
use App\Imports\AdminImport;
use App\Models\Admin;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
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
        $data = Admin::whereHasRole("owner")->get();
        return view("dashboard.admins.index", compact("data"));
    }


    public function create()
    {
        return view("dashboard.admins.create");

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

        $admin = Admin::create($data);
        $levels=Level::all()->pluck("id");
        $admin->levels()->sync($levels);
        $admin->syncRoles(['admin' => 1]);

        return redirect(route('admins.index'))->with('success', __('models.added_successfully'));
    }


    public function show($id)
    {
        $data = Admin::find($id);
        return view("dashboard.admins.show", compact("data"));
    }


    public function edit($id)
    {
        $data = Admin::find($id);
        return view("dashboard.admins.edit", compact("data"));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'nullable|string|min:8',
        ]);
        $admin = Admin::find($id);
        $data = $request->except('password', 'img');

        $data['password'] = $request->password ? bcrypt($request->password) : $admin->password;

        if ($request->hasFile('img')) {
            $data['img'] = UploadImage($request->file('img'), "users");
        }
        $admin->update($data);
        return redirect(route('admins.index'))->with('success', __('models.edited_successfully'));
    }


    public function destroy($id)
    {
        $admin = Admin::find($id);
        $admin->delete();
        return redirect(route('admins.index'))->with('success', __('models.deleted_successfully'));

    }

    public function deleteSelected(Request $request)
    {
        $ids = $request->ids;
        // return response()->json(['success' => true ,"ids"=> $ids]);
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
            return Excel::download(new AdminExport(), 'admins.xlsx');
    }

    public function import(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:xlsx,xls,csv,CSV|max:10240',
        ]);
        // If validation fails, return the validation errors
        if ($validator->fails()) {
            return redirect()->route('admins.index')->with('error', $validator->errors()->first());
        }
        $file = $request->file('file');
        $done=Excel::import(new AdminImport, $file);
        if($done){
            return redirect()->route('admins.index')->with('success', 'تم تحميل الملف بنجاح.');
        }else{
            return redirect()->route('admins.index')->with('error', 'يرجى مطابقة البيانات البجدول المرفق ,والتاكد من وجودها في قواعد البيانات');
        }
    }
}
