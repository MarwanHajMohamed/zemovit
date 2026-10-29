<?php
// ONE-TIME helper: shrinks oversized product images so they look sharp on the Products page.
// Open  /resize-product-images.php?key=CHANGE-THIS-KEY  once in the browser, then DELETE this file.
if (($_GET['key'] ?? '') !== 'CHANGE-THIS-KEY') { http_response_code(403); exit('forbidden'); }

require __DIR__ . '/../vendor/autoload.php';
use Intervention\Image\ImageManagerStatic as Image;

$dir = realpath(__DIR__ . '/../storage/app/public/images/Product');
if (!$dir) { exit('Product image folder not found'); }
$backup = __DIR__ . '/../storage/app/original_product_images';
if (!is_dir($backup)) { mkdir($backup, 0755, true); }

foreach (glob($dir . '/*.{webp,jpg,jpeg,png}', GLOB_BRACE) as $file) {
    $img = Image::make($file);
    if ($img->width() <= 900) { echo basename($file) . ": already small\n<br>"; continue; }
    copy($file, $backup . '/' . basename($file));
    $img->resize(900, null, function ($c) { $c->aspectRatio(); $c->upsize(); });
    $img->save($file, 90);
    echo basename($file) . ": resized to " . $img->width() . 'x' . $img->height() . "\n<br>";
}
echo "<br>Done. Now delete this file.";
