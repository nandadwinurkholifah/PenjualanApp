<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiDetail;
use Illuminate\Contracts\View\View;
use PDF;
use Carbon\Carbon;
use App\Exports\TransaksiDetailExport;
use Maatwebsite\Excel\Facades\Excel;

class ReportPenjualanController extends Controller
{
    public function index()
    {
        $penjualan = TransaksiDetail::orderBy('created_at','DESC')->paginate(20);
        return view('report_penjualan.index',compact('penjualan'));
    }
    
    public function cetak_pdf()
    {
        $penjualan = TransaksiDetail::orderBy('created_at','DESC')->get();
        $tgl_cetak =  Carbon::now()->format('d-F-Y');
        $pdf = PDF::loadView('report_penjualan.report_pdf',compact('penjualan','tgl_cetak'));
        return $pdf->stream("Report Penjualan"."-".$tgl_cetak.".pdf");
    }

    public function cetak_excel()
    {
        $tgl = Carbon::now()->format('d-m-y');
        return Excel::download(new TransaksiDetailExport, 'transaksi_detail_'.$tgl.'.xlsx');
    }
}
