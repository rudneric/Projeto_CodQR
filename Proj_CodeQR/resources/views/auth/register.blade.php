@extends('layouts.master')

@section('head')
@endsection

@section('navbar')
@endsection

@section('content')
<div class="col-md-6 offset-md-3">
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <h4 class="text-center">Registro de Usuário</h4>
        <div class="mt-3 form-group">
            <label for="">Nome</label>
            <input id="name" class="form-control" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
        </div>

        <!-- Email Address -->
        <div class="mt-3 form-group">
            <label for="">Email</label>
            <input for="email" :value="__('Email')" id="email" class="form-control" type="email"
                name="email" :value="old('email')" required autocomplete="username" />
        </div>

        <!-- Password -->
        <div class="mt-3 form-group">
            <label for="">Senha</label>
            <input for="password" :value="__('Password')" id="password" class="form-control" type="password"
                name="password" required autocomplete="new-password" />

        </div>

        <!-- Confirm Password -->
        <div class="mt-3 form-group">
            <label for="">Confirme a senha</label>
            <input for="password_confirmation" :value="__('Confirm Password')" id="password_confirmation" class="form-control" type="password"
            name="password_confirmation" required autocomplete="new-password" />
        </div>

            <button class="form-control mt-4 rounded-pill text-outline btn btn-outline-warning rounded-pill shadow-sm mt-3 rounded" style="">
                {{ __('Registrar') }}
            </button>
    </form>
</div>
@endsection
