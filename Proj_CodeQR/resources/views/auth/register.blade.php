<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <input for="email" :value="__('Email')" id="email" class="block mt-1 w-full" type="email"
                name="email" :value="old('email')" required autocomplete="username" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <input for="password" :value="__('Password')" id="password" class="block mt-1 w-full" type="password"
                name="password" required autocomplete="new-password" />

        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <input for="password_confirmation" :value="__('Confirm Password')" id="password_confirmation" class="block mt-1 w-full" type="password"
            name="password_confirmation" required autocomplete="new-password" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <button class="ml-4">
                {{ __('Register') }}
            </button>
        </div>
    </form>
</body>

</html>
