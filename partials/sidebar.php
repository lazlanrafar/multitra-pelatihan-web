<nav id="sidebar" class="sidebar js-sidebar sidebar-hidden collapsed">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.php">
            <img src="assets/img/logo.png" width="40" alt="" />
            <span class="align-middle">Multidasa</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-item active">
                <a class="sidebar-link" href="index.php">
                    <i class="align-middle" data-feather="sliders"></i>
                    <span class="align-middle">Dashboard</span>
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

        <div class="sidebar-cta">
            <div class="sidebar-cta-content">
                <div class="d-grid">
                    <a href="logout.php" class="btn btn-danger">
                        <i class="fa fa-logout"></i>
                        Logout
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>
