<x-layout.guest title="Регистрация">
    <x-form action="{{ route('auth.register.store') }}">
        <div class="mb-3">
            <x-form-input name="name" label="Имя" />
        </div>
        <div class="mb-3">
            <x-form-input name="email" label="Email" />
        </div>
        <div class="mb-3">
            <x-form-input name="password" type="password" label="Пароль" />
        </div>
        <div class="mb-3">
            <x-form-input name="password_confirmation" type="password" label="Подтверждение пароля" />
        </div>
        <div class="mb-3">
            <button class="btn btn-success">Зарегистрироваться</button>
        </div>
    </x-form>
</x-layout.guest>
