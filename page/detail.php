<?php
    include   "koneksi.php";
    if(isset($_GET['NOMED_PASIEN'])){
        $NOMED_PASIEN=$_GET['NOMED_PASIEN'];
    }
    else {
        die ("Tidak Ada Data Yang Dipilih!");    
    }
    $query      =mysqli_query($koneksi, "SELECT * FROM billing WHERE NOMED_PASIEN=$NOMED_PASIEN");
    $result     =mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/hesti.png" type="image/ico" />
    <title>RS TK II 02.05.01 dr. AK Gani </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    
    <!-- Custom styling plus plugins -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-hospital-o"></i> <span>Helo Users</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/hesti.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>RS TK II 02.05.01 </span>
                <h2>dr. AK Gani</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="obat.php"><i class="fa fa-table"></i> Billing </a>
                    <ul class="nav child_menu">
                      <!-- <li><a href="tables.html">Tables</a></li> -->
                      <!-- <li><a href="tables_dynamic.html">Table Billing</a></li> -->
                    </ul>
                  </li>
                </ul>
              </div>
              
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      <img src="images/hesti.png" alt="">Users
                    </a>
                  </li>
                  <li role="presentation" class="nav-item dropdown open">
                    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                    </ul>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h4>HANYA INPUTAN BILLING OBAT TANGGAL 25 - 31 JANUARI 2023</h4>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>INPUT BILLING OBAT <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <!-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li> -->
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <section class="content invoice">
                      <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                          <address>
                                          <strong>No Rekam Medis</strong> <br>
                                          <strong>Nama Pasien</strong> <br>
                                          <strong>Tanggal Lahir</strong> <br>
                                          <strong>Unit</strong> <br>
                                          <strong>Waktu Kunjungan</strong> <br>
                                          <strong>DPJP</strong>
                                          
                                      </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                        <strong><?php echo $result['NOMED_PASIEN']?></strong><br>
                        <strong><?php echo $result['NAMA_PASIEN']?></strong><br>
                        <strong><?php echo $result['TANGGAL_LAHIR']?></strong><br>
                        <strong><?php echo $result['NAMA_UNIT']?></strong><br>
                        <strong><?php echo $result['WAKTU_KUNJUNGAN']?></strong><br>
                        <strong><?php echo $result['NAMA_DOKTER']?></strong><br>                   
                        </div>
                      </div>
                      <!-- /.row -->

                      <!-- Table row -->
                      <div class="row">
                        <div class="  table">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>Nama Tindakan</th>
                                <th>DPJP</th>
                                <th>Kategori Tarif</th>
                                <th>Biaya</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $billing = mysqli_query($koneksi, "SELECT NAMA_TINDAKAN, NAMA_DOKTER, NAMA_KATEGORI_TARIF, TOTAL_BIAYA FROM billing WHERE NOMED_PASIEN=$NOMED_PASIEN");
                              while($row = mysqli_fetch_array($billing)) { 
                              ?>
                              <tr>
                              <td><?php echo $row['NAMA_TINDAKAN'];?></td>
                              <td><?php echo $row['NAMA_DOKTER'];?></td>
                              <td><?php echo $row['NAMA_KATEGORI_TARIF'];?></td>
                              <td><?php echo $row['TOTAL_BIAYA'];?></td>
                              </tr>
                              <?php 
                              }
                              ?>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <div class="row">
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <!-- this row will not appear when printing -->
                      <div class="row no-print">
                        <div class=" ">
                          <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                          <a href="inputobat.php?NOMED_PASIEN=<?php echo $result['NOMED_PASIEN'];?>">
                          <button class="btn btn-success pull-right"><i class="fa fa-data"></i> Obat </button>
                          <a href="printbilling.php?NOMED_PASIEN=<?php echo $result['NOMED_PASIEN'];?>" target="blank">
                          <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i>  PDF </button>
                        </div>
                      </div>
                    </section>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>