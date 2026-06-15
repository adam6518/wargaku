<?php

namespace App\Http\Controllers;

use App\Models\Voter;
use Illuminate\Http\Request;

class VoterController extends Controller
{
    public function index(Request $request)
    {
        $query = Voter::query();

        if ($request->search) {

            $query->where('nama', 'like', '%' . $request->search . '%')
                ->orWhere('nik', 'like', '%' . $request->search . '%');
        }

        $voters = $query
            ->latest()
            ->paginate(10);

        return view(
            'voters.index',
            compact('voters')
        );
    }

    public function create()
    {
        return view('voters.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'nama' => 'required',
            'nik' => 'required|unique:voters,nik',
        ]);

        $voter = Voter::create([

            'nama' => $request->nama,

            'nik' => $request->nik,

            'no_kk' => $request->no_kk,

            'jenis_kelamin' => $request->jenis_kelamin,

            'tempat_lahir' => $request->tempat_lahir,

            'tanggal_lahir' => $request->tanggal_lahir,

            'no_hp' => $request->no_hp,

            'kabupaten' => $request->kabupaten,

            'kecamatan' => $request->kecamatan,

            'desa' => $request->desa,

            'dusun' => $request->dusun,

            'rt_rw' => $request->rt_rw,

            'tps' => $request->tps,

            'status_dukungan' => $request->status_dukungan,

            'kategori' => $request->kategori,

            'aspirasi' => $request->aspirasi,

            'catatan' => $request->catatan,

        ]);
        return response()->json([
            'success' => true,
            'message' => 'Data pemilih berhasil disimpan',
            'data' => $voter
        ]);
    }

    public function search(Request $request)
    {
        $voters = Voter::where(
            'nama',
            'like',
            '%' . $request->keyword . '%'
        )
            ->orWhere(
                'nik',
                'like',
                '%' . $request->keyword . '%'
            )
            ->limit(20)
            ->get();

        return response()->json($voters);
    }
}