<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalVisitors = Visitor::count();
        $countDosen = Visitor::where('tingkat', 'dosen/pegawai')->count();
        $countMahasiswa = Visitor::where('tingkat', 'mahasiswa/i')->count();

        // Statistik 7 hari terakhir vs 7 hari sebelumnya
        $now = now();
        $last7Start = $now->copy()->subDays(7);
        $prev7Start = $now->copy()->subDays(14);
        $prev7End = $last7Start;

        $last7Total = Visitor::where('created_at', '>=', $last7Start)->count();
        $prev7Total = Visitor::whereBetween('created_at', [$prev7Start, $prev7End])->count();

        $last7Dosen = Visitor::where('tingkat', 'dosen/pegawai')
            ->where('created_at', '>=', $last7Start)
            ->count();
        $prev7Dosen = Visitor::where('tingkat', 'dosen/pegawai')
            ->whereBetween('created_at', [$prev7Start, $prev7End])
            ->count();

        $last7Mahasiswa = Visitor::where('tingkat', 'mahasiswa/i')
            ->where('created_at', '>=', $last7Start)
            ->count();
        $prev7Mahasiswa = Visitor::where('tingkat', 'mahasiswa/i')
            ->whereBetween('created_at', [$prev7Start, $prev7End])
            ->count();

        $totalVisitorsChangePct = $this->calculateChangePercentage($last7Total, $prev7Total);
        $countDosenChangePct = $this->calculateChangePercentage($last7Dosen, $prev7Dosen);
        $countMahasiswaChangePct = $this->calculateChangePercentage($last7Mahasiswa, $prev7Mahasiswa);

        $query = Visitor::query();

        // Filters
        if (request()->filled('tingkat')) {
            $query->where('tingkat', request()->input('tingkat'));
        }

        if (request()->filled('start_date') || request()->filled('end_date')) {
            $start = request()->input('start_date') ?: '1970-01-01';
            $end = request()->input('end_date') ?: now()->toDateString();
            $query->whereBetween('created_at', [$start . ' 00:00:00', $end . ' 23:59:59']);
        }

        $recentVisitors = $query->orderBy('created_at', 'desc')->paginate(10)->withQueryString();

        // If request is AJAX, return only the table partial HTML
        if (request()->ajax()) {
            return view('admin.partials.visitors_table', compact('recentVisitors'));
        }

        return view('admin.dashboard', compact(
            'totalVisitors',
            'countDosen',
            'countMahasiswa',
            'recentVisitors',
            'totalVisitorsChangePct',
            'countDosenChangePct',
            'countMahasiswaChangePct'
        ));
    }

    private function calculateChangePercentage(int $current, int $previous): int
    {
        if ($current === 0 && $previous === 0) {
            return 0;
        }

        if ($previous === 0) {
            return 100;
        }

        return (int) round((($current - $previous) / $previous) * 100);
    }

    /**
     * Export filtered results as CSV (Excel-compatible) or show a print-friendly view.
     */
    public function export()
    {
        $format = request()->input('format', 'csv');

        $query = Visitor::query();
        if (request()->filled('tingkat')) {
            $query->where('tingkat', request()->input('tingkat'));
        }
        if (request()->filled('start_date') || request()->filled('end_date')) {
            $start = request()->input('start_date') ?: '1970-01-01';
            $end = request()->input('end_date') ?: now()->toDateString();
            $query->whereBetween('created_at', [$start . ' 00:00:00', $end . ' 23:59:59']);
        }

        $rows = $query->orderBy('created_at', 'desc')->get();

        if ($format === 'print') {
            return view('admin.reports.print', ['rows' => $rows]);
        }

        // default: CSV
        $filename = 'visitors_' . now()->format('Ymd_His') . '.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
        ];

        $callback = function () use ($rows) {
            $out = fopen('php://output', 'w');
            // Header row
            fputcsv($out, ['Nama', 'NIM/NIP', 'Tingkat', 'Departemen', 'Keperluan', 'Waktu Kunjungan']);
            foreach ($rows as $r) {
                fputcsv($out, [
                    $r->nama,
                    $r->nim_nip,
                    $r->tingkat,
                    $r->department,
                    $r->keperluan,
                    $r->created_at->format('Y-m-d H:i:s'),
                ]);
            }
            fclose($out);
        };

        return response()->stream($callback, 200, $headers);
    }
}
