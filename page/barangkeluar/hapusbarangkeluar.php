<?php
 
 $id = $_GET['idbrg_keluar'];
 $sql = $koneksi->query("delete from barang_keluar where idbrg_keluar = '$id'");

 if ($sql) {
 
 ?>
 
 
	<script type="text/javascript">
	alert("Data Berhasil Dihapus");
	window.location.href="?page=barangkeluar";
	</script>
	
 <?php
 
 }
 
 ?>