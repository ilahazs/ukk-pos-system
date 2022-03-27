<?php

namespace App\Http\Livewire\Categories;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Category;
use App\Models\LogCategories;
use Illuminate\Support\Facades\Auth;

class CategoriesComponent extends Component
{
    public $name, $description, $category_edit_id, $category_delete_id;
    public $state = [];
    public $view_category_id, $view_category_name, $view_category_description;

    protected $listeners = ['deleteCategoryData'];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'name' => 'required|unique:categories,name,' . $this->category_edit_id . '',
            'description' => 'max:255',
        ]);
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->description = '';
    }

    public function resetInputFieldsEdit()
    {
        $this->name = '';
        $this->description = '';
    }

    private function fillInputFields($name, $description)
    {
        $this->name = $name;
        $this->description = $description;
    }

    public function storeCategoryData()
    {
        $this->validate([
            'name' => 'required|unique:categories,name,' . $this->category_edit_id . '',
            'description' => 'max:255',
        ]);

        Category::create([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $category = Category::where('name', $this->name)->first();


        LogCategories::create([
            'user_id' => Auth::user()->id,
            'activity' => 'Menambahkan kategori ' . $this->name,
            'target_id' => $category->id,
            'time' => Carbon::now()
        ]);


        $dataTitle = $this->name;

        $this->resetErrorBag();
        $this->resetValidation();
        $this->resetInputFields();

        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('toastr:info', [
            'message' => "Category <strong>$dataTitle</strong> has been created successfully!",
        ]);

        $this->dispatchBrowserEvent('swal:modal', [
            'icon' => 'success',
            'title' => "Success added data.",
            'text' => "Category $dataTitle has been created successfully!",
        ]);

        // session()->flash('message', "<span>Category <strong>$dataTitle</strong> has been created successfully!<span>");
    }

    public function editCategory($id)
    {
        $category = Category::where('id', $id)->first();
        // dd($category->name);
        $this->view_category_name = $category->name;
        $this->view_category_description = $category->description;
        $this->view_category_id = $category->id;
        $this->category_edit_id = $category->id;

        $this->fillInputFields($category->name, $category->description);

        $this->dispatchBrowserEvent('show-edit-category-modal');
    }

    public function editCategoryData()
    {
        // dd($this->state);
        $this->validate([
            'name' => 'required',
        ]);

        $category = Category::where('id', $this->category_edit_id)->first();
        $category->name = $this->name;
        // $category->email = $this->email;
        // $category->role_id = $this->role_id;
        LogCategories::create([
            'user_id' => Auth::user()->id,
            'activity' => 'Mengedit kategori ' . $category->name,
            'target_id' => $category->id,
            'time' => Carbon::now()
        ]);

        $category->save();

        $dataTitle = $category->name;
        $this->resetInputFieldsEdit();

        $this->resetErrorBag();
        $this->resetValidation();

        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('toastr:success', [
            'message' => "Category has been updated successfully!",
        ]);
        $this->dispatchBrowserEvent('swal:modal', [
            'icon' => 'success',
            'title' => "Data has been updated.",
            'text' => "Data has been updated successfully!",
        ]);
    }

    public function deleteConfirmation($id)
    {
        // $category = Category::where('id', $id)->first();
        $this->category_delete_id = $id;
        $this->dispatchBrowserEvent('show-delete-category-modal');
    }

    // Sweet alert confirmation delete
    public function deleteConfirm($id)
    {
        // $category = Category::where('id', $id)->first();
        $this->category_delete_id = $id;
        $this->dispatchBrowserEvent('swal:confirm-category', [
            'icon' => 'warning',
            'title' => 'Are you sure?',
            'text' => "You won't be able to revert this!",
            'id' => $id,
        ]);
    }

    public function deleteCategoryData()
    {
        $category = Category::where('id', $this->category_delete_id)->first();
        // dd($category);
        LogCategories::create([
            'user_id' => Auth::user()->id,
            'activity' => 'Menghapus kategori ' . $category->name,
            'target_id' => $category->id,
            'time' => Carbon::now()
        ]);
        $dataTitle = $category->name;
        $category->delete();
        $this->dispatchBrowserEvent('close-modal');
        $this->category_delete_id = '';

        $this->dispatchBrowserEvent('toastr:success', [
            'message' => "Category has been deleted!",
        ]);
    }

    public function cancel()
    {
        // Optional sih gangaruh bisa pake dismiss di btn cancelnya juga :v
        $this->category_delete_id = '';
    }

    public function clear()
    {
        $this->resetErrorBag();
        $this->resetValidation();
        $this->resetInputFields();
        $this->resetViewData();
    }

    public function detailCategory($id)
    {
        // dd($email);
        $category = Category::where('id', $id)->first();
        // dd($category);
        $this->view_category_name = $category->name;
        $this->view_category_description = $category->description;
        $this->view_category_id = $category->id;

        $this->dispatchBrowserEvent('show-detail-category-modal');
    }

    public function resetViewData()
    {
        $this->view_category_name = null;
        $this->view_category_description = null;
        $this->view_category_id = null;
    }

    public function closeCategoryDetailModal()
    {
        $this->resetViewData();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        $categories = Category::orderBy('updated_at', 'desc')->get();
        return view('livewire.categories.categories-component', [
            'selectedRole' => 'Pelanggan',
            'imagePath' => ''
        ], compact('categories'))->extends('layouts.app', ['title' => 'Categories Product'])->section('content');
    }
}
