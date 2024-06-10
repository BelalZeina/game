<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Resources\VideoResource;
use App\Models\Contact;

use App\Models\Exam;
use App\Models\Level;
use App\Models\UserExam;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function levels(Request $request)
    {
        $data = Level::get();
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
        $map= [
                "id"=>$data->id,
                "name"=>$data->name,
                "exams"=>$data->exams,
            ];
        return sendResponse(200,'data get successfully',$map);
    }
    public function exam($id)
    {
        $data = Exam::find($id);
        $map= [
                "id"=>$data->id,
                "time"=>$data->time,
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
            return [
                "id"=>$exam->id,
                "time"=>$exam->time,
                "admin"=>$exam->admin->name,
                "level"=> [
                        "id"=>$exam->level->id,
                        "name"=>$exam->level->name,
                    ]
                ,
                // "questions"=>$exam->questions->map(function($item){
                //     $item->data=explode(",",$item->data);
                //     return $item;
                // }),
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
            'score' => 'required|integer|min:0',
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
        $data=$request->all();
        $data["user_id"]=$user_id;
        $score = UserExam::create($data);

        return response()->json([
            'status' => 201,
            'message' => 'Score stored successfully',
            'data' => $score
        ], 201);
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
