<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use App\User;
use App\Http\Requests\StoreEmployee;
use Illuminate\Http\Request;


class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkadmin', ['only' => ['create','store','edit','update','destroy']]);
    }

    public function index()
    {
        $employees = Employee::with('company')->paginate(10);

        return view('employee.index', compact('employees'));
    }

    public function create()
    {
        $companies = Company::all();

        return view('employee.create', compact('companies'));
    }

    public function store(StoreEmployee $request)
    {
        $validated = $request->all();

        $user = User::create([
            'name' => $validated['first_name'].$validated['last_name'],
            'email' => $validated['email'],
            'is_admin' => false,
            'password' => bcrypt($validated['password']),
        ]);

        Employee::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'department' => $validated['department'],
            'phone_no' => $validated['phone_no'],
            'staff_id' => $validated['staff_id'],
            'company_id' => $validated['company_id'],
            'user_id' => $user->id,
            'address' =>$validated['address'],
        ]);

        return redirect()->route('employee.index');
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);

        $companies = Company::all();

        return view('employee.edit', compact('employee','companies'));
    }

    public function update(StoreEmployee $request,$id)
    {
        $validated = $request->validated();

        $employee = Employee::findOrFail($id);

        $employee->update([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'department' => $validated['department'],
            'phone_no' => $validated['phone_no'],
            'staff_id' => $validated['staff_id'],
            'company_id' => $validated['company_id'],
            'address' =>$validated['address'],
        ]);

        $employee->user->update(['name' => $validated['first_name'].$validated['last_name']]);

        return redirect()->route('employee.index');
    }

    public function destroy($id)
    {
        Employee::findOrFail($id)->delete();

        return redirect()->route('employee.index');
    }
}
