<?php
include 'koneksi.php';

$angka1 = "1";
$angka2 = "2";
$angka3 = "3";
$angka4 = "4";
$angka5 = "5";
$angka6 = "6";
$jumlahKemunculan1 = 0;
$jumlahKemunculan2 = 0;
$jumlahKemunculan3 = 0;
$jumlahKemunculan4 = 0;
$jumlahKemunculan5 = 0;
$jumlahKemunculan6 = 0;
$jumlahKemunculant = 0;


$sql = "SELECT * FROM daftar";
$result = $con->query($sql);

$sql2 = "SELECT nomor, COUNT(*) AS kemunculan FROM daftar GROUP BY nomor ORDER BY kemunculan DESC LIMIT 1";
$result2 = $con->query($sql2);

if ($result->num_rows > 0) {
    // Output data setiap baris
    while ($row = $result->fetch_assoc()) {
        if ($row["nomor"] == $angka1) {
            $jumlahKemunculan1++;
        }
        if ($row["nomor"] == $angka2) {
            $jumlahKemunculan2++;
        }
        if ($row["nomor"] == $angka3) {
            $jumlahKemunculan3++;
        }
        if ($row["nomor"] == $angka4) {
            $jumlahKemunculan4++;
        }
        if ($row["nomor"] == $angka5) {
            $jumlahKemunculan5++;
        }
        if ($row["nomor"] == $angka6) {
            $jumlahKemunculan6++;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
    <style>
      

    </style>
</head>
<body>
    
    <section>
        <!--for demo wrap-->
  <div class="tbl-header">
      <table cellpadding="0" cellspacing="0" border="0">
          <thead>
              <tr>
                  <th>dadu</th>
                  <th>1</th>
                  <th>2</th>
                  <th>3</th>
                  <th>4</th>
                  <th>5</th>
                  <th>6</th>
                  <th>t</th>
                </tr>
              <tr>
            </thead>
        </table>
    </div>
    <div class="tbl-content">
        <table cellpadding="0" cellspacing="0" border="0">
            <tbody>
          <?php

$angka = array("1", "2", "3", "4", "5", "6");
$jumlahKemunculan = array_fill(0, 6, 0); // Inisialisasi array jumlah kemunculan

$putaran = 1;// Hitungan putaran dimulai dari 1
$nomor1 =1 ; 

$sql1 = "SELECT * FROM daftar";
$result1 = $con->query($sql1);

if ($result1->num_rows > 0) {
    // Output data setiap baris
    while ($row = $result1->fetch_assoc()) {
        $nomor = $row["nomor"];


        // Menghitung kemunculan angka
        foreach ($angka as $index => $angkaValue) {
            if ($nomor == $angkaValue) {
                $jumlahKemunculan[$index]++;
            }
        }
        if ($putaran % 30 == 0) {
            $maxOccurrences = max($jumlahKemunculan);
            $mostFrequentIndex = array_search($maxOccurrences, $jumlahKemunculan);
            $mostFrequentNumber = $angka[$mostFrequentIndex];

            ?>
            <tr>
                <td><?php echo $nomor1; ?></td>
                <?php foreach ($jumlahKemunculan as $jumlah) {
                 echo '<td>'."$jumlah".'</td>';
                }
                $nomor1 ++;
                
                echo "<td> $mostFrequentNumber</td>";
                ?>
            </tr>
            <?php    
            
             
             // Reset jumlah kemunculan
             $jumlahKemunculan = array_fill(0, 6, 0);
         }
 
         $putaran++;
        }
 } else {
     echo "Tidak ada data yang ditemukan.";
 }
                ?>
                
              
    </tbody>
</table>
</div>
<div class="tbl-header">
      <table cellpadding="0" cellspacing="0" border="0">
          <thead>
              <tr>
                  <th>All</th>
<?php 
        echo "<th>" .$jumlahKemunculan1."</th>";
        echo "<th>" .$jumlahKemunculan2."</th>";
        echo "<th>" .$jumlahKemunculan3."</th>";
        echo "<th>" .$jumlahKemunculan4."</th>";
        echo "<th>" .$jumlahKemunculan5."</th>";
        echo "<th>" .$jumlahKemunculan6."</th>";

        if ($result2->num_rows > 0) {
            $row = $result2->fetch_assoc();
            $mostFrequentNumber = $row["nomor"];
            $maxOccurrences = $row["kemunculan"];
        echo "<th> $mostFrequentNumber </th>";
    }
    } else {
        echo "Tidak ada data yang ditemukan.";
    }
?>
                </tr>
            </thead>
        </table>
    </div>
</section>
<div class="input">
    <form action="proses.php" method="post">
        <div class="l">
    <div class="logo"><h1>Masukan data : </h1></div>
    <input type="text" name="dadu1" class="e">
    <input type="text" name="dadu2" class="e">
    <input type="text" name="dadu3" class="e">
    <input type="submit" name="submit" class="s">
    </div>
        
    </form>
</div>
<?php include 'navbawah.php'?>


<script>// '.tbl-content' consumed little space for vertical scrollbar, scrollbar width depend on browser/os/platfrom. Here calculate the scollbar width .
$(window).on("load resize ", function() {
  var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
  $('.tbl-header').css({'padding-right':scrollWidth});
}).resize();</script>

</body>
</html>