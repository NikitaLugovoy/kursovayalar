@props([
	'title',
	'h1' => null
])

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ $title }}</title>
	@vite(['resources/css/app.scss'])
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<style>
		.navbar-custom {
			background-color: #007bff;
			padding: 15px 0;
		}

		.navbar-custom a {
			color: white;
			font-weight: bold;
			text-decoration: none;
			transition: color 0.3s ease;
		}

		.navbar-custom a:hover {
			color: #d4d4d4;
		}

		.card {
			border-radius: 12px;
			box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
		}

		footer {
			background-color: #007bff;
			color: white;
			text-align: center;
			padding: 10px 0;
			margin-top: auto;
		}
	</style>
</head>
<body class="d-flex flex-column min-vh-100 bg-light">

	<header class="navbar-custom shadow-sm">
		<div class="container d-flex justify-content-between align-items-center">
			<div class="fw-bold text-white">🚀 Logo</div>
			<div>

					<a href="{{ route('auth.register.create') }}" class="btn btn-outline-light btn-sm">Регистрация</a>

					<a href="{{ route('auth.sessions.create') }}" class="btn btn-outline-light btn-sm">Войти</a>

			</div>
		</div>
	</header>

	<div class="container flex-grow-1 py-4">
		<div class="card p-4">
			{{ $slot }}
		</div>
	</div>

	<footer class="mt-auto">
		<div class="container">
			&copy; {{ date('Y') }} Курсовая работа Лугового Никиты ИВТ-401
		</div>
	</footer>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
	<script>
		window.appData = {{ Js::from([ 'apiRoot' => '/api' ]) }};
	</script>
	@vite(['resources/js/app.js'])
</body>
</html>
