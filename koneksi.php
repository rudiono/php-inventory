<?php

$DBHOST= "localhost";
$DBUSER= "root";
$DBPASS= "";
$DBNAME= "inventory_barang";
/**
 * $dbconnect : koneksi kedatabase
 */
$koneksi = new mysqli($DBHOST, $DBUSER, $DBPASS, $DBNAME);

/**
 * Check Error yang terjadi saat koneksi
 * jika terdapat error maka die() // stop dan tampilkan error
 */
if ($koneksi->connect_error) {
	die('Database Not Connect. Error : ' . $koneksi->connect_error);
}
