<?php
 $idrab = $_GET['idrab'];
 $sql2 = $koneksi->query("select * from rab where idrab = '$idrab'");
 $tampil = $sql2->fetch_assoc();
?>

<!-- Begin Page Content -->
 <div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Detail RAB <?php echo $tampil['idrab'];?> </h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                              <tr>
                              <th>No</th>
                                  <th>ID Detail RAB</th>
                                  <th>ID RAB</th>
                                  <th>Nama Barang</th>
                                  <th>spesifikasi</th>
                                  <th>Jumlah Barang</th>
                                  <th>Harga</th>
                                  <th>Gambar</th>
                                  <th>Status Barang</th>
                                  <th>Prioritas</th>
                                  <th>Aksi</th>
                              </tr>
                              </thead>
                              
     
        <tbody>
          <?php 
                          
                          $no = 1;
                          $sql = $koneksi->query("select * from (detail_rab INNER JOIN rab ON detail_rab.idrab=rab.idrab) INNER JOIN barang ON detail_rab.kode_barang=barang.kode_barang where detail_rab.idrab = '$idrab'");
                          while ($data = $sql->fetch_assoc()) {
                              
                          ?>
                              <tr>
                              <td><?php echo $no++; ?></td>
                                  <td><?php echo $data['iddrab'] ?></td>
                                  <td><?php echo $data['idrab'] ?></td>
                                  <td><?php echo $data['nama_barang'] ?></td>
                                  <td><?php echo $data['spesifikasi'] ?></td>
                                  <td><?php echo $data['jumlah_barang'] ?></td>
                                  <td><?php echo $data['harga'] ?></td>
                                  <td><?php echo $data['gambar'] ?></td>
                                  <td><?php echo $data['status_barang'] ?></td>
                                  <td><?php echo $data['prioritas'] ?></td>
                              <td>
                                  <a onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="?page=rab&aksi=hapusdetail&idrab=<?php echo $data['idrab'] ?>" class="btn btn-danger" >Hapus</a>
                                  </td>
                              </tr>
                          <?php }?>

                                 </tbody>
                      </table>
                      <a href="?page=rab&aksi=detail" class="btn btn-primary" >Tambah</a>
                      <a href="?page=rab" class="btn btn-dark" >Kembali</a>
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>
