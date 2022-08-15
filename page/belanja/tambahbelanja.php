<div class="container-fluid">

<?php 
	
  $no = mysqli_query($koneksi, "select idbelanja from belanja order by idbelanja desc");
  $id = mysqli_fetch_array($no);
  $kode = $id['idbelanja'];
  $urut = substr($kode, -3);
  $tambah = (int) $urut + 1;
	  if(strlen($tambah) == 1){
		  $format = "Bl"."0000".$tambah;
	  } else if(strlen($tambah) == 2){
		  $format = "Bl"."000".$tambah;
	  } else{
		  $format = "Bl".$tambah;
	  }
?>

  <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Belanja</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
							<div class="body">
							
							<form method="POST" enctype="multipart/form-data">
							
							<label for="">ID Belanja</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="idbelanja" class="form-control" value="<?php echo $format; ?>" readonly />	 
							</div>
                            </div>

							<label for="">Tanggal Belanja</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="date" name="tanggal_belanja" class="form-control" />
                          	 
								</div>
                            </div>

                            <label for="">Suplier</label>
                            <div class="form-group">
                               <div class="form-line">
                               <select name="idsuplier" id="idsuplier"class="form-control" />
								<option value="">-- Pilih Suplier --</option>
								<?php
								
								$sql = $koneksi -> query("select * from suplier order by idsuplier");
								while ($data=$sql->fetch_assoc()) {
									echo "<option value='$data[idsuplier]'>$data[idsuplier] | $data[nama_suplier]</option>";
								}
								?>
								</select> 
							   </div>
                            </div>



                            <label for="color">Status Bayar</label>
                            <div class="form-group">
                               <div class="form-line">
                               <select name="status_bayar" class="form-control show-tick">
                                        <option value="">-- Pilih Status Bayar --</option>
										<option value="Lunas">Lunas</option>
                                        <option value="Kasbon">Kasbon</option>
                                        <option value="Definitif">Definitif</option>
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
								$idbrg_masuk= $_POST['idbelanja'];
								$tanggal_belanja= $_POST['tanggal_belanja'];
								$idsuplier= $_POST['idsuplier'];
								$status_bayar= $_POST['status_bayar'];
								
								
								$sql = $koneksi->query("insert into belanja (idbelanja, tanggal_belanja, idsuplier, status_bayar) values ('$idbelanja','$tanggal_belanja','$idsuplier','$status_bayar')");
								
								if ($sql) {
									?>
									
										<script type="text/javascript">
										alert("Data Berhasil Disimpan");
										window.location.href="?page=belanja";
										</script>
										
										<?php
									}
								}
							if (isset($_POST['batal'])) {
								?>
									
										<script type="text/javascript">
										alert("Data Batal Ditambahkan");
										window.location.href="?page=belanja";
										</script>
										
										<?php
									}

							
							?>
										
										
										
								
								
								
								
								
