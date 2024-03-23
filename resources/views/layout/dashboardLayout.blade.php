<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>SPK - @yield('title')</title>

        {{-- Tailwind --}}
        @vite('resources/css/app.css')
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
                <div></div>

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
                        <button href="#" class="flex justify-end gap-2 p-3 hover:bg-primary min-w-32 w-auto" onclick="toogleDropdown()">
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
            </div>
        </div>
    </body>
</html>
