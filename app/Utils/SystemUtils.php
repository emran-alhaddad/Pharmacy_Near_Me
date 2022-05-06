<?php

namespace App\Utils;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SystemUtils extends UploadingUtils
{
  CONST AVATER_PATH = 'uploading/avater/';
  CONST LOGO_PATH = 'uploading/logo/';

  public function updateAvatar(Request $request)
  {
    $request->validate(['avatar' => 'required|image|mimes:png,jpg']);

    $avatar = self::updateImage(
      $request->avatar,
      self::AVATER_PATH,
      self::AVATER_PATH. Auth::user()->avatar
    );

    User::find(Auth::id())->update(['avatar' => $avatar]);

    return redirect()->back()
      ->with('success', 'تم التعديل بنجاح');
  }

}