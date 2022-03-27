<?php

namespace App\Http\Livewire\Products;

use App\Models\Category;
use App\Models\LogProducts;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProductsComponent extends Component
{
    public $name, $stock, $category_name, $product_edit_id, $product_delete_id;
    public $productDump;
    public $category_id = '';
    public $state = [];
    public $view_product_id, $view_product_name, $view_product_stock, $view_product_category_id, $view_product_category_name;

    public $tampungFilter = '';
    public $selectfilters = [
        'Makanan',
        'Minuman',
        'Kopi',
        'Obat'
    ];

    protected $listeners = ['deleteProductData'];



    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'name' => 'required',
            'stock' => 'required',
            'category_id' => 'required',
        ]);
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->stock = '';
        $this->category_id = '';
    }

    public function resetInputFieldsEdit()
    {
        $this->name = '';
        $this->stock = '';
        $this->category_id = '';
        $this->product_edit_id = '';
    }

    private function fillInputFields($name, $stock, $category_id, $category_name, $product)
    {
        $this->name = $name;
        $this->stock = $stock;
        $this->category_id = $category_id;
        $this->category_name = $category_name;
        $this->productDump = $product;
    }

    public function storeProductData()
    {

        $this->validate([
            'name' => 'required',
            'stock' => 'required', // except
            'category_id' => 'required',
        ]);

        Product::create([
            'name' => $this->name,
            'category_id' => $this->category_id,
            'stock' => $this->stock,
        ]);

        $product = Product::where('name', $this->name)->first();


        LogProducts::create([
            'user_id' => Auth::user()->id,
            'activity' => 'Menambahkan produk ' . $this->name,
            'target_id' => $product->id,
            'time' => Carbon::now()
        ]);

        $dataTitle = $this->name;

        $this->resetErrorBag();
        $this->resetValidation();
        $this->resetInputFields();

        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('toastr:info', [
            'message' => "Data has been created successfully!",
        ]);

        $this->dispatchBrowserEvent('swal:modal', [
            'icon' => 'success',
            'title' => "Product has been created.",
            'text' => "Product $dataTitle has been created successfully!",
        ]);
    }

    public function editProduct($id)
    {
        $product = Product::where('id', $id)->first();
        // dd($product->name);
        $this->view_product_name = $product->name;
        $this->view_product_stock = $product->stock;
        $this->view_product_category_id = optional($product->category)->id;
        $this->view_product_category_name = optional($product->category)->name;
        $this->view_product_id = $product->id;
        $this->product_edit_id = $product->id;

        $this->fillInputFields($product->name, $product->stock, $product->category_id, $product->category->name, $product);
        // dd($this->productDump);
        $this->dispatchBrowserEvent('show-edit-product-modal');
    }

    public function editProductData()
    {
        // dd($this->state);
        $this->validate([
            'name' => 'required',
            'stock' => 'required',
            'category_id' => 'required',
        ]);

        $product = Product::where('id', $this->product_edit_id)->first();
        LogProducts::create([
            'user_id' => Auth::user()->id,
            'activity' => 'Menambahkan produk ' . $this->name,
            'target_id' => $product->id,
            'time' => Carbon::now()
        ]);

        $product->name = $this->name;
        $product->stock = $this->stock;
        $product->category_id = $this->category_id;
        $product->save();


        $dataTitle = $product->name;
        $this->resetInputFieldsEdit();

        $this->resetErrorBag();
        $this->resetValidation();

        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('toastr:success', [
            'message' => "Product <strong>$dataTitle</strong> has been updated successfully!",
        ]);
        $this->dispatchBrowserEvent('swal:modal', [
            'icon' => 'success',
            'title' => "Product has been updated.",
            'text' => "Product $dataTitle has been updated successfully!",
        ]);
    }

    // Sweet alert confirmation delete
    public function deleteConfirm($id)
    {
        // $product = Product::where('id', $id)->first();
        $this->product_delete_id = $id;
        $this->dispatchBrowserEvent('swal:confirm-product', [
            'icon' => 'warning',
            'title' => 'Are you sure?',
            'text' => "You won't be able to revert this!",
            'id' => $id,
        ]);
    }

    public function deleteProductData()
    {
        $product = Product::where('id', $this->product_delete_id)->first();
        // dd($product);
        $dataTitle = $product->name;

        LogProducts::create([
            'user_id' => Auth::user()->id,
            'activity' => 'Menambahkan produk ' . $this->name,
            'target_id' => $product->id,
            'time' => Carbon::now()
        ]);

        $product->delete();
        $this->dispatchBrowserEvent('close-modal');
        $this->product_delete_id = '';

        $this->dispatchBrowserEvent('toastr:success', [
            'message' => "Product <strong>$dataTitle</strong> has been deleted!",
        ]);
    }

    public function cancel()
    {
        // Optional sih gangaruh bisa pake dismiss di btn cancelnya juga :v
        $this->product_delete_id = '';
    }

    public function clear()
    {
        $this->resetErrorBag();
        $this->resetValidation();
        $this->resetInputFields();
        $this->resetViewData();
    }

    public function detailProduct($id)
    {
        // dd($stock);
        $product = Product::where('id', $id)->first();
        // dd($product);
        $this->view_product_name = $product->name;
        $this->view_product_stock = $product->stock;
        $this->view_product_category_id = $product->category_id;
        $this->view_product_category_name = optional($product->category)->name;
        $this->view_product_id = $product->id;

        $this->dispatchBrowserEvent('show-detail-product-modal');
    }

    public function resetViewData()
    {
        $this->view_product_name = null;
        $this->view_product_stock = null;
        $this->view_product_category_id = null;
        $this->view_product_category_name = null;
        $this->view_product_id = null;
    }

    public function closeProductDetailModal()
    {
        $this->resetViewData();
        $this->dispatchBrowserEvent('close-modal');
    }


    public function render()
    {
        $products = Product::orderBy('updated_at', 'desc')->get();
        $categories = Category::all();


        return view('livewire.products.products-component', [
            'products' => $products,
            'categories' => $categories,
        ])->extends('layouts.app', ['title' => 'Products'])->section('content');
    }
}
