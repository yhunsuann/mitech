<?php 
namespace App\Services;


use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;

class FileUploader
{    
    public function uploadFile(Request $request, $path)
    {
        if ($request->hasFile('upload_avatar')) {
            $file = $request->file('upload_avatar');  

            $ext = $file->getClientOriginalExtension();
            $file_name = time(). '-' . 'img.' .$ext;

            $image = Image::make($file);
            $image->fit(535, 480);
            $file->storeAs("public/assets/img/$path", $file_name);
    
            return $file_name; 
            
        } elseif ($request->hasFile('document_file')) {
            $file = $request->file('document_file');

            $ext = $file->getClientOriginalExtension();
            $file_name = time(). '-' . 'file.' .$ext;
            
            $file->storeAs("public/assets/file/$path", $file_name);
    
            return $file_name; 
        }
            
        return null;
    }

    public function uploadAvartarArticle(UploadedFile $file, $path)
    { 
        $ext = $file->extension();
        $file_name = time(). '-' . 'img.' .$ext;

        $image = Image::make($file);
        $image->fit(535, 480);
        $file->storeAs("public/assets/img/$path", $file_name);

        return $file_name; 
    }
    
    /**
     * uploadAvartarArticle
     *
     * @param  mixed $file
     * @param  mixed $path
     * @return void
     */
    public function uploadSlider(UploadedFile $file, $path)
    { 
        $ext = $file->extension();
        $file_name = time(). '-' . 'img.' .$ext;

        $image = Image::make($file);
        $image->fit(535, 480);
        $file->storeAs("public/assets/img/$path", $file_name);

        return $file_name; 
    }
          
    /**
     * uploadFilePost
     *
     * @param  mixed $request
     * @return void
     */
    public function uploadMutilFile(Request $request, $path)
    {
        if ($request->hasFile('upload_images')) {
            $imageData = [];

            foreach ($request->file('upload_images') as $file) {
                $ext = $file->getClientOriginalExtension();
                $stringRandom = bin2hex(Str::random(3));
                $file_name = time() . '-' . $stringRandom . '-img.' . $ext;

                $image = Image::make($file);
                $image->fit(535, 480);
                $file->storeAs("public/assets/img/$path", $file_name);
                $imageData[] = $file_name;
            }
            
            $image = json_encode($imageData);

            return $image;
        }

        return null;
    }
    public function uploadFileContact($file)
    {
        if ($file && $file->isValid()) {
            $ext = $file->getClientOriginalExtension();
            $file_name = time() . '-' . 'img.' . $ext;

            $image = Image::make($file);
            $image->fit(535, 480);
            $file->storeAs("public/assets/img/constant", $file_name);
     
            return $file_name;
        }

        return null;
    }
}
