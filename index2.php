
<?php
mysqli_report (MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	session_start();
	
	
	
	$koneksi = new mysqli("localhost","root","","purchasing");
	
if(empty($_SESSION['SPV Unit'])){
    
    header("location:login.php");
  }


	
	
	
	?>	



<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sistem Informasi Pengadaan Barang Langsung</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  
  
  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
 

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index3.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-building"></i>
        </div>
        <div class="sidebar-brand-text mx-2">UGM Residence</div>
      </a>

	  <!-- Divider -->
      <hr class="sidebar-divider my-0">
	  

 <?php
   if ($_SESSION['SPV Unit']) {
	   $user = $_SESSION['SPV Unit'];
   }
   $sql =$koneksi->query("select * from pengguna where idusers='$user'");
   $data = $sql->fetch_assoc();
   ?>

  

  <!--sidebar start-->

    <li class="d-flex align-items-center justify-content-center">
        <a class="nav-link">
		 <img src="img/<?php echo $data['foto']?>" class="img-circle" width="80" alt="User"/></a>
		  <li class="d-flex align-items-center justify-content-left">
		  </li>
	  </li>
		 <li class="nav-item ">
        <a class="nav-link">
         	<div class="d-flex align-items-center justify-content-center" class="name">  <?php echo  $data['nama_lengkap'];?></div></font>
			<div class="d-flex align-items-center justify-content-center" class="email"><?php echo $data['level'];?></div>
		 </a>
      </li>
	



      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="?page=home3">
          <i class="fas fa-fw fa-home"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Pilih Menu
      </div>
	 
      <!-- Nav Item - Pages Collapse Menu -->
	  
	  
	    <li class="nav-item active">
        <a class="nav-link" href="?page=pengguna">
          <i class="fas fa-fw fa-home"></i>
          <span>Data Pengguna</span></a>
      </li>
	  
	  
	   <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseData" aria-expanded="true" aria-controls="collapseData">
          <i class="fas fa-fw fa-folder"></i>
          <span>Data Master</span>
        </a>
        <div id="collapseData" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Menu:</h6>
            <a class="collapse-item" href="?page=barang">Data Barang</a>
            <a class="collapse-item" href="?page=unit">Data Unit</a>
            <a class="collapse-item" href="?page=suplier">Data Suplier</a>
          </div>
        </div>
      </li>
	  
	
	  
	    <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Transaksi</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Menu:</h6>
            <a class="collapse-item" href="?page=rab">RAB</a>
            <a class="collapse-item" href="?page=belanja">Belanja</a>
            <a class="collapse-item" href="?page=barangmasuk">Barang Masuk</a>
            <a class="collapse-item" href="?page=barangkeluar">Barang Keluar</a>
           
          </div>
        </div>
      </li>

	  
	  
	      <!-- Heading -->
      <div class="sidebar-heading">
        Laporan
      </div>
	  
	  
      
	     <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLaporan" aria-expanded="true" aria-controls="collapseLaporan">
          <i class="fas fa-fw fa-folder"></i>
          <span>Laporan Daftar Master</span>
        </a>
        <div id="collapseLaporan" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Menu :</h6>
            <a class="collapse-item" href="?page=laporan_pengguna">Laporan Daftar Pengguna</a>
            <a class="collapse-item" href="?page=laporan_unit">Laporan Daftar Unit</a>
            <a class="collapse-item" href="?page=laporan_suplier">Laporan Daftar Suplier</a>
            <a class="collapse-item" href="?page=laporan_barang">Laporan Daftar Barang</a> 
          </div>
        </div>
       </li>
       <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLaporan" aria-expanded="true" aria-controls="collapseLaporan">
          <i class="fas fa-fw fa-folder"></i>
          <span>Daftar Transaksi</span>
        </a>
        <div id="collapseLaporan" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Menu :</h6>
            <a class="collapse-item" href="?page=laporan_rab">Laporan Daftar RAB</a>
            <a class="collapse-item" href="?page=laporan_belanja">Laporan Daftar Belanja</a>
            <a class="collapse-item" href="?page=laporan_keluar">Laporan Daftar Barang Keluar</a>
            <a class="collapse-item" href="?page=laporan_masuk">Laporan Daftar Barang Masuk</a> 
          </div>
        </div>
       </li>
       <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLaporan" aria-expanded="true" aria-controls="collapseLaporan">
          <i class="fas fa-fw fa-folder"></i>
          <span>Laporan Rekapitulasi</span>
        </a>
        <div id="collapseLaporan" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Menu :</h6>
            <a class="collapse-item" href="?page=laporan_suplier">Laporan Rekap Barang Masuk</a>
            <a class="collapse-item" href="?page=laporan_barangmasuk">Laporan Rekap Barang Keluar</a>
            <a class="collapse-item" href="?page=laporan_gudang">Laporan Rekap Belanja</a>
          </div>
        </div>
      </li>
	  
	  
	  
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

		<!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

         

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
			 <div class="top-menu">
        <ul class="nav pull-right top-menu">
		
           <li><a onclick="return confirm('Apakah anda yakin akan logout?')" class="btn btn-danger" class="logout" href="logout.php">Keluar</a></li>
        </ul>
      </div>
             
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
		
		 <section class="content">
	
	
		      <?php
			   $page = $_GET['page'];
			   $aksi = $_GET['aksi'];
			   
			   
			   	if ($page == "pengguna") {
				   if ($aksi == "") {
					   include "page/pengguna/pengguna.php";
				   }
				    if ($aksi == "tambahpengguna") {
					   include "page/pengguna/tambahpengguna.php";
				   }
				    if ($aksi == "ubahpengguna") {
					   include "page/pengguna/ubahpengguna.php";
				   }
				   
				    if ($aksi == "hapuspengguna") {
					   include "page/pengguna/hapuspengguna.php";
				   }
			   }
         if ($page == "belanja") {
          if ($aksi == "") {
            include "page/belanja/belanja.php";
          }
           if ($aksi == "tambahbelanja") {
            include "page/belanja/tambahbelanja.php";
          }
           if ($aksi == "ubahbelanja") {
            include "page/belanja/ubahbelanja.php";
          }
          
           if ($aksi == "hapusbelanja") {
            include "page/belanja/hapusbelanja.php";
          }
          if ($aksi == "detail") {
            include "page/belanja/detail.php";
         }
        }
         if ($page == "rab") {
          if ($aksi == "") {
            include "page/rab/rab.php";
          }
           if ($aksi == "tambahrab") {
            include "page/rab/tambahrab.php";
          }
           if ($aksi == "ubahrab") {
            include "page/rab/ubahrab.php";
          }
           if ($aksi == "hapusrab") {
            include "page/rab/hapusrab.php";
          }
            if ($aksi == "detail") {
            include "page/rab/detail.php";
         }
        }
			   
			   if ($page == "suplier") {
				   if ($aksi == "") {
					   include "page/suplier/suplier.php";
				   }
				    if ($aksi == "tambahsuplier") {
					   include "page/suplier/tambahsuplier.php";
				   }
				    if ($aksi == "ubahsuplier") {
					   include "page/suplier/ubahsuplier.php";
				   }
				   
				    if ($aksi == "hapussuplier") {
					   include "page/suplier/hapussuplier.php";
				   }
			   }
			    
			     if ($page == "unit") {
				   if ($aksi == "") {
					   include "page/unit/unit.php";
				   }
				    if ($aksi == "tambahunit") {
					   include "page/unit/tambahunit.php";
				   }
				    if ($aksi == "ubahunit") {
					   include "page/unit/ubahunit.php";
				   }
				   
				    if ($aksi == "hapusunit") {
					   include "page/unit/hapusunit.php";
				   }
			   }

				   if ($page == "barangmasuk") {
				   if ($aksi == "") {
					   include "page/barangmasuk/barangmasuk.php";
				   }
				    if ($aksi == "tambahbarangmasuk") {
					   include "page/barangmasuk/tambahbarangmasuk.php";
				   }
				    if ($aksi == "ubahbarangmasuk") {
					   include "page/barangmasuk/ubahbarangmasuk.php";
				   }
				   
				    if ($aksi == "hapusbarangmasuk") {
					   include "page/barangmasuk/hapusbarangmasuk.php";
				   }
           if ($aksi == "detail") {
            include "page/barangmasuk/detail.php";
          }
			   }

         if ($page == "detailmasuk") {
           if ($aksi == "") {
             include "page/detailmasuk/detailmasuk.php";
           }
            if ($aksi == "tambahbarangmasuk") {
             include "page/detailmasuk/tambahdmasuk.php";
           }
            if ($aksi == "ubahbarangmasuk") {
             include "page/detailmasuk/ubahdmasuk.php";
           }
           
            if ($aksi == "hapusbarangmasuk") {
             include "page/detailmasuk/hapusdmasuk.php";
           }
         }
				
				   if ($page == "barangkeluar") {
				   if ($aksi == "") {
					   include "page/barangkeluar/barangkeluar.php";
				   }
				    if ($aksi == "tambahbarangkeluar") {
					   include "page/barangkeluar/tambahbarangkeluar.php";
				   }
				    if ($aksi == "ubahbarangkeluar") {
					   include "page/barangkeluar/ubahbarangkeluar.php";
				   }
				   
				    if ($aksi == "hapusbarangkeluar") {
					   include "page/barangkeluar/hapusbarangkeluar.php";
				   }
           if ($aksi == "detail") {
            include "page/barangkeluar/detail.php";
			   }
       }

         
         if ($page == "barang") {
          if ($aksi == "") {
            include "page/barang/barang.php";
          }
           if ($aksi == "tambahbarang") {
            include "page/barang/tambahbarang.php";
          }
           if ($aksi == "ubahbarang") {
            include "page/barang/ubahbarang.php";
          }
          
           if ($aksi == "hapusbarang") {
            include "page/barang/hapusbarang.php";
          }
        }

        if ($page == "laporan_pengguna") {
          if ($aksi == "") {
            include "page/laporan_pengguna/laporan_pengguna.php";
          }
           if ($aksi == "tambahbarang") {
            include "page/barang/tambahbarang.php";
          }
           if ($aksi == "ubahbarang") {
            include "page/barang/ubahbarang.php";
          }
          
           if ($aksi == "hapusbarang") {
            include "page/barang/hapusbarang.php";
          }
        }
        if ($page == "laporan_barang") {
          if ($aksi == "") {
            include "page/laporan_barang/laporan_barang.php";
          }
        
        }
        if ($page == "laporan_unit") {
          if ($aksi == "") {
            include "page/laporan_unit/laporan_unit.php";
          }
        
        }
			      if ($page == "laporan_suplier") {
				   if ($aksi == "") {
					   include "page/laporan/laporan_suplier.php";
				   }
				  }
				    
			     
			   if ($page == "") {
				   include "home3.php";
			   }
			   if ($page == "home3") {
				   include "home3.php";
			   }
			   ?>
    

    </section>

 
</div>
      <!-- End of Main Content -->
  
   <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; <?php echo date('Y', strtotime('+8 HOURS'))?>. Sistem Informasi Pengadaan Barang Langsung</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->
  </div>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->

 <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
  
    <!--script for this page-->
<script>
jQuery(document).ready(function($) {
   $('#cmb_barang').change(function() { // Jika Select Box id provinsi dipilih
     var tamp = $(this).val(); // Ciptakan variabel provinsi
     $.ajax({
            type: 'POST', // Metode pengiriman data menggunakan POST
          url: 'page/barangmasuk/get_barang.php', // File yang akan memproses data
         data: 'tamp=' + tamp, // Data yang akan dikirim ke file pemroses
         success: function(data) { // Jika berhasil
              $('.tampung').html(data); // Berikan hasil ke id kota
            }
           
     
    });
});
});
</script>			

<script>
jQuery(document).ready(function($) {
   $('#cmb_barang').change(function() { // Jika Select Box id provinsi dipilih
     var tamp = $(this).val(); // Ciptakan variabel provinsi
     $.ajax({
            type: 'POST', // Metode pengiriman data menggunakan POST
          url: 'page/barangmasuk/get_satuan.php', // File yang akan memproses data
         data: 'tamp=' + tamp, // Data yang akan dikirim ke file pemroses
         success: function(data) { // Jika berhasil
              $('.tampung1').html(data); // Berikan hasil ke id kota
            }
           
     
    });
});
});
</script> 

<script type="text/javascript">
    jQuery(document).ready(function($){
        $(function(){
    $('#Myform1').submit(function() {
        $.ajax({
            type: 'POST',
            url: 'page/laporan/export_laporan_barangmasuk_excel.php',
            data: $(this).serialize(),
            success: function(data) {
             $(".tampung1").html(data);
             $('.table').DataTable();

            }
        });

        return false;
         e.preventDefault();
        });
    });
});
</script>


 <script type="text/javascript">
    jQuery(document).ready(function($){
        $(function(){
    $('#Myform2').submit(function() {
        $.ajax({
            type: 'POST',
            url: 'page/laporan/export_laporan_barangkeluar_excel.php',
            data: $(this).serialize(),
            success: function(data) {
             $(".tampung2").html(data);
             $('.table').DataTable();

            }
        });

        return false;
         e.preventDefault();
        });
    });
});
</script>

  


  

</body>

</html>
