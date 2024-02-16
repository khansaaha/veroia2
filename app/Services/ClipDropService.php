<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Http\UploadedFile;

class ClipDropService
{
    public function removeBackground(UploadedFile $image)
    {
        // $imageUrl = $this->uploadImage($image);

        // if (!$imageUrl) {
        //     return ['error' => 'Failed to upload image to Remove.bg'];
        // }

        $apiKey = config('services.clipdrop.api_key'); // Access API key from configuration

        $client = new Client();
        $response = $client->request('POST', 'https://clipdrop-api.co/remove-background/v1', [
            'headers' => [
                'X-Api-Key' => $apiKey,
            ],
            'multipart' => [
                [
                    'name' => 'image_file',
                    'contents' => file_get_contents($image->path()),
                    'filename' => $image->getClientOriginalName(),
                ],
            ],
        ]);
        return $response->getBody();
    }

    public function cleanupImage(UploadedFile $image, UploadedFile $imageMask)
    {

        $apiKey = config('services.clipdrop.api_key'); // Access API key from configuration

        $client = new Client();
        $response = $client->request('POST', 'https://clipdrop-api.co/cleanup/v1', [
            'headers' => [
                'X-Api-Key' => $apiKey,
            ],
            'multipart' => [
                [
                    'name' => 'image_file',
                    'contents' => file_get_contents($image->path()),
                    'filename' => $image->getClientOriginalName(),
                ],
                [
                    'name' => 'mask_file',
                    'contents' => file_get_contents($imageMask->path()),
                    'filename' => $imageMask->getClientOriginalName(),
                ],
            ],
        ]);
        return $response->getBody();
    }

    public function textToImage($prompt)
    {

        // $imageUrl = $this->uploadImage($image);

        // if (!$imageUrl) {
        //     return ['error' => 'Failed to upload image to Remove.bg'];
        // }
        // print_r($prompt);
        // dd("");

        $apiKey = config('services.clipdrop.api_key'); // Access API key from configuration

        $client = new Client();
        $response = $client->request('POST', 'https://clipdrop-api.co/text-to-image/v1', [
            'headers' => [
                'X-Api-Key' => $apiKey,
            ],
            'multipart' => [
                [
                    'name' => 'prompt',
                    'contents' => $prompt,
                ],
            ],
        ]);
        return $response->getBody();
    }
    

    // private function uploadImage(UploadedFile $image)
    // {
    //     $client = new Client();
    //     $response = $client->request('POST', 'https://clipdrop-api.co/remove-background/v1', [
    //         'headers' => [
    //             'X-Api-Key' => config('services.clipdrop.api_key'),
    //         ],
    //         'multipart' => [
    //             [
    //                 'name' => 'image_file',
    //                 'contents' => file_get_contents($image->path()),
    //                 'filename' => $image->getClientOriginalName(),
    //             ],
    //         ],
    //     ]);

    //     $result = json_decode($response->getBody(), true);

    //     return $result['data']['url'] ?? null;
    // }

}
