@extends('layout.dashboardLayout')

@section('title')
    Kriteria
@endsection

@section('content')
    <div class="flex flex-col gap-5">
        {{-- Header --}}
        <div class="flex gap-2">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="#FFFFFF"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="#0B8C07"
                class="h-8 w-8 stroke-primary"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125"
                />
            </svg>
            <h1 class="text-2xl font-semibold">Data Kriteria</h1>
        </div>

        @if ($errors->any())
            <div id="notif" class="flex justify-between gap-2 rounded-md border border-red-200 bg-red-100 p-2 text-red-400">
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
            <script>
                setTimeout(() => {
                    document.getElementById('notif').style.display = 'none';
                }, 5000);
            </script>
        @endif

        @if (Session::has('success'))
            <div id="notif" class="flex justify-between gap-2 rounded-md border border-green-200 bg-green-100 p-2 text-green-400">
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
            <script>
                setTimeout(() => {
                    document.getElementById('notif').style.display = 'none';
                }, 5000);
            </script>
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
                <p class="font-semibold">Data Kriteria</p>
            </div>

            <div class="flex flex-col gap-5 bg-white p-2">
                <div class="flex w-full justify-between py-2">
                    @if (Auth::user()->role != 'admin')
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
                                class="h-6 w-6"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M12 10.5v6m3-3H9m4.06-7.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z"
                                />
                            </svg>

                            <p>Tambah Kriteria</p>
                        </button>
                    @else
                        <div></div>
                    @endif
                    

                    <form action="{{ route('kriteria.show') }}" method="GET" class="flex justify-end">
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
                        <thead class="border-b border-neutral-200 bg-secondary font-medium text-white">
                            <tr>
                                <th scope="col" class="px-6 py-2 w-24">Kode</th>
                                <th scope="col" class="px-6 py-2">Nama Kriteria</th>
                                @if (Auth::user()->role == 'admin')
                                    <th scope="col" class="px-6 py-2 w-24">Role</th>
                                @endif
                                <th scope="col" class="px-6 py-2 w-24">Bobot</th>
                                <th scope="col" class="px-6 py-2 w-24">Atribut</th>
                                @if (Auth::user()->role != 'admin')   
                                <th scope="col" class="px-6 py-2 w-24">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataKriteria as $item)
                                <tr class="border-b border-neutral-200 hover:bg-primary/10">
                                    <td class="whitespace-nowrap px-6 py-2 font-semibold border-r uppercase">{{ $item->kode }}</td>
                                    <td class="whitespace-nowrap px-6 py-2 font-semibold border-r capitalize">
                                        {{ $item->nama_kriteria }}
                                    </td>
                                    @if (Auth::user()->role == 'admin')
                                        <td class="whitespace-nowrap px-6 py-2 font-semibold border-r capitalize">{{ $item->role }}</td>
                                    @endif
                                    <td class="whitespace-nowrap px-6 py-2 font-semibold border-r">{{ $item->bobot }}</td>
                                    <td class="whitespace-nowrap px-6 py-2 font-semibold border-r capitalize">{{ $item->atribut }}</td>
                                    @if (Auth::user()->role != 'admin')    
                                        <td class="flex gap-2 whitespace-nowrap px-6 py-2 justify-end">
                                            {{-- Edit --}}
                                            <form id="edit-{{ $item->id }}" action="#" method="post">
                                                @csrf
                                                <button
                                                    data-modal-target="secondary-modal"
                                                    data-modal-toggle="secondary-modal"
                                                    class="rounded-md bg-yellow-200 p-1 text-yellow-700"
                                                    type="button"
                                                    onclick="setEditData('{{ $item->nama_kriteria }}', '{{ $item->bobot }}', '{{ $item->id }}', '{{ $item->kode }}', '{{ $item->atribut }}')"
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
                                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"
                                                        />
                                                    </svg>
                                                </button>
                                            </form>

                                            {{-- Delete --}}
                                            <form
                                                id="delete-{{ $item->id }}"
                                                action="{{ route('kriteria.delete') }}"
                                                method="post"
                                            >
                                                @csrf
                                                <input type="text" name="id" value="{{ $item->id }}" hidden />

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
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $dataKriteria->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- Modal Tambah Kriteria --}}
@section('modal_content')
    <div class="relative rounded-md bg-white p-2 shadow">
        <div class="flex flex-col gap-2">
            {{-- Header --}}
            <div class="flex justify-between border-b border-primary py-1 text-xl font-semibold">
                <p>Data Kriteria Baru</p>
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
                <form action="{{ route('kriteria.create') }}" method="post" autocomplete="off">
                    @csrf
                    <input autocomplete="false" name="hidden" type="text" style="display: none" />

                    <div class="flex flex-col gap-2 p-2">
                        <div class="flex flex-col gap-1">
                            <label for="name" class="font-semibold">Kode Kriteria</label>
                            <input
                                type="text"
                                name="kode"
                                id="kode"
                                class="rounded-md border border-primary p-1 placeholder:text-sm placeholder:font-thin"
                                placeholder="Kode Kriteria"
                                required
                            />
                        </div>

                        <div class="flex flex-col gap-1">
                            <label for="name" class="font-semibold">Nama Kriteria</label>
                            <input
                                type="text"
                                name="nama"
                                id="nama"
                                class="rounded-md border border-primary p-1 placeholder:text-sm placeholder:font-thin"
                                placeholder="Nama Kriteria"
                                required
                            />
                        </div>

                        <div class="flex flex-col gap-1">
                            <label for="username" class="font-semibold">Bobot</label>
                            <input
                                autocomplete="off"
                                type="number"
                                min="0"
                                max="100"
                                step="1"
                                name="bobot"
                                id="bobot"
                                class="rounded-md border border-primary p-1 placeholder:text-sm placeholder:font-thin"
                                placeholder="0 - 100"
                                required
                            />
                        </div>

                        <div class="flex flex-col gap-1">
                            <label for="atribut" class="font-semibold">Atribut</label>
                            <select name="atribut" id="atribut" class="rounded-md border border-primary p-1 placeholder:text-sm placeholder:font-thin">
                                <option value="benefit">Benefit</option>
                                <option value="cost">Cost</option>
                            </select>
                        </div>

                        <input type="text" name="role" value="{{ Auth::user()->role }}" hidden />

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

{{-- Modal Edit Kriteria --}}
@section('secondary_modal_content')
    <div class="relative rounded-md bg-white p-2 shadow">
        <div class="flex flex-col gap-2">
            {{-- Header --}}
            <div class="flex justify-between border-b border-primary py-1 text-xl font-semibold">
                <p>Ubah Data Kriteria</p>
                <button
                    class="rounded-md bg-gray-100 hover:bg-gray-200"
                    type="button"
                    data-modal-target="secondary-modal"
                    data-modal-toggle="secondary-modal"
                >
                    <span class="px-2 font-thin">X</span>
                </button>
            </div>

            {{-- Content --}}
            <div>
                <form action="{{ route('kriteria.update') }}" method="post" autocomplete="off">
                    @csrf
                    <input autocomplete="false" name="hidden" type="text" style="display: none" />
                    <input id="edit_id_kriteria" type="text" name="id" hidden />

                    <div class="flex flex-col gap-2 p-2">
                        <div class="flex flex-col gap-1">
                            <label for="name" class="font-semibold">Kode Kriteria</label>
                            <input
                                type="text"
                                name="kode"
                                id="edit_kode_kriteria"
                                class="rounded-md border border-primary p-1 placeholder:text-sm placeholder:font-thin"
                                placeholder="Kode Kriteria"
                                required
                            />
                        </div>

                        <div class="flex flex-col gap-1">
                            <label for="name" class="font-semibold">Nama Kriteria</label>
                            <input
                                type="text"
                                name="nama"
                                id="edit_nama_kriteria"
                                class="rounded-md border border-primary p-1 placeholder:text-sm placeholder:font-thin"
                                placeholder="Nama Kriteria"
                                required
                            />
                        </div>

                        <div class="flex flex-col gap-1">
                            <label for="username" class="font-semibold">Bobot</label>
                            <input
                                autocomplete="off"
                                type="number"
                                min="0"
                                max="100"
                                step="1"
                                name="bobot"
                                id="edit_bobot_kriteria"
                                class="rounded-md border border-primary p-1 placeholder:text-sm placeholder:font-thin"
                                placeholder="0 - 100"
                                required
                            />
                        </div>

                        <div class="flex flex-col gap-1">
                            <label for="atribut" class="font-semibold">Atribut</label>
                            <select name="atribut" id="edit_atribut_kriteria" class="rounded-md border border-primary p-1 placeholder:text-sm placeholder:font-thin">
                                <option value="benefit">Benefit</option>
                                <option value="cost">Cost</option>
                            </select>
                        </div>

                        <input type="text" name="role" value="{{ Auth::user()->role }}" hidden />

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
                                data-modal-target="secondary-modal"
                                data-modal-toggle="secondary-modal"
                            >
                                <p>Cancel</p>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function setEditData(nama, bobot, idKriteria, kode, atribut) {
            const editNamaKriteria = document.getElementById('edit_nama_kriteria');
            const editBobotKriteria = document.getElementById('edit_bobot_kriteria');
            const editIdKriteria = document.getElementById('edit_id_kriteria');
            const editKodeKriteria = document.getElementById('edit_kode_kriteria');
            const editAtributKriteria = document.getElementById('edit_atribut_kriteria');
            editNamaKriteria.value = nama;
            editBobotKriteria.value = bobot;
            editIdKriteria.value = idKriteria;
            editKodeKriteria.value = kode;
            if (atribut == "benefit") {
                editAtributKriteria.selectedIndex = 0;
            }else{
                editAtributKriteria.selectedIndex = 1;
            }
        }
    </script>
@endsection

{{-- Modal hapus kriteria --}}
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
                <p>Apakah anda yakin ingin menghapus kriteria ?</p>
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
