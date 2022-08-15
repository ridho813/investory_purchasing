




 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">DAFTAR BARANG</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Kode Barang</th>
                                  <th>Nama Barang</th>
                                  <th>Uraian Real</th>
                                  <th>Harga</th>
                                  <th>Kelompok</th>
                                  <th>Merk</th>
                                  <th>Satuan</th>
                                  <th>Stock Barang</th>
                                  <th>Aksi</th>
                                  
                              </tr>
                              </thead>
                              
     
        <tbody>
          <?php 
                          
                          $no = 1;
                          $sql = $koneksi->query("select * from barang");
                          while ($data = $sql->fetch_assoc()) {
                              
                          ?>
                          
                              <tr>
                                  <td><?php echo $no++; ?></td>
                                  <td><?php echo $data['kode_barang'] ?></td>
                                  <td><?php echo $data['nama_barang'] ?></td>
                                  <td><?php echo $data['uraian_real'] ?></td>
                                  <td><?php echo $data['harga'] ?></td>
                                  <td><?php echo $data['kelompok'] ?></td>
                                  <td><?php echo $data['merk'] ?></td>
                                  <td><?php echo $data['satuan'] ?></td>
                                  <td><?php echo $data['stok_barang'] ?></td>
                                
                                 
                              </tr>
                          <?php }?>

                                 </tbody>
                      </table>
                      <a href="page/laporan/export_laporan_suplier_excel.php"  class="btn btn-primary" style="margin-top:8 px"><i class="fa fa-print"></i>ExportToExcel</a>
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>












