<?php

use Illuminate\Support\Str;

if (!function_exists('makeSlug')) {
    function makeSlug($data)
    {
        return Str::slug($data, '-');
    }
}

if (!function_exists('uploadFile')) {
    function uploadFile($file)
    {
        $path = $file->storeAs('uploads', $file->hashName(), 'public');
        return $path;
    }
}
