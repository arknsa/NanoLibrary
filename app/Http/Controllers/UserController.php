<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('users.login');
    }

    // Menangani proses login
    public function login(Request $request)
    {
        // Validate the form data
        $request->validate([
            'Email' => 'required|email',
            'Password' => 'required|string',
        ]);

        // Retrieve user by email
        $user = User::where('Email', $request->input('Email'))->first();

        // Check if the user exists and the password is correct
        if ($user && Hash::check($request->input('Password'), $user->Password)) {
            // Authentication passed
            Auth::login($user);

            // Check if there is a redirect URL
            $redirectTo = $request->input('redirect_to', '/'); // Default to homepage if not set

            // Get the authenticated user's role
            $role = $user->Role;

            // Redirect based on role
            if ($role == 'admin') {
                return redirect()->intended('/adm');
            } elseif ($role == 'mahasiswa') {
                return redirect()->intended($redirectTo); // Redirect to the page the user logged in from
            } else {
                // If role is not recognized, log out and redirect to login with error
                Auth::logout();
                return redirect('/login')->withErrors(['Email' => 'Role tidak dikenal.']);
            }
        }


        // Check if there is a redirect URL
        $redirectTo = $request->input('redirect_to', '/'); 
        
        // Set a unique session flash message
        session()->flash('login_success', 'Login berhasil!');
        // Store the intended route in the session
        session()->flash('redirect_to', $redirectTo);
        
        // Authentication failed
        return back()->withErrors([
            'Email' => 'Email atau kata sandi salah.',
        ])->withInput($request->only('Email', 'remember'));
    }

    // Menampilkan form register
    public function showRegisterForm()
    {
        return view('users.register');
    }

    public function register(Request $request)
    {
        // Validate the form data
        $request->validate([
            'Nama' => 'required|string|max:255',
            'NIM' => [
                'required',
                'regex:/^(\d{9}|\d{12})$/',
            ],
            'No_Telp' => [
                'required',
                'digits_between:9,13',
                'regex:/^\d+$/',
            ],
            'Email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:user,Email',
                'regex:/^[a-zA-Z0-9._%+-]+@ftmm\.unair\.ac\.id$/',
            ],
            'Password' => 'required|string|min:8|confirmed',
        ],  [
            // Custom error messages
            'NIM.required' => 'Kolom NIM wajib diisi.',
            'NIM.regex' => 'NIM harus terdiri dari tepat 9 atau 12 digit angka.',
            'Email.required' => 'Kolom Email wajib diisi.',
            'Email.email' => 'Format Email tidak valid.',
            'Email.regex' => 'Email harus menggunakan domain ftmm.unair.ac.id.',
            'Email.unique' => 'Email sudah terdaftar.',
            'Password.required' => 'Kolom Kata Sandi wajib diisi.',
            'Password.min' => 'Kata Sandi harus minimal :min karakter.',
            'Password.confirmed' => 'Konfirmasi Kata Sandi tidak cocok.',
            'No_Telp.required' => 'Kolom Nomor Telepon wajib diisi.',
            'No_Telp.digits_between' => 'Nomor Telepon harus terdiri dari 9 hingga 13 digit.',
            'No_Telp.regex' => 'Nomor Telepon hanya boleh berisi angka.',
        ]);

        // Extract Angkatan from Email
        $email = $request->input('Email');
        $emailPrefix = explode('@', $email)[0];
        $angkatan = substr($emailPrefix, strrpos($emailPrefix, '-') + 1, 4);

        // Extract Program Studi from NIM
        $nim = $request->input('NIM');
        $programStudi = $this->getProgramStudi($nim);

        // Create the user
        $user = User::create([
            'Role' => 'mahasiswa',
            'Email' => $email,
            'Password' => Hash::make($request->input('Password')),
            'NIM' => $nim,
            'Nama' => $request->input('Nama'),
            'No_Telp' => $request->input('No_Telp'),
            'Program_Studi' => $programStudi,
            'Angkatan' => $angkatan,
        ]);

        // Set a unique session flash message
        session()->flash('registration_success', 'Registrasi berhasil!');

        // Redirect back to the registration page
        return redirect()->back();
    }

    private function getProgramStudi($nim)
    {
        $nimLength = strlen($nim);

        if ($nimLength == 9) {
            // For NIMs with 9 digits
            $programCode = substr($nim, 0, 3);
            switch ($programCode) {
                case '162':
                    return 'Rekayasa Nanoteknologi';
                case '163':
                    return 'Teknik Robotika dan Kecerdasan Buatan';
                case '164':
                    return 'Teknologi Sains Data';
                case '165':
                    return 'Teknik Industri';
                case '166':
                    return 'Teknik Elektro';
                    // Add more cases if needed
                default:
                    return 'Unknown';
            }
        } elseif ($nimLength == 12) {
            // For NIMs with 12 digits
            $digit7 = substr($nim, 6, 1);
            switch ($digit7) {
                case '1':
                    return 'Teknologi Sains Data';
                case '2':
                    return 'Teknik Robotika dan Kecerdasan Buatan';
                case '3':
                    return 'Rekayasa Nanoteknologi';
                case '4':
                    return 'Teknik Elektro';
                case '5':
                    return 'Teknik Industri';
                    // Add more cases based on the 7th digit if needed
                default:
                    return 'Unknown';
            }
        } else {
            return 'Unknown';
        }
    }


    // Menangani logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
