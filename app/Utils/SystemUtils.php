<?php

namespace App\Utils;

use App\Models\User;
use App\Models\Pharmacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SystemUtils extends UploadingUtils
{
  CONST AVATER_PATH = 'uploading/';
  CONST LOGO_PATH = 'uploading/logo/';

  public static function  updateAvatar(Request $request)
  {
    
    $request->validate(['avatar' => 'required|image|mimes:png,jpg']);
    
    return SystemUtils::returnPath($request->avatar);
  }
   
  public static function  updateImages(Request $request,$path)
  {
    

    $request->validate(['image' => 'required|mimes:png,jpg'],
    [
      'image.mimes'=>'يجب ان تكون الصورة بصيغة ',
      'image.image'=>'يجب ان تكون الملف  الصوره '
    ]);
  
  
    
    return SystemUtils::returnPath($request->image,$path);
  }

  public static function  insertLicense(Request $request ,$path)
  {

    $request->validate(['license' => 'required|image|mimes:png,jpg'],[
      'license.mimes'=>'يجب ان تكون الصورة بصيغة ',
       'license.image'=>'يجب ان تكون الملف  الصوره '
    ]);

    return SystemUtils::returnPath($request->license,$path);
  }

  public static function returnPath($img,$path)
  { 
    $avatar = UploadingUtils::updateImage(
      $img,
      self::AVATER_PATH.$path,
      self::AVATER_PATH
    );
    
    return $avatar;
    
  }
}
