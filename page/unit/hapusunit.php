 <?php
 
 $id = $_GET['idunit'];
 $sql = $koneksi->query("delete from unit where idunit = '$id'");

 if ($sql) {
 
 ?>
 
 
	<script type="text/javascript">
	alert("Data Berhasil Dihapus");
	window.location.href="?page=unit";
	</script>
	
 <?php
 
 }
 
 ?>