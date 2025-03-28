<x-layout.main title="Аккаунт">


    <div class="mb-3">
        <label class="form-label"><strong>Имя:</strong></label>
        <div class="form-control">{{ auth()->user()->name }}</div>
    </div>

    <div class="mb-3">
        <label class="form-label"><strong>Email:</strong></label>
        <div class="form-control">{{ auth()->user()->email }}</div>
    </div>

    <x-form method="delete" action="{{ route('auth.sessions.destroy') }}">
        <button class="btn btn-danger">Выйти из аккаунта</button>
    </x-form>
</x-layout.main>
