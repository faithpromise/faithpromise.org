<?php
/**
 * Created by PhpStorm.
 * User: broberts
 * Date: 7/7/15
 * Time: 2:01 PM
 */

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Intervention\Image\ImageManagerStatic as Image;

class ImagesController extends BaseController {

    public function profile($img_path) {
        $img = Image::make($this->imagePath($img_path))->resize(400, 400)->encode(null, 80);
        return $this->returnImage($img);
    }

    public function card($img_path) {
        $img = Image::make($this->imagePath($img_path))->resize(740, 270)->encode(null, 80);
        return $this->returnImage($img);
    }

    public function album($img_path) {
        $img = Image::make($this->imagePath($img_path))->resize(400, 400)->encode(null, 80);
        return $this->returnImage($img);
    }

    public function hero($img_path) {
        $img = Image::make($this->imagePath($img_path))->encode(null, 80);
        return $this->returnImage($img);
    }

    private function imagePath($img_path) {
        return base_path($img_path);
    }

    private function returnImage($img) {
        // TODO: add expires header
        return response($img)->header('Content-Type', 'image/jpg');
    }
}
