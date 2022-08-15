 
 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data rab</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Idrab</th>
                                  <th>Idunit</th>
                                  <th>Kegiatan</th>
                                  <th>Pekerjaan</th>
                                  <th>tanggal_rab</th>
                                  <th>tanggal_sah</th>
                                  <th>status_rab</th>
                                  <th>jumlah_sah</th>
                                  <th>keterangan</th>
                                  <th>Aksi</th>
                              </tr>
                              </thead>
                              
     
        <tbody>
          <?php 
                          
                          $no = 1;
                          $sql = $koneksi->query("select * from rab");
                          while ($data = $sql->fetch_assoc()) {
                              
                          ?>
                          
                              <tr>
                                  <td><?php echo $no++; ?></td>
                                  <td><?php echo $data['idrab'] ?></td>
                                  <td><?php echo $data['idunit'] ?></td>
                                  <td><?php echo $data['kegiatan'] ?></td>
                                  <td><?php echo $data['pekerjaan'] ?></td>
                                  <td><?php echo $data['tanggal_rab'] ?></td>
                                  <td><?php echo $data['tanggal_sah'] ?></td>
                                  <td><?php echo $data['status_rab'] ?></td>
                                  <td><?php echo $data['jumlah_sah'] ?></td>
                                  <td><?php echo $data['keterangan'] ?></td>
                                  <td>
                                  <a href="?page=rab&aksi=detail&idrab=<?php echo $data['idrab'] ?>" class="btn btn-warning" >Tambah</a>
                                  <a href="?page=rab&aksi=tampildetail&idrab=<?php echo $data['idrab'] ?>" class="btn btn-info" >Detail</a>
                                  <a href="?page=rab&aksi=ubahrab&idrab=<?php echo $data['idrab'] ?>" class="btn btn-success" >Ubah</a>
                                  <a onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="?page=rab&aksi=hapusrab&idrab=<?php echo $data['idrab'] ?>" class="btn btn-danger" >Hapus</a>
                                  </td>
                              </tr>
                          <?php }?>

                                 </tbody>
                      </table>
                      <a href="?page=rab&aksi=tambahrab" class="btn btn-primary" >Tambah</a>
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>












