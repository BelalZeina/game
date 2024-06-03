
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href={{ asset('asset/img/favicon/favicon.ico') }} />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Arvo:ital,wght@0,400;0,700;1,400;1,700&family=Cairo:wght@200..1000&family=Inter:wght@100..900&family=Manrope:wght@300;400;500;600;700;800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Tajawal:wght@200;300;400;500;700;800;900&display=swap"
        rel="stylesheet">
    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('asset/vendor/fonts/boxicons.css') }}" />
    @php
        $lang = config('app.locale');
    @endphp

    <!-- Core CSS -->
    <link rel="stylesheet"
        href="{{ $lang == 'ar' ? asset('asset/vendor/css/core.ar.css') : asset('asset/vendor/css/core.css') }}" />

    <link rel="stylesheet" href={{ asset('asset/vendor/css/theme-default.css') }}
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('asset/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href={{ asset('asset/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }} />

    <link rel="stylesheet" href={{ asset('asset/vendor/libs/apex-charts/apex-charts.css') }} />

    <!-- Page CSS -->
    <!-- Helpers -->
    <script src={{ asset('asset/vendor/js/helpers.js') }}></script>
    <link rel="stylesheet" href={{ asset("asset\\fontawesome\css\all.css") }}>
    <script src={{ asset('asset/js/config.js') }}></script>

    @include('layouts.dashboard.head')
</head>

<body>
    <div class="container">

        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                                <a href="#" class="d-inline-block auth-logo">
                                    <img src="{{ asset('asset/images/logo.png') }}" alt="" height="100"
                                        width="100">
                                </a>
                            </div>
                            <p class="mt-3 fs-15 fw-medium">welcome to Game Dashboard</p>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">

                            <div class="card-body p-4">
                                <div class="text-center mt-2">

                                    <p class="text-muted">Admin Game</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form class="needs-validation" novalidate action="{{ route('admin.login') }}" method="POST">
                                        @csrf

                                        <div class="mb-3">
                                            <label for="userphone" class="form-label">Phone <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="userphone" name="phone"
                                                placeholder="Enter phone number" value="{{ old('phone') }}" required>
                                            @error('phone')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="password-input">Password <span class="text-danger">*</span></label>
                                            <div class="position-relative auth-pass-inputgroup">
                                                <input type="password" class="form-control pe-5 password-input @error('password') is-invalid @enderror"
                                                    name="password" onpaste="return false" placeholder="Enter password"
                                                    id="password-input" aria-describedby="passwordInput" required>
                                                <button
                                                    class="btn btn-link position-absolute end-0 top-0 text-decoration-none shadow-none text-muted password-addon"
                                                    type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                                @error('password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mt-4">
                                            <button class="btn btn-success w-100" type="submit">Login</button>
                                        </div>
                                    </form>


                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->



                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
    </div>
    <script src={{ asset('asset/vendor/libs/jquery/jquery.js') }}></script>
    <script src={{ asset('asset/vendor/libs/popper/popper.js') }}></script>
    <script src={{ asset('asset/vendor/js/bootstrap.js') }}></script>
    <script src={{ asset('asset/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}></script>

    <script src={{ asset('asset/vendor/js/menu.js') }}></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src={{ asset('asset/vendor/libs/apex-charts/apexcharts.js') }}></script>

    <!-- Main JS -->
    <script src={{ asset('asset/js/main.js') }}></script>
    <!-- Page JS -->
    <script src={{ asset('asset/js/dashboards-analytics.js') }}></script>
    <script src={{ asset("asset\\fontawesome\js\all.js") }}></script>
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    @include('layouts.dashboard.scripts')

</body>

</html>
