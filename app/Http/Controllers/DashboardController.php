<?php

namespace App\Http\Controllers;

use App\Models\Voter;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPemilih = Voter::count();

        $mendukung = Voter::where(
            'status_dukungan',
            'Mendukung'
        )->count();

        $ragu = Voter::where(
            'status_dukungan',
            'Ragu-ragu'
        )->count();

        $tidakMendukung = Voter::where(
            'status_dukungan',
            'Tidak Mendukung'
        )->count();

        return view(
            'dashboard.index',
            compact(
                'totalPemilih',
                'mendukung',
                'ragu',
                'tidakMendukung'
            )
        );
    }
}