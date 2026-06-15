<div class="sidebar p-3">

    <h3 class="fw-bold mb-5">
        SAPA 2029
    </h3>

    <small class="text-muted">
        UTAMA
    </small>

    <div class="mt-2">

        <a href="/dashboard" class="{{ request()->is('dashboard') ? 'active' : '' }}">
            Dashboard
        </a>

        <a href="/voters" class="{{ request()->is('voters*') ? 'active' : '' }}">
            Data Pemilih
        </a>

    </div>

    <div class="mt-5">

        <small class="text-muted">
            PENGATURAN
        </small>

        <a href="#">
            Akun
        </a>

        <a href="/logout">
            Logout
        </a>

    </div>

</div>
