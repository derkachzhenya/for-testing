<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MeshGradientController extends Controller
{
    public function __invoke(Request $request)
    {
        $seed = (string) $request->query('from', 'default');
        $w = (int) $request->query('w', 512);
        $h = (int) $request->query('h', 512);

        $w = max(64, min(1024, $w));
        $h = max(64, min(1024, $h));

        $hash = hash('sha256', $seed . "|{$w}x{$h}");
        $path = "gradients/{$hash}.png";

        if (Storage::disk('local')->exists($path)) {
            $png = Storage::disk('local')->get($path);

            return response($png, 200, [
                'Content-Type' => 'image/png',
                'Cache-Control' => 'public, max-age=31536000, immutable',
            ]);
        }

        $png = $this->renderMeshPng($seed, $w, $h);

        Storage::disk('local')->put($path, $png);

        return response($png, 200, [
            'Content-Type' => 'image/png',
            'Cache-Control' => 'public, max-age=31536000, immutable',
        ]);
    }

    private function renderMeshPng(string $seed, int $w, int $h): string
    {
        $intSeed = hexdec(substr(hash('sha256', $seed), 0, 8));
        mt_srand($intSeed);

        $img = imagecreatetruecolor($w, $h);
        imagealphablending($img, true);
        imagesavealpha($img, true);

        $bg = $this->randColor($img, 30, 70); 
        imagefilledrectangle($img, 0, 0, $w, $h, $bg);

        $blobs = 6;
        for ($i = 0; $i < $blobs; $i++) {
            $cx = mt_rand((int) (-0.2 * $w), (int) (1.2 * $w));
            $cy = mt_rand((int) (-0.2 * $h), (int) (1.2 * $h));
            $r  = mt_rand((int) (0.35 * min($w, $h)), (int) (0.85 * min($w, $h)));

            $col = $this->randVividColor($img);

            for ($k = 0; $k < 3; $k++) {
                imagefilledellipse(
                    $img,
                    $cx + mt_rand(-20, 20),
                    $cy + mt_rand(-20, 20),
                    $r + mt_rand(-30, 30),
                    $r + mt_rand(-30, 30),
                    $col
                );
            }
        }

        for ($i = 0; $i < 10; $i++) {
            imagefilter($img, IMG_FILTER_GAUSSIAN_BLUR);
        }
        imagefilter($img, IMG_FILTER_SMOOTH, 8);

        imagefilter($img, IMG_FILTER_CONTRAST, -8);

        ob_start();
        imagepng($img, null, 6);
        imagedestroy($img);
        return (string) ob_get_clean();
    }

    private function randColor($img, int $min, int $max): int
    {
        $r = mt_rand($min, $max);
        $g = mt_rand($min, $max);
        $b = mt_rand($min, $max);
        return imagecolorallocate($img, $r, $g, $b);
    }

    private function randVividColor($img): int
    {
        $r = mt_rand(80, 255);
        $g = mt_rand(80, 255);
        $b = mt_rand(80, 255);

        $pick = mt_rand(1, 3);
        if ($pick === 1) $r = mt_rand(20, 120);
        if ($pick === 2) $g = mt_rand(20, 120);
        if ($pick === 3) $b = mt_rand(20, 120);

        return imagecolorallocate($img, $r, $g, $b);
    }
}