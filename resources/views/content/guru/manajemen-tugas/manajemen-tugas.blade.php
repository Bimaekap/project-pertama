@extends('app-guru')
@section('content')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/layouts/guru/manajemen-materi.css') }}">
@endpush
<section class="container-section">
    <div class="card-explanation">
        <h1>Menu Manajemen Tugas</h1>
    </div>
</section>
<section class="sub-container-section">
    <div class="card-head-tabel">
        <h1>Daftar Siswa Yang Mengumpulkan Tugas</h1>
        {{-- <div class="container-link">
            <a class="btn-ctn" href="{{ route('show.data-kelas-guru') }}">
                <img class="img-icon-size-container-link" src="{{ asset('assets/img/add.png') }}" alt="">
                Tambah Data
            </a>
        </div> --}}
    </div>
    <table>
        <thead>
            <tr>
                <th class="th-size-1">No</th>
                <th>Kelas</th>
                <th class="th-size-2">Nama Siswa</th>
                <th class="th-nama-mapel">Nama Mapel</th>
                <th class="th-size-small">Nilai</th>
                <th class="th-size-small">File</th>
                <th class="th-size-small">Hapus</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($getEvaluation as $items)

            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>Kelas</td>
                <td>usersiswa</td>
                <td>Nama Mapel</td>
                <td><a class="icon-crud-pilihan file" href="{{ route('penilaian-tugas') }}">
                        <img class="icon-crud-size-file" src="{{ asset('assets/img/google-docs.png') }}" alt="">
                        Beri Nilai
                    </a></td>
                <td>
                    <a class="icon-crud-pilihan file" href="">
                        <img class="icon-crud-size-file" src="{{ asset('assets/img/google-docs.png') }}" alt="">
                        Lihat Tugas
                    </a>
                </td>
                <td>
                    <a class="icon-crud-master" href="">
                        <img class="icon-crud-size" src="{{ asset('assets/img/edit-pen.png') }}" alt="">
                    </a>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
    <div id="modal">
        <div>
            @yield('content-materi')
        </div>
        <div>
            @yield('edit-materi')
        </div>
    </div>

</section>
@endsection