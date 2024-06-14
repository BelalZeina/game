<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Level;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExamController extends Controller
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
        $data = Exam::latest()->get();
        return view("dashboard.exams.index", compact("data"));
    }


    public function create()
    {
        $levels=auth("admin")->user()->levels;
        return view("dashboard.exams.create",compact("levels"));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'level_id' => 'required|exists:levels,id',
            'time' => 'required|numeric|min:1',
            'start_time' => 'required|date_format:H:i', // Validating input to ensure proper time format
            'end_time' => 'required|date_format:H:i',
            'questions' => 'required|array',
            'questions.*.data' => 'required|string',
            'questions.*.operation' => 'required|in:+,-,*,/',
            'questions.*.time' => 'required|numeric',
            'questions.*.correct_answer' => 'required|string',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }
        $exam = Exam::create([
            'level_id' => $request->level_id,
            'admin_id' => auth("admin")->user()->id,
            'time' => $request->time,
            'start_time' => $request->start_time. ':00',
            'end_time' => $request->end_time. ':00',
        ]);

        foreach ($request->questions as $question) {
            Question::create([
                'exam_id' => $exam->id,
                'data' => $question['data'],
                'operation' => $question['operation'],
                'time' => $question['time'],
                'correct_answer' => $question['correct_answer'],
            ]);
        }

        return redirect(route('exams.index'))->with('success', __('models.added_successfully'));
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $levels=auth("admin")->user()->levels;
        $data=Exam::find($id);
        return view("dashboard.exams.edit",compact("levels","data"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Exam $exam)
    {
        $rules = [
            'level_id' => 'required|exists:levels,id',
            'time' => 'required|numeric|min:1',
            'start_time' => 'required', // Validating input to ensure proper time format
            'end_time' => 'required|',
            'questions' => 'required|array',
            'questions.*.data' => 'required|string',
            'questions.*.operation' => 'required|in:+,-,*,/',
            'questions.*.time' => 'required|numeric',
            'questions.*.correct_answer' => 'required|string',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }
        $exam->update([
            'level_id' => $request['level_id'],
            'time' => $request['time'],
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);

        $exam->questions()->delete();
        foreach ($request['questions'] as $questionData) {
            $exam->questions()->create([
                'data' => $questionData['data'],
                'operation' => $questionData['operation'],
                'time' => $questionData['time'],
                'correct_answer' => $questionData['correct_answer'],
            ]);
        }

        // Return a response indicating success
        return redirect(route('exams.index'))->with('success', __('models.edited_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $exam = Exam::find($id);
        $exam->delete();
        return redirect(route('exams.index'))->with('success', __('models.deleted_successfully'));

    }

    public function deleteSelected(Request $request)
    {
        $ids = $request->ids;
        // return response()->json(['success' => true ,"ids"=> $ids]);
        foreach ($ids as $id) {
            $exam = Exam::find($id);
            if ($exam) {
                $exam->delete();
            }
        }
        return response()->json(['success' => true]);
    }
}
