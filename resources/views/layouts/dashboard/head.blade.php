    <title>Game</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href={{ asset('asset/img/favicon/favicon.ico') }} />
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
    <link rel="stylesheet" href="cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    <!-- Core CSS -->
    <link rel="stylesheet" href={{ asset('asset/vendor/css/theme-default.css') }}
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('asset/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ $lang == 'ar' ? asset('asset/vendor/css/core.ar.css') : asset('asset/vendor/css/core.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href={{ asset('asset/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }} />

    <link rel="stylesheet" href={{ asset('asset/vendor/libs/apex-charts/apex-charts.css') }} />

    <!-- toastr CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">


    <!-- Page CSS -->
    <style>
        .image-preview {
            /* display: none; */
            width: 300px;
            height: auto;
            margin-top: 10px;
        }
    </style>
    <!-- Helpers -->
    <script src={{ asset('asset/vendor/js/helpers.js') }}></script>
    <link rel="stylesheet" href={{ asset("asset\\fontawesome\css\all.css") }}>
    <script src={{ asset('asset/js/config.js') }}></script>