@extends('layout.dashboardLayout')

@section('title')
    Dashboard
@endsection

@section('content_title')
    <div class="flex gap-2">
        <svg class="h-8 w-8" fill="none" stroke="#0B8C07" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
            ></path>
        </svg>
        <h1 class="text-2xl text-center font-semibold">Dashboard</h1>
    </div>
@endsection
