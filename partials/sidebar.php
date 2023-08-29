<nav id="sidebar" class="sidebar js-sidebar sidebar-hidden collapsed">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.php">
            <img src="assets/img/logo.png" width="40" alt="" />
            <span class="align-middle">Multidasa</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-item">
                <a class="sidebar-link" href="index.php">
                    <i class="align-middle" data-feather="sliders"></i>
                    <span class="align-middle">Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="history.php">
                    <i class="align-middle" data-feather="compass"></i>
                    <span class="align-middle">History</span>
                </a>
            </li>

            <?php if ($_SESSION['user_akses'] == 'Super Admin') { ?>
            <li class="sidebar-header">Utils</li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="user.php">
                    <i class="align-middle" data-feather="user"></i>
                    <span class="align-middle">Users</span>
                </a>
            </li>
            <?php } ?>
        </ul>

        <ul class="sidebar-nav mb-5 p-3" style="flex-grow: inherit">
            <li class="sidebar-item">
                <a class="sidebar-link bg-danger rounded text-white" href="logout.php">
                    <i class="align-middle text-white" data-feather="log-out"></i>
                    <span class="align-middle">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
