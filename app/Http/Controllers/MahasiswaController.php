<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

class MahasiswaController extends Controller
{
    public function show($ID_User)
    {
        // Ambil data pengguna berdasarkan ID
        $user = User::findOrFail($ID_User);

        // Hasilkan QR Code
        $qrCodePath = $this->generateQRCode($user->NIM);

        return view('mhs.biodata', compact('user', 'qrCodePath'));
    }

    public function generateQRCode($NIM)
    {
        // Buat QR Code dengan data
        $qrCode = new QrCode($NIM);

        // Tentukan writer untuk output PNG
        $writer = new PngWriter();

        // Generate QR Code image
        $result = $writer->write($qrCode);

        // Tentukan path untuk menyimpan QR Code
        $qrCodePath = public_path('qr_codes/' . $NIM . '.png');

        // Simpan file QR Code
        $result->saveToFile($qrCodePath);

        // Kembalikan path untuk ditampilkan di view
        return asset('qr_codes/' . $NIM . '.png');
    }
}