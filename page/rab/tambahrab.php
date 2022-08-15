<div class="container-fluid">

<?php 
	
  $no = mysqli_query($koneksi, "select idrab from rab order by idrab desc");
  $id = mysqli_fetch_array($no);
  $kode = $id['idrab'];
  $urut = substr($kode, -3);
  $tambah = (int) $urut + 1;
	  if(strlen($tambah) == 1){
		  $format = "RAB"."000".$tambah;
	  } else if(strlen($tambah) == 2){
		  $format = "RAB"."00".$tambah;
	  } else{
		  $format = "RAB"."0".$tambah;
	  }
?>

  <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tambah RAB</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
							<div class="body">
							
							<form method="POST" enctype="multipart/form-data">
							
							<label for="">ID RAB</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="idrab" class="form-control" value="<?php echo $format; ?>" readonly />	 
							</div>
                            </div>
                            <label for="">ID Unit</label>
                            <div class="form-group">
                               <div class="form-line">
                               <select name="idunit" id="idunit"class="form-control" />
								<option value="">-- Pilih ID Unit --</option>
								<?php
								
								$sql = $koneksi -> query("select * from unit order by idunit");
								while ($data=$sql->fetch_assoc()) {
									echo "<option value='$data[idunit]'>$data[idunit] | $data[nama_unit]</option>";
								}
								?>
                                </select>
                            </div>
                            </div>

                            <label for="">Kegiatan</label>
                            <div class="form-group">
                               <div class="form-line">
                                 <input type="text" name="kegiatan" class="form-control" />
							</div>
                            </div>
                            <label for="">Pekerjaan</label>
                            <div class="form-group">
                               <div class="form-line">
                                 <input type="text" name="pekerjaan" class="form-control" />
							</div>
                            </div>
                            <label for="">Tanggal RAB</label>
                            <div class="form-group">
                               <div class="form-line">
                                 <input type="date" name="tanggal_rab" class="form-control" />
							</div>
                            </div>
                            <label for="">Tanggal Sah</label>
                            <div class="form-group">
                               <div class="form-line">
                                 <input type="date" name="tanggal_sah" class="form-control" />
							</div>
                            </div>

                            <label for="">Status RAB</label>
                            <div class="form-group">
                               <div class="form-line">
                                 <select name="status_rab" class="form-control show-tick">
                                        <option value="">-- Pilih Status RAB --</option>
										<option value="sah1">Sah 1</option>
                                        <option value="sah2">Sah 2</option>
                                        <option value="sah3">Sah 3</option>
                     					<option value="proses">Proses</option>
                     					<option value="belanja">Belanja</option>
                     					<option value="selesai">Selesai</option>
                                    </select>
							</div>
                            </div>

                            <label for="">Jumlah Sah</label>
                            <div class="form-group">
                               <div class="form-line">
                                 <input type="number" name="jumlah_sah" class="form-control" />
							</div>
                            </div>

                            <label for="">Keterangan</label>
                            <div class="form-group">
                               <div class="form-line">
                                 <input type="text" name="keterangan" class="form-control" />
							</div>
                            </div>

                       

						
							</div>
                            </div>
							<input type="submit" name="simpan" value="Simpan" class="btn btn-primary" >
							<input type="submit" name="batal" value="Batal" class="btn btn-primary" >
							</form>
							
							
							
							<?php
							
							if (isset($_POST['simpan'])) {
								$idrab= $_POST['idrab'];
								$idunit= $_POST['idunit'];
								$kegiatan= $_POST['kegiatan'];
								$pekerjaan= $_POST['pekerjaan'];
                                $tanggal_rab= $_POST['tanggal_rab'];
								$tanggal_sah= $_POST['tanggal_sah'];
								$status_rab= $_POST['status_rab'];
								$jumlah_sah= $_POST['jumlah_sah'];
                                $keterangan= $_POST['keterangan'];
								
								$sql = $koneksi->query("insert into rab (idrab,idunit,kegiatan,pekerjaan,tanggal_rab,tanggal_sah,jumlah_sah,keterangan) values
								('$idrab','$idunit','$kegiatan','$pekerjaan','$tanggal_rab','$tanggal_sah','$jumlah_sah','$keterangan')");
								
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
										alert("Data Batal Ditambahkan");
										window.location.href="?page=rab";
										</script>
										
										<?php
									}

							
							?>
										
										
										
								
								
								
								
							