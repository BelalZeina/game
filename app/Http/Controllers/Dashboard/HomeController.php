<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $chart_user = User::select('level', DB::raw('COUNT(*) as user_count'))
        ->groupBy('level')
        ->orderBy('level')
        ->get();
        //////////////////////////////////////////////
        $top_users = User::leftJoin('user_exams', 'users.id', '=', 'user_exams.user_id')
        ->select(
            'users.id',
            'users.name',
            'users.img',
            DB::raw('COALESCE(AVG(user_exams.score), 0)*100 as average_score'),
            DB::raw('COUNT(user_exams.id) as exams_count')
        )
        ->groupBy('users.id', 'users.name','users.img')
        ->orderBy("average_score","desc")
        ->get()->take(5);
        //////////////////////////////////////////////
        $last_users = User::orderBy("created_at","desc")
        ->get()->take(5);
        //////////////////////////////////////////////
        $totalUsers = User::count();
        $levelCompletionRates = Exam::leftJoin('user_exams', 'exams.id', '=', 'user_exams.exam_id')
            ->select('exams.level_id', DB::raw('COUNT(user_exams.user_id) as completed_count'))
            ->groupBy('exams.level_id')
            ->get()
            ->map(function ($exam) use ($totalUsers) {
                $exam->completion_rate = $totalUsers > 0 ? ($exam->completed_count / $totalUsers) * 100 : 0;
                return $exam;
            });

        return view('dashboard.index',compact("chart_user","top_users","last_users","levelCompletionRates"));
        // return $examCompletionRates;
    }
}
