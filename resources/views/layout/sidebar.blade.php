   <div class="app-main">
            <div class="app-sidebar sidebar-shadow">
                <div class="app-header__logo">
                    <div class="logo-src"></div>
                    <div class="header__pane ml-auto">
                        <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="app-header__mobile-menu">
                    <div>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="app-header__menu">
                    <span>
                        <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
                </div>    
                <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner">
                        <ul class="vertical-nav-menu">
                            <li class="app-sidebar__heading">Menu</li>
                            <li  class="mm-active">
                                <a href="{{ route('dashboard') }}">
                                    <i class="metismenu-icon fa fa-home"></i>Dashboard
                                </a>
                            </li>
                            @if (Auth::user()->user_type==='admin')
                            <li class="app-sidebar__heading">Basics</li>
                                 <li>
                                <a href="{{ route('BasicSetting') }}">
                                    <i class="metismenu-icon fa fa-cogs"></i> <strong>Basic Settings</strong></a>
                           </li>
                           
                           
                            <li>
                                <a href="{{ route('CreateBasic') }}">
                                    <i class="metismenu-icon fa fa-cogs"></i><strong>Create Basics</strong> </a>
                           </li>
                            <li>
                                <a href="{{ route('UploadStudent') }}">
                                    <i class="metismenu-icon fa fa-upload"></i> <strong>Upload Student</strong></a>
                           </li>
                           <li class="app-sidebar__heading">Exam</li>
                            <li>
                                <a href="{{ route('CreateExam') }}">
                                    <i class="metismenu-icon fa fa-plus-square"></i> <strong>Create Exam</strong></a>
                           </li>
                            <li class="app-sidebar__heading">Management</li>
                            <li>
                                <a href="#">
                                    <i class="metismenu-icon fa fa-folder-open"></i> <strong>Result Management</strong></a>
                           </li>
                            <li>
                                <a href="#">
                                    <i class="metismenu-icon fa fa-users"></i> <strong>Student Manangement</strong></a>
                           </li>
                            <li>
                                <a href="#">
                                    <i class="metismenu-icon fa fa-server"></i> <strong>Exam Management</strong></a>
                           </li>
                            @endif

                            @if (Auth::user()->user_type==='student')
                            <li>
                                <a href="#">
                                    <i class="metismenu-icon fa fa-server"></i> <strong>Edit Profile</strong></a>
                           </li>
                           <li>
                                <a href="#">
                                    <i class="metismenu-icon fa fa-server"></i> <strong>Result Manager</strong></a>
                           </li>

                            @endif
                            <li class="app-sidebar__heading">Authorize</li>
                             <li>
                                <a href="#" data-toggle="modal"
                                        data-target=".bd-example-modal-sm">
                                    <i class="metismenu-icon fa fa-power-off"></i> <strong>Logout</strong></a>
                           </li>
                        </ul>
                    </div>
                </div>
            </div>
            
