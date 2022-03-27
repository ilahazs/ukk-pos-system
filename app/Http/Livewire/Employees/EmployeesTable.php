<?php

namespace App\Http\Livewire\Employees;

use App\Models\User;
use Livewire\Component;

class EmployeesTable extends Component
{
    public function render()
    {
        $users = User::where('role_id', 3)->get();
        return view('livewire.employees.employees-table', compact('users'));
    }
}
