@extends('layouts.master')

@section('head')
@endsection

@section('navbar')
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 offset-xs-12 offset-sm-3 offset-md-3 offset-lg-3 offset-xl-3
         p-5 bg-transparent align-middle mt-3 rounded">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <!-- Email Address    rounded d-grid gap-3-->
                <h4>Login de Usuário</h4>
                <div class="form-group mt-3">
                    <label for="titulo">Email</label>
                    <input id="email" class="form-control" type="email" name="email" :value="old('email')" required
                        autofocus autocomplete="username" />
                </div>

                <!-- Password -->
                <div class="mt-3 form-group">
                    <label for="">Senha</label>
                    <input id="password" class="form-control" type="password" name="password">
                </div>

                <button class="form-control mt-3 rounded-pill btn btn-outline-warning rounded-pill shadow-sm mt-3 rounded">
                    {{ __('Acessar') }}
                </button>

                {{-- <div class="flex items-center text-end mt-3 form-group">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                            href="{{ route('password.request') }}">
                            {{ __('Deseja recuperar a senha?') }}
                        </a>
                    @endif
                </div> --}}
            </form>
        </div>
    </div>
@endsection
