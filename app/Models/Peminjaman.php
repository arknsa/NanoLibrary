<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';
    protected $primaryKey = 'ID_Peminjaman';
    public $timestamps = false;

    protected $fillable = [
        'User_ID_User',
        'Buku_ID_Buku',
        'Tanggal_Peminjaman',
        'Tenggat_Pengembalian',
    ];

    protected $dates = ['Tanggal_Peminjaman', 'Tenggat_Pengembalian'];
    
    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class, 'User_ID_User', 'ID_User');
    }

    // Relasi dengan model Buku
    public function book()
    {
        return $this->belongsTo(Book::class, 'Buku_ID_Buku', 'ID_Buku');
    }

    // Relasi dengan model Pengembalian (jika ada)
    public function pengembalian()
    {
        return $this->hasOne(Pengembalian::class, 'User_ID_User', 'User_ID_User')
                    ->where('Buku_ID_Buku', $this->Buku_ID_Buku);
    }

    // Menampilkan riwayat peminjaman untuk mahasiswa
    public static function getRiwayatPeminjamanMahasiswa($userId)
    {
        return self::with('buku', 'pengembalian')
            ->where('User_ID_User', $userId)
            ->get()
            ->map(function ($item) {
                // Status pengembalian
                $item->Status = $item->pengembalian ? 'Sudah dikembalikan' : 'Belum dikembalikan';
                return $item;
            });
    }

    // Menampilkan data peminjaman untuk admin
    public static function getDataPeminjamanAdmin()
    {
        return self::with('user', 'buku', 'pengembalian')
            ->get()
            ->map(function ($item) {
                // Status pengembalian
                $item->Status = $item->pengembalian ? 'Sudah dikembalikan' : 'Belum dikembalikan';
                return $item;
            });
    }
}
