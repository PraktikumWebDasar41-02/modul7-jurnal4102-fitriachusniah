<!DOCTYPE html>
<html>
<head>
	<title>Tampil Data
	</title>
</head>
<body style="font-family: consolas">
	<center>
		<br><br><br>
		<h3>TABEL MAHASISWA</h3>

</body>
</html>
<?php
include "koneksi.php";
echo "<table border='1'>";
      echo "<tr><td colspan='9'><a href='2_input.php'>INPUT DATA</a></td></tr>";
        echo "<tr><td colspan='9'>
        	<form action='1_tampil.php' method='post'>
        		<input type='text' name='cari_nama' placeholder='Cari Berdasarkan NIM'>
        		<input type='submit' name='cari' value='Cari'>
        	</form>
        </td></tr>";
      echo "<th>NIM</th>
      		<th>Nama</th>
      		<th>Tgl Lahir</th>
      		<th>Jenis Kel</th>
      		<th>Prodi</th>
      		<th>Fakultas</th>
      		<th>Asal</th>
      		<th>Alamat</th>
      		<th>Aksi</th>

      ";

if(isset($_POST['cari'])){
	$cari = $_POST['cari_nama'];
	 $sql = "SELECT * FROM mahasiswa WHERE NIM LIKE '%$cari%'";
	  

}else{
	 $sql = "SELECT * FROM mahasiswa";

	}
	   $result = $con->query($sql);

	      if ($result->num_rows > 0) {
      
      
        while($row = $result->fetch_assoc()) {

        echo "<tr>";
       	echo "<td>".$row['NIM']."</td>";
		echo "<td>".$row['Nama']."</td>";
		echo "<td>".$row['Tgl_Lahir']."</td>";
		echo "<td>".$row['Jk']."</td>";
		echo "<td>".$row['Prodi']."</td>";
		echo "<td>".$row['Fakultas']."</td>";
		echo "<td>".$row['Asal']."</td>";
		echo "<td>".$row['Motto']."</td>";
            	 echo "<td><a href='4_delete.php?id=".$row['NIM']."'>Delete</td>";
        echo "</tr>";   
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    $con->close();

?>
</center>