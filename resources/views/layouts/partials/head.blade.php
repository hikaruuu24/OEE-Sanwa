<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!--plugins-->
    <link href="{{ asset('telkom') }}/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="{{ asset('telkom') }}/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="{{ asset('telkom') }}/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="{{ asset('telkom') }}/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ asset('telkom') }}/assets/css/bootstrap-extended.css" rel="stylesheet" />
    <link href="{{ asset('telkom') }}/assets/css/style.css" rel="stylesheet" />
    <link href="{{ asset('telkom') }}/assets/css/icons.css" rel="stylesheet">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

    <!-- Jquery Confirm -->
    <link href="{{ asset('plugins/jquery-confirm/css/jquery-confirm.css') }}" rel="stylesheet">

	<!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('telkom') }}/npm/bootstrap-icons/font/bootstrap-icons.css">

    <!-- loader-->
    <link href="{{ asset('telkom') }}/assets/css/pace.min.css" rel="stylesheet" />

    <!--Theme Styles-->
    <link href="{{ asset('telkom') }}/assets/css/dark-theme.css" rel="stylesheet" />
    <link href="{{ asset('telkom') }}/assets/css/light-theme.css" rel="stylesheet" />
    <link href="{{ asset('telkom') }}/assets/css/semi-dark.css" rel="stylesheet" />
    <link href="{{ asset('telkom') }}/assets/css/header-colors.css" rel="stylesheet" />

    @stack('style')

    <title>{{ $page_title ?? '-' }}</title>
  </head>
