<?php

namespace App\Utils;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SystemUtils extends UploadingUtils
{
  CONST AVATER_PATH = 'uploads/avaters';
  CONST LOGO_PATH = 'uploads/logo';

  public function updateAvatar(Request $request)
  {
    $request->validate(
      ['avater' => 'required|image|mimes:png,jpg'],
    [
      'avater.required' => "يجب عليك إدخال الصورة بالأول",
      'avater.image' => "الملف الذي قمت برفعه ليس صورة",
      'avater.mimes' => "نوع الصورة المقبول هو png , jpg فقط",
    ]);
    $path = null;
    if(Auth::user()->hasRole('client')) $path = UserUtils::CLIENT_AVATER_PATH;
    if(Auth::user()->hasRole('pharmacy')) $path = UserUtils::PHARMACY_AVATER_PATH;
    if(Auth::user()->hasRole('admin')) $path = UserUtils::ADMIN_AVATER_PATH;
    
    if(!$path) return back()->with('error', 'حصل خطأ');

    $avater = self::updateImage(
      $request->avater,
      $path,
      $path. Auth::user()->avater
    );

    User::find(Auth::id())->update(['avater' => $avater]);

    return back()->with('status', 'تم التعديل بنجاح');
  }

}

