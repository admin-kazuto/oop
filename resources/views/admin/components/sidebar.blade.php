<aside class="sidebar sidebar-base " id="first-tour" data-toggle="main-sidebar"
    data-sidebar="responsive">
    <div class="sidebar-header d-flex align-items-center justify-content-start position-relative">
        <a href="" class="navbar-brand">
            <!--Logo start-->
            <div class="logo-main ">
                <img class="logo-normal img-fluid "
                    src="<?= dirname($_SERVER['SCRIPT_NAME']) ?>resources/public/images/logo.png" height="30" alt="logo">
                <img class="logo-color img-fluid "
                    src="<?= dirname($_SERVER['SCRIPT_NAME']) ?>resources/public/images/logo-white.png" height="30" alt="logo">
                <img class="logo-mini img-fluid"
                    src="<?= dirname($_SERVER['SCRIPT_NAME']) ?>resources/public/images/logo-mini.png" alt="logo">
                <img class="logo-mini-white img-fluid"
                    src="<?= dirname($_SERVER['SCRIPT_NAME']) ?>resources/public/images/logo-mini-white.png" alt="logo">
            </div>
            <!--logo End-->
        </a>
        <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
            <i class="icon">
                <svg class="icon-20 icon-arrow" width="20" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.5 19L8.5 12L15.5 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round"></path>
                </svg>
            </i>
        </div>
    </div>
    <div class="sidebar-body pt-0 pb-3 data-scrollbar">
        <div class="sidebar-list">
            <!-- Sidebar Menu Start -->
            <ul class="navbar-nav iq-main-menu" id="sidebar-menu">

                <li class="nav-item static-item">
                    <a class="nav-link static-item disabled" href="#">
                        <span class="default-icon">Main Pages</span>
                        <i class="sidenav-mini-icon">-</i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link "
                        aria-current="page"
                        href="/">
                        <i class="icon" data-bs-toggle="tooltip" title="Home Page"
                            data-bs-placement="right">
                            <i class="ph-duotone ph-house"></i>
                        </i>
                        <i class="sidenav-mini-icon" data-bs-toggle="tooltip"
                            title="Home Page" data-bs-placement="right">HP</i>
                        <span class="item-name">Home Page</span>
                    </a>
                </li>
                </li>
                <li class="nav-item iq-drop">
                    <a class="nav-link" data-bs-toggle="collapse" href="#Admin"
                        role="button" aria-expanded="false">
                        <i class="icon" data-bs-toggle="tooltip" title="Admin"
                            data-bs-placement="right">
                            <i class="ph-duotone ph-user-circle-gear"></i>
                        </i>
                        <span class="item-name">Admin</span>
                        <i class="right-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                class="icon-18" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <?php $currentURL = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
                          $currentURL = preg_replace('/\/\d+$/', '', $currentURL);
                           ?>
                    <ul class="sub-nav collapse" id="Admin" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                            <a
                                class="nav-link <?= ($currentURL === '/dashboard') ? 'active' : '' ?>"
                                aria-current="page"
                                href="/dashboard">
                                <i class="icon" data-bs-toggle="tooltip" title="Dashboard"
                                    data-bs-placement="right">
                                    <i class="ph-duotone ph-gauge"></i>
                                </i>
                                <i class="sidenav-mini-icon" data-bs-toggle="tooltip"
                                    title="Admin Dashboard"
                                    data-bs-placement="right">D</i>
                                <span class="item-name">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link <?= ($currentURL === '/category' || $currentURL === '/form-add-category') ? 'active' : '' ?> "
                                aria-current="page"
                                href="/category">
                                <i class="icon" data-bs-toggle="tooltip"
                                    title="Category List" data-bs-placement="right">
                                    <i class="ph-duotone ph-list-plus"></i>
                                </i>
                                <i class="sidenav-mini-icon" data-bs-toggle="tooltip"
                                    title="Category List"
                                    data-bs-placement="right">CL</i>
                                <span class="item-name">Category Lists</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link <?= ($currentURL === '/authors' || $currentURL === '/form-add-author') ? 'active' : '' ?>"
                                aria-current="page"
                                href="/authors">
                                <i class="icon" data-bs-toggle="tooltip" title="Authors"
                                    data-bs-placement="right">
                                    <i class="ph-duotone ph-identification-badge"></i>
                                </i>
                                <i class="sidenav-mini-icon" data-bs-toggle="tooltip"
                                    title="Authors" data-bs-placement="right">A</i>
                                <span class="item-name">Authors</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  
                                class="nav-link <?=  ($currentURL === '/books' || $currentURL === '/form-add-book' || $currentURL === '/detail-book' || $currentURL === '/form-edit-book') ? 'active' : '' ?> "
                                aria-current="page"
                                href="/books">
                                <i class="icon" data-bs-toggle="tooltip" title="Books"
                                    data-bs-placement="right">
                                    <i class="ph-duotone ph-book-bookmark"></i>
                                </i>
                                <i class="sidenav-mini-icon" data-bs-toggle="tooltip"
                                    title="Books" data-bs-placement="right">B</i>
                                <span class="item-name">Books</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a
                                class="nav-link <?= ($currentURL === '/bill' || $currentURL === '/detail-bill') ? 'active' : '' ?> "
                                aria-current="page"
                                href="/bill">
                                <i class="icon" data-bs-toggle="tooltip" title="Bills"
                                    data-bs-placement="right">
                                    <i class="ph-duotone ph-clipboard"></i>
                                </i>
                                <i class="sidenav-mini-icon" data-bs-toggle="tooltip"
                                    title="Bills" data-bs-placement="right">B</i>
                                <span class="item-name">Bills</span>
                            </a>
                        </li>

                    </ul>
                </li>
                <li>
                    <hr class="hr-horizontal">
                </li>
</aside>

