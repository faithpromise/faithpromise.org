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

    public function staffThumbnail($staff_ident) {

        $img = Image::cache(function($image) use ($staff_ident) {
            $src_path = base_path('images/staff/' . $staff_ident . '-square.jpg');
            $image->make($src_path)->resize(400, 400)->encode(null, 80);
        }, 5, false);

        return response($img)->header('Content-Type', 'image/jpg');;
    }


}