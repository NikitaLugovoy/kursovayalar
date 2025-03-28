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
		.navbar-brand {
			font-size: 1.5rem;
			font-weight: bold;
		}

		.list-group-item {
			transition: background-color 0.3s ease;
		}

		.list-group-item:hover {
			background-color: #f8f9fa;
		}

		.btn-primary, .btn-danger {
			transition: all 0.3s ease;
		}

		.btn-primary:hover {
			background-color: #004085;
		}

		.btn-danger:hover {
			background-color: #a71d2a;
		}

		.card {
			border-radius: 12px;
		}
	</style>
</head>
<body class="d-flex flex-column min-vh-100 bg-light">

	<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="fw-bold text-white">🚀 Logo</div>
		<div class="container d-flex justify-content-center">
			<h1 class="text-white text-center m-0">ЗАГРУЗКА ФАЙЛОВ</h1>
		</div>
	</nav>

	<div class="container flex-grow-1 py-4">
		<div class="row">
			<main class="col-md-9">
				@if (session('alert'))
					<div class="alert alert-info alert-dismissible fade show" role="alert">
						{{ session('alert') }}
						<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
					</div>
				@endif

				<h1 class="mb-3 text-primary">{{ $h1 ?? $title }}</h1>

				<div class="card shadow-sm p-4">
					{{ $slot }}
				</div>

			</main>

			<aside class="col-md-3">
				<div class="list-group shadow-sm">
					<a href="{{ route('files.index') }}" class="list-group-item list-group-item-action">📂 Файлы</a>
					<a href="{{ route('account.index') }}" class="list-group-item list-group-item-action">👤 Аккаунт</a>
				</div>
			</aside>
		</div>
	</div>


	<footer class="bg-primary text-white text-center py-3 mt-auto">
		<div class="container">
			Курсовая работа Лугового Никиты ИВТ-401
		</div>
	</footer>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
	@vite(['resources/js/app.js'])
</body>
</html>
