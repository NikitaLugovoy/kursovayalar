<x-layout.main title="Загрузка файла">
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="file">Выберите файл:</label>
        <input type="file" name="file" required>
        <button class="btn btn-info" type="submit">Загрузить</button>
    </form>

    <a class="btn btn-secondary mt-3" href="{{ route('files.index') }}">Назад к файлам</a>
</x-layout.main>
