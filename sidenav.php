<nav id="sidebar">
	<div id="" class="text-center mt-3 text-light">
		<i class="fas fa-user fa-5x"></i><br>

		<p class="mt-2"><?php echo $_SESSION["name"];?></p>
		
	</div>

	<ul class="list-unstyled active">
            <li class="">
                <a href="homepage.php" class="nav-link"><i class="fa fa-home"></i> Dashboard</a>
            </li>
            <li class="">
                <a href="#"class="nav-link usermenu" id="usermenu-1"><i class="far fa-address-card mr-1"></i> User Management <i class="fas fa-angle-down float-right mt-1"></i></a>
                <ul class="list-unstyled sidenavdrop" id="usersubmenu-1">
                	<li class="">
                        <a href="users.php" class="nav-link pl-4"></i> View User Data</a>
                    </li>
                </ul>
            </li>
            <li class="">
                <a href="#" class="nav-link" id="usermenu-2"><i class="fas fa-address-card mr-1"></i>User Health Data <i class="fas fa-angle-down float-right mt-1"></i></a>
                <ul class="list-unstyled sidenavdrop" id="usersubmenu-2">
                    <li class="">
                        <a href="userhealth.php" class="nav-link pl-4">View Health Data</a>
                    </li>
                </ul>
            </li>
        </ul>
</nav>