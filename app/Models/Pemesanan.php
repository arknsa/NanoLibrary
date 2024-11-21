<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = 'pemesanan';
    protected $primaryKey = 'ID_Pemesanan';
    public $incrementing = false; // Karena ID_Pemesanan adalah string
    public $timestamps = false;

    protected $fillable = [
        'ID_Pemesanan',
        'User_ID_User',
        'Buku_ID_Buku',
        'Tanggal_Pemesanan'
    ];

    protected $dates = ['Tanggal_Pemesanan'];
    public function user()
    {
        return $this->belongsTo(User::class, 'User_ID_User', 'ID_User');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'Buku_ID_Buku', 'ID_Buku');
    }

    // Menampilkan data pemesanan untuk admin
    public static function getDataPemesananAdmin()
    {
        return self::with('user', 'book')
            ->get()
            ->map(function ($item) {
                // Menambahkan informasi yang diperlukan untuk tampilan admin
                return [
                    'No' => $item->ID_Pemesanan,
                    'No_Pemesanan' => $item->ID_Pemesanan,
                    'NIM' => $item->user->NIM ?? 'N/A',
                    'Nama' => $item->user->Nama ?? 'N/A',
                    'Judul_Buku' => $item->buku->Judul ?? 'N/A',
                    'Tanggal_Pemesanan' => $item->Tanggal_Pemesanan,
                    'Status' => 'Menunggu Dipinjamkan', // Status pemesanan bisa disesuaikan lebih lanjut
                ];
            });
    }
}
