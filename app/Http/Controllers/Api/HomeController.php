<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Resources\VideoResource;
use App\Models\Contact;

use App\Models\Exam;
use App\Models\Level;
use App\Models\Question;
use App\Models\Score;
use App\Models\User;
use App\Models\UserExam;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function levels(Request $request)
    {
        $level_user=auth()->user()->level;
        $data = Level::get()->take($level_user);
        $map=$data->map(function($item){
            return [
                "id"=>$item->id,
                "name"=>$item->name,
            ];
        });
        return sendResponse(200,'data get successfully',$map);
    }
    public function level($id)
    {
        $data = Level::find($id);
        $userId = auth()->id(); // Assuming you have user authentication in place

        // Get exams that the user hasn't solved
        $unsolvedExams = $data->exams()->whereDoesntHave('users', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->get();
        $map= [
                "id"=>$data->id,
                "name"=>$data->name,
                "exams"=>$unsolvedExams,
            ];
        return sendResponse(200,'data get successfully',$map);
    }
    public function exam($id)
    {

        $data = Exam::find($id);
        $exist=UserExam::where('user_id',auth()->id())->where('exam_id',$data->id)->first();
        if($exist){
            return response()->json(['errors' => "you record score before"], 422);
        }
        $currentTime = Carbon::now();
        // Check if the current time is within the exam time frame
        if ($currentTime->lt(Carbon::parse($data->start_time)) || $currentTime->gt(Carbon::parse($data->end_time))) {
            return response()->json(['error' => 'The exam is not available at this time.'], 403);
        }
        $remainingTime = Carbon::parse($data->end_time)->diffInMinutes($currentTime)>=$data->time?$data->time:Carbon::parse($data->end_time)->diffInMinutes($currentTime);

        $map= [
                "id"=>$data->id,
                "time"=>$data->time,
                "start_time"=>$data->start_time,
                "end_time"=>$data->end_time,
                "remaining_time"=>$remainingTime,
                "admin"=>$data->admin->name,
                "questions"=>$data->questions->map(function($item){
                    $item->data=explode(",",$item->data);
                    return $item;
                }),
            ];
        return sendResponse(200,'data get successfully',$map);
    }
    public function exams()
    {
        $data = Exam::with("admin","level")->latest()->get();
        $map=$data->map(function($exam){
            $exist=UserExam::where('user_id',auth()->id())->where('exam_id',$exam->id)->first();

            return [
                "id"=>$exam->id,
                "time"=>$exam->time,
                "admin"=>$exam->admin->name,
                "level"=> [
                        "id"=>$exam->level->id,
                        "name"=>$exam->level->name,
                    ]
                ,
                "status"=>$exist

            ];
        });
        return sendResponse(200,'data get successfully',$map);
    }

    public function store_score(Request $request)
    {
        // Validate incoming request data
        $validator = Validator::make($request->all(), [
            // 'user_id' => 'required|exists:users,id',
            'exam_id' => 'required|exists:exams,id',
            'questions.*.id' => 'required|integer|exists:questions,id',
            'questions.*.answer' => 'required',
        ]);

        // If validation fails, return the validation errors
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $user_id=auth()->id();
        $exist=UserExam::where('user_id',$user_id)->where('exam_id',$request->exam_id)->first();
        if($exist){
            return response()->json(['errors' => "you record score before"], 422);
        }

        $questions = $request->input('questions');
        $score = 0;

        foreach ($questions as $questionData) {
            $question = Question::find($questionData['id']);
            if ($question && $question->correct_answer == $questionData['answer']) {
                $score++;
            }
        }
        $data = UserExam::create([
            "user_id"=>$user_id,
            "exam_id"=>$request->exam_id,
            "score"=>$score/count($questions)
        ]);
        return response()->json([
            'status' => 201,
            'message' => 'Score stored successfully',
            'data' => $score/count($questions)
        ], 201);
    }

    public function score(Request $request)
    {
        $user_id=auth()->id();
        $data=Score::create([
            "user_id"=>$user_id,
            "score"=>$request->score,
        ]);
        return sendResponse(200,'data store successfully',$data);
    }


    public function report_exams(Request $request)
    {
        $data = User::leftJoin('user_exams', 'users.id', '=', 'user_exams.user_id')
        ->select(
            'users.id',
            'users.name',
            DB::raw('COALESCE(AVG(user_exams.score), 0)*100 as average_score'),
            DB::raw('COUNT(user_exams.id) as exams_count')
        )
        ->groupBy('users.id', 'users.name')
        ->orderBy("average_score","desc")
        ->get();

        return sendResponse(200,'data store successfully',$data);
    }

    public function report_score(Request $request)
    {
        $data = User::leftJoin('scores', 'users.id', '=', 'scores.user_id')
        ->select(
            'users.id',
            'users.name',
            DB::raw('COALESCE(AVG(scores.score), 0)*100 as average_score'),
            DB::raw('COUNT(scores.id) as exams_count')
        )
        ->groupBy('users.id', 'users.name')
        ->orderBy("average_score","desc")
        ->get();

        return sendResponse(200,'data store successfully',$data);
    }



    ///////////////////////////////////////////////////////////////////////////////////
    public function contact_us(Request $request)
    {
        // Validate incoming request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'msg' => 'required',
        ]);

        // If validation fails, return the validation errors
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Create a new contact us entry
        $contactUs = Contact::create($request->all());
        // Return a success response
        return response()->json(['message' => 'Contact us entry created successfully', 'data' => $contactUs], 201);
    }

    public function videos(Request $request)
    {
        $data = Video::paginate(10);
        return VideoResource::collection($data);
    }
}
