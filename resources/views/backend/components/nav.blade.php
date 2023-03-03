<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #3a1d40">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-text mx-3"><?=Auth::user()->user_type_id == 1 ? "Librarian Panel" : "Reader Panel"?></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    @if(Auth::user()->user_type_id == 1)
        <li class="nav-item active">
            <a class="nav-link" href="<?=route('librarian.dashboard')?>">
                <i class="fas fa-fw fa-home"></i>
                <span>Dashboard</span></a>
        </li>

        <li class="nav-item active">
            <a class="nav-link" href="<?=route('librarian.dashboard.authors')?>">
                <i class="fas fa-fw fa-arrow-right"></i>
                <span>Authors</span></a>
        </li>

        <li class="nav-item active">
            <a class="nav-link" href="<?=route('librarian.dashboard.books')?>">
                <i class="fas fa-fw fa-arrow-right"></i>
                <span>Books</span></a>
        </li>

        <li class="nav-item active">
            <a class="nav-link" href="<?=route('librarian.dashboard.readers')?>">
                <i class="fas fa-fw fa-arrow-right"></i>
                <span>Readers</span></a>
        </li>
    @elseif(Auth::user()->user_type_id == 2)
        <li class="nav-item active">
            <a class="nav-link" href="<?=route('reader.dashboard')?>">
                <i class="fas fa-fw fa-home"></i>
                <span>Dashboard</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="<?=route('reader.dashboard.books')?>">
                <i class="fas fa-fw fa-arrow-right"></i>
                <span>Books</span></a>
        </li>

    @endif

</ul>
