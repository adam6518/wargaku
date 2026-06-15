@extends('layouts.app')

@section('content')
    <h3 class="mb-4">
        Input Pemilih
    </h3>
    <div id="alertContainer"></div>
    <form id="voterForm" action="{{ route('voters.store') }}" method="POST">

        @csrf

        <div class="card">

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label>Nama Lengkap</label>

                        <input type="text" name="nama" class="form-control">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>NIK</label>

                        <input type="text" name="nik" class="form-control">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>No KK</label>

                        <input type="text" name="no_kk" class="form-control">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>No HP</label>

                        <input type="text" name="no_hp" class="form-control">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Jenis Kelamin</label>

                        <select name="jenis_kelamin" class="form-select">

                            <option>
                                Laki-Laki
                            </option>

                            <option>
                                Perempuan
                            </option>

                        </select>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Status Dukungan</label>

                        <select name="status_dukungan" class="form-select">

                            <option>
                                Mendukung
                            </option>

                            <option>
                                Ragu-ragu
                            </option>

                            <option>
                                Belum Ditemui
                            </option>

                            <option>
                                Tidak Mendukung
                            </option>

                        </select>

                    </div>

                </div>

            </div>

        </div>
        <div class="card mt-4">

            <div class="card-body">

                <h5 class="mb-4">
                    Data Wilayah
                </h5>

                <div class="row">

                    <div class="col-md-4 mb-3">

                        <label>Kabupaten</label>

                        <input type="text" name="kabupaten" class="form-control">

                    </div>

                    <div class="col-md-4 mb-3">

                        <label>Kecamatan</label>

                        <input type="text" name="kecamatan" class="form-control">

                    </div>

                    <div class="col-md-4 mb-3">

                        <label>Desa</label>

                        <input type="text" name="desa" class="form-control">

                    </div>

                    <div class="col-md-4 mb-3">

                        <label>Dusun</label>

                        <input type="text" name="dusun" class="form-control">

                    </div>

                    <div class="col-md-4 mb-3">

                        <label>RT/RW</label>

                        <input type="text" name="rt_rw" class="form-control">

                    </div>

                    <div class="col-md-4 mb-3">

                        <label>TPS</label>

                        <input type="text" name="tps" class="form-control">

                    </div>

                </div>

            </div>

        </div>
        <div class="card mt-4">

            <div class="card-body">

                <h5>
                    Data Tambahan
                </h5>

                <div class="mb-3">

                    <label>Kategori</label>

                    <select name="kategori" class="form-select">

                        <option>Simpatisan</option>
                        <option>Relawan</option>
                        <option>Tokoh Masyarakat</option>
                        <option>Pemuda</option>

                    </select>

                </div>

                <div class="mb-3">

                    <label>Aspirasi</label>

                    <textarea name="aspirasi" rows="4" class="form-control"></textarea>

                </div>

                <div class="mb-3">

                    <label>Catatan</label>

                    <textarea name="catatan" rows="4" class="form-control"></textarea>

                </div>

            </div>

        </div>
        <div class="mt-4">

            <button class="btn btn-success">

                Simpan Data

            </button>

            <a href="{{ route('voters.index') }}" class="btn btn-secondary">

                Batal

            </a>

        </div>

    </form>
    <<script>
        document
            .getElementById('voterForm')
            .addEventListener('submit', async function(e) {

                e.preventDefault();

                const form = this;

                const formData = new FormData(form);

                try {

                    const response = await fetch(
                        form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector(
                                    'input[name="_token"]'
                                ).value,
                                'Accept': 'application/json'
                            }
                        }
                    );

                    const result = await response.json();

                    if (!response.ok) {
                        const errorData = await response.json();

                        document.getElementById('alertContainer').innerHTML = `
        <div class="alert alert-danger">
            ${errorData.message}
        </div>
    `;

                        return;
                    }

                    if (result.success) {

                        document
                            .getElementById('alertContainer')
                            .innerHTML = `
                <div class="alert alert-success alert-dismissible fade show">
                    ${result.message}
                </div>
            `;

                        form.reset();

                        setTimeout(() => {

                            document
                                .getElementById('alertContainer')
                                .innerHTML = '';

                        }, 3000);
                    }

                } catch (error) {

                    console.error(error);

                    document
                        .getElementById('alertContainer')
                        .innerHTML = `
            <div class="alert alert-danger">
                Terjadi kesalahan saat menyimpan data.
            </div>
        `;
                }

            });
    </script>
@endsection
