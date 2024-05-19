@extends('layout.dashboardLayout')

@section('title')
    Alternatif
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
                class="h-8 w-8"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125"
                />
            </svg>
            <h1 class="text-2xl font-semibold">Data Penilaian</h1>
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
                <p class="font-semibold">Data Alternatif</p>
            </div>

            <div class="flex flex-col gap-5 bg-white p-2">
                <div class="flex w-full justify-end py-2">
                    {{-- NEED IMPLEMENT --}}
                    <form action="#" method="GET" class="flex justify-end">
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

                <div class="flex flex-col gap-5 border">
                    <table class="max-w-full text-start text-sm font-light">
                        <thead class="border-b border-neutral-200 bg-secondary font-medium text-white">
                            <tr>
                                <th scope="col" class="px-6 py-2">Kode Alternatif</th>
                                <th scope="col" class="px-6 py-2">Nama Alternatif</th>
                                <th scope="col" class="px-6 py-2">Keterangan</th>
                                <th scope="col" class="px-6 py-2">Status</th>
                                <th scope="col" class="px-6 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataAlternatif as $item)
                                <tr class="border-b border-neutral-200 hover:bg-primary/10">
                                    <td class="whitespace-wrap px-6 py-2 font-semibold border-r">{{ $item->kode }}</td>
                                    <td class="whitespace-wrap px-6 py-2 font-semibold border-r">{{ $item->nama_alternatif }}</td>
                                    <td class="whitespace-wrap px-6 py-2 font-semibold border-r">{{ $item->keterangan }}</td>
                                    <td class="whitespace-wrap px-6 py-2 font-semibold border-r">
                                        <div class="flex gap-2 text-xs justify-center">
                                            @if($item->marketing == false)
                                            <p class="bg-red-200 text-red-700 rounded-md p-1">Marketing</p>
                                            @else
                                                <p class="bg-green-200 text-green-700 rounded-md p-1">Marketing</p>
                                            @endif

                                            @if($item->finance == false)
                                                <p class="bg-red-200 text-red-700 rounded-md p-1">Finance</p>
                                            @else
                                                <p class="bg-green-200 text-green-700 rounded-md p-1">Finance</p>
                                            @endif

                                            @if($item->stakeholder == false)
                                                <p class="bg-red-200 text-red-700 rounded-md p-1">Stakeholder</p>
                                            @else
                                                <p class="bg-green-200 text-green-700 rounded-md p-1">Stakeholder</p>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="flex gap-2 whitespace-wrap px-6 py-2 justify-center">
                                        {{-- Halaman Penilaian --}}
                                        @if (($item->marketing == false && Auth::user()->role == 'marketing') || ($item->finance == false && Auth::user()->role == 'finance') || ($item->stakeholder == false && Auth::user()->role == 'stakeholder'))
                                            <a href="{{route('penilaian.detail', ['id' => $item->id])}}" class="rounded-md bg-yellow-200 p-1 text-yellow-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                                                </svg>                                              
                                            </a>
                                        @else
                                        <button 
                                            class="rounded-md bg-green-200 p-1 text-green-700"
                                            data-modal-target="main-modal"
                                            data-modal-toggle="main-modal"
                                            onclick="getPenilaianData({{$item->id}})"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                              </svg>                                                                                          
                                        </button>
                                        <form action="{{route('penilaian.delete')}}" class="rounded-md bg-red-200 p-1 text-yellow-700" method="post">
                                            @csrf
                                            <input type="text" name="id_alternatif" value="{{$item->id}}" hidden>
                                            <input type="text" name="role" value="{{Auth::user()->role}}" hidden>
                                            <button>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                  </svg>  
                                            </button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $dataAlternatif->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- Modal Tambah Alternatif --}}
@section('modal_content')
    <div class="relative rounded-md bg-white p-2 shadow">
        <div class="flex flex-col gap-2">
            {{-- Header --}}
            <div class="flex justify-between border-b border-primary py-1 text-xl font-semibold">
                <p>Data Penilaian</p>
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
            <div id="data-penilaian">
                
            </div>
        </div>
    </div>
    <script>
        function getPenilaianData(id) {
            axios.get('/penilaian/getdata/' + id)
                .then((response) => {
                    const dataPenilaian = response.data;
                    const dataPenilaianElement = document.getElementById('data-penilaian');
                    dataPenilaianElement.innerHTML = '';
                    dataPenilaian.forEach((item) => {
                        const div = document.createElement('div');
                        div.classList.add('flex', 'flex-col', 'p-1');
                        const label = document.createElement('label');
                        label.classList.add('font-semibold');
                        label.innerText = item.nama_kriteria;
                        const nilai = document.createElement('p');
                        nilai.classList.add('rounded-md', 'placeholder:text-sm', 'placeholder:font-thin', 'text-sm');
                        nilai.innerHTML = item.subkriteria;
                        div.appendChild(label);
                        div.appendChild(nilai);
                        dataPenilaianElement.appendChild(div);
                    });
                })
                .catch((error) => {
                    console.error(error);
                });
        }
    </script>
@endsection

{{-- Modal Edit Kriteria --}}
@section('secondary_modal_content')
    <div class="relative rounded-md bg-white p-2 shadow">
        <div class="flex flex-col gap-2">
            {{-- Header --}}
            <div class="flex justify-between border-b border-primary py-1 text-xl font-semibold">
                <p>Ubah Data Alternatif</p>
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
                <form action="{{ route('alternative.update') }}" method="post" autocomplete="off">
                    @csrf
                    <input autocomplete="false" name="hidden" type="text" style="display: none" />
                    <input id="edit_id_alternatif" type="text" name="id" hidden />

                    <div class="flex flex-col gap-2 p-2">
                        <div class="flex flex-col gap-1">
                            <label for="name" class="font-semibold">Kode Alternatif</label>
                            <input
                                type="text"
                                name="kode"
                                id="edit_kode"
                                class="rounded-md border border-primary p-1 placeholder:text-sm placeholder:font-thin"
                                placeholder="Nama Alternatif"
                                required
                            />
                        </div>

                        <div class="flex flex-col gap-1">
                            <label for="name" class="font-semibold">Nama Kriteria</label>
                            <input
                                type="text"
                                name="nama_alternatif"
                                id="edit_nama_alternatif"
                                class="rounded-md border border-primary p-1 placeholder:text-sm placeholder:font-thin"
                                placeholder="Nama Kriteria"
                                required
                            />
                        </div>

                        <div class="flex flex-col gap-1">
                            <label for="name" class="font-semibold">Keterangan</label>
                            <Textarea name="keterangan" id="edit_keterangan" class="rounded-md border border-primary p-1 placeholder:text-sm placeholder:font-thin" placeholder="Keterangan"></Textarea>
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
        function setEditData(nama, idAlternatif, kode, keterangan) {
            const editNamaAlternatif = document.getElementById('edit_nama_alternatif');
            const editIdAlternatif = document.getElementById('edit_id_alternatif');
            const editKode = document.getElementById('edit_kode');
            const editKeterangan = document.getElementById('edit_keterangan');
            editNamaAlternatif.value = nama;
            editIdAlternatif.value = idAlternatif;
            editKode.value = kode;
            editKeterangan.value = keterangan;
        }
    </script>
@endsection

{{-- Modal hapus alternatif --}}
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
                <p>Apakah anda yakin ingin menghapus alternatif ?</p>
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
