<!DOCTYPE>
<html>
<head>
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="{{asset('js/morris/morris-0.4.3.min.css')}}" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="{{asset('css/custom-styles.css')}}" rel="stylesheet" />
    <!-- Google Fonts-->
<!--     <link href='http://fonts.useso.com/css?family=Open+Sans' rel='stylesheet' type='text/css' /> -->
	<title>{{$title}}</title>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><strong>Marvel</strong></a>
                
                <div id="sideNav" href=""><i class="fa fa-caret-right"></i></div>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="/auth/logout"><i class="fa fa-user fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
               {!!$menu!!}
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
      
        <div id="page-wrapper">
            <div class="header"> 
                <h1 class="page-header">
                    Dashboard <small>Welcome {{$username}}</small>
                </h1>
                <ol class="breadcrumb">
                  <li>后台</li>
                  <li>{{$prev}}</li>
                </ol>              
            </div>