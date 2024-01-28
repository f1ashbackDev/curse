<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Scoxe - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="MyraStudio" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    @vite(['resources/css/admin/bootstrap.min.css', 'resources/css/admin/theme.min.css'])
</head>

<body>

<!-- Begin page -->
<div id="layout-wrapper">

    <header id="page-topbar">
        <div class="navbar-header">
            <!-- LOGO -->
            <div class="navbar-brand-box d-flex align-items-left">
                <a href="index.html" class="logo">
                    <i class="mdi mdi-album"></i>
                    <span>
                            Автозапчасти
                    </span>
                </a>

                <button type="button" class="btn btn-sm mr-2 d-lg-none px-3 font-size-16 header-item waves-effect waves-light" id="vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>
            </div>
        </div>
    </header>

    <!-- ========== Left Sidebar Start ========== -->
    <div class="vertical-menu">

        <div data-simplebar class="h-100">

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title">Menu</li>

                    <li>
                        <a href="{{ route('showUsers') }}">Пользователи</a>
                        <a href="{{ route('showAllCategoriesAdmin') }}">Каталоги</a>
                        <a>Товары</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="main-content">
    <div class="page-content">
        @yield('content')
    </div>
</div>
<div class="menu-overlay"></div>
</body>

</html>
