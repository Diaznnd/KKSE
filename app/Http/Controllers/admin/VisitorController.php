<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class VisitorController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $visitors = Visitor::query();

            // Filter by date
            if ($request->has('date_from') && $request->date_from) {
                $visitors->whereDate('created_at', '>=', $request->date_from);
            }
            if ($request->has('date_to') && $request->date_to) {
                $visitors->whereDate('created_at', '<=', $request->date_to);
            }

            // Filter by tingkat
            if ($request->has('tingkat') && $request->tingkat) {
                $visitors->where('tingkat', $request->tingkat);
            }

            // Filter by departemen
            if ($request->has('department') && $request->department) {
                $visitors->where('department', 'like', '%' . $request->department . '%');
            }

            return DataTables::of($visitors)
                ->addIndexColumn()
                ->addColumn('formatted_date', function ($visitor) {
                    return optional($visitor->created_at)->format('d/m/Y H:i');
                })
                ->rawColumns(['formatted_date'])
                ->make(true);
        }

        $departmentList = Visitor::distinct()->pluck('department');

        return view('admin.visitors.index', compact('departmentList'));
    }

    public function exportExcel(Request $request)
    {
        $visitors = Visitor::query();

        // Apply filters
        if ($request->has('date_from') && $request->date_from) {
            $visitors->whereDate('created_at', '>=', $request->date_from);
        }
        if ($request->has('date_to') && $request->date_to) {
            $visitors->whereDate('created_at', '<=', $request->date_to);
        }
        if ($request->has('tingkat') && $request->tingkat) {
            $visitors->where('tingkat', $request->tingkat);
        }
        if ($request->has('department') && $request->department) {
            $visitors->where('department', 'like', '%' . $request->department . '%');
        }

        $data = $visitors->get();

        $exportData = $data->map(function ($visitor) {
            return [
                'Nama' => $visitor->nama,
                'NIM/NIP' => $visitor->nim_nip,
                'Tingkat' => $visitor->tingkat,
                'Departemen' => $visitor->department,
                'Keperluan' => $visitor->keperluan,
                'Waktu Kunjungan' => optional($visitor->created_at)->format('d/m/Y H:i:s'),
            ];
        })->toArray();

        // Add headers
        $headers = [
            'Nama',
            'NIM/NIP',
            'Tingkat',
            'Departemen',
            'Keperluan',
            'Waktu Kunjungan'
        ];

        $exportData = array_merge([$headers], $exportData);

        return Excel::create('Data Pengunjung KKSE', function ($excel) use ($exportData) {
            $excel->sheet('Pengunjung', function ($sheet) use ($exportData) {
                $sheet->fromArray($exportData, null, 'A1', false, false);
            });
        })->download('xlsx');
    }

    public function exportPdf(Request $request)
    {
        $visitors = Visitor::query();

        // Apply filters
        if ($request->has('date_from') && $request->date_from) {
            $visitors->whereDate('created_at', '>=', $request->date_from);
        }
        if ($request->has('date_to') && $request->date_to) {
            $visitors->whereDate('created_at', '<=', $request->date_to);
        }
        if ($request->has('tingkat') && $request->tingkat) {
            $visitors->where('tingkat', $request->tingkat);
        }
        if ($request->has('department') && $request->department) {
            $visitors->where('department', 'like', '%' . $request->department . '%');
        }

        $data = $visitors->orderBy('created_at', 'desc')->get();

        $pdf = Pdf::loadView('admin.visitors.pdf', compact('data'));
        return $pdf->download('Data Pengunjung KKSE.pdf');
    }
}
