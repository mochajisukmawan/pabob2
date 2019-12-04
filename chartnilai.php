




<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title>Lucifer Morningstar</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/fontAwesome.css">
        <link rel="stylesheet" href="css/tooplate-style.css">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>
<?php
  $tematik = $_GET['tematik'];
  $kelas = $_GET['kelas'];

  include "koneksi.php";

  $data_nilai = mysqli_query($koneksi,"SELECT * FROM tb_nilai_siswa where kelas=".$kelas." && tematik=".$tematik."");
  $data_soal = mysqli_query($koneksi,"SELECT * FROM tb_soalkelas where kelas=".$kelas." && tematik=".$tematik."");
  $datachartbenar = array();
  $datachartsalah = array();
  $no = 0;
  foreach($data_nilai as $d_n){

    $benar = 0;
    $salah = 0;
    $jawaban_siswa = (array)json_decode($d_n['jawaban_siswa']);
    $nosoal = 0;
    foreach ($jawaban_siswa as $j_s => $value) {
      $nosoal++;
      if($no == 0){
        $datachartbenar[$nosoal] = 0;
        $datachartsalah[$nosoal] = 0;
      }
      foreach ($data_soal as $d_s) {
        if( $d_s['id_soal'] == $j_s){
          if($d_s['jawaban'] == $value){
            $datachartbenar[$nosoal] = $datachartbenar[$nosoal]+1;
          }else{
            $datachartsalah[$nosoal]  = $datachartsalah[$nosoal]+1;
          }
        }
      }
    }
    $no = 1;
  }
?>
    <section class="first-gallery-section">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="text-content">
                <h2>Kelas <?=$kelas?> Tematik <?=$tematik?> Chart</h2>
                </div>
              </div>
            </div>
          </div>
        </section>

<?php
$databenar = json_encode($datachartbenar);
$datasalah = json_encode($datachartsalah);

 ?>
        <div class="content-wrapper">
          <div>
        		<canvas id="canvas"></canvas>
        	</div>
        </div>

        <footer>
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <ul>
                  <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                  <li><a href="#"><i class="fa fa-rss"></i></a></li>
                  <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                </ul>
                <p>Copyright &copy; 2019 JOKI KALFIN  A.K.A  Lucifer MorningStrar</p>
              </div>
            </div>
          </div>
        </footer>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <script src="assets/chartjs/Chart.bundle.min.js"></script>
        <script src="assets/chartjs/Chart.bundle.js"></script>
        <script src="assets/chartjs/utils.js"></script>

        <script>
      		var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

      		var randomScalingFactor = function() {
      			return Math.round(Math.random() * 100);
      		};


          var databenar = JSON.parse('<?=$databenar?>');
          var datasalah = JSON.parse('<?=$datasalah?>');
          var label = [];
          var val_benar = [];
          var val_salah = [];
          for(var i in databenar){
            label.push('no '+i+'');
            val_benar.push(databenar[i]);
          }

          for(var i in datasalah){
            val_salah.push(datasalah[i]);
          }
      		var config = {
      			type: 'line',
      			data: {
      				labels: label,
      				datasets: [{
      					label: 'Salah',
      					backgroundColor: window.chartColors.red,
      					borderColor: window.chartColors.red,
      					data: val_salah,
      					fill: false,
      				}, {
      					label: 'Benar',
      					fill: false,
      					backgroundColor: window.chartColors.blue,
      					borderColor: window.chartColors.blue,
      					data: val_benar,
      				}]
      			},
      			options: {
      				responsive: true,
      				title: {
      					display: true,
      					text: ''
      				},
      				tooltips: {
      					mode: 'index',
      					intersect: false,
      				},
      				hover: {
      					mode: 'nearest',
      					intersect: true
      				},
      				scales: {
      					xAxes: [{
      						display: true,
      						scaleLabel: {
      							display: true,
      							labelString: 'Nomer Soal'
      						}
      					}],
      					yAxes: [{
      						display: true,
      						scaleLabel: {
      							display: true,
      							labelString: 'Total Benar'
      						},
      						ticks: {
      							min: 0,
      							max: 100,

      							// forces step size to be 5 units
      							stepSize: 5
      						}
      					}]
      				}
      			}
      		};

      		window.onload = function() {
      			var ctx = document.getElementById('canvas').getContext('2d');
      			window.myLine = new Chart(ctx, config);
      		};



      	</script>



    </body>
</html>
