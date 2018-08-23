<?php
include_once 'header.php';
include_once 'includes/nilai.inc.php';

$pgn = new Nilai($db);

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

include_once('includes/kriteria.inc.php');
$eks = new Kriteria($db);
$eks->id = $id;
$eks->readOne();

if($_POST){
	$eks->nm = $_POST['nm'];
	if($eks->update()){
		echo "<script>location.href='data-kriteria.php'</script>";
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
			<strong style="font-size:18pt;"><span class="fa fa-pencil"></span> Ubah Kriteria</strong>
		</p>
		<div class="panel panel-default">
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
						<label for="nm">Nama Kriteria</label>
						<input type="text" class="form-control" id="nm" name="nm" value="<?php echo $eks->nm; ?>">
					</div>
						<button type="submit" class="btn btn-primary">Ubah</button>
						<button type="button" onclick="location.href='data-kriteria.php'" class="btn btn-default">Kembali</button>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
include_once 'footer.php';
?>