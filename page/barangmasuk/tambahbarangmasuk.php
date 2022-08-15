<div class="container-fluid">

<?php 
	
  $no = mysqli_query($koneksi, "select idbrg_masuk from barang_masuk order by idbrg_masuk desc");
  $id = mysqli_fetch_array($no);
  $kode = $id['idbrg_masuk'];
  $urut = substr($kode, -3);
  $tambah = (int) $urut + 1;
	  if(strlen($tambah) == 1){
		  $format = "MBR"."00".$tambah;
	  } else if(strlen($tambah) == 2){
		  $format = "MBR"."0".$tambah;
	  } else{
		  $format = "MBR".$tambah;
	  }

  $tanggal_masuk = date("Y-m-d");
?>

  <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Barang Masuk</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
							<div class="body">
							
							<form method="POST" enctype="multipart/form-data">
							
							<label for="">ID Barang Masuk</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="idbrg_masuk" class="form-control" value="<?php echo $format; ?>" readonly />	 
							</div>
                            </div>

							<label for="">Tanggal Masuk</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="date" name="tanggal_masuk" class="form-control" value="<?php echo $tanggal_masuk; ?>"/>
                          	 
								</div>
                            </div>

                            <label for="color">Belanja</label>
                            <div class="form-group">
                               <div class="form-line">
                               <select name="idbelanja" id="idbelanja"class="form-control" />
							   <option value="">-- Pilih ID Belanja --</option>
								<?php
								
								$sql = $koneksi -> query("select * from  belanja order by idbelanja");
								while ($data=$sql->fetch_assoc()) {
									echo "<option value='$data[idbelanja]'>$data[idbelanja] | $data[idbelanja] </option>";
								}
								?>
								</select> 
							   </div>
                            </div>

                            <label for="color">Nama Pengguna</label>
                            <div class="form-group">
                               <div class="form-line">
                               <select name="idusers" id="idusers"class="form-control" />
							   <option value="">-- Pilih Nama Pengguna --</option>
								<?php
								
								$sql = $koneksi -> query("select * from pengguna order by idusers");
								while ($data=$sql->fetch_assoc()) {
									echo "<option value='$data[idusers]'>$data[idusers] | $data[nama_lengkap]</option>";
								}
								?>
								</select> 
							   </div>
                            </div>

							</div>
                            </div>
							<input type="submit" name="simpan" value="Simpan" class="btn btn-primary" >
							<input type="submit" name="batal" value="Batal" class="btn btn-primary" >
							</form>
							
							
							
							<?php
							
							if (isset($_POST['simpan'])) {
								$idbrg_masuk= $_POST['idbrg_masuk'];
								$idusers= $_POST['idusers'];
								$idbelanja= $_POST['idbelanja'];
								$tanggal_masuk= $_POST['tanggal_masuk'];
								
								$sql = $koneksi->query("insert into barang_masuk (idbrg_masuk,idbelanja, tanggal_masuk, idusers) values
								('$idbrg_masuk','$idbelanja','$tanggal_masuk','$idusers')");
								
								if ($sql) {
									?>
									
										<script type="text/javascript">
										alert("Data Berhasil Disimpan");
										window.location.href="?page=barangmasuk";
										</script>
										
										<?php
									}
								}
							if (isset($_POST['batal'])) {
								?>
									
										<script type="text/javascript">
										alert("Data Batal Ditambahkan");
										window.location.href="?page=barangmasuk";
										</script>
										
										<?php
									}

							
							?>
										
										
										
								
								
								
								
								
