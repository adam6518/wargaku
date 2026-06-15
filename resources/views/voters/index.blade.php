@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-4">

        <h3>
            Data Pemilih
        </h3>

        <a href="/voters/create" class="btn btn-success">
            + Input Pemilih
        </a>

    </div>

    @if (session('success'))
        <div class="alert alert-success fade show">

            {{ session('success') }}

        </div>
    @endif

    <form method="GET">

        <div class="row mb-3">

            <div class="col-md-4">

                <input id="searchInput" type="text" name="search" class="form-control" placeholder="Cari Nama atau NIK">

            </div>

            <div class="col-md-2">

                <button class="btn btn-primary">

                    Cari

                </button>

            </div>

        </div>

    </form>

    <div class="card">

        <div class="card-body">

            <table class="table">

                <thead>

                    <tr>

                        <th>Nama</th>
                        <th>NIK</th>
                        <th>No HP</th>
                        <th>TPS</th>
                        <th>Status</th>

                    </tr>

                </thead>

                <tbody id="voterTable">

                    @foreach ($voters as $voter)
                        <tr>

                            <td>{{ $voter->nama }}</td>

                            <td>{{ $voter->nik }}</td>

                            <td>{{ $voter->no_hp }}</td>

                            <td>{{ $voter->tps }}</td>

                            <td>

                                @if ($voter->status_dukungan == 'Mendukung')
                                    <span class="badge bg-success">
                                        Mendukung
                                    </span>
                                @elseif($voter->status_dukungan == 'Ragu-ragu')
                                    <span class="badge bg-warning">
                                        Ragu-ragu
                                    </span>
                                @elseif($voter->status_dukungan == 'Tidak Mendukung')
                                    <span class="badge bg-danger">
                                        Tidak Mendukung
                                    </span>
                                @else
                                    <span class="badge bg-secondary">
                                        Belum Ditemui
                                    </span>
                                @endif

                            </td>

                        </tr>
                    @endforeach

                </tbody>

            </table>

        </div>

    </div>
    @if (session('success'))
        <div class="alert alert-success">

            {{ session('success') }}

        </div>
    @endif

    <script>
        const searchInput =
            document.getElementById('searchInput');

        searchInput.addEventListener(

            'keyup',

            async function() {

                const keyword = this.value;

                const response =
                    await fetch(

                        `/voters/search?keyword=${keyword}`

                    );

                const voters =
                    await response.json();

                let html = '';

                voters.forEach(voter => {

                    html += `
                <tr>

                    <td>${voter.nama}</td>

                    <td>${voter.nik}</td>

                    <td>${voter.no_hp ?? ''}</td>

                    <td>${voter.tps ?? ''}</td>

                    <td>${voter.status_dukungan}</td>

                </tr>
            `;
                });

                document
                    .getElementById('voterTable')
                    .innerHTML = html;

            }

        );

        setTimeout(() => {

            const alert =
                document.querySelector('.alert');

            if (alert) {

                alert.classList.remove('show');

                alert.classList.add('hide');

            }

        }, 3000);
    </script>
@endsection
