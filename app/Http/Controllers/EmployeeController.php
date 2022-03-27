<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function cetak_pdf()
    {
        $users = User::orderBy('updated_at', 'desc')->where('role_id', 3)->get();

        $pdf = PDF::loadview('manajer.pdf.kasir_pdf', compact('users'));
        return $pdf->download('daftar-kasir-overview.pdf');
    }

    public function view_cetak_pdf()
    {
        $users = User::orderBy('updated_at', 'desc')->where('role_id', 3)->get();
        return view('manajer.pdf.kasir_pdf', compact('users'));
    }
}
