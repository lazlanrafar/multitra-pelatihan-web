<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle js-sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" data-bs-toggle="dropdown">
                    <img src="https://ui-avatars.com/api/?name=<?php echo $_SESSION['user']['nama']; ?>" class="avatar img-fluid rounded me-1"
                        alt="Charles Hall" />
                    <span class="text-dark">
                        <?php echo $_SESSION['user']['nama']; ?>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item text-danger" href="#">
                        <!-- logout -->
                        <i class="align-middle me-1" data-feather="log-out"></i>
                        Logout
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>
