<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>E-Vote</title>
		<meta name="description" content="description">
		<meta name="author" content="DevOOPS">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="{{asset('plugins/bootstrap/bootstrap.css')}}" rel="stylesheet">
		<link href="{{asset('plugins/jquery-ui/jquery-ui.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
		<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
		<link href="{{asset('plugins/fancybox/jquery.fancybox.css')}}" rel="stylesheet">
		<link href="{{asset('plugins/fullcalendar/fullcalendar.css')}}" rel="stylesheet">
		<link href="{{asset('plugins/xcharts/xcharts.min.css')}}" rel="stylesheet">
		<link href="{{asset('plugins/select2/select2.css')}}" rel="stylesheet">

		<link href="{{asset('plugins/justified-gallery/justifiedGallery.css')}}" rel="stylesheet">
		<link href="{{asset('css/style_v2.css')}}" rel="stylesheet">
		<link href="{{asset('plugins/chartist/chartist.min.css')}}" rel="stylesheet">
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
				<script src="http://getbootstrap.com/docs-assets/js/html5shiv.js"></script>
				<script src="http://getbootstrap.com/docs-assets/js/respond.min.js"></script>
		<![endif]-->
	</head>
<body>
<!--Start Header-->
<div id="screensaver">
	<canvas id="canvas"></canvas>
	<i class="fa fa-lock" id="screen_unlock"></i>
</div>
<div id="modalbox">
	<div class="devoops-modal">
		<div class="devoops-modal-header">
			<div class="modal-header-name">
				<span>Basic table</span>
			</div>
			<div class="box-icons">
				<a class="close-link">
					<i class="fa fa-times"></i>
				</a>
			</div>
		</div>
		<div class="devoops-modal-inner">
		</div>
		<div class="devoops-modal-bottom">
		</div>
	</div>
</div>
<header class="navbar">
	<div class="container-fluid expanded-panel">
		<div class="row">
			<div id="logo" class="col-xs-12 col-sm-2">
				<a href="index.html">E-Vote</a>
			</div>
			<div id="top-panel" class="col-lg-12 col-lg-10">
				<div class="row">
            <ul class="nav nav-tabs justify-content-center">
            <li class="nav-item">
              <a  style="color:black;font-size:18px; background-color:lightgrey;" class='"btn btn-secondary' href="{{url('admin/index ')}}"> <i class="fas fa-home"></i> <span>Dashboard</span></a>
            </li>
            <li class="nav-item">
              <a  style="color:black;font-size:18px; background-color:white;"  class="nav-link" href="{{url('admin/kandidat ')}}"><i class="fas fa-user-friends"></i> <span>Kandidat</span></a></a>
            </li>
            <li class="nav-item">
              <a style="color:black;font-size:18px; background-color:white;"  class="nav-link" href="{{url('admin/dpt ')}}"><i class="fas fa-file"></i> <span>Daftar Pemilih</span></a>
            </li>
            <li class="nav-item">
              <a  style="color:black;font-size:18px; background-color:white;"  class="nav-link " href="#" tabindex="-1" aria-disabled="true"><i class="fa fa-line-chart"></i> <span>Hasil Perhitungan</span></a>
            </li>
            <li class="nav-item">
              <a  style="color:black;font-size:18px; background-color:white;"  class="nav-link " href="{{url('admin/datart')}}" tabindex="-1" aria-disabled="true"><i class="fa fa-line-chart"></i> <span>Data RT dan RW</span></a>
            </li>
          </ul>




				</div>
			</div>
		</div>
	</div>
</header>
<!--End Header-->
<!--Start Container-->
<div id="main" class="container-fluid">
	<div class="row">
		<div id="sidebar-right" class="col-xs-2 col-sm-2">
			<ul class="nav main-menu">
        <div class="card text-white" style="max-width: 30rem;  border-radius:15px;border-style:solid; border-color:white;"><hr>
           <img src="http://www.webhostingreviewjam.com/wp-content/uploads/2013/02/ipage-admin-icon.png" alt=""style="max-width: 30rem;">



         </div>
         <li>  <a style="font-size: 24px; text-align:center;" id="clock" class="btn btn-outline-info btn-sm"></a>
            <script type="text/javascript">
            <!--
            function showTime() {
                var a_p = "";
                var today = new Date();
                var curr_hour = today.getHours();
                var curr_minute = today.getMinutes();
                var curr_second = today.getSeconds();
                if (curr_hour < 12) {
                    a_p = "AM";
                } else {
                    a_p = "PM";
                }
                if (curr_hour == 0) {
                    curr_hour = 12;
                }
                if (curr_hour > 12) {
                    curr_hour = curr_hour - 12;
                }
                curr_hour = checkTime(curr_hour);
                curr_minute = checkTime(curr_minute);
                curr_second = checkTime(curr_second);
             document.getElementById('clock').innerHTML=curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
                }

            function checkTime(i) {
                if (i < 10) {
                    i = "0" + i;
                }
                return i;
            }
            setInterval(showTime, 500);
            //-->
            </script></li>
            <li style="border-style:solid" > <a style="font-size: 20px; text-align:center;" href="">Hi {{ Auth::user()->name }}</a>   </li>
            <li  style="border-style:solid">
              <a class="btn btn-outline-info btn-sm"style="font-size: 20px; text-align:center;"  href="{{route('logout')}}"
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                       {{ __('Logout') }}

                   </a>
                   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                       @csrf
                   </form>

</li>
		</div>
		<!--Start Content-->
		<div id="content" >
      @include('sweetalert::alert')
        <div class="jumbotron jumbotron-fluid" style="background-color:white">
    <div class="container">
      <h1 style="border-bottom:solid;" class="display-4">Darshboard</h1><br>
    </div>
    <div class="row mt-5">
    <div class="col-xl-3 col-sm-6 mb-3">
    <div style="background:#525252; width: 450px;" href="" class="btn btn-danger">
    <div class="card-body">
    <div class="card-body-icon">
    <i class="fas fa-user-friends"></i>
    </div>
    <div class="mr-5">Kandidat</div>
    </div>
    <a class="card-footer text-white clearfix small z-1" href="{{url('admin/kandidat ')}}">
    <span class="float-left">View Details</span>
    <span class="float-right">
    <i class="fa fa-angle-right"></i>
    </span>
    </a>
    </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
    <div style="background:#525252; width: 450px;" href="" class="btn btn-danger">
    <div class="card-body">
    <div class="card-body-icon">
    <i class="fas fa-file"></i>
    </div>
    <div class="mr-5">Daftar Pemilih</div>
    </div>
    <a class="card-footer text-white clearfix small z-1" href="{{url('admin/dpt')}}">
    <span class="float-left">View Details</span>
    <span class="float-right">
    <i class="fa fa-angle-right"></i>
    </span>
    </a>
    </div>
    </div>
        <div class="col-xl-3 col-sm-6 mb-3">
    <div style="background:#525252; width: 450px;" href="" class="btn btn-danger">
    <div class="card-body">
    <div class="card-body-icon">
    <i class="fa fa-line-chart"></i>
    </div>
    <div class="mr-5">Hasil Perhitungan</div>
    </div>
    <a class="card-footer text-white clearfix small z-1" href="{{url('admin/hasil')}}">
    <span class="float-left">View Details</span>
    <span class="float-right">
    <i class="fa fa-angle-right"></i>
    </span>
    </a>
    </div>
    </div>
        <div class="col-xl-3 col-sm-6 mb-3">
    <div style="background:#525252; width: 450px;" href="" class="btn btn-danger">
    <div class="card-body">
    <div class="card-body-icon">
    <i class="fa fa-line-chart"></i>
    </div>
    <div class="mr-5">Data RT dan RW</div>
    </div>
    <a class="card-footer text-white clearfix small z-1" href="{{url('admin/datart')}}">
    <span class="float-left">View Details</span>
    <span class="float-right">
    <i class="fa fa-angle-right"></i>
    </span>
    </a>
    </div>
    </div>
    </div>

</div>


		</div>
		<!--End Content-->

<!--End Container-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="http://code.jquery.com/jquery.js"></script>-->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('plugins/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{asset('plugins/justified-gallery/jquery.justifiedGallery.min.js')}}"></script>
<script src="{{asset('plugins/tinymce/tinymce.min.js')}}"></script>
<script src="{{asset('plugins/tinymce/jquery.tinymce.min.js')"></script>
<script src="{{asset('js/devoops.js')"></script>
<!-- All functions for this theme + document.ready processing -->

</body>
</html>
