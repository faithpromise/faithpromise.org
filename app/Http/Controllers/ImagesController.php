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

class ImagesController extends BaseController
{

    public function staffThumbnail($staff_ident)
    {
        $file_path = base_path('images/staff/' . $staff_ident . '-square.jpg');
        $img = Image::make($file_path);
        $new_image = $img->resize(500, 500)->encode('jpg', 80);

        return response($new_image)->header('Content-Type', 'image/jpg');;
    }


}