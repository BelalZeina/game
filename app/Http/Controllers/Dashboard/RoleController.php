<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoleRequest;
use App\Models\Role;
use App\Repositories\Sql\RoleRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class RoleController extends Controller
{

    public function __construct()
    {

        $this->middleware('permission:roles-read')->only(['index']);
        $this->middleware('permission:roles-create')->only(['create', 'store']);
        $this->middleware('permission:roles-update')->only(['edit', 'update']);
        $this->middleware('permission:roles-delete')->only(['destroy']);

    }



    public function index()
    {
        $data=Role::all();
        return view('dashboard.roles.index',compact("data"));
    }


    public function create()
    {
         return view('dashboard.roles.create');
    }


    public function store(Request $request)
    {

       $data = $request->only('name');
       $role =Role::create($data);
       $role->syncPermissions($request->permissions);

        return redirect(route('roles.index'))->with('success', __('models.added_successfully'));

    }

    public function edit($id)
    {
        $role  =Role::find($id);
        return view('dashboard.roles.edit' , compact('role'));

    }

    public function show($id){

    }


    public function update(Request $request, $id)
    {
        $role =Role::find($id);
        $data = $request->only('name');
        $role->update($data);



        $role->syncPermissions($request->permissions);
        return redirect(route('roles.index'))->with('success', __('models.added_successfully'));

    }


    public function destroy($id)
    {
         $role =Role::find($id);

        $role->delete();

        return redirect(route('roles.index'))->with('success', __('models.deleted_successfully'));

    }

    public function deleteSelected(Request $request)
    {
        $ids = $request->ids;
        foreach ($ids as $id) {
            $contact = ROle::find($id);
            if ($contact) {
                $contact->delete();
            }
        }
        return response()->json(['success' => true]);
    }
}
