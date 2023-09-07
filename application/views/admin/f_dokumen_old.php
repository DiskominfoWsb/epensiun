<div class="navbar navbar-inverse"style="background-color:#3CB371;">
	<div class="container">
		<div class="navbar-header">
			<span class="navbar-brand" href="#">Upload Berkas Pensiun</span>
		</div>
	</div><!-- /.container -->
</div><!-- /.navbar -->


<?php

	$idp			= $datpil->id;
	$nip			= $datpil->nip; 
	$nama			= $datpil->nama; 
	$jabatan		= $datpil->jabatan; 
	$skpd			= $datpil->skpd; 
	$jenpens		= $datpil->jenpens;
	$golpens		= $datpil->golpens;
	$gol			= $datpil->gol;	
	$pendid			= $datpil->pendid;



	
	

	echo $this->session->flashdata("k");
	

		if($golpens > '42'){
		$klas	="docu";
		if($jenpens	=='2'){
				$doc	= '5';
			}else{
				$doc	= '4';
			}
		}else{
		$klas	="semar";
		if($jenpens	=="2"){
				$doc	= '64';
			}else{
				$doc	= '63';
			}
		}
		
	 $jfiles		= $this->db->query("select * from t_file where nip='$nip' and id_doc='$doc'")->row();
		$jfile=json_decode(json_encode($jfiles), True);
		if(isset($jfiles)){

			$idc = isset($jfile['id_doc'])?$jfile['id_doc']:'';	
			$n_file = isset($jfile['path'])?$jfile['path']:'';
			$tahun = isset($jfile['tahun'])?$jfile['tahun']:'';
		}	
		
	
	?>

	
	
	<div class="row-fluid well" style="overflow: hidden">
	
	<div class="col-lg-6">
		<table>
		<tr><td width="150%">Nama Pegawai</td><td><b><input type="text" name="nama" required value="<?php echo $nama; ?>" id="nama" style="width: 300px" readonly class="form-control"></b></td></tr>
		<tr><td width="150%">N I P</td><td><b><input type="text" name="nip" required value="<?php echo $nip; ?>" id="nip" style="width: 300px" readonly class="form-control">
		</table>
	</div>
	
	
<div class="col-lg-10">	

		
	<table  class="table-form">
	
<?php


	$pen="";	
	switch($jenpens){
		case "1" :
			$pen="bup";
			break;
		case "2" :
			$pen="jandud";
			break;
		case "3" :
			$pen="aps";
			break;
		case "4" :
			$pen="uzur";
			break;
		case "5" :
			$pen="pdh";
			break;
	}

		if($golpens > '42'){
		$klas	="docu";
		}else{
		$klas	="semar";
		}
		
		
		
		
		
		
		$jpen		= $this->db->query("select * from a_docu where (klas='".$klas."' or klas='') and ".$pen."='1' order by urut")->result();
		
		
				foreach ($jpen as $e) {
				$kd_file	= $e->kode;
				$nama_file	= $e->nama_dok;
				$id_doc		= $e->id;
				$k_file		= $kd_file;

		?>
				<form action="<?=base_URL()?>admin/pensiun/act_upload" method="post" accept-charset="utf-8" enctype="multipart/form-data">
				
					<tr><td width="30%"><?php echo $nama_file; ?> </td><td><b><input type="file" name="<?php echo $kd_file; ?>" class="form-control" style="width: 200px"></b></td>
	<?php
        $jfiles		= $this->db->query("select * from t_file where nip='".$nip."' and id_doc='".$id_doc."'")->row();
		$jfile=json_decode(json_encode($jfiles), True);
		if(isset($jfiles)){

			$idc = isset($jfile['id_doc'])?$jfile['id_doc']:'';	
			$n_file = isset($jfile['nama_file'])?$jfile['nama_file']:'';
			$tahun = isset($jfile['tahun'])?$jfile['tahun']:'';
			$path = isset($jfile['path'])?$jfile['path']:'';
		}
		
		if($id_doc == '35' || $id_doc == '44' || $id_doc == '46' || $id_doc == '49' || $id_doc == '51' || $id_doc == '52' || $id_doc == '53'|| $id_doc == '61'){
		
		?>
		<td width="1%">Tahun :</td><td><select name="tahun" class="form-control" style="width: 150px" required><option value="<?php echo $tahun;?>"> - Tahun - </option>
			<?php
				
				for ($i =1980;$i<=2050;$i++) {
					
					if ($tahun == $i) {
						echo "<option selected value='".$i."'>".$i."</option>";
					} else {
						echo "<option value='".$i."'>".$i."</option>";
					}				
				}
			
			?>			
			</select>
		</td>
		<?php
		}
	?>	
		</td>
		<input type="hidden" name="idp" value="<?php echo $idp; ?>">
		<input type="hidden" name="nip" value="<?php echo $nip; ?>">
		<input type="hidden" name="klas" value="<?php echo $klas; ?>">
		<input type="hidden" name="pen" value="<?php echo $pen; ?>">
		<input type="hidden" name="id_doc" value="<?php echo $id_doc; ?>">
		<input type="hidden" name="gol" value="<?php echo $gol; ?>">
		<input type="hidden" name="pendid" value="<?php echo $pendid; ?>">
		<input type="hidden" name="k_file" value="<?php echo $k_file; ?>">
	
	
	<td><button type="submit" class="btn btn-info">Upload</button></td><td width='2%'></td>
	
		<?php
		
		if($idc == $id_doc && $idc != ''){	
				echo "<td>File : <i><a href='".base_URL()."upload/pensiun/".$nip."/".$n_file."' target='_blank' class='btn btn-success active' role='button' aria-pressed='true'>Cek File</a></div>";

			}
	?>
	
		
			</tr>
			</form>
			<?php
			}
			
			?>
		<tr><td colspan="2">

	<form action="<?=base_URL()?>admin/pensiun/download" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	<input type="hidden" name="nip" value="<?php echo $nip; ?>">
	<button type="submit" class="btn btn-info">Download</button>
		<a href="<?=base_URL()?>admin/pensiun" class="btn btn-success">Kembali</a>
		</td></tr>
		
		</table>	
	</div>

	</div>
	<div class="container" align="center">
		<img src="upload/tahapan_epens.jpg" width="200px"/>
	</div>
	
