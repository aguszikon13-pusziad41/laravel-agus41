<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Latihan Laravel Pertama</h1>
    @php
        $nama = 'fereno';
        $nilai = 60;
    @endphp
    <p>Apa Kabar {{ $nama }}?</p>
    @if ($nilai >= 60)
        @php $ket = "Lulus"; @endphp
    @else
        @php $ket = "Tidak Lulus"; @endphp
    @endif
    <h2>Status: {{ $ket }}</h2>
</body>
</html>
