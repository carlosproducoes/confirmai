<x-layout title="Login">

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

    <form action="{{ route('login') }}" method="POST">
        @csrf
        
        <h3 class="text-center">Login</h3>

        @error('credentials')
            <div class="error">{{ $message }}</div>
        @enderror

        <div class="inputs">
            <input type="email" name="email" id="email" class="" placeholder="Digite seu e-mail" required>
            <input type="password" name="password" id="password" class="" placeholder="Digite sua senha" required>
        </div>

        <a href="#" class="link mt-2">Esqueci minha senha</a>

        <button id="submit" class="mt-4 mb-5">Entrar</button>

        <p class="text-center fs-6">Não tem uma conta? <a href="{{ route('register') }}" class="link">Cadastrar</a></p>
    </form>
    
</x-layout>