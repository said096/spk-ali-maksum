<?php
include_once 'header.php';
include_once 'includes/alternatif.inc.php';
include_once 'includes/nilai-awal.inc.php';

$altObj = new Alternatif($db);
$count = $altObj->countAll();
$nilObj = new NilaiAwal($db);

if (isset($_POST['hapus-contengan'])) {
    $imp = "('".implode("','", array_values($_POST['checkbox']))."')";
    $result = $altObj->hapusell($imp);
    if ($result) { ?>
        <script type="text/javascript">
          window.onload=function(){
              showSuccessToast();
              setTimeout(function(){
                  window.location.reload(1);
                  history.go(0)
                  location.href = location.href
              }, 5000);
          };
        </script> <?php
    } else { ?>
        <script type="text/javascript">
          window.onload=function(){
              showErrorToast();
              setTimeout(function(){
                  window.location.reload(1);
                  history.go(0)
                  location.href = location.href
              }, 5000);
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
      <li class="active">Data Alternatif</li>
    </ol>
    <form method="post">
        <div class="row">
            <div class="col-md-6 text-left">
                <strong style="font-size:18pt;"><span class="fa fa-book"></span> Data Alternatif</strong>
            </div>
            <div class="col-md-6 text-right">
                <button type="submit" name="hapus-contengan" class="btn btn-danger"><span class="fa fa-close"></span> Hapus Contengan</button>
                <button type="button" onclick="location.href='data-alternatif-baru.php'" class="btn btn-primary"><span class="fa fa-clone"></span> Tambah Data</button>
            </div>
        </div>
        <br/>

        <table width="100%" class="table table-striped table-bordered" id="tabeldata">
        <thead>
          <tr>
            <th width="10px"><input type="checkbox" name="select-all" id="select-all" /></th>
            <th>ID Alternatif</th>
            <th>Kelas</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Tempat, Tanggal Lahir</th>
            <th>Kelamin</th>
            <th>Nilai</th>
            <th width="100px">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=1; $alt1a = $altObj->readAll(); while ($row = $alt1a->fetch(PDO::FETCH_ASSOC)) : ?>
            <tr>
              <td><input type="checkbox" value="<?=$row['id_alternatif']?>" name="checkbox[]" /></td>
              <td><?=$row['id_alternatif']?></td>
              <td><?=$altObj->getNamaKelas($row['id_kelas'])?></td>
              <td><?=$row['nis']?></td>
              <td><?=$row['nama']?></td>
              <td><?=$row['tempat_lahir']?>, <?=$row['tanggal_lahir']?></td>
              <td><?=$row['kelamin']?></td>
              <td>
                  <?php $nilObj->id_alternatif = $row['id_alternatif']; $nilObj->readByAlternatif(); if ($nilObj->id): ?>
                      <?=$nilObj->nilai?> (<?=$nilObj->keterangan?>)
                  <?php else: ?>
                      <span class="label label-danger">Belum</span>
                  <?php endif; ?>
              </td>
              <td class="text-center">
                    <a href="data-alternatif-ubah.php?id=<?=$row['id_alternatif']?>" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                    <a href="data-alternatif-hapus.php?id=<?=$row['id_alternatif']?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </form>
  </div>
</div>

<?php
include_once 'footer.php';
?>