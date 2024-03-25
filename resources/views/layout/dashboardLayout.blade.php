<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>SPK - @yield('title')</title>

        {{-- Tailwind --}}
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="flex h-screen w-full">
            {{-- Sidebar --}}
            <div class="flex h-full w-full max-w-52 flex-col justify-between bg-secondary text-white shadow-md">
                {{-- Header --}}
                <div class="flex justify-center bg-primary p-3">
                    <div class="flex gap-2">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="#FFFFFF"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="#0B8C07"
                            class="h-6 w-6"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125"
                            />
                        </svg>

                        <p class="font-semibold">SPK - Dashboard</p>
                    </div>
                    <div></div>
                </div>

                {{-- Menu --}}
                <div class="flex h-full flex-col justify-start">
                    <ul class="flex flex-col space-y-1 py-4">
                        <li>
                            <a
                                href="{{ route('dashboard') }}"
                                class="relative flex h-11 flex-row items-center border-l-4 border-transparent pr-6 text-white hover:border-blue-400 hover:bg-gray-50 hover:text-gray-800 focus:outline-none"
                            >
                                <span class="ml-4 inline-flex items-center justify-center">
                                    <svg
                                        class="h-5 w-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                                        ></path>
                                    </svg>
                                </span>
                                <span class="ml-2 truncate text-sm tracking-wide">Dashboard</span>
                            </a>
                        </li>
                        <li class="px-5">
                            <div class="flex h-8 flex-row items-center">
                                <div class="text-sm font-thin tracking-wide text-white">Master Data</div>
                            </div>
                        </li>
                        <li>
                            <a
                                href="{{ route('kriteria.show') }}"
                                class="relative flex h-11 flex-row items-center border-l-4 border-transparent pr-6 text-white hover:border-blue-400 hover:bg-gray-50 hover:text-gray-800 focus:outline-none"
                            >
                                <span class="ml-4 inline-flex items-center justify-center">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        class="h-5 w-5"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125"
                                        />
                                    </svg>
                                </span>
                                <span class="ml-2 truncate text-sm tracking-wide">Data Kriteria</span>
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{ route('dashboard') }}"
                                class="relative flex h-11 flex-row items-center border-l-4 border-transparent pr-6 text-white hover:border-blue-400 hover:bg-gray-50 hover:text-gray-800 focus:outline-none"
                            >
                                <span class="ml-4 inline-flex items-center justify-center">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        class="h-5 w-5"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125"
                                        />
                                    </svg>
                                </span>
                                <span class="ml-2 truncate text-sm tracking-wide">Data Sub-kriteria</span>
                            </a>
                        </li>
                        @if (Auth::user()->role === 'marketing')
                            <li>
                                <a
                                    href="{{ route('alternative.show') }}"
                                    class="relative flex h-11 flex-row items-center border-l-4 border-transparent pr-6 text-white hover:border-blue-400 hover:bg-gray-50 hover:text-gray-800 focus:outline-none"
                                >
                                    <span class="ml-4 inline-flex items-center justify-center">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="currentColor"
                                            class="h-5 w-5"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125"
                                            />
                                        </svg>
                                    </span>
                                    <span class="ml-2 truncate text-sm tracking-wide">Data Alternatif</span>
                                </a>
                            </li>
                        @endif

                        <li class="px-5">
                            <div class="flex h-8 flex-row items-center">
                                <div class="text-sm font-thin tracking-wide text-white">Perhitungan</div>
                            </div>
                        </li>
                        <li>
                            <a
                                href="{{ route('dashboard') }}"
                                class="relative flex h-11 flex-row items-center border-l-4 border-transparent pr-6 text-white hover:border-blue-400 hover:bg-gray-50 hover:text-gray-800 focus:outline-none"
                            >
                                <span class="ml-4 inline-flex items-center justify-center">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        class="h-5 w-5"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z"
                                        />
                                    </svg>
                                </span>
                                <span class="ml-2 truncate text-sm tracking-wide">Penilaian</span>
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{ route('dashboard') }}"
                                class="relative flex h-11 flex-row items-center border-l-4 border-transparent pr-6 text-white hover:border-blue-400 hover:bg-gray-50 hover:text-gray-800 focus:outline-none"
                            >
                                <span class="ml-4 inline-flex items-center justify-center">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        class="h-5 w-5"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z"
                                        />
                                    </svg>
                                </span>
                                <span class="ml-2 truncate text-sm tracking-wide">Hasil Penilaian</span>
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{ route('dashboard') }}"
                                class="relative flex h-11 flex-row items-center border-l-4 border-transparent pr-6 text-white hover:border-blue-400 hover:bg-gray-50 hover:text-gray-800 focus:outline-none"
                            >
                                <span class="ml-4 inline-flex items-center justify-center">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        class="h-5 w-5"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z"
                                        />
                                    </svg>
                                </span>
                                <span class="ml-2 truncate text-sm tracking-wide">Hasil Akhir</span>
                            </a>
                        </li>
                        @if (Auth::user()->role === 'marketing')
                            <li class="px-5">
                                <div class="flex h-8 flex-row items-center">
                                    <div class="text-sm font-thin tracking-wide text-white">Kelola User</div>
                                </div>
                            </li>
                            <li>
                                <a
                                    href="{{ route('user.show') }}"
                                    class="relative flex h-11 flex-row items-center border-l-4 border-transparent pr-6 text-white hover:border-blue-400 hover:bg-gray-50 hover:text-gray-800 focus:outline-none"
                                >
                                    <span class="ml-4 inline-flex items-center justify-center">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="currentColor"
                                            class="h-5 w-5"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"
                                            />
                                        </svg>
                                    </span>
                                    <span class="ml-2 truncate text-sm tracking-wide">Data User</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>

                {{-- Footer --}}
                <div class="bg-primary p-3 text-xs">
                    <p>Copyright © 2024 Nama_Instansi</p>
                    <p>All Right Reserved.</p>
                </div>
            </div>

            {{-- Content --}}
            <div class="flex w-full flex-col">
                {{-- Header --}}
                <div class="flex w-full justify-end bg-secondary px-8">
                    <div class="flex-col">
                        <button
                            href="#"
                            class="flex w-auto min-w-32 justify-end gap-2 p-3 hover:bg-primary"
                            onclick="toogleDropdown()"
                        >
                            <p class="text-md font-thin text-white">{{ Auth::user()->name }}</p>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="#FFFFFF"
                                class="h-6 w-6"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                                />
                            </svg>
                        </button>

                        <div id="dropdownMenu" class="fixed hidden w-auto rounded-md border text-sm shadow-md">
                            <a
                                href="{{ route('change-password.show') }}"
                                class="block rounded-md p-1 px-3 hover:bg-primary hover:text-white"
                            >
                                <div class="flex gap-2">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        class="h-6 w-6"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z"
                                        />
                                    </svg>

                                    <p>Ubah Password</p>
                                </div>
                            </a>
                            <a
                                href="{{ route('logout') }}"
                                class="block rounded-md p-1 px-3 hover:bg-primary hover:text-white"
                            >
                                <div class="flex gap-2">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        class="h-6 w-6"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15"
                                        />
                                    </svg>

                                    <p>Logout</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <script>
                        function toogleDropdown() {
                            const dropdown = document.querySelector('#dropdownMenu');
                            dropdown.classList.toggle('hidden');
                        }
                    </script>
                </div>

                {{-- Content --}}
                <div class="flex flex-col gap-4 p-4">
                    <div class="py-2">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>

        <!-- Main modal -->
        <div
            id="main-modal"
            tabindex="-1"
            aria-hidden="true"
            class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0"
        >
            <div class="relative max-h-full w-full max-w-2xl p-4">
                @yield('modal_content')
            </div>
        </div>

        <!-- Main modal -->
        <div
            id="secondary-modal"
            tabindex="-1"
            aria-hidden="true"
            class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0"
        >
            <div class="relative max-h-full w-full max-w-2xl p-4">
                @yield('secondary_modal_content')
            </div>
        </div>

        <!-- Confirm modal -->
        <div
            id="confirm-modal-1"
            tabindex="-1"
            aria-hidden="true"
            class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0"
        >
            <div class="relative flex max-h-full w-full max-w-xl justify-center p-4">
                @yield('confirm_modal_content-1')
            </div>
        </div>

        <!-- Confirm modal -->
        <div
            id="confirm-modal-2"
            tabindex="-1"
            aria-hidden="true"
            class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0"
        >
            <div class="relative flex max-h-full w-full max-w-xl justify-center p-4">
                @yield('confirm_modal_content-2')
            </div>
        </div>
        <script src="js/flowbite.min.js"></script>
    </body>
</html>
