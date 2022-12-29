<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="" name="keywords">
	<meta content="" name="description">
    <title> @yield('title') </title>

	<!-- Favicon -->
	<link href="./users/img/favicon.png" rel="icon" type="image/x-icon"> 

	<!-- Google Web Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap"
		rel="stylesheet">

	<!-- Icon Font Stylesheet -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

	<!-- Libraries Stylesheet -->
	<link href="../users/lib/animate/animate.min.css" rel="stylesheet">
	<link href="../users/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

	<!-- Customized Bootstrap Stylesheet -->
	<link href="../users/css/bootstrap.min.css" rel="stylesheet">

	<!-- Template Stylesheet -->
	<link href="../users/css/style.css" rel="stylesheet">
    @yield('css')
</head>
<body>
    <div class="container-xxl bg-white p-0">
        <header>
            @include('client.partials.navbar')
            
            @yield('slider')
        </header>
        <main>
            <div class="content">
                @yield('content')
            </div>
        </main>
        <footer>
            @include('client.partials.footer')
        </footer>
        @yield('js')
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../users/lib/wow/wow.min.js"></script>
        <script src="../users/lib/easing/easing.min.js"></script>
        <script src="../users/lib/waypoints/waypoints.min.js"></script>
        <script src="../users/lib/owlcarousel/owl.carousel.min.js"></script>

        <!-- Template Javascript -->
        <script src="../users/js/main.js"></script>
    </div>
</body>
</html>