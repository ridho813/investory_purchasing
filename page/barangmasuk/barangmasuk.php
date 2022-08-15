 
 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Barang Masuk</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>ID Barang Masuk</th>
                                  <th>ID Belanja</th>
                                  <th>Tanggal Masuk</th>
                                  <th>Nama Pengguna</th>
                                  <th>Aksi</th> 
                                  
                              </tr>
                              </thead>
                              
     
        <tbody>
          <?php 
                          
                          $no = 1;
                          $sql = $koneksi->query("select * from barang_masuk inner join pengguna on barang_masuk.idusers=pengguna.idusers");
                          while ($data = $sql->fetch_assoc()) {
                              
                          ?>
                          
                              <tr>
                                  <td><?php echo $no++; ?></td>
                                  <td><?php echo $data['idbrg_masuk'] ?></td>
                                  <td><?php echo $data['idbelanja'] ?></td>
                                  <td><?php echo $data['tanggal_masuk'] ?></td>
                                  <td><?php echo $data['nama_lengkap'] ?></td>
                                  <td>
                                  <a href="?page=barangmasuk&aksi=detail&idbrg_masuk=<?php echo $data['idbrg_masuk'] ?>" class="btn btn-info" >Tambah</a>
                                     <a href="?page=barangmasuk&aksi=tampildetail&idbrg_masuk=<?php echo $data['idbrg_masuk'] ?>" class="btn btn-info" >Detail</a>
                                  <a href="?page=barangmasuk&aksi=ubahbarangmasuk&idbrg_masuk=<?php echo $data['idbrg_masuk'] ?>" class="btn btn-success" >Ubah</a>
                                  <a onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="?page=barangmasuk&aksi=hapusbarangmasuk&idbrg_masuk=<?php echo $data['idbrg_masuk'] ?>" class="btn btn-danger" >Hapus</a>
                                  </td>
                              </tr>
                          <?php }?>

                                 </tbody>
                      </table>
                      <a href="?page=barangmasuk&aksi=tambahbarangmasuk" class="btn btn-primary" >Tambah</a>
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>












