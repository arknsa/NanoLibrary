<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Pengembalian extends Model
{
    protected $table = 'pengembalian';
    protected $primaryKey = 'ID_Pengembalian';
    public $timestamps = false;

    protected $fillable = [
        'User_ID_User',
        'Buku_ID_Buku',
        'Tanggal_Pengembalian',
        'Tanggal_Peminjaman',
        'Tenggat_Pengembalian',
    ];

    protected $dates = [
        'Tanggal_Pengembalian',
        'Tanggal_Peminjaman',
        'Tenggat_Pengembalian',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'User_ID_User', 'ID_User');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'Buku_ID_Buku', 'ID_Buku');
    }

    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class, 'Buku_ID_Buku', 'Buku_ID_Buku')
            ->where('User_ID_User', $this->User_ID_User);
    }

    public static function getRiwayatPengembalianMahasiswa($userId)
    {
        return self::select('buku.Judul', 'peminjaman.ID_Peminjaman as No_Peminjaman', 
                            'peminjaman.Tanggal_Peminjaman', 
                            'pengembalian.Tanggal_Pengembalian')
            ->join('buku', 'pengembalian.Buku_ID_Buku', '=', 'buku.ID_Buku')
            ->join('peminjaman', function ($join) {
                $join->on('pengembalian.Buku_ID_Buku', '=', 'peminjaman.Buku_ID_Buku')
                     ->on('pengembalian.User_ID_User', '=', 'peminjaman.User_ID_User');
            })
            ->where('pengembalian.User_ID_User', $userId)
            ->orderBy('peminjaman.Tanggal_Peminjaman', 'desc')
            ->get()
            ->map(function ($item) {
                // Menghitung Tgl_Harus_Kembali 7 hari setelah Tanggal_Peminjaman
                $item->Tgl_Harus_Kembali = date('Y-m-d', strtotime($item->Tanggal_Peminjaman . ' +7 days'));
            });
    }

    public static function getDataPengembalianAdmin()
    {
        return self::select('pengembalian.ID_Pengembalian as No', 
                            'peminjaman.ID_Peminjaman as No_Peminjaman',
                            'user.NIM', 'user.Nama', 'buku.Judul as Judul_Buku', 
                            'peminjaman.Tanggal_Peminjaman', 'pengembalian.Tanggal_Pengembalian')
            ->join('user', 'pengembalian.User_ID_User', '=', 'user.ID_User')
            ->join('buku', 'pengembalian.Buku_ID_Buku', '=', 'buku.ID_Buku')
            ->join('peminjaman', function ($join) {
                $join->on('pengembalian.Buku_ID_Buku', '=', 'peminjaman.Buku_ID_Buku')
                     ->on('pengembalian.User_ID_User', '=', 'peminjaman.User_ID_User');
            })
            ->orderBy('peminjaman.Tanggal_Peminjaman', 'desc')
            ->get()
            ->map(function ($item) {
                // Menghitung Status Pengembalian
                $item->Status = $item->Tanggal_Pengembalian ? 'Sudah dikembalikan' : 'Belum dikembalikan';
                return $item;
            });
    }
}
