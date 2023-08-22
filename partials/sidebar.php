<nav id="sidebar" class="sidebar js-sidebar idebar-hidden collapsed">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.php">
            <img src="assets/img/logo.png" width="40" alt="" />
            <span class="align-middle">Multidasa</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-item active">
                <a class="sidebar-link" href="index.html">
                    <i class="align-middle" data-feather="sliders"></i>
                    <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <?php if ($_SESSION['user_akses'] == 'Super Admin') { ?>
            <li class="sidebar-header">Utils</li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="pages-profile.html">
                    <i class="align-middle" data-feather="user"></i>
                    <span class="align-middle">Users</span>
                </a>
            </li>
            <?php } ?>
        </ul>
    </div>
</nav>
