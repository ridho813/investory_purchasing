




 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Suplier</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                                        <tr>
											<th>No</th>
											<th>ID Suplier</th>
											<th>Nama Suplier</th>
											<th>Nama Pemilik</th>
											<th>Alamat</th>
											<th>Nomor Telepon</th>
											<th>Email</th>
											<th>Keterangan</th>
											<th>Aksi</th>
                                         
                                        </tr>
										</thead>
										
               
                  <tbody>
                    <?php 
									
									$no = 1;
									$sql = $koneksi->query("select * from suplier");
									while ($data = $sql->fetch_assoc()) {
										
									?>
									
                                        <tr>
                                            <td><?php echo $no++; ?></td>
											<td><?php echo $data['idsuplier'] ?></td>
											<td><?php echo $data['nama_suplier'] ?></td>
											<td><?php echo $data['nama_pemilik'] ?></td>
											<td><?php echo $data['alamat'] ?></td>
											<td><?php echo $data['telp'] ?></td>
                                         	<td><?php echo $data['email'] ?></td>
                                         	<td><?php echo $data['keterangan'] ?></td>

											<td>
											<a href="?page=suplier&aksi=ubahsuplier&idsuplier=<?php echo $data['idsuplier'] ?>" class="btn btn-success" >Ubah</a>
											<a onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="?page=suplier&aksi=hapussuplier&idsuplier=<?php echo $data['idsuplier'] ?>" class="btn btn-danger" >Hapus</a>
											</td>
                                        </tr>
									<?php }?>

										   </tbody>
                                </table>
								<a href="?page=suplier&aksi=tambahsuplier" class="btn btn-primary" >Tambah Data Suplier</a>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>












