<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Print - Pengunjung</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background: #f4f4f4; }
        @media print { .no-print { display: none; } }
    </style>
</head>
<body>
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:12px;">
        <div>
            <h2>Daftar Pengunjung</h2>
            <div>{{ now()->format('d/m/Y H:i') }}</div>
        </div>
        <div class="no-print">
            <button onclick="window.print()" style="padding:8px 12px; background:#f97316; color:white; border:none; border-radius:4px;">Print / Save PDF</button>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>NIM/NIP</th>
                <th>Tingkat</th>
                <th>Departemen</th>
                <th>Keperluan</th>
                <th>Waktu</th>
            </tr>
        </thead>
        <tbody>
            @forelse($rows as $r)
                <tr>
                    <td>{{ $r->nama }}</td>
                    <td>{{ $r->nim_nip }}</td>
                    <td>{{ $r->tingkat }}</td>
                    <td>{{ $r->department }}</td>
                    <td>{{ $r->keperluan }}</td>
                    <td>{{ $r->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align:center;">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
