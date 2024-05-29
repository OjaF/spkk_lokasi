@extends('layout.dashboardLayout')

@section('title')
    Hasil Perhitungan
@endsection

@section('content')
<div class="flex flex-col gap-5">
    {{-- Header --}}
    <div class="flex justify-between gap-2">
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
            <h1 class="text-2xl font-semibold">Hasil Penilaian</h1>
        </div>
        <div>
            <a href="{{ route('penilaian.exportTopsis', ['role' => Auth::user()->role]) }}" class="flex bg-secondary hover:bg-primary text-white font-bold p-2 px-3 rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="h-6 w-6 p-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                </svg>                  
                <p>
                    Export
                </p>
            </a>
        </div>
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

    @if($allgreen == true)
        {{-- Table --}}
    <div class="flex flex-col gap-5 bg-white">
        <div class="flex flex-col gap-1 justify-between text-white bg-secondary rounded-md">
            <div class="flex gap-2 p-2 py-1 ">
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
                <p class="font-semibold capitalize">Matriks Keputusan</p>
            </div>

            <div class="flex flex-col gap-5 bg-white text-black border border-b-0">
                <div class="flex flex-col gap-5">
                    <table class="text-surface min-w-full text-start text-xs font-light">
                        <thead class="border-b border-neutral-200 font-medium">
                            <tr>
                                <th scope="col" class="px-6 py-1">Alternatif</th>
                                @foreach ($matriks["matriks_nilai_alternatif"][0]["penilaian"] as $item)
                                    <th scope="col" class="px-6 py-1">{{ $item->kode }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($matriks["matriks_nilai_alternatif"] as $item)
                                <tr class="border-b border-neutral-200 text-center hover:bg-gray-100">
                                    <td class="px-6 py-1">{{ $item->nama_alternatif }}</td>
                                    @foreach ($item->penilaian as $penilaian)
                                        <td class="px-6 py-1">{{ $penilaian->nilai }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="flex flex-col gap-1 justify-between text-white bg-secondary rounded-md">
            <div class="flex gap-2 p-2 py-1 ">
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
                <p class="font-semibold capitalize">Matriks Tabel Kuadrat</p>
            </div>

            <div class="flex flex-col gap-5 bg-white text-black border border-b-0">
                <div class="flex flex-col gap-5">
                    <table class="text-surface min-w-full text-start text-xs font-light">
                        <thead class="border-b border-neutral-200 font-medium">
                            <tr>
                                <th scope="col" class="px-6 py-1">Alternatif</th>
                                @foreach ($matriks["matriks_normalisasi_alternatif_kuadrat"][0]["penilaian"] as $item)
                                    <th scope="col" class="px-6 py-1">{{ $item->kode }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($matriks["matriks_normalisasi_alternatif_kuadrat"] as $item)
                                <tr class="border-b border-neutral-200 text-center hover:bg-gray-100">
                                    <td class="px-6 py-1">{{ $item->nama_alternatif }}</td>
                                    @foreach ($item->penilaian as $penilaian)
                                        <td class="px-6 py-1">{{ $penilaian->nilai }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                            <tr class="border-b border-neutral-200 text-center hover:bg-gray-100">
                                <td class="px-6 py-1 font-bold">Jumlah</td>
                                @foreach ($dataTambahan["matriks_normalisasi_alternatif_kuadrat"] as $item)
                                    <td class="px-6 py-1 font-bold">{{ $item }}</td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="flex flex-col gap-1 justify-between text-white bg-secondary rounded-md">
            <div class="flex gap-2 p-2 py-1 ">
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
                <p class="font-semibold capitalize">Matriks Tabel Normalisasi</p>
            </div>

            <div class="flex flex-col gap-5 bg-white text-black border border-b-0">
                <div class="flex flex-col gap-5">
                    <table class="text-surface min-w-full text-start text-xs font-light">
                        <thead class="border-b border-neutral-200 font-medium">
                            <tr>
                                <th scope="col" class="px-6 py-1">Alternatif</th>
                                @foreach ($matriks["matriks_normalisasi_alternatif_dibagi_kuadrat"][0]["penilaian"] as $item)
                                    <th scope="col" class="px-6 py-1">{{ $item->kode }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($matriks["matriks_normalisasi_alternatif_dibagi_kuadrat"] as $item)
                                <tr class="border-b border-neutral-200 text-center hover:bg-gray-100">
                                    <td class="px-6 py-1">{{ $item->nama_alternatif }}</td>
                                    @foreach ($item->penilaian as $penilaian)
                                        <td class="px-6 py-1">{{ number_format((float)$penilaian->nilai, 4, '.', '') }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="flex flex-col gap-1 justify-between text-white bg-secondary rounded-md">
            <div class="flex gap-2 p-2 py-1 ">
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
                <p class="font-semibold capitalize">Matriks Tabel Normalisasi Terbobot</p>
            </div>

            <div class="flex flex-col gap-5 bg-white text-black border border-b-0">
                <div class="flex flex-col gap-5">
                    <table class="text-surface min-w-full text-start text-xs font-light">
                        <thead class="border-b border-neutral-200 font-medium">
                            <tr>
                                <th scope="col" class="px-6 py-1">Alternatif</th>
                                @foreach ($matriks["matriks_normalisasi_alternatif_terbobot"][0]["penilaian"] as $item)
                                    <th scope="col" class="px-6 py-1">{{ $item->kode }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($matriks["matriks_normalisasi_alternatif_terbobot"] as $item)
                                <tr class="border-b border-neutral-200 text-center hover:bg-gray-100">
                                    <td class="px-6 py-1">{{ $item->nama_alternatif }}</td>
                                    @foreach ($item->penilaian as $penilaian)
                                        <td class="px-6 py-1">{{ number_format((float)$penilaian->nilai, 4, '.', '') }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="flex flex-col gap-1 justify-between text-white bg-secondary rounded-md">
            <div class="flex gap-2 p-2 py-1 ">
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
                <p class="font-semibold capitalize">Matriks Tabel Solusi Ideal</p>
            </div>

            <div class="flex flex-col gap-5 bg-white text-black border border-b-0">
                <div class="flex flex-col gap-5">
                    <table class="text-surface min-w-full text-start text-xs font-light">
                        <thead class="border-b border-neutral-200 font-medium">
                            <tr>
                                <th scope="col" class="px-6 py-1">Solusi</th>
                                @foreach ($matriks["matriks_normalisasi_alternatif_terbobot"][0]["penilaian"] as $item)
                                    <th scope="col" class="px-6 py-1">{{ $item->kode }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-neutral-200 text-center hover:bg-gray-100">
                                <td class="px-6 py-1">Positif</td>
                                @foreach ($dataTambahan["solusi_ideal_positif"] as $value)
                                    <td class="px-6 py-1">{{ number_format((float)$value, 4, '.', '') }}</td>
                                @endforeach
                            </tr>
                            <tr class="border-b border-neutral-200 text-center hover:bg-gray-100">
                                <td class="px-6 py-1">Negatif</td>
                                @foreach ($dataTambahan["solusi_ideal_negatif"] as $value)
                                    <td class="px-6 py-1">{{ number_format((float)$value, 4, '.', '') }}</td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="flex gap-5 w-full">
            <div class="flex flex-col gap-1 justify-between text-white bg-secondary rounded-md w-full">
                <div class="flex gap-2 p-2 py-1 ">
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
                    <p class="font-semibold capitalize">Matriks Tabel Kuadrat Selisih</p>
                </div>
    
                <div class="flex flex-col gap-5 bg-white text-black border border-b-0">
                    <div class="flex flex-col gap-5">
                        <table class="text-surface min-w-full text-start text-xs font-light">
                            <thead class="border-b border-neutral-200 font-medium">
                                <tr>
                                    <th scope="col" class="px-6 py-1">Alternatif</th>
                                    <th scope="col" class="px-6 py-1">Positif</th>
                                    <th scope="col" class="px-6 py-1">Negatif</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($matriks["matriks_normalisasi_alternatif_terbobot"] as $key => $item)
                                    <tr class="border-b border-neutral-200 text-center hover:bg-gray-100">
                                        <td class="px-6 py-1">{{ $item->nama_alternatif }}</td>
                                        <td class="px-6 py-1">{{ number_format((float)$dataTambahan["selisih_solusi_ideal"][$key]["positif"], 4, '.', '') }}</td>
                                        <td class="px-6 py-1">{{ number_format((float)$dataTambahan["selisih_solusi_ideal"][$key]["negatif"], 4, '.', '') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="flex flex-col gap-1 justify-between text-white bg-secondary rounded-md w-full">
                <div class="flex gap-2 p-2 py-1 ">
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
                    <p class="font-semibold capitalize">Matriks Tabel Akar Kuadrat Selisih Solusi Ideal</p>
                </div>
    
                <div class="flex flex-col gap-5 bg-white text-black border border-b-0">
                    <div class="flex flex-col gap-5">
                        <table class="text-surface min-w-full text-start text-xs font-light">
                            <thead class="border-b border-neutral-200 font-medium">
                                <tr>
                                    <th scope="col" class="px-6 py-1">Alternatif</th>
                                    <th scope="col" class="px-6 py-1">Positif</th>
                                    <th scope="col" class="px-6 py-1">Negatif</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($matriks["matriks_normalisasi_alternatif_terbobot"] as $key => $item)
                                    <tr class="border-b border-neutral-200 text-center hover:bg-gray-100">
                                        <td class="px-6 py-1">{{ $item->nama_alternatif }}</td>
                                        <td class="px-6 py-1">{{ number_format((float)$dataTambahan["kuadrat_selisih_solusi_ideal"][$key]["positif"], 4, '.', '') }}</td>
                                        <td class="px-6 py-1">{{ number_format((float)$dataTambahan["kuadrat_selisih_solusi_ideal"][$key]["negatif"], 4, '.', '') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col gap-1 justify-between text-white bg-secondary rounded-md w-full">
            <div class="flex gap-2 p-2 py-1 ">
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
                <p class="font-semibold capitalize">Tabel Nilai Preferensi</p>
            </div>

            <div class="flex flex-col gap-5 bg-white text-black border border-b-0">
                <div class="flex flex-col gap-5">
                    <table class="text-surface min-w-full text-start text-xs font-light">
                        <thead class="border-b border-neutral-200 font-medium">
                            <tr>
                                <th scope="col" class="px-6 py-1">Alternatif</th>
                                <th scope="col" class="px-6 py-1">Kriteria</th>
                                <th scope="col" class="px-6 py-1">Preferensi</th>
                                <th scope="col" class="px-6 py-1">Rangking</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($matriks["matriks_normalisasi_alternatif_terbobot"] as $key => $item)
                            @if ($dataTambahan["rank"][$key] == 1)
                                <tr class="border-b border-neutral-200 text-center bg-green-100 hover:bg-green-100 font-bold">
                            @else
                                <tr class="border-b border-neutral-200 text-center hover:bg-gray-100">
                            @endif
                                    <td class="px-6 py-1">{{ $item->nama_alternatif }}</td>
                                    <td class="px-6 py-1">
                                        @foreach ($dataTambahan["penilaianName"][$key]->penilaianName as $name)
                                            <p class="text-left">{{ $name->subkriteria }}</p>
                                        @endforeach
                                    </td>
                                    <td class="px-6 py-1">{{ number_format((float)$dataTambahan["nilai_preferensi"][$key], 4, '.', '') }}</td>
                                    <td class="px-6 py-1">{{ $dataTambahan["rank"][$key] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
    
@endsection