<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
class VideoController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:videos-read')->only(['index']);
        $this->middleware('permission:videos-create')->only(['create', 'store']);
        $this->middleware('permission:videos-update')->only(['edit', 'update']);
        $this->middleware('permission:videos-delete')->only(['destroy']);

    }


    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 10); // Default to 10 if not specified
        $data = Video::paginate($perPage);
        return view('dashboard.videos.index',compact("data"));
    }


    public function create()
    {
        return view('dashboard.videos.create');
    }

    public function uploadFile(Request $request)
    {
        $receiver = new FileReceiver('file', $request, HandlerFactory::classFromRequest($request));

        if (!$receiver->isUploaded()) {
            return response()->json(['error' => 'File not uploaded'], 400);
        }

        $fileReceived = $receiver->receive(); // receive file

        if ($fileReceived->isFinished()) { // file uploading is complete / all chunks are uploaded
            $file = $fileReceived->getFile(); // get file
            $extension = $file->getClientOriginalExtension();
            $fileName = str_replace('.' . $extension, '', $file->getClientOriginalName()); // file name without extension
            $fileName .= '_' . md5(time()) . '.mp4'; // a unique file name

            $disk = Storage::disk('public');
            $path = $disk->putFileAs('videos', $file, $fileName);

            session()->put('link_video', $path);
            session()->put('time_video', $path);

            // delete chunked file
            unlink($file->getPathname());

            return [
                'path' => asset('storage/' . $path),
                'filename' => $fileName,
            ];
        }

        // otherwise return percentage information
        $handler = $fileReceived->handler();
        return [
            'done' => $handler->getPercentageDone(),
            'status' => true,
        ];
    }



    public function store(Request $request)
    {
        $data = $request->except('video', 'img');
        if (session('link_video')) {
            $data['video'] = session('time_video');

            $getID3 = new \getID3;
            $video_file = $getID3->analyze(storage_path('app/public/' . session('time_video')));

            session()->forget('link_video');
        }

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $fileName = uniqid('users_') . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('userss', $fileName, 'public');
            $data['img'] = $filePath;
        }

        Video::create($data);
        return redirect(route('videos.index'))->with('success', __('models.added_successfully'));
    }



    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $data = Video::find($id);

        return view('dashboard.videos.edit' , compact(['data']));

    }


    public function update(Request $request, $id)
    {
         $video = Video::find($id);
         $data = $request->except('video');

        if (session('link_video')) {
            $data['video'] = session('time_video');

            $getID3 = new \getID3;
            $video_file = $getID3->analyze('storage/' . session('time_video'));

            session()->forget('link_video');
        }



        $video->update($data);
        return redirect(route('videos.index'))->with('success', __('models.updated_successfully'));

    }


    public function destroy($id)
    {
         $video = Video::find($id);

        if ($video->img) {
            Storage::delete($video->img);
        }

        $video->delete();
        return redirect(route('videos.index'))->with('success', __('models.deleted_successfully'));

    }
}
