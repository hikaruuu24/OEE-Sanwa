<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div class="mx-auto">
            <img src="{{asset('img/logo-telkom-white.png')}}" width="150px" alt="Logo" style="filter: none!important;" class="sidebar-img-dark logo-text">
            <img src="{{asset('img/logo-telkom-red.png')}}" width="150px" alt="Logo" style="filter: none!important;" class="sidebar-img-light logo-text">

        </div>
        <div>
            {{-- <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon"> --}}
        </div>
        <div class="toggle-icon ms-auto"><i  data-feather="menu"></i></div>
    </div>

    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li class="menu-label">Home</li>

        <li>
            <a href="{{ route('dashboard.index') }}">
                <div class="parent-icon"><i data-feather="home"></i></div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        <li>
            <a href="{{ route('machine-overview') }}">
                <div class="parent-icon"><i class="lni lni-bar-chart"></i></div>
                <div class="menu-title">Machine Overview</div>
            </a>
        </li>

        <li>
            <a href="{{ route('machine-analysis') }}">
                <div class="parent-icon"><i class=" bx bx-bar-chart-alt"></i></div>
                <div class="menu-title">Machine Analysis</div>
            </a>
        </li>
        <li>
            <a href="{{ route('breakdown-analysis') }}">
                <div class="parent-icon"><i class=" bx bx-time"></i></div>
                <div class="menu-title">Breakdown Analysis</div>
            </a>
        </li>
        <li>
            <a href="{{ route('history-log.index') }}">
                <div class="parent-icon"><i  data-feather="hard-drive"></i></div>
                <div class="menu-title">History</div>
            </a>
        </li>

        <li class="menu-label">MASTER DATA</li>

        <li>
            <a href="{{ route('master-data.index') }}">
                <div class="parent-icon"><i  data-feather="server"></i></div>
                <div class="menu-title">Master Data</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
 </aside>
