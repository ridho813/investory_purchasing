




 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Rekap Brang</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                                        <tr>
											<th>Tahun</th>
                      <th>ATK</th>
                      <th>Aminities</th>
                      <th>MTC</th>
                      <th>Gardener</th>
                      <th>Chemicals</th>
                      <th>Equipment</th>
                      <th>Security</th>
										  <th>Jumlah Seluruhnya</th>
                                         
                                        </tr>
										</thead>
										
               
                  <tbody>
                    <?php 
									
									$no = 1;
									$sql = $koneksi->query("select year(tanggal_keluar) as tahun, sum(if(kelompok='ATK',1,0)) as ATK, sum(if(kelompok='Aminities',1,0)) as Aminities, sum(if(kelompok='MTC',1,0)) as MTC, sum(if(kelompok='Gardener',1,0)) as Gardener, sum(if(kelompok='Chemicals',1,0)) as Chemicals, sum(if(kelompok='Equipment',1,0)) as Equipment, sum(if(kelompok='Security',1,0)) as Security, count(detail_keluar.idbrg_keluar) as jumlah from (barang_keluar INNER JOIN detail_keluar ON barang_keluar.idbrg_keluar=detail_keluar.idbrg_keluar) INNER JOIN barang ON detail_keluar.kode_barang=barang.kode_barang");
                	while ($data = $sql->fetch_assoc()) {
										
									?>
									
                                        <tr>
                      <td><?php echo $data['tahun']; ?></td>
											<td><?php echo $data['ATK'] ?></td>
                      <td><?php echo $data['Aminities'] ?></td>
                      <td><?php echo $data['MTC'] ?></td>
                      <td><?php echo $data['Gardener'] ?></td>
                      <td><?php echo $data['Chemicals'] ?></td>
                      <td><?php echo $data['Equipment'] ?></td>
                      <td><?php echo $data['Security'] ?></td>
                      <td><?php echo $data['jumlah'] ?></td>
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












