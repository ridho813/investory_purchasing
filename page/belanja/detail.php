<?php
 $idbelanja = $_GET['idbelanja'];
 $sql2 = $koneksi->query("select * from belanja where idbelanja = '$idbelanja'");
 $tampil = $sql2->fetch_assoc(); 

$no = mysqli_query($koneksi, "select iddbelanja from detail_belanja order by iddbelanja desc");
	$id = mysqli_fetch_array($no);
	$kode = $id['iddbelanja'];
	$urut = substr($kode, -3);
	$tambah = (int) $urut + 1;
		if(strlen($tambah) == 1){
			$format = "DBL"."000".$tambah;
		} else if(strlen($tambah) == 2){
			$format = "DBL"."00".$tambah;
		} else{
			$format = "DBL"."0".$tambah;
		}
 ?>



<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Detail Belanja</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
                  <div class="body">

                  <form method="POST" enctype="multipart/form-data">
                  

							<label for="">ID Detail Belanja</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="iddbelanja" class="form-control" value="<?php echo $format; ?>" readonly />	 
							</div>
                            </div>

                            <label for="color">ID Belanja</label>
                            <div class="form-group">
                               <div class="form-line">
                               <select name="idbelanja" id="idbelanja"class="form-control" />
							   <option value="">-- Pilih Belanja --</option>
								<?php
								
								$sql = $koneksi -> query("select * from  belanja order by idbelanja");
								while ($data=$sql->fetch_assoc()) {
									echo "<option value='$data[idbelanja]'>$data[idbelanja] | $data[idbelanja] </option>";
								}
								?>
								</select> 
							   </div>
                            </div>

                            <label for="color">ID Detail RAB</label>
                            <div class="form-group">
                               <div class="form-line">
                               <select name="iddrab" id="iddrab"class="form-control" />
							   <option value="">-- Pilih Detail RAB --</option>
								<?php
								
								$sql = $koneksi -> query("select * from  detail_rab order by iddrab");
								while ($data=$sql->fetch_assoc()) {
									echo "<option value='$data[iddrab]'>$data[iddrab] | $data[iddrab] </option>";
								}
								?>
								</select> 
							   </div>
                            </div>

							<label for="">Jumlah Belanja</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="number" name="jumlah_belanja" class="form-control" />
                          	 </div>
								</div>

							<label for="">Harga Belanja</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="number" name="harga_belanja" class="form-control" />
                          	 
								</div>
                            </div>
							
                            </div>
							<input type="submit" name="simpan" value="Simpan" class="btn btn-primary" >
							<input type="submit" name="batal" value="Batal" class="btn btn-primary" >
							</form>
							
                            <?php
							
							if (isset($_POST['simpan'])) {
								

                                $iddbelanja= $_POST['iddbelanja'];
								$idbelanja= $_POST['idbelanja'];
								$iddrab= $_POST['iddrab'];
								$jumlah_belanja= $_POST['jumlah_belanja'];
								$harga_belanja= $_POST['harga_belanja'];
								
								$sql = $koneksi->query("insert into detail_belanja (iddbelanja,idbelanja,iddrab,jumlah_belanja,harga_belanja) values ('$iddbelanja','$idbelanja','$iddrab','$jumlah_belanja','$harga_belanja')"); 

								
								if ($sql) {
									?>
									
										<script type="text/javascript">
										alert("Data Berhasil Diubah");
										window.location.href="?page=detail";
										</script>
										
										<?php
								}
							
							}
							
							if (isset($_POST['batal'])) {
								?>
									
									<script type="text/javascript">
									alert("Data Batal Diubah");
									window.location.href="?page=belanja";
									</script>
										
								<?php
								}	
							?>
										
										