<!-- Begin Page Content -->
 <div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Barang Keluar</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                              <tr>
                              <th>No</th>
                                  <th>ID Barang Keluar</th>
                                  <th>Unit Kerja</th>
                                  <th>Nama Pengguna</th>
                                  <th>Nama Penerima</th>
                                  <th>Tanggal Keluar</th>
                                  <th>Aksi</th>
                                  
                              </tr>
                              </thead>
                              
     
        <tbody>
          <?php 
                          
                          $no = 1;
                          $sql = $koneksi->query("select * from (barang_keluar INNER JOIN unit ON barang_keluar.idunit=unit.idunit) INNER JOIN pengguna ON barang_keluar.idusers=pengguna.idusers");
                          while ($data = $sql->fetch_assoc()) {
                              
                          ?>
                          
                              <tr>
                              <td><?php echo $no++; ?></td>
                                  <td><?php echo $data['idbrg_keluar'] ?></td>
                                  <td><?php echo $data['nama_unit'] ?></td>
                                  <td><?php echo $data['nama_lengkap'] ?></td>
                                  <td><?php echo $data['nama_penerima'] ?></td>
                                  <td><?php echo $data['tanggal_keluar'] ?></td>
                                  <td>
                                  <a href="?page=barangkeluar&aksi=detail&idbrg_keluar=<?php echo $data['idbrg_keluar'] ?>" class="btn btn-warning" >Tambah</a>
                                  <a href="?page=barangkeluar&aksi=tampildetail&idbrg_keluar=<?php echo $data['idbrg_keluar'] ?>" class="btn btn-info" >Detail</a>
                                  <a href="?page=barangkeluar&aksi=ubahbarangkeluar&idbrg_keluar=<?php echo $data['idbrg_keluar'] ?>" class="btn btn-success" >Ubah</a>
                                  <a onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="?page=barangkeluar&aksi=hapusbarangkeluar&idbrg_keluar=<?php echo $data['idbrg_keluar'] ?>" class="btn btn-danger" >Hapus</a>
                                  </td>
                              </tr>
                          <?php }?>

                                 </tbody>
                      </table>
                      <a href="?page=barangkeluar&aksi=tambahbarangkeluar" class="btn btn-primary" >Tambah</a>
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>












