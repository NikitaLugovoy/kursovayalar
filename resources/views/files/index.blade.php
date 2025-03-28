<x-layout.main title="Файлы">
    <a class="btn btn-success" href="{{ route('files.create') }}">Загрузить новый файл</a>

    <hr>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="row">
        @foreach($files as $file)
            <div class="col m-3">
                <div><strong>Название:</strong> {{ $file->name }}</div>
                <div><strong>Добавлен:</strong> {{ $file->created_at->format('d.m.Y H:i') }}</div>
                <a class="btn btn-primary" href="{{ route('files.show', [ $file->id ]) }}">Просмотр</a> | <!-- Добавлена ссылка -->
                <a class="btn btn-primary" href="{{ route('files.download', [ $file->id ]) }}">Скачать</a> |
                <a class="btn btn-primary" href="{{ route('files.edit', [ $file->id ]) }}">Редактировать</a>

                <x-form method="delete" :action="route('files.destroy', [ $file->id ])">
                    <button class="btn btn-danger">Удалить</button>
                </x-form>
            </div>
        @endforeach
    </div>
</x-layout.main>
