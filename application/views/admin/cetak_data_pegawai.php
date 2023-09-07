<html>
<head>
<style type="text/css" media="print">
	table {border: solid 1px #000; border-collapse: collapse; width: 100%}
	tr { border: solid 1px #000; page-break-inside: avoid;}
	td { border: solid 1px #000; padding: 7px 5px; font-size: 10px}
	th {
		font-family:Arial;
		color:black;
		font-size: 11px;
		background-color:lightgrey;
	}
	thead {
		display:table-header-group;
	}
	tbody {
		display:table-row-group;
	}
	h3 { margin-bottom: -17px }
	h2 { margin-bottom: 0px }
</style>
<style type="text/css" media="screen">
	table {border: solid 1px #000; border-collapse: collapse; width: 100%}
	tr { border: solid 1px #000}
	th {
		font-family:Arial;
		color:black;
		font-size: 11px;
		background-color: #999;
		padding: 8px 0;
	}
	td { border: solid 1px #000; padding: 7px 5px;font-size: 10px}
	h3 { margin-bottom: -17px }
	h2 { margin-bottom: 0px }
</style>
<title>Cetak Data Pegawai</title>
</head>

<body onload="window.print()">
	<center><b style="font-size: 20px">DATA PEGAWAI
	<?php
	$idskpd	= $this->session->userdata('admin_idskpd');
	$skpd	= $this->session->userdata('admin_skpd');
	if($idskpd!=''){
		echo	"<br>".strtoupper($skpd);
	}
		echo	"<br>KABUPATEN WONOSOBO";
		
?>	
	</b>
	</center><br>
	
	<table>
<thead>
	
		<tr>
			<th rowspan="2" width="3%" style="text-align:center">No. </th>
			<!-- <th width="3%">Tahun</th> -->
			<th rowspan="2"width="14%">Nama Pegawai</br>NIP</br>TTL </th>
			<th rowspan="2"width="12%">Pangkat<br>Golongan </th>
			<th rowspan="2"width="16%">Jabatan</th>
			<th rowspan="2"width="16%">Unit Kerja</th>
			<th colspan="2"width="12%">Pendidikan </th>
			<tr>
			<th>Jenjang</th>
			<th>Jurusan</th>
		</tr>
		</tr>
	
	</thead>
		<tbody>
			<?php 
			if (!empty($data)) {
				$no = 0;
				foreach ($data as $d) {
					$no++;
			?>
			<tr>
			<td><?php echo $no;?></td>
			<td><?php echo $b->nama."<br>". $b->nip."<br>". $b->ttl;?></td>
			<td><?php echo $b->pangkat."<br>". $b->golru;?></td>
			<td><?php echo $b->jabatan;?></td>
			<td><?php echo $b->unit_kerja;?></td>
			<td><?php echo $b->pendid;?></td>
			<td><?php echo $b->jurusan;?></td>
	
		</tr>
			<?php 
				}
			} else {
				echo "<tr><td style='text-align: center' colspan='9'>Tidak ada data</td></tr>";
			}
			?>
		</tbody>
	</table>
	<!-- <a href='toExcelAll'><span style='color:green;'>Export All Data</span></a> -->
</body>
</html>

