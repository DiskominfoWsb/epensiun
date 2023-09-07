<div class="clearfix">
<div class="row">
  <div class="col-lg-12">
	
	<div class="navbar navbar-inverse" style="background-color:#3CB371;">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">Daftar Usulan</a>
			</div>
			
		<div class="navbar-collapse collapse navbar-inverse-collapse" style="margin-right: -20px">
			<ul class="nav navbar-nav">
			
			<?php  
				if ($this->session->userdata('admin_idskpd')!='') {
			?>
				<li><a href="<?php echo base_URL(); ?>admin/karis/add" class="btn-info"><i class="icon-plus-sign icon-white"> </i> Buat Usulan</a></li>
				<?php
				}
				?>
				<li><a href="<?=base_URL()?>admin/karis"><i class="icon-share icon-white"></i>Kembali</a></li>
			</ul>
			
			
		</div><!-- /.nav-collapse -->
		</div><!-- /.container -->
	</div><!-- /.navbar -->

  </div>
</div>
		<?php  
			if ($this->session->userdata('admin_level')=='Super Admin'||$this->session->userdata('admin_level')=='Admin_Pens') {
//				$fjenpens1	= $datpiltmp->fjenpens;
//				$fbkd1		= $datpiltmp->fbkd;
		?>
				<form action="<?=base_URL()?>admin/karis/filter" method="post" accept-charset="utf-8" enctype="multipart/form-data">
				<div class="row">
				<div class="col-md-2">
				<div class="form-group">
				<label>STATUS VERIFIKASI</label>
				<select class="form-control" name="fbkd">
				<option>- Pilih -</option>
					<?php
						$l_distribusi	= array('PROSES','BTL','MS','TMS');
						
						for ($i = 0; $i < sizeof($l_distribusi); $i++) {
							if ($l_distribusi[$i] == $fbkd) {
								echo "<option selected value='".$l_distribusi[$i]."'>".$l_distribusi[$i]."</option>";
							} else {
								echo "<option value='".$l_distribusi[$i]."'>".$l_distribusi[$i]."</option>";
							}				
						}
					
					?>	
				</select>
				</div>
				</div> 
<!--  				<div class="col-md-2">
				<div class="form-group">
				<label>Jenis karis</label>
				<select class="form-control" name="fjenpens">
				<option>- Pilih -</option>	
 			 -->
//	<?php
//				$jpen	= $this->db->query("SELECT * FROM a_jenpens")->result();
//				
//				foreach ($jpen as $e) {
//				if ($e->idjenpens == $fjenpens) {
//						echo "<option selected value='".$e->idjenpens."'>".$e->jenpens."</option>";
//				}else{
//						echo "<option value='".$e->idjenpens."'>".$e->jenpens."</option>";
//					}				
//				}
			
//			?>	 -->			 
<!-- 			</select>
			</div>
			</div>
-->		
			<div class="col-md-1">
			<button type="submit" class="btn btn-success">Set</button>
			</div>
			</div>
		</form> 
		<?php 
		}
		?>	
<!--	
<div class="alert alert-dismissable alert-success">
  <button type="button" class="close" data-dismiss="alert">x</button>
  <strong>Well done!</strong> You successfully read <a href="http://bootswatch.com/amelia/#" class="alert-link">this important alert message</a>.
</div>
	
<div class="alert alert-dismissable alert-danger">
  <button type="button" class="close" data-dismiss="alert">x</button>
  <strong>Oh snap!</strong> <a href="http://bootswatch.com/amelia/#" class="alert-link">Change a few things up</a> and try submitting again.
</div>	
-->

<table id="example" class="table table-bordered table-hover">
	<thead>
	
		<tr>
			<th align="center" rowspan="2" width="2%">No. </th>
			<th rowspan="2"  width="4%">Nomor Surat<br>Tgl. Surat</th>
			<th rowspan="2"  width="6%">Nama Pegawai<br>NIP<br>Pangkat/Golongan </th>
			<th rowspan="2"  width="12%">Jabatan<br>Unit Kerja</th>
			<th colspan="4" width="6%">Status Usulan</th>
			<th  rowspan="2" width="6%">Keterangan</th>
			<th  rowspan="2" width="6%">Aksi</th>
		</tr>
		<tr>
			<th width="6%">BKD</th>
			<th width="6%">PERTEK</th>
			<th width="6%">SK</th>
		</tr>
	</thead>
	
	<tbody>
		<?php 
		if (empty($data2)) {
			?>
			<tr><td></td><td></td><td></td><td style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
			<?php
		} else {
			$no 	= ($this->uri->segment(4) + 1);
			foreach ($data2 as $b) {
			$bkd	= $b->bkd;
			$status	= $b->status;
		?>
		<tr>
			<td><?php echo $no;?></td>
			<td><?php echo $b->no_surat."<br>". $b->tgl_surat;?></td>
			<td><?php echo $b->nama."<br>". $b->nip."<br>". $b->pangkat."-".$b->golru;?></td>
			<td><?php echo $b->jabatan."<br>". $b->unit_kerja;?></td>
			<td><b><?php echo $b->bkd;?></b></td>
			<td><b><?php echo $b->pertek;?></b></td>
			<td><?php echo "<b>".$b->s_sk."</b><br>";
						
					?>
			</td>
			<td><?php echo $b->keterangan;?></td>
						
			<td class="ctr">
				<?php  
				if ($this->session->userdata('admin_level')=='Super Admin'||$this->session->userdata('admin_level')=='Admin_Pens') {
				?>
				<div class="btn-group">
					<a href="<?=base_URL()?>admin/karis/edt/<?=$b->id?>" class="btn btn-warning btn-sm" title="Edit Data"><i class="icon-edit icon-white"> </i>    Edt  </a>
					<br><a href="<?=base_URL()?>admin/karis/del/<?=$b->id?>" class="btn btn-danger btn-sm" title="Hapus Data" onclick="return confirm('Anda Yakin..?')"><i class="icon-trash icon-remove">  </i> Del</a>	
					<br><a href="<?=base_URL()?>admin/karis/dokumen/<?=$b->id?>" class="btn btn-warning btn-sm" title="dokumen">    Upload  </a>
					<br><a href="<?=base_URL()?>admin/karis/kirim/<?=$b->id?>" class="btn btn-success btn-sm"  title="Kirim Usulan"onclick="return confirm('Anda Yakin..?')"> Kirim</a>
					<br><a href="<?=base_URL()?>admin/karis/ver/<?=$b->id?>" class="btn-info btn-sm" title="Verifikasi">  Verifikasi</a>
				
				<?php 
				} else if($this->session->userdata('admin_level')=='OPD'){
					
					if($status=='0'){
					?>
					<a href="<?=base_URL()?>admin/karis/edt/<?=$b->id?>" class="btn btn-warning btn-sm" title="Edit Data"><i class="icon-edit icon-white"> </i>    Edt  </a>
					<br><a href="<?=base_URL()?>admin/karis/del/<?=$b->id?>" class="btn btn-danger btn-sm" title="Hapus Data" onclick="return confirm('Anda Yakin..?')"><i class="icon-trash icon-remove">  </i> Del</a>	
					<br><a href="<?=base_URL()?>admin/karis/dokumen/<?=$b->id?>" class="btn btn-warning btn-sm" title="dokumen">    Upload  </a>
					<br><a href="<?=base_URL()?>admin/karis/kirim/<?=$b->id?>" class="btn btn-success btn-sm"  title="Kirim Usulan"onclick="return confirm('Anda Yakin..?')"> K i r i m</a>
			
			<?php
					
					}elseif($bkd=='PROSES' || $bkd=='BTL'){
						?>
					<a href="<?=base_URL()?>admin/karis/edt/<?=$b->id?>" class="btn btn-info" title="Edit"> Edit</a>					
					
					<?php
					}
					
				}else{
					
				?>	
					<a href="<?=base_URL()?>admin/karis/ver/<?=$b->id?>" class="btn-info" title="Verifikasi">  Verifikasi</a>
				</div>	

				<?php 
				
				}
				?>
				
			</td>
		</tr>
		<?php 
			$no++;
			}
		}

 ?>		
		
	</tbody>
</table>

</div>
