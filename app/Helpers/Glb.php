<?php
namespace App\Helpers;

use App\Models\Backend\Lang;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class Glb
{
    static $urlListType = [
        1 => 'Transaction', 2 => 'Report', 3 => 'Setting'
    ];

//    translate
    static function translate($txt)
    {
        $lang = strtolower($txt);
        $lang = trim($lang);
        while (strpos($lang, '  ') !== false) {
            $lang = str_replace('  ', ' ', $lang);
        }
        while (strpos($lang, ' ') !== false) {
            $lang = str_replace(' ', '-', $lang);
        }
        $lang = str_replace("'", "''", $lang);
        $l = strtolower($lang);
        $s_lang = session('lang')?session('lang'):'kh';
        return Lang::putLang($l,$s_lang);

    }
//    end translate
    static function deleteFile($img,$tmp = false)
    {
        $uploads = $tmp == false ? 'uploads/files' : 'uploads/_files';
        if(File::exists("$uploads/$img")) File::delete("$uploads/$img");
        if(File::exists("$uploads/tmp1/$img")) File::delete("$uploads/tmp1/$img");
        if(File::exists("$uploads/tmp2/$img")) File::delete("$uploads/tmp2/$img");
    }

    static function moveTmpFile($img)
    {
        $uploadsTmp = 'uploads/_files'; $uploads = 'uploads/files';
        if(File::exists("$uploadsTmp/$img")) File::move("$uploadsTmp/$img","$uploads/$img");
        if(File::exists("$uploadsTmp/tmp1/$img")) File::move("$uploadsTmp/tmp1/$img","$uploads/tmp1/$img");
        if(File::exists("$uploadsTmp/tmp2/$img")) File::move("$uploadsTmp/tmp2/$img","$uploads/tmp2/$img");
    }

    static function upload($files, $tmp = false)
    {
        $uploads = $tmp == false ? 'uploads/files' : 'uploads/_files';

        $json = array(
            'files' => array()
        );

        foreach ($files as $file) {
            $r_filename = $file->getClientOriginalName();//. "." . $file->getClientOriginalExtension();
            $size = $file->getSize();
            $type = $file->getMimeType();

            $filename = self::resize($file, $tmp);

            $json['files'][] = array(
                'name' => $filename,
                'b_name' => $filename,
                'size' => $size,
                'type' => $type,
                'url' => asset("{$uploads}/{$filename}"),
                'thumbnailUrl' => asset("{$uploads}/tmp2/{$filename}"),
                'deleteType' => 'DELETE',
                'deleteUrl' => url("backend/post-delete-img/{$filename}"),
            );
            // $upload = $file->move( public_path().'/uploads/files', $filename );
        }
        return $json;
    }

    static function resize($image, $tmp = false)
    {
        $uploads = $tmp == false ? 'uploads/files' : 'uploads/_files';

        try {
            $extension = $image->getClientOriginalExtension();
            $imageRealPath = $image->getRealPath();

            //$fullName 		= 	$image->getClientOriginalName();
            $imageName = rand(11111, 99999) . '_' . time() . '.' . $extension;
            $thumbName = 'tmp1/' . $imageName;
            $thumbName2 = 'tmp2/' . $imageName;

            //$imageManager = new ImageManager(); // use this if you don't want facade style code
            //$img = $imageManager->make($imageRealPath);

            $img = Image::make($imageRealPath); // use this if you want facade style code
            $img2 = Image::make($imageRealPath); // use this if you want facade style code


            $img->resize(600, 400, function ($constraint) {
                $constraint->aspectRatio();
            });

            $img2->resize(80, 80, function ($constraint) {
                $constraint->aspectRatio();
            });


            $image->move(public_path($uploads), $imageName);

            /*// draw transparent text
            $img->text('camsmile.org', 100, 100, function($font) {
                $font->file(public_path('news/fonts/fontawesome-webfontba72.ttf'));
                $font->color(array(255, 255, 255, 0.5));
                $font->size(30);
                $font->color('#fdf6e3');
                $font->align('center');
                $font->valign('middle');
                $font->angle(45);
            });*/

            $img->save(public_path($uploads) . '/' . $thumbName);
            $img2->save(public_path($uploads) . '/' . $thumbName2);
            return $imageName;
        } catch (Exception $e) {
            return '#';
        }

    }

    static function getImgFromContent($content)
    {
        $src = '#';
        try {
            preg_match_all('|<img.*?src=[\'"](.*?)[\'"].*?>|i', $content, $matches);
            $src = isset($matches[1][0]) ? $matches[1][0] : '#';
        } catch (\Exception $e) {
            $src = '#';
        }

        return $src;
    }

    // note : m = method , u = url, c = controller@action,
    // t = type (1 = transaction, report = 2, setting = 3)

    static function urlList()
    {
        return UrlListArr;
    }

    static function status(){
        return [0=> 'Disable',1=> 'Enabled'];
    }
    static function instock(){
        return [0=> 'Outstock',1=> 'Instock'];
    }

    static function spec_type(){
        return [0=> 'Color',1=> 'Size'];
    }
    static function page_type()
    {
        return [
            '0' => 'ABOUT',
//            '1' => 'DELIVERY INFORMATION',
//            '2' => 'PRIVACY POLICY',
//            '3' => 'TERMS $ CONDITION',
//            '4' => 'SUPPLIERS',
//            '5' => 'OUR STORE'
        ];
    }

}