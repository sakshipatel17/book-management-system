<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartPdf;
use Barryvdh\DomPDF\Facade\Pdf;

class BillPdfController extends Controller
{
    public function bill_pdf_fun(Request $request)
    {
        $cartRec = CartPdf::all();
        $pdf = PDF::loadView('cartpdf', compact('cartRec'));              // cart.blade.php
        session()->forget('cart');
        return $pdf->download('dsd.pdf');           // In download folder
        //return $pdf->stream();                      // In browser iteself
    }
}
