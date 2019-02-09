<nav class="navbar navbar-expand-sm bg-light fixed-top border text-dark">

	<ul class="navbar-nav">
		<li class="nav-item">
			<button type="button" id="sidebarCollapse" class="btn">
				<i class="fa fa-bars"></i>
			</button>
		</li>
	</ul>

	<!-- <ul class="navbar-nav ml-3">
		<li class="nav-item">
			<a href="" class="text-light"><img src="img/myHeart.png" class="img-fluid" alt="myHeart" width="50"></a>
		</li>
	</ul> -->
	<ul class="navbar-nav float-right ml-auto">
		<li class="nav-item ">
			<a  class="nav-link"><i class="fa fa-user mr-2"> </i>Welcome, <?php echo $_SESSION["name"];?></a>
		</li>

		<li class="nav-item">
			<a href="logout.php" class="nav-link text-dark"><i class="fa fa-sign-out-alt mr-2"></i>Logout</a>
		</li>
	</ul>
	
</nav>