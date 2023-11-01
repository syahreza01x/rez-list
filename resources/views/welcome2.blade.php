<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Welcome</title>
</head>

<body>


    <section class="bg-gray-900 text-white relative">
        <div
            class="after:absolute after:inset-0 after:z-20 after:bg-black/80  relative mx-auto max-w-screen-xl px-4 py-32 lg:flex lg:h-screen lg:items-center bg-cover bg-[url('{{ asset('assets/Hero.webp') }}')]">
            <div class="relative z-50 mx-auto max-w-3xl text-center">
                <h1
                    class="bg-gradient-to-r from-green-300 via-blue-500 to-purple-600 bg-clip-text text-3xl font-extrabold text-transparent sm:text-5xl">
                    Welcome

                    <span class="sm:block"> List Anime </span>
                </h1>

                <p class="mx-auto mt-4 max-w-xl sm:text-xl/relaxed">
                    Login or Register
                </p>

                <div class="mt-8 flex flex-wrap justify-center gap-4">
                    <!-- Base -->



                    @if (Route::has('login'))
                        <div class="justify-center">
                            @auth
                                <a href="{{ url('/dashboard') }}"
                                    class="inline-block rounded bg-indigo-600 px-8 py-3 text-sm font-medium text-white transition hover:scale-110 hover:shadow-xl focus:outline-none focus:ring active:bg-indigo-500">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}"
                                    class="inline-block rounded bg-indigo-600 px-8 m-2 py-3 text-sm font-medium text-white transition hover:scale-110 hover:shadow-xl focus:outline-none focus:ring active:bg-indigo-500">Log
                                    in</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="inline-block rounded border border-current m-2 px-8 py-3 text-sm font-medium text-indigo-600 transition hover:scale-110 hover:shadow-xl focus:outline-none focus:ring active:text-indigo-500">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    </section>
</body>

</html>
