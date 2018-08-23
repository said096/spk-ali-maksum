<ul class="nav">
	
	<?php if ($_SESSION["role"] == "kesiswaan"): ?>
	
	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title"><span class="fa fa-dashboard"></span> Dashboard</h3>
	  </div>
	  <div class="panel-body">
	    <ul class="nav nav-pills nav-stacked">
		  <li role="presentation"><a href="index.php"><span class="fa fa-home"></span> Home</a></li>
		</ul>
	  </div>
	</div>

	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title"><span class="fa fa-file"></span> Input Data</h3>
	  </div>
	  <div class="panel-body">
	    <ul class="nav nav-pills nav-stacked">
		  <li role="presentation"><a href="nilai.php"><span class="fa fa-list-ol"></span> Nilai Preferensi</a></li>
		  <li role="presentation"><a href="data-kriteria.php"><span class="fa fa-bank"></span> Data Kriteria</a></li>
		  <li role="presentation"><a href="data-alternatif.php"><span class="fa fa-puzzle-piece"></span> Data Alternatif</a></li>
		  <li role="presentation"><a href="nilai-awal.php"><span class="fa fa-book"></span> Nilai Awal</a></li>
		</ul>
	  </div>
	</div>

	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title"><span class="fa fa-cogs"></span> Analisa Data</h3>
	  </div>
	  <div class="panel-body">
	    <ul class="nav nav-pills nav-stacked">
			<li role="presentation"><a href="analisa-kriteria.php"><span class="fa fa-bar-chart"></span> Analisa Kriteria</a></li>
			<li role="presentation"><a href="analisa-alternatif.php"><span class="fa fa-balance-scale"></span> Analisa Alternatif</a></li>
			<li role="presentation"><a href="hasil-akhir.php"><span class="fa fa-list"></span> Hasil Akhir</a></li>
			<li role="presentation"><a href="rangking.php"><span class="fa fa-file-pdf-o"></span> Usulan</a></li>
		</ul>
	  </div>
	</div>
	<?php endif; ?>

	<!--Khusus waka>-->
	<?php if ($_SESSION["role"] == "waka"): ?>
	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title"><span class="fa fa-cogs"></span> Hasil Akhir</h3>
	  </div>
	  <div class="panel-body">
	    <ul class="nav nav-pills nav-stacked">
		  <li role="presentation"><a href="hasil-akhir.php"><span class="fa fa-bolt"></span> Hasil Akhir</a></li>
		  <li role="presentation"><a href="rangking.php"><span class="fa fa-file-pdf-o"></span> Usulan</a></li>
		</ul>
	  </div>
	</div>
	<?php endif; ?>

	<div class="panel panel-default">
		<div class="panel-heading">
	    	<h3 class="panel-title"><span class="fa fa-database"></span> Admin Area</h3>
		</div>

		<div class="panel-body">
		    <ul class="nav nav-pills nav-stacked">
			  <li role="presentation"><a href="profil.php"><span class="fa fa-user"></span> Profil</a></li>
			  <?php if ($_SESSION["role"] == "kesiswaan"): ?>
			  <li role="presentation"><a href="user.php"><span class="fa fa-users"></span> Pengguna</a></li>
			    <?php endif; ?>
			  <li role="presentation"><a href="logout.php"><span class="fa fa-sign-out"></span> Logout</a></li>
			</ul>
		</div>
	</div>
</ul>