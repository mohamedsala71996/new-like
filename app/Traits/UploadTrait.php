<?php
namespace App\Traits;  
trait UploadTrait{
    function saveImage($image,$folder){
        $file_extention=$image ->getClientOriginalExtension();
        $file_name= time().'.'.$file_extention;
        $path=$folder;
        $image ->move($path, $file_name);
        return $file_name;
    }
}