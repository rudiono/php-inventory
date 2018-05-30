<?php
session_start();
/**
 * Jika Tidak login atau sudah login tapi bukan sebagai admin
 * maka akan dibawa kembali kehalaman login atau menuju halaman yang seharusnya.
 */
if ( !isset($_SESSION['user_login']) ||
    ( isset($_SESSION['user_login']) && $_SESSION['user_login'] != 'admin' ) ) {

	header('location:../login.php');
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sistem Inventory Barang</title>

<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/datepicker3.css" rel="stylesheet">
<link href="../css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="../js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>Sistem Inventory</span></a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> User <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="./../ganti_pass.php"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Ubah Password</a></li>
							<li><a href="./../logout.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>

		</div><!-- /.container-fluid -->
	</nav>

	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<ul class="nav menu">
			<li class="active"><a href="index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg> Dashboard</a></li>
			<li class="parent ">
				<a href="#">
					<span data-toggle="collapse" href="#sub-item-2"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Transaksi
				</a>
				<ul class="children collapse" id="sub-item-2">
					<li>
						<a class="" href="./../transaksi_jual.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Transaksi Penjualan
						</a>
					</li>
					<li>
						<a class="" href="./../transaksi_beli.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Transaksi Pembelian
						</a>
					</li>
				</ul>
			</li>
		</ul>
	</div><!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Selamat Datang : <?=$_SESSION['nama'];?></li>
			</ol>
			<h2 align="center">SISTEM INVENTORY BARANG</h2>
      <div class="row-fluid row-centered">
				<ul class="thumbnails">
				<div class="col-xs-6 col-md-4">
					<div class="thumbnail">
            <div class="caption">
              <h3 align="center">Data Penjualan</h3>
              <p align="center">Melihat Data Barang yang Keluar</p>
              <p align="center"><a href="./../transaksi_jual.php" class="btn btn-primary">Lihat Data</a> </p>
            </div>
          </div>
				</div>
				<div class="col-xs-6 col-md-4">
					<div class="thumbnail">
            <div class="caption">
              <h3 align="center">Data Pembelian</h3>
              <p align="center">Melihat Data Barang yang Masuk</p>
              <p align="center"><a href="./../transaksi_beli.php" class="btn btn-primary">Lihat Data</a> </p>
            </div>
          </div>
				</div>
        <div class="col-xs-6 col-md-4">
					<div class="thumbnail">
            <div class="caption">
              <h3 align="center">Laporan</h3>
              <p align="center">Laporan Data Penjualan dan Pembelian</p>
              <p align="center"><a href="" class="btn btn-primary">Lihat Data</a> </p>
            </div>
          </div>
				</div>
			</ul>
		</div>
		</div><!--/.row-->
	</div>	<!--/.main-->

	<script src="../js/jquery-1.11.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/chart.min.js"></script>
	<script src="../js/chart-data.js"></script>
	<script src="../js/easypiechart.js"></script>
	<script src="../js/easypiechart-data.js"></script>
	<script src="../js/bootstrap-datepicker.js"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){
		        $(this).find('em:first').toggleClass("glyphicon-minus");
		    });
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>
</body>

</html>
