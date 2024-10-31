<x-layout title="Registrar">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">

    <style>
        .loader-background {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #cccccc88;
        }

        .loader {
            position: absolute;
            top: 40%;
            left: 50%;

            border: 8px solid #f3f3f3;
            border-top: 8px solid #3498db;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>

    <div class="loader-background d-none">
        <div class="loader"></div>
    </div>

    <form action="{{ route('register') }}" method="POST" class="w-50 m-auto">
        @csrf

        <h3 class="text-center">Cadastro</h3>

        <div class="error d-none">Valide todos os campos<br> para se cadastrar</div>

        <div class="inputs">
            <div class="form-group">
                <input type="text" name="first_name" id="first_name" class="@error('first_name') is-invalid @enderror" placeholder="Digite seu nome" data-validated="false">
                <div class="invalid-feedback">
                    @error('first_name') {{ $message }} @enderror
                </div>
                <div class="valid-feedback"></div>
            </div>
            <div class="form-group">
                <input type="text" name="last_name" id="last_name" class="@error('last_name') is-invalid @enderror" placeholder="Digite seu sobrenome" data-validated="false">
                <div class="invalid-feedback">
                    @error('last_name') {{ $message }} @enderror
                </div>
                <div class="valid-feedback"></div>
            </div>
            <div class="form-group">
                <input type="email" name="email" id="email" class="@error('email') is-invalid @enderror" placeholder="Digite seu e-mail" data-validated="false">
                <div class="invalid-feedback">
                    @error('email') {{ $message }} @enderror
                </div>
                <div class="valid-feedback"></div>
            </div>
            <div class="form-group">
                <input type="password" name="password" id="password" class="@error('password') is-invalid @enderror" placeholder="Digite a senha" data-validated="false">
                <div class="invalid-feedback">
                    @error('password') {{ $message }} @enderror
                </div>
                <div class="valid-feedback"></div>
            </div>
            <div class="form-group">
                <input type="password" name="password_confirmation" id="password_confirmation" class="" placeholder="Digite a senha novamente" data-validated="false">
                <div class="invalid-feedback"></div>
                <div class="valid-feedback"></div>
            </div>
        </div>

        <button id="submit" class="mt-3 mb-2">Registrar</button>

        <p class="text-center fs-6">Já possui uma conta? <a href="{{ route('login') }}" class="link">Entrar</a></p>
    </form>

    <script src="{{ asset('js/register.js') }}"></script>

</x-layout>