<?php

namespace App\Http\Livewire\Employees;

use App\Models\LogUsers;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class EmployeesComponent extends Component
{
    public $name, $email, $role_name, $user_edit_id, $user_delete_id;
    public $role_id = '';
    public $state = [];
    public $view_user_id, $view_user_name, $view_user_email, $view_user_role_id, $view_user_role_name, $view_user_username;

    protected $listeners = ['deleteUserData'];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'name' => 'required',
            'email' => 'required|email:dns|unique:users,email,' . $this->user_edit_id . '',
            'role_id' => 'required',
        ]);
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->role_id = '';
    }

    public function resetInputFieldsEdit()
    {
        $this->name = '';
        $this->email = '';
        $this->role_id = '';
        $this->user_edit_id = '';
    }

    private function fillInputFields($name, $email, $role_id, $role_name)
    {
        $this->name = $name;
        $this->email = $email;
        $this->role_id = $role_id;
        $this->role_name = $role_name;
    }

    public function storeUserData()
    {
        $userEmail = $this->email;
        $strChanged = str_replace("@", " ", $userEmail);
        $userNameDump = explode(" ", $strChanged);
        $userNAME = $userNameDump[0];

        $this->validate([
            // 'role_id' => 'required',
            'name' => 'required',
            'email' => 'required|email:dns|unique:users', // except
        ]);

        User::create([
            'role_id' => 3,
            'name' => $this->name,
            'email' => $this->email,
            'username' => $userNAME,
            'password' => Hash::make($userNAME),
        ]);

        $user = User::where('email', $this->email)->first();
        $myTime = Carbon::now()->toDateTimeString();
        LogUsers::create([
            'user_id' => Auth::user()->id,
            'user_name' => Auth::user()->name,
            'user_email' => Auth::user()->email,
            'user_role' => Auth::user()->role->name,
            'activity' => 'Menambahkan user baru ' . $user->name,
            'target_id' => $user->id,
            'time' => $myTime
        ]);


        $dataTitle = $this->name;

        $this->resetErrorBag();
        $this->resetValidation();
        $this->resetInputFields();

        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('toastr:info', [
            'message' => "Kasir <strong>$dataTitle</strong> berhasil ditambahkan!",
        ]);

        $this->dispatchBrowserEvent('swal:modal', [
            'icon' => 'success',
            'title' => "Kasir has been created.",
            'text' => "$dataTitle has been created successfully!",
        ]);

        // session()->flash('message', "<span>User <strong>$dataTitle</strong> has been created successfully!<span>");
    }

    public function editUser($id)
    {
        $user = User::where('id', $id)->first();
        // dd($user->name);
        $this->view_user_name = $user->name;
        $this->view_user_email = $user->email;
        $this->view_user_role_id = optional($user->role)->id;
        $this->view_user_role_name = optional($user->role)->name;
        $this->view_user_id = $user->id;
        $this->user_edit_id = $user->id;

        $this->fillInputFields($user->name, $user->email, optional($user->role)->id, optional($user->role)->name);

        $this->dispatchBrowserEvent('show-edit-user-modal');
    }

    public function editUserData()
    {
        // dd($this->state);
        $this->validate([
            'name' => 'required',
            'email' => 'required|email:dns|unique:users,email,' . $this->user_edit_id . '',
            'role_id' => 'required',
        ]);

        $user = User::where('id', $this->user_edit_id)->first();

        LogUsers::create([
            'user_id' => Auth::user()->id,
            'user_name' => Auth::user()->name,
            'user_email' => Auth::user()->email,
            'user_role' => Auth::user()->role->name,
            'activity' => 'Mengedit user ' . $user->name,
            'target_id' => $user->id,
            'time' => Carbon::now()
        ]);


        $user->name = $this->name;
        $user->email = $this->email;
        $user->role_id = $this->role_id;
        $user->save();

        $dataTitle = $user->name;
        $this->resetInputFieldsEdit();

        $this->resetErrorBag();
        $this->resetValidation();

        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('toastr:success', [
            'message' => "User <strong>$dataTitle</strong> has been updated successfully!",
        ]);
        $this->dispatchBrowserEvent('swal:modal', [
            'icon' => 'success',
            'title' => "User has been updated.",
            'text' => "$dataTitle has been updated successfully!",
        ]);
    }

    public function deleteConfirmation($id)
    {
        // $user = User::where('id', $id)->first();
        $this->user_delete_id = $id;
        $this->dispatchBrowserEvent('show-delete-user-modal');
    }

    // Sweet alert confirmation delete
    public function deleteConfirm($id)
    {
        // $user = User::where('id', $id)->first();
        $this->user_delete_id = $id;
        $this->dispatchBrowserEvent('swal:confirm-employee', [
            'icon' => 'warning',
            'title' => 'Are you sure?',
            'text' => "You won't be able to revert this!",
            'id' => $id,
        ]);
    }

    public function deleteUserData()
    {
        $user = User::where('id', $this->user_delete_id)->first();

        LogUsers::create([
            'user_id' => Auth::user()->id,
            'user_name' => Auth::user()->name,
            'user_email' => Auth::user()->email,
            'user_role' => Auth::user()->role->name,
            'activity' => 'Menghapus kasir ' . $user->name,
            'target_id' => $user->id,
            'time' => Carbon::now()
        ]);

        $dataTitle = $user->name;

        $user->delete();
        $this->dispatchBrowserEvent('close-modal');
        $this->user_delete_id = '';

        $this->dispatchBrowserEvent('toastr:success', [
            'message' => "Kasir <strong>$dataTitle</strong> has been deleted!",
        ]);
    }

    public function cancel()
    {
        // Optional sih gangaruh bisa pake dismiss di btn cancelnya juga :v
        $this->user_delete_id = '';
    }

    public function clear()
    {
        $this->resetErrorBag();
        $this->resetValidation();
        $this->resetInputFields();
        $this->resetViewData();
    }

    public function detailUser($id)
    {
        // dd($email);
        $user = User::where('id', $id)->first();
        // dd($user);
        $this->view_user_name = $user->name;
        $this->view_user_email = $user->email;
        $this->view_user_username = $user->username;
        $this->view_user_role_id = $user->role_id;
        $this->view_user_role_name = optional($user->role)->name;
        $this->view_user_id = $user->id;

        $this->dispatchBrowserEvent('show-detail-user-modal');
    }

    public function resetViewData()
    {
        $this->view_user_name = null;
        $this->view_user_email = null;
        $this->view_user_username = null;
        $this->view_user_role_id = null;
        $this->view_user_role_name = null;
        $this->view_user_id = null;
    }

    public function closeUserDetailModal()
    {
        $this->resetViewData();
        $this->dispatchBrowserEvent('close-modal');
    }


    public function render()
    {
        $users = User::orderBy('updated_at', 'desc')->where('role_id', 3)->get();

        return view('livewire.employees.employees-component', compact('users'))->extends(
            'layouts.app',
            ['title' => 'Cashiers']
        )->section('content');
    }
}
