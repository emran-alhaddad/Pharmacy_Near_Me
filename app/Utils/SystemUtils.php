<?php

namespace App\Utils;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SystemUtils extends UploadingUtils
{
  CONST AVATER_PATH = 'uploading/avater/';
  CONST LOGO_PATH = 'uploading/logo/';

  public static function  updateAvatar(Request $request)
  {
    $request->validate(['avatar' => 'required|image|mimes:png,jpg']);
    
    $avatar = self::updateImage(
      $request->avatar,
      self::AVATER_PATH,
      self::AVATER_PATH.'avater.png'
    );
   
    User::where('id', '=', 1)->update(['avater' => $avatar]);
   
    return redirect()->back()
      ->with('success', 'تم التعديل بنجاح');
  }

}