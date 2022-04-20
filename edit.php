<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	
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
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE produk SET nama_produk='$nama_produk',keterangan='$keterangan',harga='$harga',jumlah='$jumlah' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM produk WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$nama_produk = $res['nama_produk'];
	$keterangan = $res['keterangan'];
	$harga = $res['harga'];
	$jumlah = $res['jumlah'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Nama Produk</td>
				<td><input type="text" name="nama_produk" value="<?php echo $nama_produk;?>"></td>
			</tr>
			<tr> 
				<td>Keterangan</td>
				<td><input type="text" name="keterangan" value="<?php echo $keterangan;?>"></td>
			</tr>
			<tr> 
				<td>Harga</td>
				<td><input type="text" name="harga" value="<?php echo $harga;?>"></td>
			</tr>
			<tr> 
				<td>Jumlah</td>
				<td><input type="text" name="jumlah" value="<?php echo $jumlah;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
