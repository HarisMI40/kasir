<!DOCTYPE html>
<html>
<head>
	<title>Kasirku</title>

	<link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
	<link rel="stylesheet" href="{{asset('icon/icons-1.7.2/font/bootstrap-icons.css')}}">
	<link rel="icon" href="{{asset('img/logo/logo.ico')}}">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<style>
		#konten {
			overflow-y: auto;    /* Trigger vertical scroll    */
    		overflow-x: hidden;  /* Hide the horizontal scroll */
			height : 500px;
		}

		@media(min-width : 482px) {
			#konten{
				height: 350px;
			}
		}
	</style>
</head>
    <body>
	<nav class="navbar navbar-dark bg-primary navbar-expand-*" style="background-color: #e3f2fd">
		<div class="container">
			<a class="navbar-brand" href="#"><i class="bi bi-cart2"> </i> Kasirku</a>


		@auth
			<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
			<div class="offcanvas-header navbar-dark bg-primary">
				<h5 class="offcanvas-title text-white" id="offcanvasNavbarLabel"> <i class="bi bi-cart2"> </i> Kasirku</h5>
				<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
			</div>
			<div class="offcanvas-body navbar-dark bg-primary" >
				<ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{route('produk')}}">Data Produk</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('penjualan') }}">Transaksi</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('laporan') }}">Laporan</a>
					</li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						  Akun
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
						  <li><a class="dropdown-item" href="{{route('akun')}}">Edit Akun</a></li>
						</ul>
					</li>

					<li class="nav-item mt-3">
						<form action="{{ route('logout') }}" method="POST">
							@method("POST")
							@csrf
							<input type="submit" class="btn btn-danger btn-sm" value="logout">
						</form>

						
					</li>
					<!-- <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						Dropdown
						</a>
						<ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
							<li><a class="dropdown-item" href="#">Action</a></li>
							<li><a class="dropdown-item" href="#">Another action</a></li>
							<li>
								<hr class="dropdown-divider">
							</li>
							<li><a class="dropdown-item" href="#">Something else here</a></li>
						</ul>
					</li> -->
				</ul>
				<!-- <form class="d-flex">
					<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success" type="submit">Search</button>
				</form> -->
			</div>
			</div>
		@endauth
		</div>
</nav>
        <div class="container mt-4">
            @yield('content')
        </div>

        @yield('script')

		<script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    </body>
</html>