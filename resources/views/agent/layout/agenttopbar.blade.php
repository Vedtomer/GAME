<style>
    @media screen and (max-width: 767px) {
        .amounts {
            width: 200px;
            padding: 5px;
            font-size: 100px;
            margin-top: 5px;
        }
        h5{
            font-size: 20px;
        }

        .wallet a {
            /* flex-direction: column; */
            /* align-items: center; */
        }

        .box {
            margin-left: 0;
            /* margin-top: 5px; */
        }
    }
</style>
<div class="app-header header-shadow">
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

        <a href="{{ URL::to(Auth::guard('admin')->check() ? 'admin/logout' : 'logout') }}">
            <button type="button" tabindex="0" class="dropdown-item"> <i class="pe-7s-power"></i></button>
        </a>
    </div>
    <div class="amounts" style="width: 200px; position: fixed; top: 0;  margin-top: 5px; right: 0; padding: 10px;">
        <div class="wallet" style="display: flex; align-items: center;">
            <a href="#" style="display: flex;">
                <i class='fas fa-wallet' style='font-size:24px'></i>
                <div class="box" style="margin-left: auto;">
                   
                    <h5><b>: {{ Auth::guard('agent')->user()->balance }}</b></h5>
              
                
                </div>
            </a>
        </div>
    </div>
    
    <div class="app-header__content">
        {{-- <div class="app-header-left">
            <div class="search-wrapper">
                <div class="input-holder">
                    <input type="text" class="search-input" placeholder="Type to search">
                    <button class="search-icon"><span></span></button>
                </div>
                <button class="close"></button>
            </div>
            <ul class="header-menu nav">
                <li class="nav-item">
                    <a href="javascript:void(0);" class="nav-link">
                        <i class="nav-link-icon fa fa-database"> </i>
                        Statistics
                    </a>
                </li>
                <li class="btn-group nav-item">
                    <a href="javascript:void(0);" class="nav-link">
                        <i class="nav-link-icon fa fa-edit"></i>
                        Projects
                    </a>
                </li>
                <li class="dropdown nav-item">
                    <a href="javascript:void(0);" class="nav-link">
                        <i class="nav-link-icon fa fa-cog"></i>
                        Settings
                    </a>
                </li>
            </ul>
        </div> --}}
     
        <div class="app-header-right">
           
            <div class="header-btn-lg pr-0">
                <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left header-user-info ml-3">
                            <div class="dropdown">
                                <!-- Display button only on larger screens -->
                                <button class="btn btn-secondary dropdown-toggle d-none d-lg-inline-block" type="button" id="simpleDropdown"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" type="button"
                                    data-toggle="tooltip" title="Example Tooltip" data-placement="bottom"
                                    class="btn-shadow mr-3 btn btn-dark">
                                    <i class="pe-7s-power" id="logoutIcon"></i>
                                    
                                </button>
                                <!-- Display three dots on smaller screens -->
                                <button class="btn btn-secondary d-lg-none" type="button" id="simpleDropdownMobile"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="pe-7s-menu" style='font-size:24px'></i>
                                </button>
                                <!-- Add the 'dropdown-menu-right' class to make the dropdown appear on the right -->
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="simpleDropdownMobile">
                                    <!-- Dropdown items -->
                                    <a href="agentchangepassword" class="dropdown-item">Change Password</a>
                                     <a  href="{{ URL::to('logout') }}" class="dropdown-item">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var logoutIcon = document.getElementById('logoutIcon');
    
        logoutIcon.addEventListener('click', function () {
            window.location.href = "{{ URL::to(Auth::guard('admin')->check() ? 'admin/logout' : 'logout') }}";
        });
    });
    </script>
