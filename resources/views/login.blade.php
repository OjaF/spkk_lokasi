<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SPK - Tanah</title>  

        {{-- Tailwind --}}
        @vite('resources/css/app.css')
    </head>
    <body>
        <div class="min-h-screen flex flex-col items-center justify-center bg-primary">
            <div class="p-3 bg-white rounded-md">
                {{-- Header --}}
                <div>
                    <div class="flex gap-2">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="mx-auto w-20 h-20">
                        <h1 class="text-3xl font-bold text-center">SPK - Tanah</h1>
                    </div>
                    <p class="text-center">Sistem Pendukung Keputusan Penentuan Harga Tanah</p>
                </div>

                {{-- Form --}}
                <div></div>
            </div>
        </div>
    </body>
</html>
