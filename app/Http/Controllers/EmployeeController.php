<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employee = Employee::all()->toArray();
        return array_reverse($employees);      
    }

    public function store(Request $request)
    {
        $employee = new Employee([
            'first name' => $request->input('first name'),
            'last name' => $request->input('last name'),
            'company' => $request->input('company'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone')
           
        ]);
        $employee->save();

        return response()->json('Employee created successfully!');
    }

    public function show($id)
    {
        $employee = Employee::find($id);
        return response()->json($employee);
    }

    public function update($id, Request $request)
    {
        $employee = Employee::find($id);
        $employee->update($request->all());

        return response()->json('Employee data updated successfully!');
    }

    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();

        return response()->json('Employee deleted successfully!');
    }
}
