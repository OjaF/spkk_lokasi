@extends('layout.dashboardLayout')

@section('title')
    Ubah Password
@endsection

@section('content_title')
    <div class="flex gap-2">
        <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="#0B8C07"
            class="h-8 w-8"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z"
            />
        </svg>
        <h1 class="text-2xl font-semibold">Ubah Password</h1>
    </div>
@endsection

@section('content')
    <div class="w-full">
        <div class="flex w-full gap-5 p-2">
            <form action="{{ route('change-password.perform') }}" method="post" class="w-full max-w-96">
                @csrf
                <div class="flex flex-col gap-2">
                    <div class="flex flex-col gap-1">
                        <p for="old_password">Password</p>
                        <input
                            type="password"
                            name="old_password"
                            id="old_password"
                            class="max-w-96 rounded-md border border-gray-200 p-2"
                            placeholder="Password Lama"
                            required
                        />
                    </div>
                    <div class="flex flex-col gap-1">
                        <p for="new_password">Password Baru</p>
                        <input
                            type="password"
                            name="new_password"
                            id="new_password"
                            class="max-w-96 rounded-md border border-gray-200 p-2"
                            placeholder="Password Baru"
                            required
                        />
                    </div>
                    <div class="flex flex-col gap-1">
                        <p for="repeat_new_password">Ulangi Password Baru</p>
                        <input
                            type="password"
                            name="repeat_new_password"
                            id="repeat_new_password"
                            class="max-w-96 rounded-md border border-gray-200 p-2"
                            placeholder="Password Baru"
                            required
                        />
                    </div>
                    <div class="flex justify-end">
                        <button
                            class="my-2 w-fit rounded-md bg-secondary p-2 px-4 font-semibold text-white hover:bg-primary"
                        >
                            Perbaharui Password
                        </button>
                    </div>
                </div>
            </form>

            <div class="flex gap-2">
                <div class="mx-10">
                    <p class="font-semibold">Ketentuan Password</p>
                    <ul style="list-style-type: circle">
                        <li>Minimal 8 karakter</li>
                    </ul>
                </div>
                @if ($errors->any())
                    <div class="h-fit rounded-md border border-red-400 bg-red-100 p-2">
                        <ul class="">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (Session::has('message'))
                    <div class="h-fit rounded-md border border-green-400 bg-green-100 p-2">
                        {{ Session::get('message') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
