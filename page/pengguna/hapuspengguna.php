 <?php
 
 $id = $_GET['idusers'];
 $sql = $koneksi->query("delete from pengguna where idusers = '$id'");

 if ($sql) {
 
 ?>
 
 
	<script type="text/javascript">
	alert("Data Berhasil Dihapus");
	window.location.href="?page=pengguna";
	</script>
	
 <?php
 
 }
 
 ?>