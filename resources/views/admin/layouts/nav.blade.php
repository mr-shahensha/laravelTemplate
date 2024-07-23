<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Shahensha <sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('/') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <hr class="sidebar-divider my-0">
<?php
$rmenus=session()->get('rmenus');
?>
@foreach ($rmenus as $rmenu)

    <!-- Nav Item -  -->
    <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#{{ $rmenu['menuName'] }}Tab"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>{{ $rmenu['menuName'] }}</span>
        </a>
        <div id="{{ $rmenu['menuName'] }}Tab" class="collapse" aria-labelledby="headingPages"
            data-parent="#accordionSidebar">
            @if ($rmenu['sub_menus'])
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">{{ $rmenu['menuName'] }} menus</h6>
                    @foreach ( $rmenu['sub_menus'] as $smenu)
                        <a class="collapse-item" href="{{ url($smenu['pageUrl']) }}">{{ $smenu['menuName'] }}</a>
                    @endforeach

                </div>
            @endif
        </div>
    </li>
@endforeach

{{--
<li class="nav-item active">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#setupTab"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Setup</span>
    </a>
    <div id="setupTab" class="collapse" aria-labelledby="headingPages"
        data-parent="#accordionSidebar">

            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Setup menus</h6>

                    <a class="collapse-item" href="{{ url('/department') }}">Department</a>
                    <a class="collapse-item" href="{{ url('/designation') }}">Designation</a>


            </div>

    </div>
</li>

<li class="nav-item active">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ConfigTab"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Config</span>
    </a>
    <div id="ConfigTab" class="collapse" aria-labelledby="headingPages"
        data-parent="#accordionSidebar">

            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Config menus</h6>

                    <a class="collapse-item" href="{{ url('/menuSetup') }}">Menu Setup</a>


            </div>

    </div>
</li> --}}



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
    <div class="sidebar-card d-none d-lg-flex">
        <p class="text-center mb-2"><strong>Latest Upgrade</strong></p>
        <img class="sidebar-card-illustration mb-2" src="{{ url('/admin/img/undraw_rocket.svg') }}" alt="...">
        <p class="text-center mb-2"><b>View Menu Added</b> Now you can search and view customers in View tab</p>
        <a class="btn btn-success btn-sm" href="">Enjoy !</a>
    </div>

</ul>
