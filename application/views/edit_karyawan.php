<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title ?></title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="#">Human Resources Information System PTPN V</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
			aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
		<li class="nav-item">
        <a class="nav-link" href="<?php echo base_url() ?>Home">Home</a>
      </li>
		<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Karyawan
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo base_url() ?>karyawan">Data Pribadi</a>
          <a class="dropdown-item" href="<?php echo base_url() ?>jenjangpendidikan">Pendidikan Formal</a>
          <a class="dropdown-item" href="<?php echo base_url() ?>riwayatjabatan">Riwayat Jabatan</a>
          <a class="dropdown-item" href="<?php echo base_url() ?>riwayatgolongan">Riwayat Golongan</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Data Umum
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo base_url() ?>kursusumum">Kursus Umum</a>
          <a class="dropdown-item" href="<?php echo base_url() ?>rewards">Rewards/Punisment</a>
          <a class="dropdown-item" href="<?php echo base_url() ?>batih">Batih</a>
          <a class="dropdown-item" href="<?php echo base_url() ?>pengalamanorganisasi">Pengalaman Organisasi</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="<?php echo base_url() ?>home/library" tabindex="-1">Panduan</a>
			</li>
			<li class="nav-item">
        <a class="nav-link disabled" href="<?php echo base_url() ?>login" tabindex="-1">Logout</a>
      </li>
    </ul>
			<ul class="nav navbar-nav navbar-right">
				<img src="assets/img/logo.png" width="80px" style="padding: 20px;">
				<a class="nav-link disabled" href="<?php echo base_url() ?>home/" tabindex="-1"></a>
				</img>
			</ul>
		</div>
	</nav>

    <div class="container" style="margin-top: 80px">
        <div class="col-md-12">
            <?php echo form_open('karyawan/update') ?>

              <div class="form-group">
                <label for="text">No ISBN</label>
                <input type="text" name="karyawan_id" value="<?php echo $data_karyawan->karyawan_id ?>" class="form-control" placeholder="Masukkan No. Karyawan">
                <input type="hidden" value="<?php echo $data_karyawan->karyawan_id ?>" name="karyawan_id">
              </div>

              <div class="form-group">
                <label for="text">Nama Karyawan</label>
                <input type="text" name="karyawan_nama" value="<?php echo $data_karyawan->karyawan_nama ?>" class="form-control" placeholder="Masukkan Nama Karyawan">
              </div>

              <div class="form-group">
                <label for="text">Kontak Karyawan</label>
                <input type="text" name="karyawan_kontak" value="<?php echo $data_karyawan->karyawan_kontak ?>" class="form-control" >
              </div>

              <div class="form-group">
                <label for="text">Alamat Karyawan</label>
                <input type="text" name="karyawan_alamat" value="<?php echo $data_karyawan->karyawan_alamat ?>" class="form-control" >
							</div>
							
			<div class="form-group">
				<label for="text">Tempat Lahir</label>
				<input type="text" name="karyawan_tempat_lahir" value="<?php echo $data_karyawan->karyawan_tempat_lahir ?>" class="form-control">
			</div>

			<div class="form-group">
				<label for="text">Tanggal Lahir</label>
				<input type="date" name="karyawan_tanggal_lahir" class="form-control" value="<?php echo $data_karyawan->karyawan_tanggal_lahir ?>">
			</div>

			<div class="form-group">
				<label for="text">Status</label>
				<select class="form-control" name="karyawan_status">
					<option>Pelaksanana</option>
				</select>
			</div>

			<div class="form-group">
				<label for="text">Bagian Kebun</label>
				<select class="form-control" name="karyawan_bagian_kebun">
					<option <?php 
					if($data_karyawan->karyawan_bagian_kebun == 'Kebun Inti/KKPA Air Molek II')
					{
						echo "selected = 'selected'"; 
					}?> > Kebun Inti/KKPA Air Molek II</option>
					<option <?php 
					if($data_karyawan->karyawan_bagian_kebun == 'District Pekan Baru')
					{
						echo "selected = 'selected'"; 
					}?> >District Pekan Baru</option>
					<option <?php 
					if($data_karyawan->karyawan_bagian_kebun == 'Kebun Inti Sel. Galuh')
					{
						echo "selected = 'selected'"; 
					}?>>Kebun Inti Sel. Galuh</option>
				</select>
			</div>

			<div class="form-group">
				<label for="text">Jabatan</label>
				<select class="form-control" name="karyawan_jabatan">
					<option <?php 
					if($data_karyawan->karyawan_jabatan == 'mandor 1 tanaman')
					{
						echo "selected = 'selected'"; 
					}?> >mandor 1 tanaman</option>
					<option <?php 
					if($data_karyawan->karyawan_jabatan == 'ktu amo II')
					{
						echo "selected = 'selected'"; 
					}?>>ktu amo II</option>
					<option <?php 
					if($data_karyawan->karyawan_jabatan == 'krani tanaman')
					{
						echo "selected = 'selected'"; 
					}?>>krani tanaman</option>
					<option <?php 
					if($data_karyawan->karyawan_jabatan == 'adm keu')
					{
						echo "selected = 'selected'"; 
					}?>>adm keu</option>
				</select>
			</div>

			<div class="form-group">
				<label for="text">Golongan</label>
				<select class="form-control" name="karyawan_golongan">
					<option <?php 
					if($data_karyawan->karyawan_golongan == 'II A')
					{
						echo "selected = 'selected'"; 
					}?>>II A</option>
					<option <?php 
					if($data_karyawan->karyawan_golongan == 'II B')
					{
						echo "selected = 'selected'"; 
					}?>>II B</option>
					<option <?php 
					if($data_karyawan->karyawan_golongan == 'III D')
					{
						echo "selected = 'selected'"; 
					}?>>III D</option>
					<option <?php 
					if($data_karyawan->karyawan_golongan == 'IV D')
					{
						echo "selected = 'selected'"; 
					}?>>IV D</option>
				</select>
			</div>

			<div class="form-group">
				<label for="text">Golongan Darah</label>
				<select class="form-control" name="karyawan_golongan_darah">
					<option <?php 
					if($data_karyawan->karyawan_golongan_darah == 'A')
					{
						echo "selected = 'selected'"; 
					}?>>A</option>
					<option <?php 
					if($data_karyawan->karyawan_golongan == 'AB')
					{
						echo "selected = 'selected'"; 
					}?>>AB</option>
					<option <?php 
					if($data_karyawan->karyawan_golongan == 'B')
					{
						echo "selected = 'selected'"; 
					}?>>B</option>
					<option <?php 
					if($data_karyawan->karyawan_golongan == 'O')
					{
						echo "selected = 'selected'"; 
					}?>>O</option>
				</select>
			</div>

			<div class="form-group">
				<label for="text">Tanggal Awal Kerja</label>
				<input type="date" name="karyawan_awal_masuk" class="form-control" value="<?php echo $data_karyawan->karyawan_awal_masuk?>">
			</div>

			<div class="form-group">
				<label for="text">Tanggal Pengangkatan</label>
				<input type="date" name="karyawan_pengangakatan" value="<?php echo $data_karyawan->karyawan_pengangakatan ?>" class="form-control">
			</div>

			<div class="form-group">
				<label for="text">Tanggal Pensiun</label>
				<input type="date" name="karyawan_pensiun" class="form-control" value="<?php echo $data_karyawan->karyawan_pensiun?>">
			</div>

			<div class="form-group">
				<label for="text">Status Perkawinan</label>
				<select class="form-control" name="karyawan_status_perkawinan">
					<option>Menikah</option>
					<option>Belum menikah</option>
				</select>
			</div>

			<div class="form-group">
				<label for="text">Susunan Keluarga</label>
				<input type="text" name="karyawan_susunan_keluarga" class="form-control" value="<?php echo $data_karyawan->karyawan_susunan_keluarga ?>"
					placeholder="Masukan Susunan Keluarga">
			</div>

			<div class="form-group">
				<label for="text">Nomor Dapenbun</label>
				<input type="text" name="karyawan_nomor_dapenbun" class="form-control" value="<?php echo $data_karyawan->karyawan_nomor_dapenbun ?>"
					placeholder="Masukan Nomor Dapenbun">
			</div>

			<div class="form-group">
				<label for="text">Nomor BPJS</label>
				<input type="text" name="karyawan_nomor_bpjs" class="form-control" placeholder="Nomor BPJS" value="<?php echo $data_karyawan->karyawan_nomor_bpjs ?>">
			</div>


			<div class="form-group">
				<label for="text">Status Tanggal</label>
				<input type="date" name="karyawan_status_tanggal" class="form-control" value="<?php echo $data_karyawan->karyawan_status_tanggal ?>"
					placeholder="Masukan Status Tanggal">
			</div>

			<div class="form-group">
				<label for="text">Nama Ahli Waris</label>
				<input type="text" name="karyawan_nama_ahli_waris" class="form-control" value="<?php echo $data_karyawan->karyawan_nama_ahli_waris ?>"
					placeholder="Masukan Nama Ahli Waris">
			</div>

			<div class="form-group">
				<label for="text">Jenis Kelamin Ahli Waris</label>
				<select class="form-control" name="karyawan_jenis_kelamin_ahli_waris">
					<option <?php 
					if($data_karyawan->karyawan_jenis_kelamin_ahli_waris == 'Laki-laki')
					{
						echo "selected = 'selected'"; 
					}?>>Laki-laki</option>
					<option <?php 
					if($data_karyawan->karyawan_jenis_kelamin_ahli_waris == 'Perempuan')
					{
						echo "selected = 'selected'"; 
					}?>>Perempuan</option>
				</select>
			</div>

			<div class="form-group">
				<label for="text">Hubungan dengan ahli waris</label>
				<select class="form-control" name="karyawan_hubungan_ahli_waris">
					<option <?php 
					if($data_karyawan->karyawan_hubungan_ahli_waris == 'Istri/Suami')
					{
						echo "selected = 'selected'"; 
					}?>>Istri/Suami</option>
					<option <?php 
					if($data_karyawan->karyawan_hubungan_ahli_waris == 'Anak')
					{
						echo "selected = 'selected'"; 
					}?>>Anak</option>
					<option <?php 
					if($data_karyawan->karyawan_hubungan_ahli_waris == 'Saudara Kandung')
					{
						echo "selected = 'selected'"; 
					}?>>Saudara Kandung</option>
				</select>
			</div>

			<div class="form-group">
				<label for="text">Keterangan</label>
				<input type="text" name="keterangan" class="form-control" value="<?php echo $data_karyawan->keterangan ?>">
			</div>

              <button type="submit" class="btn btn-md btn-success">Update</button>
              <button type="reset" class="btn btn-md btn-warning">reset</button>
            <?php echo form_close() ?>
        </div>
    </div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>
</html>
