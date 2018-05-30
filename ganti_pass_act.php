<?php
  include 'koneksi.php';
  $username=$_POST['username'];
  $lama=$_POST['lama'];
  $baru=$_POST['baru'];
  $ulang=$_POST['ulang'];

  $cek=mysqli_query($koneksi, "SELECT * FROM user WHERE password='$lama' AND username='$username'");
  if(mysqli_num_rows($cek)==1){
	   if($baru==$ulang){
		     $b = $baru;
		     mysqli_query($koneksi,"UPDATE user SET password='$b' WHERE username='$username'");
		     header("location:ganti_pass.php?pesan=oke");
	   }else{
		     header("location:ganti_pass.php?pesan=tdksama");
	     }
}else{
	header("location:ganti_pass.php?pesan=gagal");
}
?>
