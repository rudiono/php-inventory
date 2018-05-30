<!DOCTYPE html>
<html>
<?php
  include 'koneksi.php';
  if(isset($_GET['pesan'])){
    $pesan=mysqli_real_escape_string($koneksi, $_GET['pesan']);
    if($pesan=="gagal"){
      echo "<script> alert ('Password Gagal Diubah !!');
    	</script>";
    }else if($pesan=="tdksama"){
      echo "<script> alert ('Password yang Anda Masukkan Tidak sesuai !!');
    	</script>";
    }else if($pesan=="oke"){
      echo "<script> alert ('Password Berhasil Diubah !!');
    	</script>";
    }
  }
?>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sistem Inventory</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/bootstrap-table.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

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
							<li><a href="ganti_pass.php"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Ubah Password</a></li>
							<li><a href="logout.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
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
					<span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Data Master
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li>
						<a class="" href="barang.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Data Barang
						</a>
					</li>
					<li>
						<a class="" href="suplier.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Data Suplier
						</a>
					</li>
				</ul>
			</li>
			<li class="parent ">
				<a href="#">
					<span data-toggle="collapse" href="#sub-item-2"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Transaksi
				</a>
				<ul class="children collapse" id="sub-item-2">
					<li>
						<a class="" href="transaksi_jual.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Transaksi Penjualan
						</a>
					</li>
					<li>
						<a class="" href="transaksi_beli.php">
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
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 style="margin-top:14px" class="panel-title"><i class="fa fa-user"></i> Form Ubah Password </h3>
          </div>
        	  <div class="panel-body">
              <div class="col-md-5">
	             <form action="ganti_pass_act.php" method="post">
		               <div class="form-group">
			                  <input name="user" type="hidden" class="form-control" value="<?php echo $_SESSION['username']; ?>">
		               </div>
		               <div class="form-group">
			                  <label>Password Lama</label>
			                  <input name="lama" type="password" class="form-control" placeholder="">
		               </div>
		               <div class="form-group">
			                  <label>Password Baru</label>
			                  <input name="baru" type="password" class="form-control" placeholder="">
		               </div>
		               <div class="form-group">
			                  <label>Ulangi Password</label>
			                  <input name="ulang" type="password" class="form-control" placeholder="">
		               </div>
		               <div class="form-group">
			                  <label></label>
			                  <input type="submit" class="btn btn-info" value="Simpan">
			                  <input type="reset" class="btn btn-danger" value="Reset">
		               </div>
	             </form>
              </div>
             </div>
           </div>
         </div>
       </div><!-- /.row -->
	    </div><!--/.main-->
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/bootstrap-table.js"></script>
	<script src="datatables/jquery.dataTables.js"></script>
	<script src="datatables/dataTables.bootstrap.js"></script>
	<script src="js/tablesorter/jquery.tablesorter.js"></script>
  <script src="js/tablesorter/tables.js"></script>
	<script type="text/javascript">
	<script>
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
