<?php
 $idrab = $_GET['idrab'];
 $sql2 = $koneksi->query("select * from rab where idrab = '$rab'");
 $tampil = $sql2->fetch_assoc();
  
   $no = mysqli_query($koneksi, "select iddrab from detail_rab order by iddrab desc");
  $id = mysqli_fetch_array($no);
  $kode = $id['iddrab'];
  $urut = substr($kode, -3);
  $tambah = (int) $urut + 1;
    if(strlen($tambah) == 1){
      $format = "DRAB"."00".$tambah;
    } else if(strlen($tambah) == 2){
      $format = "DRAB"."0".$tambah;
    } else{
      $format = "DRAB".$tambah;
    }
 ?>



<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Detail RAB</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
                  <div class="body">

                  <form method="POST" enctype="multipart/form-data">
                  

							<label for="">ID Detail RAB</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="iddrab" value="<?php echo $format; ?>" class="form-control" />	 
							</div>
                            </div>

                             <label for="">ID RAB</label>
                            <div class="form-group">
                               <div class="form-line">
                               <select name="idrab" id="idrab"class="form-control" />
                 <option value="">-- Pilih IDRAB--</option>
                <?php
                
                $sql = $koneksi -> query("select * from  rab order by idrab");
                while ($data=$sql->fetch_assoc()) {
                  echo "<option value='$data[idrab]'>$data[idrab] | $data[kegiatan] </option>";
                }
                ?>
                </select> 
                 </div>
                            </div>

                            <label for="">Kode Barang</label>
                            <div class="form-group">
                               <div class="form-line">
                               <select name="kode_barang" id="kode_barang"class="form-control" />
							   <option value="">-- Pilih Barang --</option>
								<?php
								
								$sql = $koneksi -> query("select * from  barang order by kode_barang");
								while ($data=$sql->fetch_assoc()) {
									echo "<option value='$data[kode_barang]'>$data[kode_barang] | $data[nama_barang] </option>";
								}
								?>
								</select> 
							   </div>
                            </div>

							<label for="">Spesifikasi</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="spesifikasi" class="form-control" />
                          	   </div>
                            </div>

                            <label for="">Jumlah Barang</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="number" name="jumlah_barang" class="form-control" />
                          	   </div>
                            </div>

                            <label for="">Harga</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="number" name="harga" class="form-control" />
                          	 
								</div>
                            </div>

                            <label for="">Gambar</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="file" name="gambar" class="form-control" />
									 
							</div>
                            </div>

                            <label for="">Status Barang</label>
							 <div class="form-group">
                               <div class="form-line">
                                    <select name="status_barang" class="form-control show-tick">
                                        <option value="">-- Pilih Status Barang --</option>
										 <option value="sudah belanja">Sudah Belanja</option>
                                        <option value="belum belanja">Belum Belanja</option>
                                    </select>
                            </div>
							</div>

							<label for="">Prioritas</label>
							 <div class="form-group">
                               <div class="form-line">
                                    <select name="prioritas" class="form-control show-tick">
                                        <option value="">-- Pilih Prioritas Barang--</option>
										 <option value="mendesak">Mendesak</option>
                                        <option value="biasa">Biasa</option>
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
								

                                $iddrab= $_POST['iddrab'];
                                 $idrab= $_POST['idrab'];
                                  $spesifikasi= $_POST['spesifikasi'];
                                    $kode_barang= $_POST['kode_barang'];
                                      $jumlah_barang= $_POST['jumlah_barang'];
								$kode_barang= $_POST['kode_barang'];
								$harga= $_POST['harga'];
                $gambar= $_FILES['gambar']['name'];
                $lokasi= $_FILES['gambar']['tmp_name'];
                $upload= move_uploaded_file($lokasi, "img/".$gambar);
								$status_barang= $_POST['status_barang'];
                  $prioritas= $_POST['prioritas'];

							$sql = $koneksi->query("insert into detail_rab (iddrab,idrab,kode_barang,spesifikasi,jumlah_barang,harga,gambar,status_barang,prioritas) values ('$iddrab','$idrab','$kode_barang','$spesifikasi','$jumlah_barang','$harga','$gambar','$status_barang','$prioritas')"); 

							 if ($sql) {
                  ?>
                  
                    <script type="text/javascript">
                    alert("Data Berhasil Disimpan");
                    window.location.href="?page=detail";
                    </script>
                    
                    <?php
                  }
                }
              
							
							if (isset($_POST['batal'])) {
								?>
									
									<script type="text/javascript">
									alert("Data Batal Diubah");
									window.location.href="?page=rab";
									</script>
										
								<?php
								}	
							?>