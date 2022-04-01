
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="admin_dashboard.php">Admin Dashboard</a>
            <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded" href="view_profile.php">View Profile</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded" href="edit_profile.php"> Edit Profile</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded" href="change_password.php">Change Password</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded" href="../logout.php">Logout</a></a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <br>
    <section class="text-center" style="margin-top:100px; margin-bottom:100px;">


        <div style="color:purple; letter-spacing:0.3px; font-size:18px; margin-bottom:50px;">
            <span style="border:1px solid purple; border-radius:5px;" class="p-2 m-3"><strong>Welcome: <?php echo $_SESSION['name']; ?></strong></span>
            <span style="border:1px solid purple; border-radius:5px;" class="p-2 m-3"><strong>Email: <?php echo $_SESSION['email']; ?></strong></span>
        </div>