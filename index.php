<?php
	include 'koneksi.php';

	if(isset($_POST['submit'])){

		// ambil 1 id terbesar di kolom id_pendaftaran, lalu ambil 5 karakter saja dari sebelah kanan 
		$getMaxId = mysqli_query($conn, "SELECT MAX(RIGHT(id_pendaftaran, 5)) AS id FROM tb_pendaftaran");
		$d = mysqli_fetch_object($getMaxId);
		$generateId = 'P'.date('Y').sprintf("%05s", $d->id + 1);
		
		//proses insert
		$insert = mysqli_query($conn, "INSERT INTO tb_pendaftaran VALUES(
				'".$generateId."',
				'".date('y-m-d')."',
				'".$_POST['th_ajaran']."',
				'".$_POST['jurusan']."',
				'".$_POST['nm']."',
				'".$_POST['tmp_lahir']."',
				'".$_POST['tgl_lahir']."',
				'".$_POST['jk']."',
				'".$_POST['agama']."',
				'".$_POST['almt_peserta']."'
			)");

		if($insert){
			echo '<script>window.location="berhasil.php?id='.$generateId.'"</script>';
		}else{
			echo 'huh'.mysql_error($conn);
		}

	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PSB Online</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Zilla+Slab&display=swap" rel="stylesheet">
	<style type="text/css">
	body {
	background-color: #FFFFFF;
	background-image: url(../../../Users/hp/Downloads/LOGO%20SMA.png);
}
    </style>
</head>
<body>
  
<!-- bagian box formulir -->
<section class="box-formulir">

		<h2> Formulir Pendaftaran Siswa Baru SMA Santo Yosep</h2>

		<!-- bagian form -->
		<form action="" method="post">
			
		  <div class="box">
			<table border="0" class="table-form">
					<tr>
						<td>Tahun Ajaran</td>
						<td>:</td>
						<td>
							<input type="text" name="th_ajaran" class="input-control" value="2022/2023" readonly>
						</td>
					</tr>
					<tr>
						<td>Jurusan</td>
						<td>:</td>
						<td>
							<select class="input-control" name="jurusan"> 
								<option value="IPA">IPA</option>
								<option value="IPS">IPS</option>
							</select>
						</td>
					</tr>
			  </table>
			</div>

			<h3>Data Diri Calon Siswa</h3>
						<div class="box">
				<table>
					<tr>
						<td width="388">Nama Lengkap</td>
						<td width="10">:</td>
					  <td width="924" bgcolor="#FFFFFF">
							<input type="text" name="nm" class="input-control">
						</td>
					</tr>
					<tr>
						<td>Tempat Lahir</td>
						<td>:</td>
						<td>
							<input type="text" name="tmp_lahir" class="input-control">
						</td>
					</tr>
					<tr>
						<td>Tanggal Lahir</td>
						<td>:</td>
						<td>
							<input type="date" name="tgl_lahir" class="input-control">
						</td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td>:</td>
						<td>
							<input type="radio" name="jk" class="input-control" value="Laki-laki"> Laki-laki &nbsp;&nbsp;&nbsp;
							<input type="radio" name="jk" class="input-control" value="Perempuan"> Perempuan
						</td>
					</tr>
					<tr>
						<td>Agama</td>
						<td>:</td>
						<td>
							<select class="input-control" name="agama">
								<option value="">--pilih--</option>
								<option value="Islam">Islam</option>
								<option value="katholik">Katholik</option>
							  	<option value="Kristen">Kristen</option>
								<option value="Buddha">Budha</option>
								<option value="Hindu">Hindu</option>
								<option value="Khonghucu">Khonghucu</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Alamat Peserta</td>
						<td>:</td>
						<td>
							<textarea class="input-control" name="almt_peserta"></textarea>
						</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td> 
							<input type="submit" name="submit" class="btn-daftar" value="Daftar Sekarang">
						</td>
					</tr>
				</table>
			</div>

		</form>

	</section>

</body>
</html>


							