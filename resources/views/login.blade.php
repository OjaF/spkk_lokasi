<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>SPK - Tanah</title>

        {{-- Tailwind --}}
        @vite('resources/css/app.css')
    </head>
    <body>
        <div class="flex min-h-screen flex-col items-center justify-center bg-secondary">
            <div class="rounded-2xl bg-white p-3 text-primary px-12 pb-6">
                {{-- Header --}}
                <div class="flex w-full flex-col gap-5 py-4">
                    <div class="flex w-full justify-center gap-2">
                        <img src="{{ asset('images/database.svg') }}" alt="Logo" class="h-8 w-8" />
                        <h1 class="text-center text-2xl font-bold">SPK - Tanah</h1>
                    </div>
                    <p class="text-center">Selamat datang, silahkan login terlebih dahulu!</p>
                </div>

                {{-- Form --}}
                <div class="flex w-full flex-col gap-5">
                    <form action="#" method="POST" class="flex flex-col gap-3">
                        @csrf
                        <div class="flex flex-col gap-1">
                            <label for="username" class="text-sm">Username</label>
                            <input type="text" name="username" id="username" class="rounded-md border border-gray-300 p-2 focus:border-primary focus:outline-none" placeholder="username" />
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="password" class="text-sm">Password</label>
                            <input type="password" name="password" id="password" class="rounded-md border border-gray-300 p-2 focus:border-primary focus:outline-none" placeholder="password"/>
                        </div>
                        <button type="submit" class="bg-primary font-semibold text-white rounded-md p-2 hover:bg-secondary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
