<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $jumlahProduct = count(Product::all());
        $jumlahUser = count(User::all());
        $jumlahCategory = count(Category::all());

        return view('dashboard', [
            'title' => 'Dashboard',
        ], compact('jumlahProduct', 'jumlahUser', 'jumlahCategory'));
    }
}
