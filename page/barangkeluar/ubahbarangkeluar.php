<?php
 $idbrg_keluar = $_GET['idbrg_keluar'];
 $sql2 = $koneksi->query("select * from barang_keluar where idbrg_keluar = '$idbrg_keluar'");
 $tampil = $sql2->fetch_assoc();
  
 ?>
 
  <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Ubah Barang Keluar</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
							<div class="body">

							<form method="POST" enctype="multipart/form-data">
							
							<label for="">ID Barang Keluar</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="idbrg_keluar" value="<?php echo $tampil['idbrg_keluar']; ?>" class="form-control" readonly/>	 
							</div>
                            </div>

                            <label for="">Unit</label>
                             <div class="form-group">
                               <div class="form-line">
								<select name="idunit" class="form-control" value="<?php echo $tampil['idunit']; ?>">
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
                                <input type="date" name="tanggal_keluar" class="form-control" value="<?php echo $tampil['tanggal_keluar']; ?>" />
                               </div>
                            </div>
					
							<label for="">Nama Penerima</label>
                            <div class="form-group">
                               <div class="form-line">
                                 <input type="text" name="nama_penerima" class="form-control" value="<?php echo $tampil['nama_penerima']; ?>"/>
                               </div>
                            </div>

                            <label for="">Nama Pengguna</label>
                            <div class="form-group">
                               <div class="form-line">
                               <select name="idusers" id="idusers" class="form-control" value="<?php echo $tampil['idusers']; ?>"/>
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
                                $idunit= $_POST['idunit'];
								$nama_penerima= $_POST['nama_penerima'];
								$idusers= $_POST['idusers'];
								$tanggal_keluar= $_POST['tanggal_keluar'];
								
								
								$sql = $koneksi->query("update barang_keluar set idunit='$idunit',tanggal_keluar='$tanggal_keluar',idusers='$idusers' ,nama_penerima= '$nama_penerima' where idbrg_keluar='$idbrg_keluar'"); 

								
								if ($sql) {
									?>
									
										<script type="text/javascript">
										alert("Data Berhasil Diubah");
										window.location.href="?page=barangkeluar";
										</script>
										
										<?php
								}
							
							}
							
							if (isset($_POST['batal'])) {
								?>
									
									<script type="text/javascript">
									alert("Data Batal Diubah");
									window.location.href="?page=barangkeluar";
									</script>
										
								<?php
								}	
							?>
										
										
										
								
								
								
								
								
