<?php

namespace App\Http\Controllers;

use App\Models\ActiveUser;
use App\Models\UserHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RoomController extends Controller
{
    public function index()
    {
        $activeUsers = ActiveUser::with('user')->get();
        return view('users.ruangbaca', compact('activeUsers'));
    }

    public function entry(Request $request)
    {
        $request->validate([
            'nim' => 'required|string',
        ]);

        $user = User::where('NIM', $request->nim)->first();

        if (!$user) {
            return back()->withErrors(['nim' => 'NIM tidak ditemukan.']);
        }

        // Cek apakah pengguna sudah ada di dalam ruangan
        $activeUser = ActiveUser::where('user_id', $user->ID_User)->first();

        if (!$activeUser) {
            // Tambahkan pengecekan kapasitas di sini
            $occupiedSeats = ActiveUser::count();
            $capacity = 30; // Anda bisa mengganti nilai ini sesuai kebutuhan

            if ($occupiedSeats >= $capacity) {
                return back()->withErrors(['room' => 'Ruangan sudah penuh. Tidak dapat masuk.']);
            }

            // Jika tidak ada, berarti pengguna harus masuk
            ActiveUser::create([
                'user_id' => $user->ID_User,
                'entry_time' => Carbon::now(),
            ]);
            return redirect()->route('reading-room.index')->with('success', 'Berhasil masuk ke ruangan.');
        } else {
            // Jika ada, berarti pengguna harus keluar
            // Update exit time dan simpan di history
            $activeUser->exit_time = Carbon::now();
            $activeUser->save();

            // Simpan ke dalam history
            UserHistory::create([
                'user_id' => $user->ID_User,
                'nama' => $user->Nama,
                'nim' => $user->NIM,
                'program_studi' => $user->Program_Studi,
                'entry_time' => $activeUser->entry_time,
                'exit_time' => $activeUser->exit_time,
            ]);

            // Hapus dari active_users
            $activeUser->delete();

            return redirect()->route('reading-room.index')->with('success', 'Berhasil keluar dari ruangan.');
        }
    }

}