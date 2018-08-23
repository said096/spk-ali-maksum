<?php
include_once 'header.php';
include_once('includes/nilai.inc.php');

include_once 'includes/alternatif.inc.php';
$altObj = new Alternatif($db);
$altObj->nama = $nama;
$alt = $altObj->readAll();

include_once 'includes/kriteria.inc.php';
$kriObj = new Kriteria($db);
$kri = $kriObj->readAll();

$pgn = new Nilai($db);

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

include_once('includes/nilai-awal.inc.php');
$altObj = new NilaiAwal($db);
$altObj->id = $id;
$altObj->readOne();

if($_POST){
	$altObj->id_alternatif = $_POST['id_alt'];
	$altObj->id_nilai_awal = $_POST['nilai_awal'];
	$altObj->periode = $_POST['periode'];
	$altObj->nm = $_POST['nm'];
	if($altObj->update()){
		echo "<script>location.href='nilai-awal.php'</script>";
	} else{ ?>
		<script type="text/javascript">
			window.onload=function(){
				showStickyErrorToast();
			};
		</script> <?php
	}
}
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-2">
		<?php
		include_once 'sidebar.php';
		?>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-10">
		<ol class="breadcrumb">
			<li><a href="index.php">Beranda</a></li>
			<li><a href="data-kriteria.php">Data Kriteria</a></li>
			<li class="active">Ubah Data</li>
		</ol>
		<p style="margin-bottom:10px;">
			<strong style="font-size:18pt;"><span class="fa fa-pencil"></span> Ubah Nilai Awal</strong>
		</p>
		
		<div class="panel panel-default">
			<div class="panel-body">
		    <form method="post">
		    	  <div class="form-group">
                	<label for="nm">Nama Siswa</label>
                	<input type="text" name="nama" id="nama" class="form-control" readonly="on" value="<?php echo $altObj->nama; ?>">
            	   </div>
				  <div class="form-group">
				    <label for="jm">Lomba Nasional</label>
				    <input type="text" class="form-control" id="jm" name="jm" value="<?php echo $altObj->jm; ?>">
				  </div>
				  <div class="form-group">
				    <label for="kt">Nilai Raports</label>
				    <input type="text" class="form-control" id="kt" name="kt" value="<?php echo $altObj->kt; ?>">
				  </div>
				  <div class="form-group">
				    <label for="kt">Membaca Al-Qur'an</label>
				    <input type="text" class="form-control" id="kt" name="kt" value="<?php echo $altObj->kt; ?>">
				  </div>
				  <div class="form-group">
				    <label for="kt">Membaca Kitab</label>
				    <input type="text" class="form-control" id="kt" name="kt" value="<?php echo $altObj->kt; ?>">
				  </div>
				  <div class="form-group">
				    <label for="kt">Ekstrakulikuler</label>
				    <input type="text" class="form-control" id="kt" name="kt" value="<?php echo $altObj->kt; ?>">
				  </div>
				  <div class="form-group">
				    <label for="periode">Periode</label>
	                    <select class="form-control" name="periode">
	                        <option>---</option>
	                        <?php for ($i=2016; $i<=2030; $i++): ?>
	                          <option value="<?=$i?>"><?=$i?></option>
	                        <?php endfor; ?>
	                    </select>
				  </div>
					  <button type="submit" class="btn btn-primary">Ubah</button>
					  <button type="button" onclick="location.href='nilai-awal.php'" class="btn btn-default">Kembali</button>
				</form>
			  </div>
			</div>
	</div>
</div>

<?php
include_once 'footer.php';
?>