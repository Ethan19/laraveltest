<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="ie8"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title>东森娱乐</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="{{asset('login/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
	<link href="{{asset('login/css/bootstrap-responsive.min.css')}}" rel="stylesheet" type="text/css"/>
	<link href="{{asset('login/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
	<link href="{{asset('login/css/style-metro.css')}}" rel="stylesheet" type="text/css"/>
	<link href="{{asset('login/css/style.css')}}" rel="stylesheet" type="text/css"/>
	<link href="{{asset('login/css/style-responsive.css')}}" rel="stylesheet" type="text/css"/>
	<link href="{{asset('login/css/default.css" rel="stylesheet')}}" type="text/css" id="style_color"/>
	<link href="{{asset('login/css/uniform.default.css')}}" rel="stylesheet" type="text/css"/>
	<link href="{{asset('login/css/login.css')}}" rel="stylesheet" type="text/css"/>
	<link rel="shortcut icon" href="{{asset('login/image/favicon.ico')}}" />
</head>
<body class="login">
	<div class="logo">
	</div>
	<div class="content">
		<form class="form-vertical login-form" action="/admin/login/sign" method="post" id="form">
		<input type="hidden" name="flag" value="login"/>
		{{csrf_field()}}
			<h3 class="form-title">账号</h3>
			<div class="alert alert-error hide">
				<button class="close" data-dismiss="alert"></button>
				<span>Enter any username and password.</span>
			</div>
			<div class="control-group">
				<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
				<label class="control-label visible-ie8 visible-ie9">用户名</label>
				<div class="controls">
					<div class="input-icon left">
						<i class="icon-user"></i>
						<input class="m-wrap placeholder-no-fix" type="text" placeholder="用户名" name="username" required="required" />
					</div>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label visible-ie8 visible-ie9">密码</label>
				<div class="controls">
					<div class="input-icon left">
						<i class="icon-lock"></i>
						<input class="m-wrap placeholder-no-fix" type="password" placeholder="密码" name="password" required="required"/>
					</div>
				</div>
			</div>
			<div class="form-actions">
				<label class="checkbox">
				<input type="checkbox" name="remember" /> Remember me
				</label>
				<button type="submit" class="btn green pull-right">
				登录 <i class="m-icon-swapright m-icon-white"></i>
				</button>            
			</div>
		@if (session('states'))
	    <div class="alert alert-success">
	        {{ session('states') }}
	    </div>
		@endif
		</form>
	</div>
	<div class="copyright">
		<!-- 2013 &copy; Metronic. Admin Dashboard Template. -->
	</div>
	<script src="{{asset('login/js/jquery-1.10.1.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('login/js/jquery-migrate-1.2.1.min.js')}}" type="text/javascript"></script>
	<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="{{asset('login/js/jquery-ui-1.10.1.custom.min.js')}}" type="text/javascript"></script>      
	<script src="{{asset('login/js/bootstrap.min.js')}}" type="text/javascript"></script>
	<!--[if lt IE 9]>
	<script src="media/js/excanvas.min.js"></script>
	<script src="media/js/respond.min.js"></script>  
	<![endif]-->   
	<script src="{{asset('login/js/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('login/js/jquery.blockui.min.js')}}" type="text/javascript"></script>  
	<script src="{{asset('login/js/jquery.cookie.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('login/js/jquery.uniform.min.js')}}" type="text/javascript" ></script>
	<script src="{{asset('login/js/jquery.validate.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('login/js/app.js')}}" type="text/javascript"></script>
	<script src="{{asset('login/js/login.js')}}" type="text/javascript"></script>      
	<script>

		// $(document).on('click', '#submit', function(event) {
		// 	var name = $("#username").val(),
		// 		pwd = $("#pwd").val();
		// 		if(!name){
		// 			alert("请输入用户名!");
		// 			return false;
		// 		}
		// 		if(!pwd){
		// 			alert("请输入密码!");
		// 			return false;
		// 		}
		// 		$("#form").submit();
		// 	/* Act on the event */
		// });
		jQuery(document).ready(function() {     
		  App.init();
		  //Login.init();
		});
	</script>
	<!-- END JAVASCRIPTS -->
<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();
</script>
</body>
</html>
