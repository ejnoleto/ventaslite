    <link href="{{ asset('assets/css/loader.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('assets/js/loader.js') }}"></script>
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/structure.css') }}" rel="stylesheet" type="text/css" class="structure" />

    <link href="{{ asset('plugins/font-icons/fontawesome/css/fontawesome.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/fontawesome.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('assets/css/elements/avatar.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('plugins/sweetalerts/sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/notification/snackbar/snackbar.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('assets/css/widgets/modules-widgets.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/forms/theme-checkbox-radio.css') }}" rel="stylesheet" type="text/css" />
    <style>
        aside{
            display: none !important;
        }

        .page-item.active .page.link{
            z-index: 3;
            color: #fff;
            background-color:#3b3f5c;
            border-color: #3b3f5c;
        }

        @media ( max-width: 480px){
            .mtmobile{
                margin-bottom: 20px!important;
            }
            .mbmobile{
                margin-bottom: 10px!important;
            }
            .hideonsm{
                display: none!important;
            }
            .inblock{
                display: block;
            }
        }

        /*Cores dashbord*/

        /*cor de fundo do menu lateral*/
        .sidebar-theme #compactSidebar {
            background: #191e3a!important;
        }
        /* cor do botão que recolhe o menu lateral*/
        .header-container .sidebarCollapse {
           color: #3b3f5c!important;
        }
        /*cor do seach da barra superior*/
        .navbar .navbar-item .nav-item form.form-inline input.search-form-control {
            font-size: 15px;
            background-color: #3b3f5c!important;
            padding-right: 40px;
            padding-top: 12px;
            border: none;
            color: #fff;
            box-shadow: none;
            border-radius: 30px;
        }
    </style>

    @livewireStyles
