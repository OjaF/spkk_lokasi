@extends('layout.dashboardLayout')

@section('title')
    Kelola User
@endsection

@section('content')
    <div class="flex flex-col gap-5">
        {{-- Header --}}
        <div class="flex gap-2">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="#0B8C07"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="#0B8C07"
                class="h-8 w-8 fill-primary stroke-primary"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"
                />
            </svg>
            <h1 class="text-2xl font-semibold">Kelola User</h1>
        </div>

        @if ($errors->any())
            <div class="flex justify-between gap-2 rounded-md border border-red-200 bg-red-100 p-2 text-red-400">
                <div class="flex gap-2">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="h-6 w-6 p-1"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                        />
                    </svg>

                    @foreach ($errors->all() as $error)
                        <p class="font-medium">{{ $error }}</p>
                    @endforeach
                </div>

                {{--
                    <span class="">
                    <svg class="fill-current h-6 w-6 text-red-400" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                --}}
            </div>
        @endif

        @if (Session::has('success'))
            <div class="flex justify-between gap-2 rounded-md border border-green-200 bg-green-100 p-2 text-green-400">
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
                            d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                        />
                    </svg>

                    <p class="font-medium">{{ Session::get('success') }}</p>
                </div>

                {{--
                    <span class="">
                    <svg class="fill-current h-6 w-6 text-green-400" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                --}}
            </div>
        @endif

        {{-- Content --}}
        <div class="flex flex-col rounded-md border bg-secondary">
            <div class="flex gap-2 p-2 text-white">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="white"
                    class="h-6 w-6"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 0 1-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-7.5A1.125 1.125 0 0 1 12 18.375m9.75-12.75c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125m19.5 0v1.5c0 .621-.504 1.125-1.125 1.125M2.25 5.625v1.5c0 .621.504 1.125 1.125 1.125m0 0h17.25m-17.25 0h7.5c.621 0 1.125.504 1.125 1.125M3.375 8.25c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m17.25-3.75h-7.5c-.621 0-1.125.504-1.125 1.125m8.625-1.125c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M12 10.875v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125M13.125 12h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125M20.625 12c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5M12 14.625v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 14.625c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m0 1.5v-1.5m0 0c0-.621.504-1.125 1.125-1.125m0 0h7.5"
                    />
                </svg>
                <p class="font-semibold">Data User</p>
            </div>

            <div class="flex flex-col gap-5 bg-white p-2">
                <div class="flex w-full justify-between py-2">
                    <button
                        data-modal-target="main-modal"
                        data-modal-toggle="main-modal"
                        class="flex gap-1 rounded-md bg-secondary p-1 px-2 font-semibold text-white hover:bg-primary"
                        type="button"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="h-6 w-6 p-1"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z"
                            />
                        </svg>

                        <p>Tambah User</p>
                    </button>

                    <form action="{{ route('user.show') }}" method="GET" class="flex justify-end">
                        <input
                            type="text"
                            name="search_query"
                            class="placeholder:text-md rounded-md rounded-r-none border border-primary border-r-transparent p-1 placeholder:font-thin"
                            placeholder="Search"
                        />
                        <button type="submit" class="rounded-r-md bg-secondary p-1 text-white hover:bg-primary">
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
                                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"
                                />
                            </svg>
                        </button>
                    </form>
                </div>

                <div class="flex flex-col gap-5">
                    <table class="text-surface min-w-full text-start text-sm font-light">
                        <thead class="border border-neutral-200 bg-primary font-medium text-white">
                            <tr>
                                <th scope="col" class="px-6 py-2">Nama</th>
                                <th scope="col" class="px-6 py-2">Username</th>
                                <th scope="col" class="px-6 py-2">Role</th>
                                <th scope="col" class="px-6 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataUser as $item)
                                <tr class="border border-neutral-200 hover:bg-primary/10">
                                    <td class="whitespace-nowrap px-6 py-2 font-medium border-r">{{ $item->name }}</td>
                                    <td class="whitespace-nowrap px-6 py-2 border-r">{{ $item->username }}</td>
                                    <td class="whitespace-nowrap px-6 py-2 border-r">{{ $item->role }}</td>
                                    <td class="whitespace-nowrap px-6 py-2 border-r">
                                        <form
                                            id="delete-{{ $item->id }}"
                                            action="{{ route('user.delete') }}"
                                            method="post"
                                            class="flex gap-2 justify-center"
                                        >
                                            @csrf
                                            <input type="text" name="username" value="{{ $item->username }}" hidden />
                                            @if (Auth::user()->id != $item->id)
                                                <button
                                                    data-modal-target="confirm-modal-1"
                                                    data-modal-toggle="confirm-modal-1"
                                                    class="rounded-md bg-red-200 p-1 text-red-700"
                                                    type="button"
                                                    onclick="setId({{ $item->id }})"
                                                >
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
                                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"
                                                        />
                                                    </svg>
                                                </button>
                                            @endif
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $dataUser->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal_content')
    <div class="relative rounded-md bg-white p-2 shadow">
        <div class="flex flex-col gap-2">
            {{-- Header --}}
            <div class="flex justify-between border-b border-primary py-1 text-xl font-semibold">
                <p>Data User Baru</p>
                <button
                    class="rounded-md bg-gray-100 hover:bg-gray-200"
                    type="button"
                    data-modal-target="main-modal"
                    data-modal-toggle="main-modal"
                >
                    <span class="px-2 font-thin">X</span>
                </button>
            </div>

            {{-- Content --}}
            <div>
                <form action="{{ route('user.create') }}" method="post" autocomplete="off">
                    @csrf
                    <input autocomplete="false" name="hidden" type="text" style="display: none" />

                    <div class="flex flex-col gap-2 p-2">
                        <div class="flex flex-col gap-1">
                            <label for="name" class="font-semibold">Nama</label>
                            <input
                                type="text"
                                name="name"
                                id="name"
                                class="rounded-md border border-primary p-1 placeholder:text-sm placeholder:font-thin"
                                placeholder="Nama"
                                required
                            />
                        </div>

                        <div class="flex flex-col gap-1">
                            <label for="username" class="font-semibold">Username</label>
                            <input
                                autocomplete="off"
                                type="text"
                                name="username"
                                id="username"
                                class="rounded-md border border-primary p-1 placeholder:text-sm placeholder:font-thin"
                                placeholder="Username"
                                required
                            />
                        </div>

                        <div class="flex flex-col gap-1">
                            <label for="password" class="font-semibold">Password</label>
                            <input
                                autocomplete="off"
                                type="password"
                                name="password"
                                id="password"
                                class="rounded-md border border-primary p-1 placeholder:text-sm placeholder:font-thin"
                                placeholder="Password"
                                required
                            />
                        </div>

                        <div class="flex flex-col gap-1">
                            <label for="role" class="font-semibold">Role</label>
                            <select
                                name="role"
                                id="role"
                                class="rounded-md border border-primary p-1 font-thin"
                                required
                            >
                                <option value="marketing">Marketing</option>
                                <option value="finance">Finance</option>
                                <option value="stakeholder">Stakeholder</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>

                        <div class="flex justify-end gap-2">
                            <button
                                class="rounded-md bg-primary p-2 font-semibold text-white hover:bg-secondary"
                                type="submit"
                            >
                                <p>Submit</p>
                            </button>
                            <button
                                class="rounded-md bg-red-600 p-2 font-semibold text-white hover:bg-red-700"
                                type="reset"
                                data-modal-target="main-modal"
                                data-modal-toggle="main-modal"
                            >
                                <p>Cancel</p>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('confirm_modal_content-1')
    <div class="relative w-fit rounded-md bg-white p-8 shadow">
        <div class="flex flex-col justify-center gap-10">
            <div class="flex w-full justify-center text-red-600">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="h-12 w-12"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"
                    />
                </svg>
            </div>
            <div class="flex w-full justify-center font-semibold">
                <p>Apakah anda yakin ingin menghapus user ?</p>
            </div>
            <div class="flex justify-center gap-3">
                <button
                    class="w-full rounded-md bg-green-600 p-2 px-4 font-normal text-white hover:bg-green-700"
                    onclick="confirm_yes()"
                >
                    Yakin
                </button>
                <button
                    class="w-full rounded-md bg-red-600 p-2 px-4 font-normal text-white hover:bg-red-700"
                    data-modal-target="confirm-modal-1"
                    data-modal-toggle="confirm-modal-1"
                >
                    Tidak
                </button>
            </div>
        </div>
    </div>
    <script>
        var id = '';

        function setId(idBaru) {
            id = idBaru;
        }

        function confirm_yes() {
            const form = document.getElementById('delete-' + id);
            form.submit();
        }
    </script>
@endsection
