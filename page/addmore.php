<?php  
//koneksi database
 $connect = mysqli_connect("localhost", "root", "", "saveus");
//menghitung jumlah input 
 $number = count($_POST["NAMA_OBAT"]);  
 if($number > 0)  
 {  
      for($i=0; $i<$number; $i++)  
      {  
           if(trim($_POST["NAMA_OBAT"][$i] != ''))  
           {  
                $sql = "INSERT INTO resep(name,nilai) VALUES('".mysqli_real_escape_string($connect, $_POST["NAMA_OBAT"][$i])."','".$_POST['nilai'][$i]."')";  
                mysqli_query($connect, $sql);  
           }  
      }  
      //jika berhasil input
      echo "Data Inserted";  
 }  
 else 
 {  
      //jika tidak berhasil
      echo "Please Enter Name";  
 }  
 ?>