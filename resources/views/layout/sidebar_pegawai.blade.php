<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu border-end">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- KTN Logo-->
        <a href="{{ route('dashboard.pegawai') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/KTN.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <div style="text-align: center;">
                    <img src="{{ asset('assets/images/KTN.png') }}" alt="" height="130">
                    <div class="text-muted" style="font-size: 14px; color: #888; font-weight: bold;">
                        Kreasi Teknologi Nusantara.
                    </div>
                </div>
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>
    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Route::is('dashboard.pegawai') ? 'active' : '' }}" href="{{ route('dashboard.pegawai') }}" role="button" aria-expanded="false"
                        aria-controls="sidebarDashboards">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                    </a>
                </li> <!-- end Dashboard Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('pegawai/project') ? 'active' : '' }}" href="/pegawai/project" role="button" aria-expanded="false"
                        aria-controls="sidebarApps">
                        <i class="ri-apps-2-line"></i> <span data-key="t-apps">Project</span>
                    </a>
                </li>
                <!-- end Dashboard Menu -->
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>


<style>
    #scrollbar {
        max-height: 100%;
        overflow-y: auto;
    }
</style>
