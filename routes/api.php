<?php

/**
 * Base64
 */
Route::post('/upload', function () {
    $base64 = request()->image;

    // Clean up
    $base64 = str_replace('data:image/png;base64,', '', $base64);

    // Convert base64 to binary
    $image = base64_decode($base64);

    $path = '/uploaded/' . str_random() . '.jpg';

    $target = public_path($path);

    Image::make($image)->save($target);
    // Bisa juga langsung save, gak perlu pakai convert image lagi kalau memang nggak ada yang mau diubah.
    // File::put($target, $image);

    return [
        'url' => url($path)
    ];
});


/**
 * Form Data
 */
Route::post('/upload-form', function () {
    $filename = str_random() . '.jpg';

    request()->file('image')->move(
        public_path('uploaded'),
        $filename
    );

    return [
        'url' => url('/uploaded/' . $filename)
    ];
});
