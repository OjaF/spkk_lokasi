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
        <div>Ini dashboard {{ Auth::user()->name }}</div>
    </body>
</html>
