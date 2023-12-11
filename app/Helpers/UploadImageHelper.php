<?php

namespace App\Helpers;

use Google\Cloud\Storage\StorageClient;
use Google\Cloud\Core\Exception\GoogleException;
use Intervention\Image\Facades\Image;

Class UploadImageHelper
{

    public static function uploadPhoto($file, $googleCloudStoragePath)
    {

        try{

            $storage = new StorageClient([
                'keyFilePath' => base_path().'/service-account.json',
            ]);

            $bucketName = config('app.bucket');
            $bucket = $storage->bucket($bucketName);
            $fileSource = fopen($file, 'r+');
            $compressedFoto = Image::make($fileSource)->encode( 'jpg', 60);

            $bucket->upload($compressedFoto, [
                'predefinedAcl' => 'publicRead',
                'name' => $googleCloudStoragePath
            ]);

            return true;

        }catch (GoogleException $e) {

            // return $e->getCode();
            return $e->getMessage();
        }

    }

}
