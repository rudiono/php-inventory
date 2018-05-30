<!DOCTYPE html>
<html>
<?php
	include 'koneksi.php';
	if (isset($_POST['simpan'])) {
		$kode_brg= $_POST['kode_brg'];
		$nama_brg= $_POST['nama_brg'];
		$hrg_jual= $_POST['hrg_jual'];
		$hrg_beli= $_POST['hrg_beli'];
		$stok= $_POST['stok'];

		$query= mysqli_query($koneksi, "INSERT INTO barang VALUES ('$kode_brg','$nama_brg','$hrg_jual','$hrg_beli','$stok')");
		echo "<script> alert ('Data Berhasil ditambahkan');
		document.location='barang.php';
  	</script>";
	}
	elseif (isset($_POST['edit'])) {
		$kode_brg= $_POST['kode_brg'];
		$nama_brg= $_POST['nama_brg'];
		$hrg_jual= $_POST['hrg_jual'];
		$hrg_beli= $_POST['hrg_beli'];
		$stok= $_POST['stok'];

 		$query= mysqli_query($koneksi, "UPDATE barang SET nama_brg='$nama_brg',hrg_jual='$hrg_jual',hrg_beli='$hrg_beli',stok='$stok' where kode_brg='$kode_brg'");
  	echo "<script> alert ('Data Berhasil di Update');
  	document.location='barang.php';
  	</script>";
	}
		elseif (isset($_POST['hapus'])) {
 		$kode_brg= $_POST['hapus'];

 		$query= mysqli_query($koneksi, "DELETE FROM barang WHERE kode_brg='$kode_brg'");
  	echo "<script> alert ('Data Berhasil dihapus');
  	document.location='barang.php';
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
            <h3 style="margin-top:14px" class="panel-title"><i class="fa fa-user"></i> Data Barang </h3>
          </div>
        	<div class="panel-body">
						<div class="text-right">
							<button style="margin-bottom:7px" type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Barang</button>
							<p></p>
            </div>

            <?php
						include 'koneksi.php';
              $tampil=mysqli_query($koneksi, 'SELECT * FROM barang ORDER BY kode_brg ASC');
            ?>
            <table class="table table-bordered table-hover table-striped tablesorter">
                <tr>
                  <th>Kode Barang<i class="fa fa-sort"></i></th>
                  <th>Nama Barang<i class="fa fa-sort"></i></th>
                  <th>Harga Jual<i class="fa fa-sort"></i></th>
                  <th>Harga Beli<i class="fa fa-sort"></i></th>
                  <th>Stok<i class="fa fa-sort"></i></th>
									<th>Aksi</th>
                </tr>
                <?php
									while($data=mysqli_fetch_array($tampil)){
								?>
                  <tr>
                    <td><?php echo $data['kode_brg']; ?></td>
                    <td><i class="fa fa-user"></i><?php echo $data['nama_brg']; ?></a></td>
                    <td>Rp.<?php echo number_format($data['hrg_jual']); ?></td>
                    <td>Rp.<?php echo number_format($data['hrg_beli']); ?></td>
                    <td><?php echo $data['stok'];?></td>
                    <td>
											<!-- Modal Simpan-->
											<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
															<h4 class="modal-title" id="myModalLabel">Form Tambah Barang</h4>
														</div>
														<div class="modal-body">
															<form action="" method="POST" role="form">
																<div class="table-responsive">
																	<div class="form-group">
																		<label for="">Kode Barang</label>
																		<input type="text" name="kode_brg" class="form-control" id="kode_brg" placeholder="">
																	</div>
																	<div class="form-group">
																		<label for="">Nama Barang</label>
																		<input type="text" name="nama_brg" class="form-control" id="nama_brg" placeholder="">
																	</div>
																	<div class="form-group">
																		<label for="">Harga Jual</label>
																		<input type="text" name="hrg_jual" class="form-control" id="hrg_jual" placeholder="">
																	</div>
																	<div class="form-group">
																		<label for="">Harga Beli</label>
																		<input type="text" name="hrg_beli" class="form-control" id="hrg_beli" placeholder="">
																	</div>
																	<div class="form-group">
																		<label for="">Stok</label>
																		<input type="text" name="stok" class="form-control" id="stok" placeholder="">
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
															<h4 class="modal-title" id="myModalLabel">Form Edit Barang</h4>
														</div>
														<div class="modal-body">
															<form action="" method="POST" role="form">
																<div class="table-responsive">
																	<div class="form-group">
																		<label for="">Kode Barang</label>
																		<input type="text" name="kode_brg" class="form-control" id="" value="<?php echo $data[0]; ?>" readonly>
																	</div>
																	<div class="form-group">
																		<label for="">Nama Barang</label>
																		<input type="text" name="nama_brg" class="form-control" id="" value="<?php echo $data[1]; ?>">
																	</div>
																	<div class="form-group">
																		<label for="">Harga Jual</label>
																		<input type="text" name="hrg_jual" class="form-control" id="" value="<?php echo $data[2]; ?>">
																	</div>
																	<div class="form-group">
																		<label for="">Harga Beli</label>
																		<input type="text" name="hrg_beli" class="form-control" id="" value="<?php echo $data[3]; ?>">
																	</div>
																	<div class="form-group">
																		<label for="">Stok</label>
																		<input type="text" name="stok" class="form-control" id="" value="<?php echo $data[4]; ?>">
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
															<h4 class="modal-title" id="myModalLabel">Form Hapus Barang</h4>
														</div>
														<div class="modal-body">
															<form action="" method="POST" role="form">
																Apakah Anda ingin menghapus data <?php echo $data[1]; ?>?
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
							<a href="lap_barang.php" style="margin-top:15px" type="button" class="btn btn-default pull-right"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Cetak Data</a>
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
