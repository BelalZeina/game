<?php



use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\ContactsController;
use App\Http\Controllers\Dashboard\ExamController;
use App\Http\Controllers\Dashboard\LevelController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\SupervisorController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\VideoController;
use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
})->name('language');
Route::get('/link', function () {
    $targetFolder = storage_path('app/public');
    $linkFolder = $_SERVER['DOCUMENT_ROOT'] . '/public/storage'; // Added a slash (/)

    if (!file_exists($linkFolder)) {
        symlink($targetFolder, $linkFolder);
        return 'Symlink created successfully.';
    } else {
        return 'Symlink already exists.';
    }
});
Route::get('/opt', function () {
    Artisan::call('optimize');
    return 1;
});



Route::get('login', [AuthController::class, 'create'])->name("login");
Route::post('login', [AuthController::class, 'login'])->name("admin.login");
Route::get('logout', [AuthController::class, 'logout'])->name("logout");

Route::get('/', function () { if (auth("admin")->check()) {return view('dashboard.index');} return view('auth.login');})->name("home")->middleware('localization');

Route::middleware(['localization', "auth:admin"])->group(function () {
    Route::get('/dashboard', function () { return view('dashboard.index');})->name("dashboard.index");

    Route::resource("contacts", ContactsController::class);
    Route::post('/contacts/deleteSelected', [ContactsController::class,'deleteSelected'])->name('contacts.deleteSelected');


    Route::resource("roles", RoleController::class);
    Route::post('/roles/deleteSelected', [RoleController::class,'deleteSelected'])->name('roles.deleteSelected');

    Route::resource("admins", AdminController::class);
    Route::post('/admins/deleteSelected', [AdminController::class,'deleteSelected'])->name('admins.deleteSelected');
    Route::get('export/admins', [AdminController::class,'export'])->name('admins.export');
    Route::post('import/admins', [AdminController::class,'import'])->name('admins.import');

    Route::resource("supervisors", SupervisorController::class);
    Route::post('/supervisors/deleteSelected', [SupervisorController::class,'deleteSelected'])->name('supervisors.deleteSelected');
    Route::get('export/supervisors', [SupervisorController::class,'export'])->name('supervisors.export');
    Route::post('import/supervisors', [SupervisorController::class,'import'])->name('supervisors.import');

    Route::resource("videos", VideoController::class);
    Route::post('/videos/deleteSelected', [VideoController::class,'deleteSelected'])->name('videos.deleteSelected');
    Route::post('/upload.file' , [VideoController::class , 'uploadFile'])->name('upload.file');

    Route::resource("users", UserController::class);
    Route::post('/users/deleteSelected', [UserController::class,'deleteSelected'])->name('users.deleteSelected');
    Route::post('/users/active/{id}', [UserController::class,'active'])->name('users.active');

    Route::resource("levels", LevelController::class);
    Route::post('/levels/deleteSelected', [LevelController::class,'deleteSelected'])->name('levels.deleteSelected');

    Route::resource("exams", ExamController::class);
    Route::post('/exams/deleteSelected', [ExamController::class,'deleteSelected'])->name('exams.deleteSelected');


});
