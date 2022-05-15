<?php

namespace App\Utils;

use App\Models\User;
use App\Models\Pharmacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SystemUtils extends UploadingUtils
{
  CONST AVATER_PATH = '/uploads/';
  CONST UPLOADS_PATH = '/uploads/';
  CONST LOGO_PATH = '/uploads/logo/';

  public static function  updateAvatar(Request $request,$path)
  {
    
    $request->validate(['avatar' => 'required|image|mimes:png,jpg'],
    ['avatar.mimes'=>'يجب ان تكون الصورة بصيغة png , jpg فقط',
    'avatar.image'=>'يجب ان تكون الملف  الصوره ']
  );
    
    return SystemUtils::returnPath($request->avatar,$path);
  }

  public static function  updateLogo(Request $request,$path)
  {
    
    $request->validate(['logo' => 'required|image|mimes:png,jpg,svg'],
    ['logo.mimes'=>'يجب ان تكون الصورة بصيغة png , svg , jpg فقط',
    'logo.image'=>'يجب ان تكون الملف  الصوره ']
  );
    
    return SystemUtils::returnPath($request->logo,$path);
  }
   
  public static function  updateImages(Request $request,$path)
  {
    

    $request->validate(['image' => 'required|mimes:png,jpg'],
    [
      'license.mimes'=>'يجب ان تكون الصورة بصيغة png , jpg فقط',
      
    ]);
  
  
    
    return SystemUtils::returnPath($request->image,$path);
  }
 
  public static function  insertLicense( $request ,$path)
  {

    $request->validate(['license' => 'required|image|mimes:png,jpg'],[
      'license.mimes'=>'يجب ان تكون الصورة بصيغة png , jpg فقط',
       'license.image'=>'يجب ان تكون الملف صوره '
    ]);

    return SystemUtils::returnPath($request->license,$path);
  }

  public static function returnPath($img,$path)
  { 
    $image = UploadingUtils::updateImage(
      $img,
      self::UPLOADS_PATH.$path,
      self::UPLOADS_PATH
    );
    
    return $image;
    
  }
}
