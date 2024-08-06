<?php

namespace common\components\Services;

class ImageService
{

  public function isFile($file): bool
  {

    return is_file($file);
  }

  public function generateId($minlength = 20, $maxlength = 20, $uselower = true, $useupper = true, $usenumbers = true, $usespecial = false)
  {
    $charset = '';
    if ($uselower) {
      $charset .= "abcdefghijklmnopqrstuvwxyz";
    }
    if ($useupper) {
      $charset .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    }
    if ($usenumbers) {
      $charset .= "123456789";
    }
    if ($usespecial) {
      $charset .= "~@#$%^*()_+-={}|][";
    }
    if ($minlength > $maxlength) {
      $length = mt_rand($maxlength, $minlength);
    } else {
      $length = mt_rand($minlength, $maxlength);
    }
    $key = '';
    for ($i = 0; $i < $length; $i++) {
      $key .= $charset[(mt_rand(0, strlen($charset) - 1))];
    }
    return $key;
  }

  public function imagePath($dir, $extension, $prefix = ''): string
  {

    $generateKey = $this->generateId();
    return $dir . "/" . $generateKey . ($prefix !== '' ? "_" . $prefix : '') . "." . $extension;
  }

  public function imageInfo($image): array
  {

    return pathinfo($image);
  }

  public function cropThumbnail($source, $destination, $data = [])
  {

    $src = ImageCreateFromJPEG($source);
    $nm = imagecreatetruecolor($data['size'][0], $data['size'][1]);

    imagecopyresampled($nm, $src, 0, 0,
      $data['src_x'] ?? 0,
      0,
      $data['size'][0],
      $data['size'][1],
      $data['size'][0],
      $data['size'][1]);

    return imagejpeg($nm, $destination, $data['quality'] ?? 100);
  }

  public function size($file)
  {
    return GetImageSize($file);
  }

  public function resize($source, $destination, $data = [])
  {

    $size = $this->size($source);
    $fileInfo = $this->imageInfo($source);
    $fileInfo['extension'] = strtolower($fileInfo['extension']);

    switch ($fileInfo['extension']) {
      case 'png':
        $src = ImageCreateFromPNG($source);
        break;
      case 'jpeg':
      case 'jpg':
        $src = ImageCreateFromJPEG($source);
        break;
    }

    $iw = $size[0];
    $ih = $size[1];
    $ratio = $iw / $ih;
    $new_width = ceil($data['size'][1] * $ratio);

    $dst = ImageCreateTrueColor($new_width, $data['size'][1]);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $new_width, $data['size'][1], $iw, $ih);
    $image = ImageJPEG($dst, $destination, $data['quality'] ?? 100);
    imagedestroy($src);
    return $image;
  }
}
