@extends('layouts.admin')

@section('content')
<div class="container mt-5 pt-5">
  <div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
    </div>

    <!-- SECTION -->
    <div class="container-fluid py-5">
      <div class="container">
        <div class="table-responsive bg-white p-4 rounded shadow-sm">
          <div class="row g-5 align-items-center justify-content-center">
            <div class="col-lg-10 wow fadeIn" data-wow-delay="0.5s">
              <table class="table text-align center">
                <thead>
                  <tr>
                    <td colspan="2" class="text-center">
                      <h1 class="text-3xl font-bold mb-3">Detail Mahasiswa</h1>
                    </td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="font-bold" style="width: 30%;">Nama Lengkap</td>
                    <td>{{ $mahasiswa->Nama }}</td>
                  </tr>
                  <tr>
                    <td class="font-bold">NIM</td>
                    <td>{{ $mahasiswa->NIM }}</td>
                  </tr>
                  <tr>
                    <td class="font-bold">Email</td>
                    <td>{{ $mahasiswa->Email }}</td>
                  </tr>
                  <tr>
                    <td class="font-bold">Nomor Telepon</td>
                    <td>{{ $mahasiswa->No_Telp }}</td>
                  </tr>
                  <tr>
                    <td class="font-bold">Program Studi</td>
                    <td>{{ $mahasiswa->Program_Studi }}</td>
                  </tr>
                  <tr>
                    <td class="font-bold">Angkatan</td>
                    <td>{{ $mahasiswa->Angkatan }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="form-group text-center mt-4">
              <a href="{{ route('adm-mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection
