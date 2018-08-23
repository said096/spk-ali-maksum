<?php
include_once 'header.php';

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

include_once('includes/alternatif.inc.php');

$altObj = new Alternatif($db);
$altObj->id = $id;
$altObj->readOne();

if ($_POST) {
    $altObj->id = $_POST["id"];
    $altObj->id_kelas = $_POST["id_kelas"];
  	$altObj->nis = $_POST["nis"];
  	$altObj->nama = $_POST["nama"];
  	$altObj->tempat_lahir = $_POST["tempat_lahir"];
  	$altObj->tanggal_lahir = $_POST["tanggal_lahir"];
  	$altObj->kelamin = $_POST["kelamin"];
  	$altObj->alamat = $_POST["alamat"];
    if ($altObj->update()) {
        echo "<script>location.href='data-alternatif.php'</script>";
    } else { ?>
      <script type="text/javascript">
        window.onload = function () {
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
		    <li><a href="data-alternatif.php">Data Alternatif</a></li>
		    <li class="active">Ubah Data</li>
	    </ol>
	    <p style="margin-bottom:10px;">
	      <strong style="font-size:18pt;"><span class="fa fa-pencil"></span> Ubah Alternatif</strong>
	    </p>
    	<div class="panel panel-default">
        	<div class="panel-body">
        		<form method="POST">
			        <div class="form-group">
			            <label for="id">ID Alternatif</label>
			            <input type="text" name="id" id="id" class="form-control" autofocus="on" readonly="on" value="<?php echo $altObj->id; ?>">
			        </div>
		            <div class="form-group">
		                <label for="id_kelas">Kelas</label>
		                <select class="form-control" name="id_kelas" id="id_kelas" required="on">
		                    <option value="">---</option>
		                    <option value="1"<?=($altObj->id_kelas == 1)? "selected=\"on\"" : "" ?>>Kelas Satu</option>
		                    <option value="2"<?=($altObj->id_kelas == 2)? "selected=\"on\"" : "" ?>>Kelas Dua</option>
		                    <option value="3"<?=($altObj->id_kelas == 3)? "selected=\"on\"" : "" ?>>Kelas Tiga</option>
		                </select>
		            </div>
		            <div class="form-group">
		                <label for="nis">Nomor Induk Siswa</label>
		                <input type="text" name="nis" id="nis" class="form-control" autofocus="on" required="on" value="<?php echo $altObj->nis; ?>">
		            </div>
		            <div class="form-group">
		                <label for="nama">Nama Lengkap</label>
		                <input type="text" name="nama" id="nama" class="form-control" required="on" value="<?php echo $altObj->nama; ?>">
		            </div>
		            <div class="form-group">
		                <label for="tempat_lahir">Tempat Lahir</label>
		                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" required="on" value="<?php echo $altObj->tempat_lahir; ?>">
		            </div>
		            <div class="form-group">
		                <label for="tanggal_lahir">Tanggal Lahir</label>
		                <input type="text" name="tanggal_lahir" id="tanggal_lahir" class="form-control datepicker" required="on" value="<?php echo $altObj->tanggal_lahir; ?>">
		            </div>
		            <div class="form-group">
		                <label for="kelamin">Jenis Kelamin</label>
		                <select class="form-control" name="kelamin" id="kelamin" required="on">
		                    <option value="">---</option>
		                    <option value="pria"<?=($altObj->kelamin == "pria")? "selected=\"on\"" : "" ?>>Pria</option>
		                    <option value="wanita"<?=($altObj->kelamin == "wanita")? "selected=\"on\"" : "" ?>>Wanita</option>
		                </select>
		            </div>
		            <div class="form-group">
		                <label for="alamat">Alamat</label>
		                <input type="text" name="alamat" id="alamat" class="form-control" required="on" value="<?php echo $altObj->alamat; ?>">
		            </div>
		              <button type="submit" class="btn btn-primary">Ubah</button>
		              <button type="button" onclick="location.href = 'data-alternatif.php'" class="btn btn-default">Kembali</button>
          		</form>
        	</div>
      	</div>
  </div>
</div>

<?php
include_once 'footer.php';
?>