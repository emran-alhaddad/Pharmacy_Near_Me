<?php

namespace App\Utils;
use Illuminate\Support\Str;

class UploadingUtils
{
    public static function storeImage($dataImage, $pathImage): bool|string
  {
    if ($dataImage != null) {
      $truck_img = time() . rand(1111111, 9999999) . '.' . $dataImage->extension();
      $dataImage->move(public_path($pathImage), $truck_img);
      return $truck_img;
    } else {
      return false;
    }
  }

  public static function updateImage($dataImage, $pathImage, $oldName): bool|string
  {
    if (file_exists($oldName)) {
      if(!Str::endsWith($oldName, UserUtils::AVATER_IMAGE_DEFAULT))
      @unlink($oldName);
    }

    if ($dataImage != null) {
      
      $extention = "";
      if($dataImage->extension()) $extention = $dataImage->extension();
      else
      {
        $img = $dataImage->getClientOriginalName();
        $extention = substr($img,strpos($img,'.'));
      } 

      $truck_img = time() . rand(1111111111, 9999999999) . '.' . $extention;
      $dataImage->move(public_path($pathImage), $truck_img);
      return  $truck_img;
    } else {
      return false;
    }
  }

  public static function deleteImage($oldName): bool
  {
    if (file_exists($oldName)) {
      @unlink($oldName);
      return true;
    } else {
      return false;
    }
  }

}