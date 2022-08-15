<?php
 $idbelanja = $_GET['idbelanja'];
 $sql2 = $koneksi->query("select * from belanja where idbelanja = '$idbelanja'");
 $tampil = $sql2->fetch_assoc();
?>

<!-- Begin Page Content -->
 <div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Detail Belanja <?php echo $tampil['idbelanja'];?> </h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                              <tr>
                              <th>No</th>
                                  <th>ID Detail Belanja</th>
                                  <th>ID Belanja</th>
                                  <th>ID Detail RAB</th>
                                  <th>Jumlah Belanja</th>
                                  <th>Harga Belanja</th>
                                  <th>Aksi</th>
                              </tr>
                              </thead>
                              
     
        <tbody>
          <?php 
                          
                          $no = 1;
                          $sql = $koneksi->query("select * from (detail_belanja INNER JOIN belanja ON detail_belanja.idbelanja=belanja.idbelanja) INNER JOIN detail_rab ON detail_belanja.iddrab=detail_rab.iddrab where detail_belanja.idbelanja = '$idbelanja'");
                          while ($data = $sql->fetch_assoc()) {
                              
                          ?>
                              <tr>
                              <td><?php echo $no++; ?></td>
                                  <td><?php echo $data['iddbelanja'] ?></td>
                                  <td><?php echo $data['idbelanja'] ?></td>
                                  <td><?php echo $data['iddrab'] ?></td>
                                  <td><?php echo $data['jumlah_belanja'] ?></td>
                                  <td><?php echo $data['harga_belanja'] ?></td>
                              <td>
                                  <a onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="?page=belanja&aksi=hapusdetail&idbelanja=<?php echo $data['idbelanja'] ?>" class="btn btn-danger" >Hapus</a>
                                  </td>
                              </tr>
                          <?php }?>

                                 </tbody>
                      </table>
                      <a href="?page=belanja&aksi=detail" class="btn btn-primary" >Tambah</a>
                      <a href="?page=belanja" class="btn btn-dark" >Kembali</a>
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>
