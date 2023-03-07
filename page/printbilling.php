<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="icon" href="images/hesti.png" type="image/ico" />
<body style="padding: 0 20;">
    <title>RS TK II 02.05.01 dr. AK Gani </title>
    <div>
    <?php
    include   "koneksi.php";
    if(isset($_GET['NOMED_PASIEN']))
        $NOMED_PASIEN=$_GET['NOMED_PASIEN'];
    
    // else {
    //     die ("Tidak Ada Data Yang Dipilih!");    
    //  }
    $query      =mysqli_query($koneksi, "SELECT * FROM billing WHERE NOMED_PASIEN=$NOMED_PASIEN");
    $result     =mysqli_fetch_array($query);
        ?>
      <section class="content">
        <div class="row">
            <div>
                <div class="span12">
                    <table class="table">
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <img src="images/swj.png" class="rounded" width="75px">
        <img src="images/kars.png" class="rounded" width="120px">
        <img src="images/hesti.png" class="rounded" width="100px">
        <h1> RUMAH SAKIT TK II 02.05.01 dr. AK GANI</h1><br>
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
               <strong>No Rekam Medis</strong> <br>
               <strong>Nama Pasien</strong> <br>
               <strong>Tanggal Lahir</strong> <br>
               <strong>Unit</strong> <br>
               <strong>Waktu Kunjungan</strong> <br>
             </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
              <address>
              <strong><?php echo $result['NOMED_PASIEN']?></strong><br>
              <strong><?php echo $result['NAMA_PASIEN']?></strong><br>
              <strong><?php echo $result['TANGGAL_LAHIR']?></strong><br>
              <strong><?php echo $result['NAMA_UNIT']?></strong><br>
              <strong><?php echo $result['WAKTU_KUNJUNGAN']?></strong><br>
              </address>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped">
                <thead>
                <tr>
                  <th>Tindakan</th>
                  <th></th>
                  <th>Kategori Tarif</th>
                  <th>Harga</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $billing = mysqli_query($koneksi, "SELECT NOMED_PASIEN, NAMA_PASIEN, NAMA_TINDAKAN, NAMA_DOKTER, NAMA_KATEGORI_TARIF, TOTAL_BIAYA FROM billing WHERE NOMED_PASIEN=$NOMED_PASIEN");
                    $jumlah = 0;
                    $jumla2 = 0;
                    while($row = mysqli_fetch_array($billing)) { 
                    $jumlah += $row['TOTAL_BIAYA'];
                    ?>
                    <tr>
                    <td><?php echo $row['NAMA_TINDAKAN'];?></td>
                    <td><?php echo $row['NAMA_DOKTER'];?></td>
                    <td><?php echo $row['NAMA_KATEGORI_TARIF'];?></td>
                    <td><?php echo $row['TOTAL_BIAYA'];?></td>
                    </tr>
                    <?php
                    }
                    $jumla2 = $jumlah;
                    ?>
                </tbody>
                <td><strong><h5>Total Biaya</strong></h5></td>
                <td></td>
                <td></td>
                <td colspan="4" class=""> <strong> <span><?php echo $jumla2; ?></span></strong></td><br>
                <tr>
                <td> <strong><h2>Terbilang</h2></strong> </td>
                <td></td>
                <td></td>
                <td colspan="4" class=""> <strong> <h3><span><?php $angka = $jumla2; echo terbilang($angka); "Rupiah " ?></span></strong></h3></td><br>
                </tr>
            </table>
            <?php 
            function penyebut($nilai) {
                $nilai = abs($nilai);
                $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
                $temp = "";
                if ($nilai < 12) {
                    $temp = " ". $huruf[$nilai];
                } else if ($nilai <20) {
                    $temp = penyebut($nilai - 10). " belas";
                } else if ($nilai < 100) {
                    $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
                } else if ($nilai < 200) {
                    $temp = " seratus" . penyebut($nilai - 100);
                } else if ($nilai < 1000) {
                    $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
                } else if ($nilai < 2000) {
                    $temp = " seribu" . penyebut($nilai - 1000);
                } else if ($nilai < 1000000) {
                    $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
                } else if ($nilai < 1000000000) {
                    $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
                } else if ($nilai < 1000000000000) {
                    $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
                } else if ($nilai < 1000000000000000) {
                    $temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
                }     
                return $temp;
            }
            function terbilang($nilai) {
                if($nilai<0) {
                    $hasil = "minus ". trim(penyebut($nilai));
                } else {
                    $hasil = trim(penyebut($nilai));
                }     		
                return $hasil;
            }
        ?>
          </div>
      </section>
    </div>
  </body>
   <script>
      window.print()
  </script>