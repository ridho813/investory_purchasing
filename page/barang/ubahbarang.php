<?php
 $kode_barang = $_GET['kode_barang'];
 $sql2 = $koneksi->query("select * from barang where kode_barang = '$kode_barang'");
 $tampil = $sql2->fetch_assoc();
  
 ?>
 
  <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Ubah Barang </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
							<div class="body">

							<form method="POST" enctype="multipart/form-data">
							
							<label for="">Kode Barang </label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="kode_barang" value="<?php echo $tampil['kode_barang']; ?>" class="form-control" readonly/>	 
							</div>
                            </div>
      
							<label for="">Nama Barang</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="nama_barang" class="form-control" value="<?php echo $tampil['nama_barang']; ?>"/>
                          	   </div>
                            </div>

                            <label for="">Uraian Real</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="uraian_real" class="form-control" value="<?php echo $tampil['uraian_real']; ?>" />
                          	   </div>
                            </div>

                            <label for="">Harga Barang</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="number" name="harga" class="form-control" value="<?php echo $tampil['harga']; ?>" />
                          	 
								</div>
                            </div>

                            <label for="">Kelompok Barang</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="kelompok" class="form-control" value="<?php echo $tampil['kelompok']; ?>" />
								</div>
                            </div>

                            <label for="">Merk Barang</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="merk" class="form-control" value="<?php echo $tampil['merk']; ?>" />
                               </div>
                            </div>

                            <label for="">Satuan</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="satuan" class="form-control" value="<?php echo $tampil['satuan']; ?>" />
  							   </div>
							</div>

							<label for="">Stok Barang</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="stok_barang" class="form-control" value="<?php echo $tampil['stok_barang']; ?>" readonly />
                          	 	</div>
							</div>

							</div>
                            </div>
							<input type="submit" name="simpan" value="Simpan" class="btn btn-primary" >
							<input type="submit" name="batal" value="Batal" class="btn btn-primary" >
							</form>
							
							
							<?php
							
							if (isset($_POST['simpan'])) {
								

                                $kode_barang= $_POST['kode_barang'];
								$nama_barang= $_POST['nama_barang'];
								$uraian_real= $_POST['uraian_real'];
								$harga= $_POST['harga'];
								$kelompok= $_POST['kelompok'];
                                $merk= $_POST['merk'];
                                $satuan= $_POST['satuan'];
                                $stok_barang= $_POST['stok_barang'];
                              
								
								
								$sql = $koneksi->query("update barang set nama_barang='$nama_barang',uraian_real='$uraian_real' ,harga= '$harga', harga='$harga',kelompok='$kelompok',merk='$merk',satuan='$satuan',stok_barang='$stok_barang' where kode_barang='$kode_barang'"); 

								
								if ($sql) {
									?>
									
										<script type="text/javascript">
										alert("Data Berhasil Diubah");
										window.location.href="?page=barang";
										</script>
										
										<?php
								}
							
							}
							
							if (isset($_POST['batal'])) {
								?>
									
									<script type="text/javascript">
									alert("Data Batal Diubah");
									window.location.href="?page=barang";
									</script>
										
								<?php
								}	
							?>
										
										
										
								
								
								
								
								
