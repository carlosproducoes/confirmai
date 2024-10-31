<x-layout title="Dashboard">

    <h1>Dashboard</h1>
    <h3>Olá, {{ Auth::user()->first_name }}!</h3>

    <a href="{{ route('logout') }}">Sair</a>

</x-layout>