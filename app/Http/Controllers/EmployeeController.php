<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Practice;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['employees'] = Employee::latest()->paginate(4);

        return view('employee.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['practices'] = Practice::all();

        return view('employee.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newEmployeeForm = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'practice_id' => 'required',
            'email' => ['required', 'email'],
            'phone' => 'nullable'
        ]);

        Employee::create($newEmployeeForm);

        return redirect('/employees');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        $data['employee'] = $employee;

        return view('employee.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $data = [
            'employee' => $employee,
            'practices' => Practice::all()
        ];

        return view('employee.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $editEmployeeForm = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => ['required', 'email'],
            'phone' => 'nullable'
        ]);

        $employee->update($editEmployeeForm);

        return redirect("/employees/$employee->id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        
        return redirect('/employees');
    }
}
