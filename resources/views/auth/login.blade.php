<!DOCTYPE html>
<html>

<head>

    <title>Login WargaKu</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-4 mt-5">

                <div class="card">

                    <div class="card-body">

                        <h3 class="mb-4">
                            Login WargaKu
                        </h3>

                        @if (session('error'))
                            <div class="alert alert-danger">

                                {{ session('error') }}

                            </div>
                        @endif

                        <form method="POST" action="/login">

                            @csrf

                            <input class="form-control mb-3" type="email" name="email" placeholder="Email">

                            <input class="form-control mb-3" type="password" name="password" placeholder="Password">

                            <button class="btn btn-primary w-100">

                                Login

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>
