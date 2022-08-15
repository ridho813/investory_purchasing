<?php
 $idbrg_masuk = $_GET['idbrg_masuk'];
 $sql2 = $koneksi->query("select * from barang_masuk where idbrg_masuk = '$idbrg_masuk'");
 $tampil = $sql2->fetch_assoc();
   $conn=mysqli_connect("localhost","root","","purchasing");
 ?>



<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Detail Masuk</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
                  <div class="body">

                  <form method="POST" enctype="multipart/form-data">
                  

							<label for="">ID Barang Masuk</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="idbrg_masuk" value="<?php echo $tampil['idbrg_masuk']; ?>" class="form-control" readonly/>	 
							</div>
                            </div>

 <label for="color">Kode Barang </label>
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


                            <label for="color">Detail Belanja</label>
                            <div class="form-group">
                               <div class="form-line">
                               <select name="iddbelanja" id="iddbelanja"class="form-control" />
							   <option value="">-- Pilih Detail Belanja --</option>
								<?php
								
								$sql = $koneksi -> query("select * from  detail_belanja order by iddbelanja");
								while ($data=$sql->fetch_assoc()) {
									echo "<option value='$data[iddbelanja]'>$data[iddbelanja] | $data[iddbelanja] </option>";
								}
								?>
								</select> 
							   </div>
                            </div>
							<label for="">Jumlah Masuk</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="number" name="jumlah_masuk" class="form-control" />
                          	 
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
								$kode_barang= $_POST['kode_barang'];

								$iddbelanja= $_POST['iddbelanja'];
								$jumlah_masuk= $_POST['jumlah_masuk'];
								
								$cekstokbarang =mysqli_query($conn, "select * from barang where kode_barang='$kode_barang'");
								$data = mysqli_fetch_array ($cekstokbarang);
								$stoksekarang = $data['stok_barang'];
								
							
									$tambahstoksekarang=$stoksekarang+$jumlah_masuk;

									$addkeluar=mysqli_query($conn, "insert into detail_masuk (idbrg_masuk,iddbelanja,kode_barang,jumlah_masuk) values ('$idbrg_masuk','$iddbelanja','$kode_barang','$jumlah_masuk')");
									$updatebarang= mysqli_query($conn, "update barang set stok_barang=$tambahstoksekarang where kode_barang='$kode_barang'");
									if ($addkeluar&&$updatebarang){
										?>
										<script type="text/javascript">
										alert("Data Berhasil Diubah");
										window.location.href="?page=barangmasuk&aksi=barangmasuk";
										</script>
									    <?php
									}else{
											?>
										<script type="text/javascript">
										alert("Data Stok Barang  Gagal");
										window.location.href="?page=barangmasuk&aksi=detail&idbrg_masuk=<?php echo $data['idbrg_masuk'] ?>";
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
										
										