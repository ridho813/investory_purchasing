  <div class="container-fluid">

  <?php 
  	
	$no = mysqli_query($koneksi, "select idunit from unit order by idunit desc");
	$id = mysqli_fetch_array($no);
	$kode = $id['idunit'];
	$urut = substr($kode, -3);
	$tambah = (int) $urut + 1;
		if(strlen($tambah) == 1){
			$format = "UGMR"."00".$tambah;
		} else if(strlen($tambah) == 2){
			$format = "UGMR"."0".$tambah;
		} else{
			$format = "UGMR".$tambah;
		}
  ?>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Unit Kerja</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
							
							
							<div class="body">
							
							<form method="POST" enctype="multipart/form-data">
							

							<label for="">ID Unit</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="idunit" class="form-control" value="<?php echo $format; ?>" readonly />	 
							</div>
                            </div>

                            <label for="">Nama Unit</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="nama_unit" class="form-control" />	 
							</div>
                            </div>

                            <label for="">Nama Supervisor</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="nama_supervisor" class="form-control" />	 
							</div>
                            </div>

                            <label for="">Keterangan</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="keterangan" class="form-control" />	 
							</div>
                            </div>
					
							<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
							<input type="submit" name="batal" value="Batal" class="btn btn-primary">

							</form>
						
							
							
							
							<?php
							
							if (isset($_POST['simpan'])) {
								$idunit= $_POST['idunit'];
								$nama_unit= $_POST['nama_unit'];
								$nama_supervisor= $_POST['nama_supervisor'];
								$keterangan= $_POST['keterangan'];
					
			
								
								$sql = $koneksi->query("insert into unit values('$idunit','$nama_unit','$nama_supervisor','$keterangan')");
								
								if ($sql) {
									?>
										<script type="text/javascript">
										alert("Data Berhasil Disimpan");
										window.location.href="?page=unit";
										</script>
									<?php
								}
								}
								if (isset($_POST['batal'])) {
								?>
									
									<script type="text/javascript">
									alert("Data Batal Ditambahkan");
									window.location.href="?page=unit";
									</script>
										
								<?php
								}
							
							?>
										
										
										
								
								
								
								
								
