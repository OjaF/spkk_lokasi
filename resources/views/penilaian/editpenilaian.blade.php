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
            class="h-8 w-8 stroke-primary"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125"
            />
        </svg>
        <h1 class="text-2xl font-semibold">Edit Penilaian - {{ $alternatif->nama_alternatif }}</h1>
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
        
        <form action="{{ route('penilaian.update') }}" method="post">
            @csrf
            <input type="text" name="id_alternatif" value="{{ $alternatif->id }}" hidden>
            <div class="grid grid-cols-2 gap-5">
                @foreach ($dataKriteria as $key => $kriteria)
                    <div class="w-full rounded-xl">
                        <div class="font-bold bg-primary p-2 text-white text-md rounded-t-xl">
                            <p>{{ $kriteria->kode }} - {{ $kriteria->nama_kriteria }}</p>
                        </div>
    
                        <div>
                            <select name="{{$kriteria->id}}" id="" class="w-full rounded-b-xl py-3">
                                @foreach ($kriteria->subkriteria as $subkriteria)
                                    @if ($subkriteria->nilai == $penilaian[$key]->nilai)
                                        <option value="{{ $subkriteria->nilai }}" selected>{{ $subkriteria->nama_subkriteria }}</option>
                                    @else
                                        <option value="{{ $subkriteria->nilai }}">{{ $subkriteria->nama_subkriteria }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endforeach
            </div>

            <div>
                <button type="submit" class="bg-primary text-white rounded-md py-2 px-4 mt-5">Simpan</button>
            </div>
        </form>
</div>
@endsection