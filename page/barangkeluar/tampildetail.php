<?php
 $idbrg_keluar = $_GET['idbrg_keluar'];
 $sql2 = $koneksi->query("select * from barang_keluar where idbrg_keluar = '$idbrg_keluar'");
 $tampil = $sql2->fetch_assoc();
?>

<!-- Begin Page Content -->
 <div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Detail Barang Keluar <?php echo $tampil['idbrg_keluar'];?> </h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                              <tr>
                              <th>No</th>
                                  <th>Kode Barang</th>
                                  <th>Nama Barang</th>
                                  <th>Jumlah Keluar</th>
                                  <th>Aksi</th>
                                  
                              </tr>
                              </thead>
                              
     
        <tbody>
          <?php 
                          
                          $no = 1;
                          $sql = $koneksi->query("select * from (detail_keluar INNER JOIN barang ON detail_keluar.kode_barang=barang.kode_barang) INNER JOIN barang_keluar ON detail_keluar.idbrg_keluar=barang_keluar.idbrg_keluar where detail_keluar.idbrg_keluar = '$idbrg_keluar'");
                          while ($data = $sql->fetch_assoc()) {
                              
                          ?>
                              <tr>
                              <td><?php echo $no++; ?></td>
                                  <td><?php echo $data['kode_barang'] ?></td>
                                  <td><?php echo $data['nama_barang'] ?></td>
                                  <td><?php echo $data['jumlah_keluar'] ?></td>
                              <td>
                                  <a onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="?page=barangkeluar&aksi=hapusdetail&idbrg_keluar=<?php echo $data['idbrg_keluar'] ?>" class="btn btn-danger" >Hapus</a>
                                  </td>
                              </tr>
                          <?php }?>

                                 </tbody>
                      </table>
                      <a href="?page=barangkeluar&aksi=detail" class="btn btn-primary" >Tambah</a>
                      <a href="?page=barangkeluar" class="btn btn-dark" >Kembali</a>
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>