<?php
 $idunit = $_GET['idunit'];
 $sql2 = $koneksi->query("select * from unit where idunit = '$idunit'");
 $tampil = $sql2->fetch_assoc();
  
 ?>
 
  <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Ubah Unit Kerja</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
							
							
							<div class="body">

							<form method="POST" enctype="multipart/form-data">
							
							<label for="">ID Unit</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="idunit" value="<?php echo $tampil['idunit']; ?>" class="form-control" readonly/>	 
							</div>
                            </div>

							<label for="">Nama Unit</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="nama_unit" value="<?php echo $tampil['nama_unit']; ?>" class="form-control" />	 
							</div>
                            </div>

                            <label for="">Nama Supervisor</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="nama_supervisor" value="<?php echo $tampil['nama_supervisor']; ?>" class="form-control" />	 
							</div>
                            </div>

                            <label for="">Keterangan</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="keterangan" value="<?php echo $tampil['keterangan']; ?>" class="form-control" />	 
							</div>
                            </div>
							
							<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
							<input type="submit" name="batal" value="Batal" class="btn btn-primary" >
							</form>
							
							
							
							<?php
							
							if (isset($_POST['simpan'])) {
								

								$idunit= $_POST['idunit'];
								$nama_unit= $_POST['nama_unit'];
								$nama_supervisor= $_POST['nama_supervisor'];
								$keterangan= $_POST['keterangan'];

								
								$sql = $koneksi->query("update unit set nama_unit='$nama_unit',nama_supervisor='$nama_supervisor',keterangan='$keterangan' where idunit='$idunit'"); 
								
								if ($sql) {
									?>
									
										<script type="text/javascript">
										alert("Data Berhasil Diubah");
										window.location.href="?page=unit";
										</script>
										
										<?php
								}
							
							}
							
							if (isset($_POST['batal'])) {
								?>
									
									<script type="text/javascript">
									alert("Data Batal Diubah");
									window.location.href="?page=unit";
									</script>
										
								<?php
								}	
							?>
										
										
										
								
								
								
								
								
