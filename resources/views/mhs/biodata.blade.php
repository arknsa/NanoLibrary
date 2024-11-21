@extends('layouts.app')

@section('content')

<div class="container-fluid py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-4 wow fadeIn text-center" data-wow-delay="0.5s">
                <img class="img-fluid mx-auto" src="{{ $qrCodePath }}" alt="QR Code">
            </div>
            <div class="col-lg-8 wow fadeIn" data-wow-delay="0.5s">
                <table class="table text-left">
                    <tbody>
                        <tr>
                            <td colspan="2" class="text-center">
                                <h1 class="text-3xl font-bold mb-3">Halo {{ $user->Nama }}!</h1>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-bold">Nama Lengkap</td>
                            <td>{{ $user->Nama }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold">NIM</td>
                            <td>{{ $user->NIM }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold">Email</td>
                            <td>{{ $user->Email }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold">Nomor Telepon</td>
                            <td>{{ $user->No_Telp }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold">Program Studi</td>
                            <td>{{ $user->Program_Studi }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold">Angkatan</td>
                            <td>{{ $user->Angkatan }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection