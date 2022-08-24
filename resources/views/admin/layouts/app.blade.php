<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Gymove - Fitness Bootstrap Admin Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('dashboard_assets') }}/images/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css"
        integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">

    @vite(['public/dashboard_assets/vendor/chartist/css/chartist.min.css', 'public/dashboard_assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css', 'public/dashboard_assets/vendor/owl-carousel/owl.carousel.css', 'public/dashboard_assets/css/fontawesome-iconpicker.min.css', 'public/dashboard_assets/css/style.css'])
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="{{ route('admin.dashboard') }}" class="brand-logo">
                <img class="logo-abbr" src="{{ asset('dashboard_assets') }}/images/logo.png" alt="">
                <img class="logo-compact" src="{{ asset('dashboard_assets') }}/images/logo-text.png" alt="">
                <img class="brand-title" src="{{ asset('dashboard_assets') }}/images/logo-text.png" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->



        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
                                Dashboard
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
                            <li class="nav-item">
                                <div class="input-group search-area d-xl-inline-flex d-none">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><a href="javascript:void(0)"><i
                                                    class="flaticon-381-search-2"></i></a></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Search here...">
                                </div>
                            </li>
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
                                    <img src="{{ asset('dashboard_assets') }}/images/profile/17.jpg" width="20"
                                        alt="" />
                                    <div class="header-info">
                                        <span
                                            class="text-black"><strong>{{ auth()->guard('admin')->user()->name }}</strong></span>
                                        <p class="fs-12 mb-0">{{ auth()->guard('admin')->user()->email }}</p>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{ route('admin.profile.create') }}" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary"
                                            width="18" height="18" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="{{ asset('dashboard_assets') }}/email-inbox.html"
                                        class="dropdown-item ai-icon">
                                        <svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success"
                                            width="18" height="18" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path
                                                d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                            </path>
                                            <polyline points="22,6 12,13 2,6"></polyline>
                                        </svg>
                                        <span class="ml-2">Inbox </span>
                                    </a>
                                    <form method="POST" action="{{ route('admin.logout') }}">
                                        @csrf
                                        <a href="{{ route('admin.logout') }} "
                                            onclick="event.preventDefault();
                                    this.closest('form').submit();"
                                            class="dropdown-item ai-icon">
                                            <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg"
                                                class="text-danger" width="18" height="18"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                                <polyline points="16 17 21 12 16 7"></polyline>
                                                <line x1="21" y1="12" x2="9" y2="12">
                                                </line>
                                            </svg>

                                            <span class="ml-2">Logout </span>
                                        </a>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
                <ul class="metismenu" id="menu">
                    <li><a class="has-arrow ai-icon" href="#" aria-expanded="false">
                            <i class="fa-solid fa-chart-line"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('home') }}" target="_black">visit site</a></li>
                            <li><a href="workout-statistic.html">visit shop</a></li>
                            <li><a href="workoutplan.html">admin settings</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="#" aria-expanded="false">
                            <i class="fa-solid fa-users"></i>
                            <span class="nav-text">User</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('admin.user.index') }}">Users List</a></li>
                            <li><a href="{{ route('admin.user.create') }}">Users Add</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="#" aria-expanded="false">
                            <i class="fa-solid fa-list-ol"></i>
                            <span class="nav-text">Category</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('admin.category.index') }}">Categories List</a></li>
                            <li><a href="{{ route('admin.category.create') }}">Add Categories</a></li>
                            <li><a href="{{ route('admin.category.trash') }}">Trash</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="#" aria-expanded="false">
                            <i class="fa-solid fa-bullhorn"></i>
                            <span class="nav-text">Brand</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('admin.brand.index') }}">Brands List</a></li>
                            <li><a href="{{ route('admin.brand.create') }}">Add Brands</a></li>
                            <li><a href="{{ route('admin.brand.trash') }}">Trash</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="copyright">
                    <p><strong>stowaa e-commerce dashboard</strong> © {{ \Carbon\Carbon::now()->format('Y') }} All
                        Rights Reserved</p>
                    <p>Made with <span class="heart"></span> by Rayan Hossain</p>
                </div>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
        <!--**********************************
             Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Bootstrap</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Card</a></li>
                    </ol>
                </div>
                @yield('content')
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="https://www.facebook.com/rhrayan2228/"
                        target="_blank">Rayan Hossain</a> {{ \Carbon\Carbon::now()->format('Y') }}</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('dashboard_assets') }}/vendor/global/global.min.js"></script>
    <script src="{{ asset('dashboard_assets') }}/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="{{ asset('dashboard_assets') }}/vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="{{ asset('dashboard_assets') }}/js/custom.min.js"></script>
    <script src="{{ asset('dashboard_assets') }}/js/deznav-init.js"></script>
    <script src="{{ asset('dashboard_assets') }}/vendor/owl-carousel/owl.carousel.js"></script>

    <!-- Chart piety plugin files -->
    <script src="{{ asset('dashboard_assets') }}/vendor/peity/jquery.peity.min.js"></script>

    <!-- Apex Chart -->
    <script src="{{ asset('dashboard_assets') }}/vendor/apexchart/apexchart.js"></script>

    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/ec8600f611.js" crossorigin="anonymous"></script>
    <script src="{{ asset('dashboard_assets') }}/js/fontawesome-iconpicker.js"></script>
    <!-- Dashboard 1 -->
    <script src="{{ asset('dashboard_assets') }}/js/dashboard/dashboard-1.js"></script>
    <script>
        function carouselReview() {
            /*  testimonial one function by = owl.carousel.js */
            jQuery('.testimonial-one').owlCarousel({
                loop: true,
                autoplay: true,
                margin: 30,
                nav: false,
                dots: false,
                left: true,
                navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>',
                    '<i class="fa fa-chevron-right" aria-hidden="true"></i>'
                ],
                responsive: {
                    0: {
                        items: 1
                    },
                    484: {
                        items: 2
                    },
                    882: {
                        items: 3
                    },
                    1200: {
                        items: 2
                    },

                    1540: {
                        items: 3
                    },
                    1740: {
                        items: 4
                    }
                }
            })
        }
        jQuery(window).on('load', function() {
            setTimeout(function() {
                carouselReview();
            }, 1000);
        });
        $('.demo').iconpicker();
    </script>
</body>

</html>
