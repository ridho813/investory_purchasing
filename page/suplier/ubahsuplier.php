

<?php
 $idsuplier = $_GET['idsuplier'];
 $sql2 = $koneksi->query("select * from suplier where idsuplier = '$idsuplier'");
 $tampil = $sql2->fetch_assoc();

?>
 
  <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Ubah Suplier</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
							
							
							<div class="body">

							<form method="POST" enctype="multipart/form-data">
							
							<label for="">ID Suplier</label>
                            <div class="form-group">
                               <div class="form-line">
                             <input type="text" name="idsuplier" class="form-control" id="idsuplier"  value="<?php echo $tampil['idsuplier']; ?>" readonly />
							</div>
                            </div>
							
						
							
							<label for="">Nama Suplier</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="nama_suplier" class="form-control"  value="<?php echo $tampil['nama_suplier']; ?>" />	 
							</div>
                            </div>
							
							<label for="">Nama Pemilik</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="nama_pemilik" class="form-control"  value="<?php echo $tampil['nama_pemilik']; ?>"/>	 
							</div>
                            </div>
					
							<label for="">Alamat</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="alamat" class="form-control" value="<?php echo $tampil['alamat']; ?>" />
                          	 	</div>
                            </div>
					
							
							<label for="">Telepon</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="number" name="telp" class="form-control"  value="<?php echo $tampil['telp']; ?>" />	 
							</div>
                            </div>

                            <label for="">Email</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="email" class="form-control"  value="<?php echo $tampil['email']; ?>"/>
                          	 	</div>
                            </div>
							
							
							<label for="">Keterangan</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="keterangan" class="form-control"  value="<?php echo $tampil['keterangan']; ?>" />
                          	 	</div>
                            </div>

								<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">

								<input type="submit" name="batal" value="Batal" class="btn btn-primary">
							
							</form>
						
							
							
							
							<?php
							
							if (isset($_POST['simpan'])) {
								$idsuplier= $_POST['idsuplier'];
								$nama_suplier= $_POST['nama_suplier'];
								$nama_pemilik= $_POST['nama_pemilik'];
								$alamat= $_POST['alamat'];
								$telp= $_POST['telp'];
								$email= $_POST['email'];
								$keterangan= $_POST['keterangan'];
			
								
								$sql = $koneksi->query("update suplier set nama_suplier='$nama_suplier',nama_pemilik='$nama_pemilik',alamat='$alamat',telp='$telp',email='$email',keterangan='$keterangan' where idsuplier='$idsuplier'");
								
								if ($sql) {
									?>
									
										<script type="text/javascript">
										alert("Data Berhasil Disimpan");
										window.location.href="?page=suplier";
										</script>
										
										<?php
								}
								}
								if (isset($_POST['batal'])) {
									?>
									
										<script type="text/javascript">
										alert("Data Batal Ditambahkan");
										window.location.href="?page=suplier";
										</script>
										
										<?php
								}
									
							?>