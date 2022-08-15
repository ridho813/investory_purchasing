
<?php
 $idusers = $_GET['idusers'];
 $sql2 = $koneksi->query("select * from pengguna where idusers = '$idusers'");
 $tampil = $sql2->fetch_assoc();
?>
 
  <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Ubah Pengguna</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
							
							
							<div class="body">

							<form method="POST" enctype="multipart/form-data">
							
							<label for="">ID Users</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="idusers" class="form-control"  value="<?php echo $tampil['idusers']; ?>" readonly />	 
							</div>
                            </div>
							
												
							<label for="">Nama Lengkap Pengguna</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="nama_lengkap" class="form-control"  value="<?php echo $tampil['nama_lengkap']; ?>"   />	 
							</div>
                            </div>
							
					
							<label for="">Username</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="username" class="form-control"  value="<?php echo $tampil['username']; ?>" />
							</div>
                            </div>
					
							<label for="">Password</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="password" name="password" class="form-control"  value="<?php echo $tampil['password']; ?>" />
							</div>
							</div>

							<label for="">Level</label>
							 <div class="form-group">
                               <div class="form-line">
                                    <select name="level" class="form-control" value="<?php echo $tampil['level']; ?>">
                                        <option <?php if ($data['level'] == 'SPV Purchasing'){echo "selected='selected'";}echo $data['level'];?> value="SPV Purchasing">SPV Purchasing</option>
                                        <option <?php if ($data['level'] == 'Adm Purchasing'){echo "selected='selected'";}echo $data['level'];?> value="Adm Purchasing">Adm Purchasing</option>
                                        <option <?php if ($data['level'] == 'SPV Unit'){echo "selected='selected'";}echo $data['level'];?> value="SPV Unit">SPV Unit</option>
                     					<option <?php if ($data['level'] == 'Manajer'){echo "selected='selected'";}echo $data['level'];?> value="Manajer">Manajer</option>
                                    </select>
                            </div>
							</div>

						
							<label for="">Jenis Kelamin</label>
							 <div class="form-group" value="<?php echo $tampil['jenis_kelamin'];?>">
                               <input type="radio" name="jenis_kelamin" value="<?php echo $tampil['jenis_kelamin']; ?>" id="Perempuan" selected><label for ="Perempuan" >Perempuan</label>
                               <input type="radio" name="jenis_kelamin" value="Laki-laki" id="Laki-laki" selected><label for ="Laki-laki">Laki-laki</label>
							</div>

							<label for="">Jenis Kelamin</label>
							 <div class="form-group">
							 	<select name='jenis_kelamin' class='form-control' value="<?php echo $tampil['jenis_kelamin']; ?>">
							 		if (['jenis_kelamin']=='Laki-Laki'){
							 		echo "<option value='Laki-Laki' selected>Laki-Laki</option>
							 		<option value='Perempuan'>Perempuan</option>";
							 	}else{
							 	echo "<option value='Laki-Laki' >Laki-Laki</option>
							 	 <option value='Perempuan' selected>Perempuan</option>";
							 	  }
							 	echo "</select>";
                            </div>

							<label for="">Tanggal Lahir</label>
                            <div class="form-group">
                               <div class="form-line">
                                 <input type="date" name="tanggal_lahir" class="form-control" value="<?php echo $tampil['tanggal_lahir']; ?>"/>
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

							<label for="">Jabatan</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="jabatan" class="form-control"  value="<?php echo $tampil['jabatan']; ?>" />	 
							</div>
                            </div>
							
							<label for="">Alamat</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="alamat" class="form-control"  value="<?php echo $tampil['alamat']; ?>"/>	 
							</div>
                            </div>

							<label for="">Email</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="email" class="form-control"  value="<?php echo $tampil['email']; ?>" />	 
							</div>
                            </div>

							<label for="">Foto</label>
                            <div class="form-group">
                               <div class="form-line">
                                <img src="img/<?php echo $tampil['foto']; ?> "width="50" height="50"  alt="">
									 
							</div>
                            </div>
							
							
							<label for="">Ganti Foto</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="file" name="foto" class="form-control" />
									 
							</div>
                            </div>
							
						
							
							<input type="submit" name="simpan" value="Simpan" class="btn btn-primary" >
							<input type="submit" name="batal" value="Batal" class="btn btn-primary" >
							</form>
							
							
							
							<?php
							
							if (isset($_POST['simpan'])) {
								$idusers= $_POST['idusers'];
								$nama_lengkap= $_POST['nama_lengkap'];
								$username= $_POST['username'];
								$password= $_POST['password'];
								$level= $_POST['level'];
								$jenis_kelamin= $_POST['jenis_kelamin'];
								$tanggal_lahir= $_POST['tanggal_lahir'];
								$idunit= $_POST['idunit'];
								$jabatan= $_POST['jabatan'];
								$alamat= $_POST['alamat'];
								$email= $_POST['email'];
								$foto= $_FILES['foto']['name'];
								$lokasi= $_FILES['foto']['tmp_name'];
								$upload= move_uploaded_file($lokasi, "img/".$foto);
								
								if ($upload) {
								
								$sql = $koneksi->query("insert into pengguna (idusers, nama_lengkap, username, password, level, jenis_kelamin, tanggal_lahir, idunit, jabatan, alamat, email, foto) values('$idusers','$nama_lengkap','$username','$password','$level','$jenis_kelamin','$tanggal_lahir','$idunit','$jabatan','$alamat','$email','$foto')");
								
								if ($sql) {
									?>
									
										<script type="text/javascript">
										alert("Data Berhasil Disimpan");
										window.location.href="?page=pengguna";
										</script>
										
										<?php
									}
								}
							}
							
							if (isset($_POST['batal'])) {
								?>
									
										<script type="text/javascript">
										alert("Data Batal Ditambahkan");
										window.location.href="?page=pengguna";
										</script>
										
										<?php
									}
						?>