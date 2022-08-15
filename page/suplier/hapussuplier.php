 <?php
 
 $idsuplier = $_GET['idsuplier'];
 $sql = $koneksi->query("delete from suplier where idsuplier = '$idsuplier'");

 if ($sql) {
 
 ?>
 
 
	<script type="text/javascript">
	alert("Data Berhasil Dihapus");
	window.location.href="?page=suplier";
	</script>
	
 <?php
 
 }
 
 ?>