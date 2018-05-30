<!DOCTYPE html>
<html>
<?php
	include 'koneksi.php';
	if (isset($_POST['simpan'])) {
		$kode_beli= $_POST['kode_beli'];
		$tgl_beli= $_POST['tgl_beli'];
		$kode_suplier= $_POST['kode_suplier'];
		$nama_suplier= $_POST['nama_suplier'];
		$kode_brg= $_POST['kode_brg'];
    $nama_brg= $_POST['nama_brg'];
    $hrg_beli= $_POST['hrg_beli'];
		$jml_beli= $_POST['jml_beli'];

		$query= mysqli_query($koneksi, "INSERT INTO pembelian VALUES ('$kode_beli','$tgl_beli','$kode_suplier','$nama_suplier','$kode_brg','$nama_brg','$hrg_beli','$jml_beli')");
    echo "<script> alert ('Data Berhasil di Simpan');
  	document.location='transaksi_beli.php';
  	</script>";
  }
	elseif (isset($_POST['edit'])) {
    $kode_beli= $_POST['kode_beli'];
		$tgl_beli= $_POST['tgl_beli'];
		$kode_suplier= $_POST['kode_suplier'];
		$nama_suplier= $_POST['nama_suplier'];
		$kode_brg= $_POST['kode_brg'];
    $nama_brg= $_POST['nama_brg'];
    $hrg_beli= $_POST['hrg_beli'];
		$jml_beli= $_POST['jml_beli'];

 		$query= mysqli_query($koneksi, "UPDATE pembelian SET tgl_beli='$tgl_beli',kode_suplier='$kode_suplier',nama_suplier='$nama_suplier',kode_brg='$kode_brg',nama_brg='$nama_brg',hrg_beli='$hrg_beli',jml_beli='$jml_beli' WHERE kode_beli='$kode_beli'");
  	echo "<script> alert ('Data Berhasil di Update');
  	document.location='transaksi_beli.php';
  	</script>";
	}
		elseif (isset($_POST['hapus'])) {
 		$kode_beli= $_POST['hapus'];

 		$query= mysqli_query($koneksi, "DELETE FROM pembelian WHERE kode_beli='$kode_beli'");
  	echo "<script> alert ('Data Berhasil dihapus');
  	document.location='transaksi_beli.php';
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
<script>
  $(function(){
    $(".date").datepicker({
			format:"yyyy-mm-dd"
    });
  });
</script>
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
            <h3 style="margin-top:14px" class="panel-title"><i class="fa fa-user"></i> Data Pembelian </h3>
          </div>
        	<div class="panel-body">
						<div class="text-right">
							<button style="margin-bottom:7px" type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Data</button>
							<p></p>
            </div>

							<?php
							include 'koneksi.php';
								$tampil=mysqli_query($koneksi, 'SELECT * FROM pembelian ORDER BY kode_beli ASC');
							?>
							<table id="transaksi_jual" class="table table-bordered table-hover table-striped tablesorter">
									<tr>
										<th>Kode Beli<i class="fa fa-sort"></i></th>
										<th>Tanggal Transaksi<i class="fa fa-sort"></i></th>
                    <th>Kode Suplier<i class="fa fa-sort"></i></th>
                    <th>Nama Suplier<i class="fa fa-sort"></i></th>
										<th>Kode Barang<i class="fa fa-sort"></i></th>
										<th>Nama Barang<i class="fa fa-sort"></i></th>
										<th>Harga Beli<i class="fa fa-sort"></i></th>
										<th>Jumlah<i class="fa fa-sort"></i></th>
										<th>Aksi</th>
									</tr>
									<?php
										while($data=mysqli_fetch_array($tampil)){
									?>
										<tr>
											<td><?php echo $data['kode_beli']; ?></td>
											<td><?php echo $data['tgl_beli']; ?></td>
                      <td><?php echo $data['kode_suplier']; ?></td>
                      <td><?php echo $data['nama_suplier']; ?></td>
											<td><?php echo $data['kode_brg']; ?></td>
											<td><?php echo $data['nama_brg']; ?></td>
											<td><?php echo $data['hrg_beli'];?></td>
											<td><?php echo $data['jml_beli'];?></td>
											<td>

												<!-- Modal Edit-->
										<div class="modal fade" id="my<?php echo $data[0]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
														<h4 class="modal-title" id="myModalLabel">Form Edit Pembelian</h4>
													</div>
													<div class="modal-body">
														<form action="transaksi_beli.php" method="POST" role="form">
															<div class="table-responsive">
																<div class="form-group">
																	<label for="">Kode Beli</label>
																	<input type="text" name="kode_beli" class="form-control" id="" value="<?php echo $data[0]; ?>" readonly>
																</div>
																<div class="form-group">
																	<label for="">Tanggal Beli</label>
																	<input type="text" name="tgl_beli" class="form-control" id="" value="<?php echo $data[1]; ?>">
																</div>
																<div class="form-group">
																	<label for="">Kode Suplier</label>
																	<input type="text" rows="3" name="kode_suplier" class="form-control" id="" value="<?php echo $data[2]; ?>" readonly="">
																</div>
																<div class="form-group">
																	<label for="">Nama Suplier</label>
																	<input type="text" rows="3" name="nama_suplier" class="form-control" id="" value="<?php echo $data[3]; ?>" readonly="">
																</div>
																<div class="form-group">
																	<label for="">Kode Barang</label>
																	<input type="text" rows="3" name="kode_brg" class="form-control" id="" value="<?php echo $data[4]; ?>"readonly="">
																</div>
																<div class="form-group">
																	<label for="">Nama Barang</label>
																	<input type="text" rows="3" name="nama_brg" class="form-control" id="" value="<?php echo $data[5]; ?>" readonly="">
																</div>
																<div class="form-group">
																	<label for="">Harga Beli</label>
																	<input type="text" rows="3" name="hrg_beli" class="form-control" id="" value="<?php echo $data[6]; ?>"readonly="">
																</div>
																<div class="form-group">
																	<label for="">Jumlah</label>
																	<input type="text" rows="3" name="jml_beli" class="form-control" id="" value="<?php echo $data[7]; ?>">
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
										<button type="button" name="edit" class="btn btn-sm btn-info" data-toggle="modal" data-target="#my<?php echo $data[0]; ?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</button>
										<button type="button" name="hapus" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#myy<?php echo $data[0]; ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus</button>

										<!-- Modal Hapus-->
										<div class="modal fade" id="myy<?php echo $data[0]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
														<h4 class="modal-title" id="myModalLabel">Form Hapus Transaksi</h4>
													</div>
													<div class="modal-body">
														<form action="transaksi_beli.php" method="POST" role="form">
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

												<!-- Modal Simpan-->
												<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<h4 class="modal-title" id="myModalLabel">Form Tambah Pembelian</h4>
															</div>
															<div class="modal-body">
																<form action="" method="POST" role="form">
																	<div class="table-responsive">
																		<div class="form-group">
																			<label for="">Kode Beli</label>
																			<input type="text" name="kode_beli" class="form-control" id="kode_beli" placeholder="">
																		</div>
																		<div class="form-group">
																			<label for="">Tanggal Transaksi</label>
																			<input type="text" name="tgl_beli" class="input-group date form-control" date="" date-format="yyyy-mm-dd" id="tgl_beli" placeholder="">
																		</div>
																		<div class="form-group">
																			<label for="">Kode Suplier</label>
																			<?php
																				$sup=mysqli_query($koneksi, 'SELECT * FROM suplier');
																				$jsArrayy = "var nmSup = new Array();\n";
																				echo '<select class="form-control" name="kode_suplier" onchange="changeValue(this.value)">';
																				echo '<option>-Pilih Kode Suplier-</option>';
																				while($dat=mysqli_fetch_array($sup)){
																					echo '<option value="' . $dat['kode_suplier'] . '">' . $dat['kode_suplier'] . '</option>';
																					$jsArrayy .= "nmSup['" . $dat['kode_suplier'] . "'] = {nama:'" . addslashes($dat['nama_suplier']) . "'};\n";
																				}
																				echo '</select>';
																			?>
																		</div>
																		<div class="form-group">
																			<label for="">Nama Suplier</label>
																			<input type="text" name="nama_suplier" class="form-control" id="nm_suplier" readonly="">
																		</div>
																		<div class="form-group">
																			<label for="">Kode Barang</label>
																				<?php
																					$brg=mysqli_query($koneksi, 'SELECT * FROM barang');
																					$jsArray = "var nmBrg = new Array();\n";
																					echo '<select class="form-control" name="kode_brg" onchange="gantiNilai(this.value)">';
																					echo '<option>-Pilih Kode Barang-</option>';
																					while($data=mysqli_fetch_array($brg)){
																						echo '<option value="' . $data['kode_brg'] . '">' . $data['kode_brg'] . '</option>';
    																				$jsArray .= "nmBrg['" . $data['kode_brg'] . "'] = {nama:'" . addslashes($data['nama_brg']) . "',harga:'".addslashes($data['hrg_beli'])."'};\n";
																					}
																					echo '</select>';
																				?>
																		</div>
																		<div class="form-group">
																			<label for="">Nama Barang</label>
																			<input type="text" name="nama_brg" id="nm_brg" class="form-control" readonly="">
																		</div>
																		<div class="form-group">
																			<label for="">Harga Beli</label>
																			<input type="text" name="hrg_beli" id="hg_beli" class="form-control" readonly="">
																		</div>
																		<div class="form-group">
																			<label for="">Jumlah</label>
																			<input type="text" name="jml_beli" class="form-control" id="jml_beli" placeholder="">
																		</div>
																</div>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
																<button type="submit" name="simpan" id="simpan" class="btn btn-primary">Simpan</button>
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
	<?php echo $jsArray; ?>
	function gantiNilai(id){
		document.getElementById('nm_brg').value = nmBrg[id].nama;
		document.getElementById('hg_beli').value = nmBrg[id].harga;
	};
	</script>
	<script type="text/javascript">
	<?php echo $jsArrayy; ?>
	function changeValue(id){
		document.getElementById('nm_suplier').value = nmSup[id].nama;
	};
	</script>
</body>

</html>
