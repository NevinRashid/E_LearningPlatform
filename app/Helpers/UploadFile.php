<?php

    if (!function_exists('uploadFile')) {
        function uploadFile($file, $folder, $disk = 'public') {
        $fileName = time() . $file->getClientOriginalName();
        $path = $file->storeAs($folder, $fileName, $disk);
        return $path;
        }
}
