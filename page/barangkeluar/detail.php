<?php
 $idbrg_keluar = $_GET['idbrg_keluar'];
 $sql2 = $koneksi->query("select * from  barang_keluar where idbrg_keluar = '$idbrg_keluar'");
 $tampil = $sql2->fetch_assoc();
 $conn=mysqli_connect("localhost","root","","purchasing");

 ?>



<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Detail Keluar</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
                  <div class="body">

                  <form method="POST" enctype="multipart/form-data">
                  

							<label for="">ID Barang Keluar</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="idbrg_keluar" class="form-control" value="<?php echo $tampil['idbrg_keluar'];?>" readonly/>	 
							</div>
                            </div>

                            <label for="">Barang</label>
                            <div class="form-group">
                               <div class="form-line">
                               <select name="kode_barang" id="kode_barang"class="form-control" />
							   <option value="">-- Pilih Barang --</option>
								<?php
								
								$sql = $koneksi -> query("select * from barang order by kode_barang");
								while ($data=$sql->fetch_assoc()) {
									echo "<option value='$data[kode_barang]'>$data[kode_barang] | $data[nama_barang] </option>";
								}
								?>
								</select> 
							   </div>
							</div>

                          

							<label for="">Jumlah Keluar</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="number" name="jumlah_keluar" class="form-control" />
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
								$kode_barang= $_POST['kode_barang'];
								$jumlah_keluar= $_POST['jumlah_keluar'];
								
								$cekstokbarang =mysqli_query($conn, "select * from barang where kode_barang='$kode_barang'");
								$data = mysqli_fetch_array ($cekstokbarang);
								$stoksekarang = $data['stok_barang'];
								
								if($stoksekarang>=$jumlah_keluar)
								{
									$tambahstoksekarang=$stoksekarang-$jumlah_keluar;
									$addkeluar=mysqli_query($conn, "insert into detail_keluar (idbrg_keluar,kode_barang,jumlah_keluar) values ('$idbrg_keluar','$kode_barang','$jumlah_keluar')");
									$updatebarang= mysqli_query($conn, "update barang set stok_barang=$tambahstoksekarang where kode_barang='$kode_barang'");
									if ($addkeluar&&$updatebarang){
										?>
										<script type="text/javascript">
										alert("Data Berhasil Diubah");
										window.location.href="?page=barangkeluar&aksi=barangkeluar";
										</script>
									    <?php
									}else{
											?>
										<script type="text/javascript">
										alert("Data Stok Barang  Gagal");
										window.location.href="?page=barangkeluar&aksi=detail&idbrg_keluar=<?php echo $data['idbrg_keluar'] ?>";
										</script>
										
										<?php
									}
								}else{
										?>
										<script type="text/javascript">
										alert("Data Stok Barang Tidak Mencukupi");
										window.location.href="?page=barangkeluar&aksi=detail&idbrg_keluar=<?php echo $data['idbrg_keluar'] ?>";
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
										