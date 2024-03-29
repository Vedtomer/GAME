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
                 
                        <div class="widget-content-right header-user-info ml-3">

                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="simpleDropdown"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" type="button"
                                    data-toggle="tooltip" title="Example Tooltip" data-placement="bottom"
                                    class="btn-shadow mr-3 btn btn-dark">
                                    <i class="pe-7s-power"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="simpleDropdown">
                                    <!-- Dropdown items -->
                                    <a href="adminchangepassword"><button type="button" tabindex="0"
                                            class="dropdown-item">change password</button></a>
                                    <a href="{{ URL::to(Auth::guard('admin')->check() ? 'admin/logout' : 'logout') }}">
                                        <button type="button" tabindex="0" class="dropdown-item">Logout</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
