<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\StoreCompany;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkadmin', ['only' => ['create','store','edit','update','destroy']]);
    }

    public function index()
    {
        $companies = Company::with('employees')->paginate(10);

        return view('company.index', compact('companies'));
    }

    public function create()
    {
        return view('company.create');
    }

    public function store(StoreCompany $request)
    {
        $validated = $request->validated();

        Company::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'address' => $validated['address'],
        ]);
        
        return redirect()->route('company.index');
    }

    public function edit($id)
    {
        $company = Company::findOrFail($id);

        return view('company.edit', compact('company'));
    }

    public function update(StoreCompany $request,$id)
    {
        $validated = $request->validated();

        $company = Company::findOrFail($id);

        $company->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'address' => $validated['address'],
        ]);

        return redirect()->route('company.index');
    }

    public function destroy($id)
    {
        Company::findOrFail($id)->delete();

        return redirect()->route('company.index');
    }
}
