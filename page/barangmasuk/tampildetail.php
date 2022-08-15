<?php
 $idbrg_masuk = $_GET['idbrg_masuk'];
 $sql2 = $koneksi->query("select * from barang_masuk where idbrg_masuk = '$idbrg_masuk'");
 $tampil = $sql2->fetch_assoc();
?>

<!-- Begin Page Content -->
 <div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Detail Barang Masuk <?php echo $tampil['idbrg_masuk'];?> </h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                              <tr>
                              <th>No</th>
                                  <th>ID Detail Belanja</th>
                                  <th>Jumlah Masuk</th>
                                  <th>Aksi</th>
                                  
                              </tr>
                              </thead>
                              
     
        <tbody>
          <?php 
                          
                          $no = 1;
                          $sql = $koneksi->query("select * from (detail_masuk INNER JOIN barang_masuk ON barang_masuk.idbrg_masuk=detail_masuk.idbrg_masuk) INNER JOIN detail_belanja ON detail_masuk.iddbelanja=detail_belanja.iddbelanja where detail_masuk.idbrg_masuk = '$idbrg_masuk'");
                          while ($data = $sql->fetch_assoc()) {
                              
                          ?>
                              <tr>
                              <td><?php echo $no++; ?></td>
                                  <td><?php echo $data['iddbelanja'] ?></td>
                            
                                  <td><?php echo $data['jumlah_masuk'] ?></td>
                              <td>
                                  <a onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="?page=barangmasuk&aksi=hapusdetail&idbrg_keluar=<?php echo $data['idbrg_keluar'] ?>" class="btn btn-danger" >Hapus</a>
                                  </td>
                              </tr>
                          <?php }?>

                                 </tbody>
                      </table>
                      <a href="?page=barangmasuk&aksi=detail" class="btn btn-primary" >Tambah</a>
                      <a href="?page=barangmasuk" class="btn btn-dark" >Kembali</a>
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>
