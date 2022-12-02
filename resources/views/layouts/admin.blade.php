<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

    <title> @yield('title') </title>

	<!--                       CSS                       -->

	<!-- Reset Stylesheet -->
	<link rel="stylesheet" href="../admins/resources/css/reset.css" type="text/css" media="screen" />

	<!-- Main Stylesheet -->
	<link rel="stylesheet" href="../admins/resources/css/style.css" type="text/css" media="screen" />

	<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
	<link rel="stylesheet" href="../admins/resources/css/invalid.css" type="text/css" media="screen" />

	@yield('css')

</head>
<body>
    <div id="body-wrapper">
        <head>
            @include('admin.partials.sidebar')
        </head>
        <main>
            @yield('content')
        </main>
        <footer>
            @yield('js')
            <!--                       Javascripts                       -->
            <!-- jQuery -->
            <script type="text/javascript" src="../admins/resources/scripts/jquery-1.3.2.min.js"></script>

            <!-- jQuery Configuration -->
            <script type="text/javascript" src="../admins/resources/scripts/simpla.jquery.configuration.js"></script>

            <!-- Facebox jQuery Plugin -->
            <script type="text/javascript" src="../admins/resources/scripts/facebox.js"></script>

            <!-- jQuery WYSIWYG Plugin -->
            <script type="text/javascript" src="../admins/resources/scripts/jquery.wysiwyg.js"></script>

            <!-- jQuery Datepicker Plugin -->
            <script type="text/javascript" src="../admins/resources/scripts/jquery.datePicker.js"></script>
            <script type="text/javascript" src="../admins/resources/scripts/jquery.date.js"></script>
        </footer>
    </div>
</body>


</html>