<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ClipDropService;

class ClipDropController extends Controller
{
    private $clipdropService;

    public function __construct(ClipDropService $clipdropService)
    {
        $this->clipdropService = $clipdropService;
    }

    public function showForm()
    {
        return view('home');
    }

    public function removeBackground(Request $request)
    {


        try {
            $requiredFunction = $request->input('requiredFunction');
            if( $requiredFunction == "texttoimg"){
                $prompt = $request->input('prompt');
                $result = $this->clipdropService->textToImage($prompt);
            }
            elseif($requiredFunction == 'removebg'){
                $image = $request->file('image');
                $result = $this->clipdropService->removeBackground($image);
            }else{
                $image = $request->file('image');
                $imageMask = $request->file('imageMask');
                $result = $this->clipdropService->cleanupImage($image, $imageMask);
            }
            return view('result', compact('result'));
    
            // return view('result', compact('resultBase64'));
        } catch (\Exception $e) {
            // Handle exceptions
            return view('result', ['error' => 'An unexpected error occurred: ' . $e->getMessage()]);
        }
        
        
    }
}
