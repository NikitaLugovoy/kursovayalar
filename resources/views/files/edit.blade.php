<x-layout.main title="Редактирование файла">

    <form action="{{ route('files.update', $file->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label>Выберите новый файл:</label>
        <input type="file" name="file" required>
        <button class="btn btn-info" type="submit">Обновить</button>
    </form>
    <a class="btn btn-secondary mt-3" href="{{ route('files.index') }}">Назад к файлам</a>

</x-layout.main>
