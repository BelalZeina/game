<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:exams-read')->only(['index']);
        $this->middleware('permission:exams-create')->only(['create', 'store']);
        $this->middleware('permission:exams-update')->only(['edit', 'update']);
        $this->middleware('permission:exams-delete')->only(['destroy']);
    }
    public function index(Request $request)
    {
        // $perPage = $request->get('per_page', 10); // Default to 10 if not specified
        $data = Level::latest()->get();
        return view("dashboard.levels.index", compact("data"));
    }


    public function create()
    {
        return view("dashboard.levels.create" );

    }

    public function store(Request $request)
    {
        $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
        ]);
        $data = $request->all();
        Level::create($data);

        return redirect(route('levels.index'))->with('success', __('models.added_successfully'));
    }


    public function show($id)
    {
        $data = Level::find($id);
        return view("dashboard.levels.show", compact("data"));
    }


    public function edit($id)
    {
        $data = Level::find($id);
        return view("dashboard.levels.edit", compact("data"));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
        ]);
        $level = Level::find($id);
        $data = $request->all();
        $level->update($data);
        return redirect(route('levels.index'))->with('success', __('models.edited_successfully'));
    }


    public function destroy($id)
    {
        $admin = Level::find($id);
        $admin->delete();
        return redirect(route('levels.index'))->with('success', __('models.deleted_successfully'));

    }

    public function deleteSelected(Request $request)
    {
        $ids = $request->ids;
        foreach ($ids as $id) {
            $admin = Level::find($id);
            if ($admin) {
                $admin->delete();
            }
        }
        return response()->json(['success' => true]);
    }

}
