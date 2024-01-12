
<nav class="navbar navbar-expand-lg navbar-dark color-myself">
	<div class="container-fluid">
		<a class="navbar-brand" href="menu_product.php">เช่ารถจักรยานยนต์</a>
		<div class="navbar-collapse " id="#">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<!-- <li class="nav-item">
					<a class="nav-link" aria-current="page" href="menu_product.php">หน้าแรก</a>
				</li> -->
				<li class="nav-item">
					<a class="nav-link" href="show_product.php">จัดการข้อมูลรถจักรยานยนตร์</a>
				</li>
				<li class="nav-item">
					<a class="nav-link " href="manage_rental.php">จัดการข้อมูลการเช่ายืม</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="logout.php" onclick="Out(this.href);return false;">ออกจากระบบ</a>
				</li>
				<li class="nav-link">
					admin :
					<?php
					if(isset($_SESSION["email"])){
						echo $_SESSION["email"];
					}
					?>
				</li>
			</ul>
			
			<form class="d-flex " method="post" action="" enctype="multipart/form-data">
					<input class="form-control me-2" name="keyword" type="text" placeholder="ค้นหารถจักรยานยนต์..." 
					value="<?=(isset($_POST['keyword'])) ? $_POST['keyword'] : '' ?>" aria-label="Search">
					<button class="btn btn-light" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
			</form>

		</div>
	</div>
</nav>