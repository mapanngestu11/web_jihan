<html>
<head>
	<title>Data Laporan Absen</title>
</head>
<body>
	


	<style type="text/css">
		.logo{
			height: 80px;
			padding-left: 200px;
		}
		.judul{
			padding-left: 136px;
		}



	</style>


	<div class="container">
		<table width="100%" style="border: none !important   border-collapse: collapse;;">
			<tr>
				<td width="30%" align="center"><img src="<?php echo base_url()."assets/admin/"; ?>dist/img/AdminLTELogo.png" width="60%"></td>
				<td width="70%" align="center">
					<center>
						<h1>Laporan Absen SMAN MUHAMMADIYAH 2</h1>
					</center>
					<center>
						<h2><br>KOTA TANGERANG</h2>
					</center>
				</td>
				<!-- <td width="25" align="center"><img src="Logo DN.jpg" width="100%"></td> -->
			</tr>
		</table>
	</div>
	<hr>
	<style type="text/css">
		.tanggal{
			text-align: right;
			margin-right: 30px;
		}

		.table-isi {
			font-family: arial, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		.td-isi, .th-isi {
			border: 1px solid #dddddd;
			text-align: left;
			padding: 8px;
		}

		.tr-isi:nth-child(even) {
			background-color: #dddddd;
		}

		.table_info{
			margin-bottom: 20px;
			font-size: 16px;
		}



	</style>
	<p class="tanggal">Tangerang, <?php echo date('d-M-Y');?> </p>
	<center>
		<h3> Data Absen Siswa </h3>
	</center>


	<table class="table-isi">
		<tr class="tr-isi">
			<th class="th-isi">No.</th>
			<th class="th-isi">Nisn.</th>
			<th class="th-isi">Nama Lengkap</th>
			<th class="th-isi">Kelas</th>
			<th class="th-isi">Keterangan</th>
			<th class="th-isi">Jam Absen</th>
			<th class="th-isi">Tanggal</th>

		</tr>
		<?php 
		$no = 0 ;
		foreach ($data_laporan->result_array() as $row) :
			$no++;

			$nisn     = $row['nisn'];
			$nama_siswa     = $row['nama_siswa'];
			$kelas     = $row['kelas'];
			$keterangan = $row['keterangan'];  			
			$jam_absen = $row['jam_absen'];
			$waktu = $row['waktu'];

			?>
			<tr class="tr-isi">
				<td class="td-isi"><?php echo $no;?></td>
				<td class="td-isi"><?php echo $nisn;?></td>
				<td class="td-isi"><?php echo $nama_siswa;?></td>
				<td class="td-isi"><?php echo $kelas;?></td>
				<td class="td-isi"><?php echo $keterangan;?></td>
				<td class="td-isi"><?php echo $jam_absen;?></td>
				<td class="td-isi"><?php echo $waktu; ?></td>
			</tr>
		<?php endforeach;?>
	</table>
	<script type="text/javascript">
		window.print();
	</script>


</body>
</html>