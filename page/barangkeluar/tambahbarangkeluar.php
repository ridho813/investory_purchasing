<?php 
	
  $no = mysqli_query($koneksi, "select idbrg_keluar from barang_keluar order by idbrg_keluar desc");
  $id = mysqli_fetch_array($no);
  $kode = $id['idbrg_keluar'];
  $urut = substr($kode, -3);
  $tambah = (int) $urut + 1;
	  if(strlen($tambah) == 1){
		  $format = "KBR"."000".$tambah;
	  } else if(strlen($tambah) == 2){
		  $format = "KBR"."00".$tambah;
	  } else{
		  $format = "KBR"."0".$tambah;
	  }

	  $tanggal_keluar = date("Y-m-d");
?>

  <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Barang Keluar</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
							<div class="body">
							
							<form method="POST" enctype="multipart/form-data">
							
							<label for="">ID Barang Keluar</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="idbrg_keluar" class="form-control" value="<?php echo $format; ?>" readonly />	 
							</div>
                            </div>

							<label for="">ID Unit</label>
                            <div class="form-group">
                               <div class="form-line">
                               <select name="idunit" id="idunit"class="form-control" />
								<option value="">-- Pilih ID Unit --</option>
								<?php
								
								$sql = $koneksi -> query("select * from unit order by idunit");
								while ($data=$sql->fetch_assoc()) {
									echo "<option value='$data[idunit]'>$data[idunit] | $data[nama_unit]</option>";
								}
								?>
								</select> 
							   </div>
                            </div>
                            
							<label for="">Tanggal Keluar</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="date" name="tanggal_keluar" class="form-control" value="<?php echo $tanggal_keluar; ?>"/>
                          	 
								</div>
                            </div>
					
							<label for="">Nama Penerima</label>
                            <div class="form-group">
                               <div class="form-line">
                                 <input type="text" name="nama_penerima" class="form-control" />
							</div>
                            </div>

                            <label for="">Nama Pengguna</label>
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
								$idbrg_keluar= $_POST['idbrg_keluar'];
								$idusers= $_POST['idusers'];
								$nama_penerima= $_POST['nama_penerima'];
								$idunit= $_POST['idunit'];
								$tanggal_keluar= $_POST['tanggal_keluar'];
								
								$sql = $koneksi->query("insert into barang_keluar (idbrg_keluar,idunit, tanggal_keluar, idusers, nama_penerima) values
								('$idbrg_keluar','$idunit','$tanggal_keluar','$idusers','$nama_penerima')");
								
								if ($sql) {
									?>
									
										<script type="text/javascript">
										alert("Data Berhasil Disimpan");
										window.location.href="?page=barangkeluar&aksi=detail&idbrg_keluar=<?php echo $data['idbrg_keluar'] ?>";
										</script>
										
										<?php
									}
								}
							if (isset($_POST['batal'])) {
								?>
									
										<script type="text/javascript">
										alert("Data Batal Ditambahkan");
										window.location.href="?page=barangkeluar";
										</script>
										
										<?php
									}

							
							?>
										
										
										
								
								
								
								
								
