<?php
$stok_barang = 0;
?>


<div class="container-fluid">


  <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Barang</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
							<div class="body">
							
							<form method="POST" enctype="multipart/form-data">
							
							<label for="">Kode Barang </label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="kode_barang" required="kode_barang" class="form-control" />
							</div>
                            </div>

							<label for="">Nama Barang</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="nama_barang" class="form-control" />
                          	 
								</div>
                            </div>

                            <label for="">Uraian Real</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="uraian_real" class="form-control" />
                          	 
								</div>
                            </div>
                            <label for="">Harga Barang</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="number" name="harga" class="form-control" />
                          	 
								</div>
                            </div>

                            <label for="">Kelompok Barang</label>
                            <div class="form-group">
                               <div class="form-line">
                                <select name="kelompok" class="form-control show-tick">
                                        <option value="">-- Pilih Kelompok Barang --</option>
										<option value="ATK">ATK</option>
                                        <option value="Aminities">Aminities</option>
                                        <option value="MTC">Maintenance/Peralatan</option>
                     					<option value="Gardener">Gardener</option>
                     					<option value="Chemicals">Chemicals/Bahan Kimia</option>
                                        <option value="Equipment">Equipment</option>
                                        <option value="Security">Security</option>
                                    </select>
								</div>
                            </div>

                            <label for="">Merk Barang</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="merk" class="form-control" />
                          	   </div>
                            </div>

                            <label for="">Satuan</label>
                            <div class="form-group">
                               <div class="form-line">
                               <select name="satuan" class="form-control show-tick">
                                        <option value="">-- Pilih Satuan --</option>
										<option value="buah">Buah</option>
                                        <option value="biji">Biji</option>
                                        <option value="pack">Pack</option>
                     					<option value="kg">Kg</option>
                     					<option value="meter">Meter</option>
                                        <option value="meter_kuadrat">Meter Kuadrat</option>
                                        <option value="meter_kubik">Meter Kubik</option>
                     					<option value="lusin">Lusin</option>
                     					<option value="rim">Rim</option>
                                        <option value="pcs">PCS</option>
                                    </select>
								</div>
							</div>

							<label for="">Stok Barang</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="stok_barang" class="form-control" value="<?php echo $stok_barang; ?>" readonly  />
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
                            
								$sql = $koneksi->query("insert into barang (kode_barang,nama_barang, uraian_real,harga,kelompok,merk,satuan,stok_barang) values
								('$kode_barang','$nama_barang','$uraian_real','$harga','$kelompok','$merk','$satuan','$stok_barang')");
								
								if ($sql) {
									?>
									
										<script type="text/javascript">
										alert("Data Berhasil Disimpan");
										window.location.href="?page=barang";
										</script>
										
										<?php
									}
								}

								if (isset($_POST['batal'])) {
               		?>
										<script type="text/javascript">
										alert("Data Batal Ditambahkan");
										window.location.href="?page=barang";
										</script>
										<?php
								}
							?>
										
										
										
								
								
								
								
								
