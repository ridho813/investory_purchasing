




 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DAFTAR SUPLIER</h6>
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
                                        </tr>
									<?php }?>

										   </tbody>
                                </table>
								
								<a href="page/laporan/export_laporan_suplier_excel.php"  class="btn btn-primary" style="margin-top:8 px"><i class="fa fa-print"></i>ExportToExcel</a>

                <a href="page/laporan/export_daftar_suplier_excel.php"  class="btn btn-success" style="margin-top:8 px"><i class="fa fa-print"></i>ExportToExcel</a>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>












