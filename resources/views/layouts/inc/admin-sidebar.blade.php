<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            {{-- <i class="fas fa-laugh-wink"></i> --}}
        </div>
        <div class="sidebar-brand-text mx-3">Dtech Resto</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('dashboard') }}">
            {{-- <i class="fas fa-fw fa-tachometer-alt"></i> --}}
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">


    <!-- Nav Item - Food category Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            {{-- <i class="fas fa-fw fa-wrench"></i> --}}
            <span>Catégorie</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('category.index') }}">Voir</a>
                <a class="collapse-item" href="{{ route('category.create') }}">Ajouter</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <span>Menus</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('menu.index') }}">Voir</a>
                <a class="collapse-item" href="{{ route('menu.create') }}">Ajouter</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsecarts"
            aria-expanded="true" aria-controls="collapsecarts">
            {{-- <i class="fas fa-fw fa-cog"></i> --}}
            <span>Commande</span>
        </a>
        <div id="collapsecarts" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.carts') }}">Voir</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseclients"
            aria-expanded="true" aria-controls="collapsecarts">
            <i class="menu-icon fa fa-users"></i>
            <span>Clients</span>
        </a>
        <div id="collapseclients" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.clients') }}">Voir</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsemessage"
            aria-expanded="true" aria-controls="collapsecarts">
            <i class="fas fa-fw fa-solid fa-envelope"></i>
            <span>Messages</span>
        </a>
        <div id="collapsemessage" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.contact') }}">Voir</a>
            </div>
        </div>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">



    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            <span>Profile</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.profile') }}">Profile</a>
                <a class="collapse-item" href="{{ route('admin.edit-profile') }}">Modifier</a>
            </div>
        </div>
    </li>





    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>
<!-- End of Sidebar -->
