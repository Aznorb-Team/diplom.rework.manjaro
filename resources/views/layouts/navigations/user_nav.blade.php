<!-- Loader starts-->
<div class="loader-wrapper">
    <div class="theme-loader">
        <div class="loader-p"></div>
    </div>
</div>
<!-- Loader ends-->
<!-- page-wrapper Start       -->
<div class="page-wrapper compact-wrapper" id="pageWrapper">
    <!-- Page Header Start-->
    <div class="page-main-header">
        <div class="main-header-right row m-0">
            <div class="main-header-left">
                {{-- <div class="logo-wrapper"><a href="index.html"><img class="img-fluid" src="../assets/images/logo/logo.png" alt=""></a></div> --}}
                {{-- <div class="dark-logo-wrapper"><a href="index.html"><img class="img-fluid" src="../assets/images/logo/dark-logo.png" alt=""></a></div> --}}
                <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="align-center"
                        id="sidebar-toggle"></i></div>
            </div>
            <div class="nav-right col pull-right right-menu p-0">
                <ul class="nav-menus">
                    <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i
                                data-feather="maximize"></i></a></li>
                    {{-- <li class="onhover-dropdown">
              <div class="notification-box"><i data-feather="bell"></i><span class="dot-animated"></span></div>
              <ul class="notification-dropdown onhover-show-div">
                <li>
                  <p class="f-w-700 mb-0">You have 3 Notifications<span class="pull-right badge badge-primary badge-pill">4</span></p>
                </li>
                <li class="noti-primary">
                  <div class="media"><span class="notification-bg bg-light-primary"><i data-feather="activity"> </i></span>
                    <div class="media-body">
                      <p>Delivery processing </p><span>10 minutes ago</span>
                    </div>
                  </div>
                </li>
                <li class="noti-secondary">
                  <div class="media"><span class="notification-bg bg-light-secondary"><i data-feather="check-circle"> </i></span>
                    <div class="media-body">
                      <p>Order Complete</p><span>1 hour ago</span>
                    </div>
                  </div>
                </li>
                <li class="noti-success">
                  <div class="media"><span class="notification-bg bg-light-success"><i data-feather="file-text"> </i></span>
                    <div class="media-body">
                      <p>Tickets Generated</p><span>3 hour ago</span>
                    </div>
                  </div>
                </li>
                <li class="noti-danger">
                  <div class="media"><span class="notification-bg bg-light-danger"><i data-feather="user-check"> </i></span>
                    <div class="media-body">
                      <p>Delivery Complete</p><span>6 hour ago</span>
                    </div>
                  </div>
                </li>
              </ul>
            </li> --}}
                    <li>
                        <div class="mode"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-moon">
                                <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                            </svg></div>
                    </li>
                    <li class="onhover-dropdown p-0">
                        <button class="btn btn-primary-light" type="button"><a
                                href="{{ route('logout') }}">Выйти</a></button>
                    </li>
                </ul>
            </div>
            <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
        </div>
    </div>
    <!-- Page Header Ends                              -->
    <!-- Page Body Start-->
    <div class="page-body-wrapper sidebar-icon">
        <!-- Page Sidebar Start-->
        <header class="main-nav">
            <div class="sidebar-user text-center"><img class="img-90 rounded-circle"
                    src="{{ asset('assets/images/dashboard/1.png') }}" alt="">
                <div class="badge-bottom"></div><a href="{{ route('admin') }}">
                    <h6 class="mt-3 f-14 f-w-600">{{ auth()->user()->name }}</h6>
                </a>
                {{-- <p class="mb-0 font-roboto">{{auth()->user()->role->title}}</p> --}}
                <p class="example-popover" type="button" data-bs-trigger="hover" data-container="body" data-bs-toggle="popover" data-bs-placement="bottom" title="" data-offset="-20px -20px" 
          data-bs-content="@foreach(auth()->user()->role as $role)
          {{$role->title}}; 
          @endforeach" 
          data-bs-original-title="Роли">
          {{auth()->user()->role[0]->title}}
          </p>
          <p lass="mb-0 font-roboto" placeholder="LFLFLF
          
          "></p>
                {{-- <ul>
            <li><span><span class="counter">19.8</span>k</span>
              <p>Follow</p>
            </li>
            <li><span>2 year</span>
              <p>Experince</p>
            </li>
            <li><span><span class="counter">95.2</span>k</span>
              <p>Follower </p>
            </li>
          </ul> --}}
            </div>
            <nav>
                <div class="main-navbar">
                    <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
                    <div id="mainnav">
                        <ul class="nav-menu custom-scrollbar">

                            <li class="back-btn">
                                <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                        aria-hidden="true"></i></div>
                            </li>
                            @if (auth()->user()->role->contains(1))
                                <li class="sidebar-main-title">
                                    <div>
                                        <h6>Панель пользователя</h6>
                                    </div>
                                </li>
                                <li>
                                    <a class="nav-link menu-title link-nav active" href="{{ route('profile') }}">
                                        <i data-feather="user"></i>
                                        <span>Профиль</span>
                                        <div class="according-menu">
                                            <i class="fa fa-angle-right">
                                            </i>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i
                                            data-feather="book-open"></i><span>Заявки</span></a>
                                    <ul class="nav-submenu menu-content">
                                        <li><a href="{{ route('form_add_application') }}">Подача заявки</a></li>
                                        <li><a href="{{ route('application.list') }}">Список поданных заявок</a>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                            @if (auth()->user()->role->contains(2) || auth()->user()->role->contains(3) || auth()->user()->role->contains(4) || auth()->user()->role->contains(5) || auth()->user()->role->contains(6) || auth()->user()->role->contains(7))
                                <li class="sidebar-main-title">
                                    <div>
                                        <h6>Панель эксперта</h6>
                                    </div>
                                </li>
                                <li>
                                    <a class="nav-link menu-title link-nav active"
                                        href="{{ route('antiplagiat.application_list') }}">
                                        <i data-feather="book-open"></i>
                                        <span>Список поданных заявок</span>
                                        <div class="according-menu">
                                            <i class="book-open">
                                            </i>
                                        </div>
                                    </a>
                                </li>
                            @endif

                    </div>
                    <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
                </div>
            </nav>
        </header>
