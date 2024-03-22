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
        <div class="flex min-h-screen flex-col items-center justify-center bg-primary">
            <div class="rounded-md bg-white p-3">
                {{-- Header --}}
                <div class="w-full">
                    <div class="flex w-full justify-center gap-2">
                        <img src="{{ asset('images/database.svg') }}" alt="Logo" class="h-8 w-8" />
                        <h1 class="text-center text-2xl font-bold">SPK - Tanah</h1>
                    </div>
                    <p class="text-center">Sistem Pendukung Keputusan Penentuan Harga Tanah</p>
                </div>

                {{-- Form --}}
                <div></div>
            </div>
        </div>
    </body>
</html>
