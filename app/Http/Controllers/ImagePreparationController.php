<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use victorycto\imagepreparation\imagepreparation;

class ImagePreparationController extends Controller
{
    public $imagePreparation;

    public function __construct(imagepreparation $imagePreparation)
    {
        $this->imagePreparation = $imagePreparation;
    }
    public function resizeImage()
    {
        return view('imageUpload');
    }

    public function resizeImagePost()
    {
        $request = request();
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);

        $this->imagePreparation->resizeImage($request);
    }
}
