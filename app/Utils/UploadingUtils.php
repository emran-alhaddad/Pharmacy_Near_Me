<?php

namespace App\Utils;

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
      @unlink($oldName);
    }
    if ($dataImage != null) {
      $truck_img = time() . rand(1111111111, 9999999999) . '.' . $dataImage->extension();
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