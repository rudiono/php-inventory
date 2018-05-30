<!DOCTYPE html>
<html>


<?php
	include 'koneksi.php';
	if (isset($_POST['simpan'])) {
		$kode_suplier= $_POST['kode_suplier'];
		$nama_suplier= $_POST['nama_suplier'];
		$alamat= $_POST['alamat'];

		$query= mysqli_query($koneksi, "INSERT INTO suplier VALUES ('$kode_suplier','$nama_suplier','$alamat')");
		echo "<script> alert ('Data Berhasil ditambahkan');
		document.location='suplier.php';
  	</script>";
	}
	elseif (isset($_POST['edit'])) {
		$kode_suplier= $_POST['kode_suplier'];
		$nama_suplier= $_POST['nama_suplier'];
		$alamat= $_POST['alamat'];

 		$query= mysqli_query($koneksi, "UPDATE suplier SET nama_suplier='$nama_suplier',alamat='$alamat' where kode_suplier='$kode_suplier'");
  	echo "<script> alert ('Data Berhasil diupdate');
  	document.location='suplier.php';
  	</script>";
	}
		elseif (isset($_POST['hapus'])) {
 		$kode_suplier= $_POST['hapus'];

 		$query= mysqli_query($koneksi, "DELETE FROM suplier WHERE kode_suplier='$kode_suplier'");
  	echo "<script> alert ('Data Berhasil dihapus');
  	document.location='suplier.php';
  	</script>";
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
							<li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Ubah Password</a></li>
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
						<h3 style="margin-top:14px" class="panel-title"><i class="fa fa-user"></i> Data Suplier </h3>
					</div>
					<div class="panel-body">
						<div class="text-right">
							<button style="margin-bottom:7px" type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Suplier</button>
							<p></p>
						</div>

						<?php
						include 'koneksi.php';
							$tampil=mysqli_query($koneksi, 'SELECT * FROM suplier ORDER BY kode_suplier ASC');
						?>
						<table class="table table-bordered table-hover table-striped tablesorter">
								<tr>
									<th>Kode Suplier<i class="fa fa-sort"></i></th>
									<th>Nama Suplier<i class="fa fa-sort"></i></th>
									<th>Alamat<i class="fa fa-sort"></i></th>
									<th>Aksi</th>
								</tr>
								<?php
									while($data=mysqli_fetch_array($tampil)){
								?>
									<tr>
										<td><?php echo $data['kode_suplier']; ?></td>
										<td><?php echo $data['nama_suplier']; ?></a></td>
										<td><?php echo $data['alamat'];?></td>
										<td>
											<!-- Modal Simpan-->
											<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
															<h4 class="modal-title" id="myModalLabel">Form Tambah Suplier</h4>
														</div>
														<div class="modal-body">
															<form action="" method="POST" role="form">
																<div class="table-responsive">
																	<div class="form-group">
																		<label for="">Kode Suplier</label>
																		<input type="text" name="kode_suplier" class="form-control" id="kode_suplier" placeholder="">
																	</div>
																	<div class="form-group">
																		<label for="">Nama Suplier</label>
																		<input type="text" name="nama_suplier" class="form-control" id="nama_suplier" placeholder="">
																	</div>
																	<div class="form-group">
																		<label for="">Alamat</label>
																		<textarea rows="3" name="alamat" class="form-control" id="alamat"></textarea>
																	</div>
															</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
															<button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
														</form>
														</div>
													</div>
												</div>
											</div>
											<button type="button" name="edit" class="btn btn-sm btn-info" data-toggle="modal" data-target="#my<?php echo $data[0]; ?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</button>

											<!-- Modal Edit-->
											<div class="modal fade" id="my<?php echo $data[0]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
															<h4 class="modal-title" id="myModalLabel">Form Edit Suplier</h4>
														</div>
														<div class="modal-body">
															<form action="" method="POST" role="form">
																<div class="table-responsive">
																	<div class="form-group">
																		<label for="">Kode Suplier</label>
																		<input type="text" name="kode_suplier" class="form-control" id="" value="<?php echo $data[0]; ?>" readonly>
																	</div>
																	<div class="form-group">
																		<label for="">Nama Barang</label>
																		<input type="text" name="nama_suplier" class="form-control" id="" value="<?php echo $data[1]; ?>">
																	</div>
																	<div class="form-group">
																		<label for="">Alamat</label>
																		<input type="text" rows="3" name="alamat" class="form-control" id="" value="<?php echo $data[2]; ?>"></textarea>
																	</div>
															</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
															<button type="submit" name="edit" class="btn btn-primary">Simpan</button>
														</form>
														</div>
													</div>
												</div>
											</div>
											<button type="button" name="hapus" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#myy<?php echo $data[0]; ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus</button>

											<!-- Modal Hapus-->
											<div class="modal fade" id="myy<?php echo $data[0]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
															<h4 class="modal-title" id="myModalLabel">Form Hapus Suplier</h4>
														</div>
														<div class="modal-body">
															<form action="" method="POST" role="form">
																Apakah Anda Ingin Menghapus Data <?php echo $data[1]; ?>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
															<button type="submit" name="hapus"  value="<?php  echo $data[0]; ?>" class="btn btn-primary">OK</button>
														</form>
														</div>
													</div>
												</div>
											</div>
										</td>
									</tr>
								 <?php
							}
							$data++;
							?>
							</table>
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
