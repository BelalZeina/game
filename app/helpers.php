<?php


if(!function_exists("sendResponse")){

    function sendResponse($code=201 , $msg=null , $data = null){
        $response = [
            'status'=>$code,
            'msg'=>$msg,
            'data'=>$data,
        ];
        return response()->json($response,$code);
    }

}
if(!function_exists("notFoundResponse")){

    function notFoundResponse($code=404 , $msg="not found" , $data = null){
        $response = [
            'status'=>$code,
            'msg'=>$msg,
            'data'=>$data,
        ];
        return response()->json($response,$code);
    }

}
if(!function_exists("UploadImage")){

    function UploadImage( $request, $folderName)
    {
        if (!empty($request)) {
            $image = uniqid() . '_' .$request->getClientOriginalName();
            $path = $request->storeAs($folderName, $image, 'public');
            return $path;
        }
    }
}

if(!function_exists("UploadMultiImage")){

    function UploadMultiImage($request, $folderName)
    {
        $paths = [];

        // Check if any files were uploaded
        if ($request) {
            // Get the uploaded files from the request
            $Files = $request;

            // Loop through the uploaded files
            foreach ($Files as $File) {
                // Generate a unique filename for each file
                $filename = uniqid() . '_' . $File->getClientOriginalName();

                // Store the file in the specified folder
                $File->storeAs($folderName, $filename, 'public');

                // Create an array with the path and filename for each file
                $paths[] = [
                    'path' => $folderName . '/' . $filename,
                    // 'filename' => $filename,
                ];
            }
        }
        // Convert the $paths array to JSON format
        $pathFile = json_encode($paths);
        return $pathFile;
    }
}

if(!function_exists("image_url")){
    function image_url($img, $size = '', $type = '')
    {
        if (str_contains($img, 'http') or str_contains($img, 'https')) {
            return $img;
        }
        if (empty($img)||$img==null) {
            return asset('/asset/img/avatars/1.png');
        }else{
            return asset('storage/'.$img);
        }

        if (!empty($type)) {
            return (!empty($size)) ? url('/image/' . $size . '/' . $img) . '?type=' . $type : url('/image/' . $img) . '?type=' . $type;
        }

    }
}

if(!function_exists("isActiveRoute")){
    function isActiveRoute($routeNames, $activeClass = 'active')
    {
        if (!is_array($routeNames)) {
            $routeNames = [$routeNames];
        }

        foreach ($routeNames as $routeName) {
            if (Route::currentRouteName() === $routeName) {
                return $activeClass;
            }
        }

        return null;
    }

    if (!function_exists('active')) {
        function active($routeName, $parameters = [])
        {
            return request()->routeIs($routeName) && request()->route()->parameters() == $parameters;
        }
    }

}








