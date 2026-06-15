@extends('layouts.app')

@section('content')
    <h3 class="fw-bold mb-4">
        Dashboard
    </h3>

    <div class="row">

        <div class="col-md-3">

            <div class="card stat-card">

                <div class="card-body">

                    <small>Total Pemilih</small>

                    <h2 class="fw-bold">
                        {{ number_format($totalPemilih) }}
                    </h2>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="card stat-card">

                <div class="card-body">

                    <small>Mendukung</small>

                    <h2 class="text-success fw-bold">
                        {{ $mendukung }}
                    </h2>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="card stat-card">

                <div class="card-body">

                    <small>Ragu-ragu</small>

                    <h2 class="text-warning fw-bold">
                        {{ $ragu }}
                    </h2>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="card stat-card">

                <div class="card-body">

                    <small>Tidak Mendukung</small>

                    <h2 class="text-danger fw-bold">
                        {{ $tidakMendukung }}
                    </h2>

                </div>

            </div>

        </div>

    </div>
@endsection
