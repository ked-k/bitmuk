<?php

namespace App\Helpers;

use File;
use Image;

class FileHelper
{
    public static function uploadImage($request, $key = 'image', $user = NULL, $type = array(), $width = 570, $height = 570)
    {

        $imageName = "";
        if ($user != NULL) {

            if (isset($user->image)) {
                $imageName = $user->image;
            } elseif (isset($user->avatar)) {
                $imageName = $user->avatar;
            }

        }


        if ($request->hasFile($key)) {


            FileHelper::deleteImage($user, $key);
            $image = $request->file($key);
            $imageName = time() . uniqid() . '.' . $image->getClientOriginalExtension();


            $save_path = 'public/img/';
            if (!file_exists($save_path)) {
                mkdir($save_path, 666, true);
            }
            Image::make($image)->save($save_path.$imageName, 50);


            // Avatart Image
            if (in_array('avatar', $type)) {
                if (array_key_exists('avatarWidth', $type) && array_key_exists('avatarHeight', $type)) {
                    $avatarWidth = $type['avatarWidth'];
                    $avatarHeight = $type['avatarHeight'];
                } else {
                    $avatarWidth = 100;
                    $avatarHeight = 100;
                }
                Image::make($image)->save('public/images/avatar-' . $imageName, 50);
            }
            if (in_array('big', $type)) {
                if (array_key_exists('bigWidth', $type) && array_key_exists('bigHeight', $type)) {
                    $bigWidth = $type['bigWidth'];
                    $bigHeight = $type['bigHeight'];
                } else {
                    $bigWidth = 720;
                    $bigHeight = 1080;
                }
                Image::make($image)->save('public/images/big-' . $imageName, 50);
            }
        }


        return $imageName;
    }

    public static function deleteImage($user, $name = null)
    {
        if ($user != NULL && $name == null) {
            if (File::exists('public/img/avatar-' . $user->image)) {
                File::delete('public/img/avatar-' . $user->image);
            }
            if (File::exists('public/img/' . $user->image)) {
                File::delete('public/img/' . $user->image);
            }
            if (File::exists('public/img/big-' . $user->image)) {
                File::delete('public/img/big-' . $user->image);
            }
            if (File::exists('public/img/' . $user->avatar)) {
                File::delete('public/img/' . $user->avatar);
            }
        }

        if ($user != NULL && $name && $name = !'image' && File::exists('img/' . $user->avatar)) {
            File::delete('img/' . $user->$name);
        }
    }

    public static function uploadFile($request, $user = NULL)
    {
        $fileName = "";
        if ($user != NULL) {
            $fileName = $user->file;
        }
        if ($request->hasFile('file')) {

            if ($user != NULL) {
                FileHelper::deleteFile($user);
            }
            $file = $request->file('file');
            $fileName = time() . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('files', $fileName);
        }
        return $fileName;
    }

    public static function deleteFile($user)
    {
        if ($user != NULL) {
            if (File::exists('files/' . $user->file)) {
                File::delete('files/' . $user->file);
            }
        }
    }
}
