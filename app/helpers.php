<?php
use Intervention\Image\Facades\Image;

if(!function_exists('image_crop')){
      function image_crop($image_name,$width=550,$height=750){
            if(file_exists(storage_path('app/public/images/'.$image_name)) &&  
               !file_exists(storage_path('app/public/images/thumbnail/'.$image_name))
               ){
                $abc = Image::make(storage_path('app/public/images/'.$image_name));
                $abc ->resize($width,$height);
                $abc -> save(storage_path('app/public/images/thumbnail/'.$image_name));
    }
    // else{
    //   return 'no crop';
    // }


    // yedi src batwa function call gare ma link yeta batwa return garne
    // return asset('storage/images/thumbnail/'.$image_name);
  }
}
