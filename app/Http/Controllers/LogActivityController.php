<?php

namespace App\Http\Controllers;

use App\Models\LogCategories;
use App\Models\LogProducts;
use App\Models\LogUsers;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LogActivityController extends Controller
{
    public function users_log()
    {
        $users = LogUsers::orderBy('updated_at', 'desc')->get();
        return view('log.users', ['title' => 'Log Users'], compact('users'));
    }

    public function users_log_pdf()
    {
        $users = LogUsers::orderBy('updated_at', 'desc')->get();
        $pdf = Pdf::loadview('log.pdf.users-pdf', compact('users'));
        return $pdf->download('activity-log-users.pdf');
    }

    public function view_users_log_pdf()
    {
        $users = LogUsers::orderBy('updated_at', 'desc')->get();
        return view('log.pdf.users-pdf', compact('users'));
    }

    public function categories_log()
    {
        $categories = LogCategories::orderBy('updated_at', 'desc')->get();
        return view('log.categories', ['title' => 'Log Categories'], compact('categories'));
    }

    public function categories_log_pdf()
    {
        $categories = LogCategories::orderBy('updated_at', 'desc')->get();
        $pdf = Pdf::loadview('log.pdf.categories-pdf', compact('categories'));
        return $pdf->download('activity-log-categories.pdf');
    }

    public function view_categories_log_pdf()
    {
        $categories = LogCategories::orderBy('updated_at', 'desc')->get();
        return view('log.pdf.categories-pdf', compact('categories'), compact('categories'));
    }

    public function products_log()
    {
        $products = LogProducts::orderBy('updated_at', 'desc')->get();
        return view('log.products', ['title' => 'Log Products'], compact('products'));
    }

    public function products_log_pdf()
    {
        $products = LogProducts::orderBy('updated_at', 'desc')->get();
        $pdf = Pdf::loadview('log.pdf.products-pdf', compact('products'));
        return $pdf->download('activity-log-products.pdf');
    }

    public function view_products_log_pdf()
    {
        $products = LogProducts::orderBy('updated_at', 'desc')->get();
        return view('log.pdf.products-pdf', compact('products'));
    }
}
