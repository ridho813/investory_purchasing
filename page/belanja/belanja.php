<!-- Begin Page Content -->
<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Belanja</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                              <tr>
                              <th>No</th>
                                  <th>ID Belanja</th>
                                  <th>Tanggal Belanja</th>
                                  <th>Nama Suplier</th>
                                  <th>Status Bayar</th>
                                  <th>Aksi</th>
                                  
                              </tr>
                              </thead>
                              
     
        <tbody>
          <?php 
                          
                          $no = 1;
                          $sql = $koneksi->query("select * from belanja INNER JOIN suplier ON belanja.idsuplier=suplier.idsuplier");
                          while ($data = $sql->fetch_assoc()) {
                              
                          ?>
                          
                              <tr>
                              <td><?php echo $no++; ?></td>
                                  <td><?php echo $data['idbelanja'] ?></td>
                                  <td><?php echo $data['tanggal_belanja'] ?></td>
                                  <td><?php echo $data['nama_suplier'] ?></td>
                                  <td><?php echo $data['status_bayar'] ?></td>
                                  <td>
                                    <a href="?page=belanja&aksi=detail&idbelanja=<?php echo $data['idbelanja'] ?>" class="btn btn-info" >Tambah</a>
                                  <a href="?page=belanja&aksi=tampildetail&idbelanja=<?php echo $data['idbelanja'] ?>" class="btn btn-info" >Detail</a>
                                  <a href="?page=belanja&aksi=ubahbelanja&idbelanja=<?php echo $data['idbelanja'] ?>" class="btn btn-success" >Ubah</a>
                                  <a onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="?page=belanja&aksi=hapusbelanja&idbelanja=<?php echo $data['idb'] ?>" class="btn btn-danger" >Hapus</a>
                                  </td>
                              </tr>
                          <?php }?>

                                 </tbody>
                      </table>
                      <a href="?page=belanja&aksi=tambahbelanja" class="btn btn-primary" >Tambah</a>
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>












