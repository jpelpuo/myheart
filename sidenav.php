<nav id="sidebar">
	<div id="" class="text-center mt-3 text-light">
		<i class="fas fa-user fa-5x"></i><br>

		<p class="mt-2"><span class="font-weight-bold">Name:</span> <?php echo $_SESSION["name"];?></p>
        <p class="mt-2"><span class="font-weight-bold">Role:</span> <?php echo $_SESSION["role"];?></p><hr>
		
	</div>

	<ul class="list-unstyled active">
            <li class="" id="home">
                <a href="homepage.php" class="nav-link"><i class="fa fa-chart-line"></i> Analytics</a>
            </li>

            <li class="" id="predict">
                <a href="prediction.php" class="nav-link"><i class="fa fa-heartbeat"></i> Prediction</a>
            </li>

            <li class="" id="usermgmt">
                <a class="nav-link usermenu" id="usermenu-1"><i class="far fa-address-card mr-1"></i> Patient Management <i class="fas fa-angle-down float-right mt-1" id="angle"></i></a>
                <ul class="list-unstyled sidenavdrop" id="usersubmenu-1">
                	<li class="" id="usermgmt-1">
                        <a href="addpatient.php" class="nav-link pl-4"></i> Add Patient</a>
                    </li>

                    <li class="" id="usermgmt-2">
                        <a href="users.php" class="nav-link pl-4"></i> View Patient Data</a>
                    </li>
                </ul>
            </li>
            <li class="" id="health">
                <a class="nav-link" id="usermenu-2"><i class="fas fa-address-card mr-1"></i>Patient Health Data <i class="fas fa-angle-down float-right mt-1"></i></a>
                <ul class="list-unstyled sidenavdrop" id="usersubmenu-2">
                    <li class="" id="userhealth-1">
                        <a href="userhealth.php" class="nav-link pl-4">View Past Predictions</a>
                    </li>
                </ul>
            </li>
        </ul>
</nav>