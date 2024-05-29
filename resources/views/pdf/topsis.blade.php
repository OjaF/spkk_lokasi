<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .bg-primary {
            background-color: #0B8C07;
            color: white;
            padding: 10px;
            border-radius: 5px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        .table-head {
            background-color: #0B8C07;
            color: white;
        }

        th {
            text-align: left;
            padding-left: 10px;
            padding-top: 6px;
            padding-bottom: 6px;
            padding-right: 10px;
        }

        td {
            padding-left: 10px;
            padding-right: 10px;
            border: 1px solid #ddd;
        }

        .title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
            text-transform: capitalize;
        }

        #one {
            background-color: rgb(240 253 244);
            color: black;
        }
    </style>
</head>
<body>
    <p class="title">Hasil Perhitungan Topsis - {{ $role }}</p>

    <table class="table">
        <thead class="table-head">
            <tr>
                <th scope="col">Kode</th>
                <th scope="col">Alternatif</th>
                <th scope="col">Kriteria</th>
                <th scope="col">Preferensi</th>
                <th scope="col">Ranking</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($matriks["final"] as $key => $item)
            @if ($dataTambahan["rank"][$key] == 1)
                <tr id="one">
            @else
                <tr>
            @endif
                    <td class="px-6 py-1">{{ $item["kode"] }}</td>
                    <td class="px-6 py-1">{{ $item["nama_alternatif"] }}</td>
                    <td class="px-6 py-1">
                        @foreach ($dataTambahan["penilaianName"][$key]["penilaianName"] as $name)
                            <p class="text-left">{{$name->nama_kriteria}} ({{ $name->subkriteria }})</p>
                        @endforeach
                    </td>
                    <td style="text-align: center">{{ number_format((float)$dataTambahan["nilai_preferensi"][$key], 4, '.', '') }}</td>
                    <td style="text-align: center">{{ $dataTambahan["rank"][$key] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <p>Dicetak pada : {{ $now }}</p>
</body>
</html>