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
            <div class="rounded-2xl bg-white p-3 px-12 pb-6 text-primary">
                {{-- Header --}}
                <div class="flex w-full flex-col gap-5 py-4">
                    <div class="flex w-full justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" class="w-8 h-8 fill-primary stroke-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
                        </svg>                          
                        <h1 class="text-center text-2xl font-bold">PT. Mandiri Aceh Properti</h1>
                    </div>
                    <p class="text-center">Selamat datang, silahkan login terlebih dahulu!</p>
                </div>

                @if (Session::has('error'))
                    <div class="mb-2 rounded-md border border-red-400 bg-red-100 p-2 text-red-400">
                        <p>{{ Session::get('error') }}.</p>
                    </div>
                @endif

                {{-- Form --}}
                <div class="flex w-full flex-col gap-5">
                    <form action="{{ route('login.perform') }}" method="POST" class="flex flex-col gap-3">
                        @csrf
                        <div class="flex flex-col gap-1">
                            <label for="username" class="text-sm">Username</label>
                            <input
                                type="text"
                                name="username"
                                id="username"
                                class="rounded-md border border-gray-300 p-2 focus:border-primary focus:outline-none"
                                placeholder="username"
                                required
                            />
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="password" class="text-sm">Password</label>
                            <input
                                type="password"
                                name="password"
                                id="password"
                                class="rounded-md border border-gray-300 p-2 focus:border-primary focus:outline-none"
                                placeholder="password"
                                required
                            />
                        </div>
                        <button
                            type="submit"
                            class="rounded-md bg-primary p-2 font-semibold text-white hover:bg-secondary"
                        >
                            Login
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
