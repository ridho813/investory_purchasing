<!DOCTYPE html>
<html>
<head>
    <title>Laporan Suplier</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .line-title{
            border: 2;
            border-style: inset;
            border-top: 5px solid #000;
        }
    </style>
</head>
<body>
    <br>
   <img src="../img/logo-ugm.jpg" alt="logo" style="width: 150px;height: auto; position: absolute;" >
    <table id="mytable" cellspacing="0" width="100%">
    <tr>
       <td align="center">
                <span style="line-height:1.6; font-weight: bold;">
                    PENGADAAN BARANG LANGSUNG
                    <br>UNIVERSITAS GAJAH MADA RESIDENCE
                    <br>Jl. Fauna No.4, Kampus UGM, Bulaksumur, Sleman, Yogyakarta
                </span>
        </td>
    </tr>
    </table>
    <hr class="line-titles">
    <table id="mytable" cellspacing="0" width="100%">
    <tr>
       <td align="center">
                <span style="line-height:1.6; font-weight: bold;">
                    LAPORAN DAFTAR SUPLIER
                </span>
        </td>
    </tr>
    </table>

<br>
 <table id="mytable" class="table table-striped table-bordered table-hover table-full-width dataTable" cellspacing="0" width="100%">
        	<thead>
                <tr>
            		<th width="5%">No</th>
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
 <tr><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <p class="text-right"><b>Yogyakarta, <?php echo date('d, M, Y') ?></b></p>
  <p class="text-right"><b>Mengetahui</b></p><br><br>
  <p class="text-right"><b>Manajer Utama</b></p>
    </tr>
<script type="text/javascript">
    window.print();
</script>
</body>
</html>