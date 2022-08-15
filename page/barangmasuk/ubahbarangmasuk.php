<?php
 $idbrg_masuk = $_GET['idbrg_masuk'];
 $sql2 = $koneksi->query("select * from barang_masuk where idbrg_masuk = '$idbrg_masuk'");
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
                                <input type="text" name="idbrg_masuk" value="<?php echo $tampil['idbrg_masuk']; ?>" class="form-control" readonly/>	 
							</div>
                            </div>



							<label for="">Tanggal Masuk</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="date" name="tanggal_masuk" class="form-control" />
                          	 
								</div>
                            </div>

                            <label for="color">Nama Lengkap</label>
                            <div class="form-group">
                               <div class="form-line">
                               <select name="idusers" id="idusers"class="form-control" />
							   <option value="">-- Pilih Nama Lengkap --</option>
								<?php
								
								$sql = $koneksi -> query("select * from pengguna order by idusers");
								while ($data=$sql->fetch_assoc()) {
									echo "<option value='$data[idusers]'>$data[idusers] | $data[nama_user]</option>";
								}
								?>
								</select> 
							   </div>
                            </div>



                            <label for="color">Belanja</label>
                            <div class="form-group">
                               <div class="form-line">
                               <select name="idbelanja" id="idbelanja"class="form-control" />
							   <option value="">-- Pilih Id Belanja --</option>
								<?php
								
								$sql = $koneksi -> query("select * from  belanja order by idbelanja");
								while ($data=$sql->fetch_assoc()) {
									echo "<option value='$data[idbelanja]'>$data[idbelanja] | $data[idbelanja] </option>";
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
								
								$sql = $koneksi->query("update barang_masuk set  idusers='$idusers',tanggal_masuk='$tanggal_masuk',idusers='$idusers' where idbrg_masuk='$idbrg_masuk'"); 

								
								if ($sql) {
									?>
									
										<script type="text/javascript">
										alert("Data Berhasil Diubah");
										window.location.href="?page=barangmasuk";
										</script>
										
										<?php
								}
							
							}
							
							if (isset($_POST['batal'])) {
								?>
									
									<script type="text/javascript">
									alert("Data Batal Diubah");
									window.location.href="?page=barangmasuk";
									</script>
										
								<?php
								}	
							?>
										
										