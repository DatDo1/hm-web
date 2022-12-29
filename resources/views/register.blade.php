<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="./users/img/favicon.png" rel="icon">
		<title>Register</title>
		
		<!--                       CSS                       -->
	  
		<!-- Reset Stylesheet -->
		<link rel="stylesheet" href="users/resources/css/reset.css" type="text/css" media="screen" />
	  
		<!-- Main Stylesheet -->
		<link rel="stylesheet" href="users/resources/css/style.css" type="text/css" media="screen" />
		
		<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
		<link rel="stylesheet" href="users/resources/css/invalid.css" type="text/css" media="screen" />	
		
		<!-- Colour Schemes
	  
		Default colour scheme is green. Uncomment prefered stylesheet to use it.
		
		<link rel="stylesheet" href="users/resources/css/blue.css" type="text/css" media="screen" />
		
		<link rel="stylesheet" href="user/resources/css/red.css" type="text/css" media="screen" />  
	 
		-->
		
		<!-- Internet Explorer Fixes Stylesheet -->
		
		<!--[if lte IE 7]>
			<link rel="stylesheet" href="user/resources/css/ie.css" type="text/css" media="screen" />
		<![endif]-->
		
		<!--                       Javascripts                       -->
	  
		<!-- jQuery -->
		<script type="text/javascript" src="user/resources/scripts/jquery-1.3.2.min.js"></script>
		
		<!-- jQuery Configuration -->
		<script type="text/javascript" src="user/resources/scripts/simpla.jquery.configuration.js"></script>
		
		<!-- Facebox jQuery Plugin -->
		<script type="text/javascript" src="user/resources/scripts/facebox.js"></script>
		
		<!-- jQuery WYSIWYG Plugin -->
		<script type="text/javascript" src="user/resources/scripts/jquery.wysiwyg.js"></script>
		
		<!-- Internet Explorer .png-fix -->
		
		<!--[if IE 6]>
			<script type="text/javascript" src="user/resources/scripts/DD_belatedPNG_0.0.7a.js"></script>
			<script type="text/javascript">
				DD_belatedPNG.fix('.png_bg, img, li');
			</script>
		<![endif]-->
		
	</head>
  
	<body id="login">
		
		<div id="login-wrapper" class="png_bg">
			<div id="login-top">
				<!-- <img id="logo" src="user/resources/images/logo.png" alt="Admin logo" /> -->
			</div> <!-- End #logn-top -->
			
			<div id="login-content">
				
				<form action="{{route('post-register')}}" method="POST">
					@csrf
					<p>
						@if($errors->has('username'))
							<span style="color:red; margin-left: 90px;">{{$error->first('username')}}</span>
						@endif
						<label>Username</label>
						<input class="text-input" type="text" name="username" />
					</p>
					<div class="clear"></div>
					
					<p>
						<label>Email</label>
						<input class="text-input" type="email" name="email" />
					</p>
					<div class="clear"></div>
					<p>
						@if($errors->has('password'))
							<span style="color:red; margin-left: 90px;">{{$error->first('password')}}</span>
						@endif
						<label>Password</label>
						<input class="text-input" type="password" name="password" />
					</p>
					<div class="clear"></div>
					<p>
						<input class="button" type="submit" value="Sign up" />
					</p>
					
				</form>
			</div> <!-- End #login-content -->
			
		</div> <!-- End #login-wrapper -->
		
		
  </body>
  </html>
