 <?php

	$koneksi = new mysqli("localhost","root","","purchasing");

	
	
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Laporan_Suplier(".date('d-m-Y').").xls");

?>	
<body>
    <br>
   <img src="../img/logo-ugm.jpg" alt="logo" style="width: 150px;height: auto; position: absolute;" >
    <table id="mytable" cellspacing="0" width="100%">
    <tr>
       <td align="center">
                <span col style="line-height:1.6; font-weight: bold;">
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

<br>
 

<table border="1">
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

	<?php
	
	}
	
	?>
	
	</table>
	<tr><br><br><br>
  	<th><th><th><th><th><th><th><th></th></th></th></th></th></th></th></th><p class="text-right"><b>Yogyakarta, <?php echo date('d-m-Y') ?></b></p>
  <th><th><th><th><th><th><th><th></th></th></th></th></th></th></th></th><p class="text-right"><b>Mengetahui</b></p><br><br>
  <th><th><th><th><th><th><th><th></th></th></th></th></th></th></th></th><p class="text-right"><b>Manajer Utama</b></p>
    </tr>
<script type="text/javascript">
    window.print();
</script>
</body>