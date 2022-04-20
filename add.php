<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$nama_produk = mysqli_real_escape_string($mysqli, $_POST['nama_produk']);
	$keterangan = mysqli_real_escape_string($mysqli, $_POST['keterangan']);
	$harga = mysqli_real_escape_string($mysqli, $_POST['harga']);
	$jumlah = mysqli_real_escape_string($mysqli, $_POST['jumlah']);
		
	// checking empty fields
	if(empty($nama_produk) || empty($keterangan) || empty($harga) || empty($jumlah)) {
				
		if(empty($nama_produk)) {
			echo "<font color='red'>Nama produk field is empty.</font><br/>";
		}
		
		if(empty($keterangan)) {
			echo "<font color='red'>Keterangan field is empty.</font><br/>";
		}
		
		if(empty($harga)) {
			echo "<font color='red'>Harga field is empty.</font><br/>";
		}

		if(empty($jumlah)) {
			echo "<font color='red'>Jumlah field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO produk(nama_produk,keterangan,harga,jumlah) VALUES('$nama_produk','$keterangan','$harga','$jumlah')");
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
