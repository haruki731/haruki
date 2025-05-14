<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
         <style>
            /* Reset */
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            /* Body Styling */
            body {
                font-family: 'Figtree', sans-serif;
                background-color: #f4f4f4;
                color: #333;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }

            /* Container */
            .text-center {
                background-color: #fff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
                text-align: center;
            }

            /* Links */
            a {
                text-decoration: none;
                color: #007bff;
                font-size: 18px;
                font-weight: bold;
                padding: 10px 20px;
                border-radius: 6px;
                transition: all 0.3s ease;
            }

            a:hover {
                background-color: #007bff;
                color: #fff;
            }

            /* List Layout */
            ul {
                display: flex;
                justify-content: center;
                gap: 20px;
                list-style: none;
            }

            /* Logout Button */
            form a {
                color: #dc3545;
            }

            form a:hover {
                background-color: #dc3545;
                color: #fff;
            }
         </style>

    </head>
    <body class="antialiased">
        <!-- <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/posts/result') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">積分画面</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">ログイン</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>                   -->
        <div class="text-center text-base p-2 flex justify-end">
            <ul>
                <a href="/login" class="p-2 text-lg font-bold">ログイン</a>
                <a href="/register" class="p-2 text-lg font-bold">新規登録</a>
                <!-- <a href="route('profile.edit')">{{ __('Profile') }}</a> -->
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <a href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </a>
                    </form>
            </ul>
        </div>
    </body>
</html>
