<?php

declare(strict_types=1);

namespace App\Qrcode;

use Illuminate\Contracts\View\View;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

final class QrCodeGenerator
{
    public function generate(string $url): View
    {
        // 2. On génère un QR code de taille 200 x 200 px
        $qrcode = QrCode::size(200)->generate($url);

        // 3. On envoie le QR code généré à la vue "simple-qrcode"
        return view('simple-qrcode', compact('qrcode'));
    }
}
