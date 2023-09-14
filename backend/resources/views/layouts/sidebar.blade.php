<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Kamion</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('homepage') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{ __('Dashboard') }}</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('refrigerators.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{ __('Refrigerator Management') }}</span></a>
    </li>

    @can('Product Management')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('products.index') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>{{ __('Product Management') }}</span></a>
        </li>
    @endcan

    <li class="nav-item">
        <a class="nav-link" href="{{ route('recipes.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{ __('Recipe Management') }}</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
