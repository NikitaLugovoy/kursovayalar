<x-layout.main title="Просмотр файла">
    <h2>{{ $file->name }}</h2>

    <div>
        <strong>Загружен:</strong> {{ $file->created_at->format('d.m.Y H:i') }}
    </div>

    <div class="mt-3">
        @if(in_array($file->extension, ['jpg', 'png', 'gif', 'jpeg', 'webp']))
            <img src="{{ asset('storage/' . $file->path) }}" alt="{{ $file->name }}" class="img-fluid">
        @elseif(in_array($file->extension, ['pdf']))
            <iframe src="{{ asset('storage/' . $file->path) }}" width="100%" height="600px"></iframe>
        @else
            <a class="btn btn-primary" href="{{ route('files.download', [ $file->id ]) }}">Скачать</a></p>
        @endif
    </div>

    <a href="{{ route('files.index') }}" class="btn btn-secondary mt-3">Назад к файлам</a>
</x-layout.main>
