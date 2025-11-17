<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Data Pengunjung KKSE</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #4f46e5;
            color: white;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        h1 {
            text-align: center;
            color: #1f2937;
            margin-bottom: 10px;
        }
        .header-info {
            text-align: center;
            margin-bottom: 20px;
            color: #6b7280;
        }
    </style>
</head>
<body>
    <h1>Sistem Pencatatan Pengunjung</h1>
    <div class="header-info">
        <p>Kelompok Keilmuan System Enterprise (KKSE)</p>
        <p>Tanggal Cetak: {{ now()->format('d/m/Y H:i:s') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>NIM/NIP</th>
                <th>Status</th>
                <th>Program Studi/Departemen</th>
                <th>Keperluan Kunjungan</th>
                <th>Waktu Kunjungan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $index => $visitor)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $visitor->nama_lengkap }}</td>
                    <td>{{ $visitor->nim_nip }}</td>
                    <td>{{ $visitor->status }}</td>
                    <td>{{ $visitor->program_studi_departemen }}</td>
                    <td>{{ $visitor->keperluan_kunjungan }}</td>
                    <td>{{ $visitor->waktu_kunjungan->format('d/m/Y H:i:s') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

