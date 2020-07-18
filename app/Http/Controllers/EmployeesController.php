<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EmployeesController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        if(!$employees) {
            return response()->json([
                'message'   => 'Record not found bz',
            ], 404);
        }
        return response()->json($employees);
    }
    public function show($id)
    {
        $employee = Employee::find($id);

        if(!$employee) {
            return response()->json([
                'message'   => 'Record not found 3',
            ], 404);
        }

        return response()->json($employee);
    }
    public function store(Request $request)
    {
        $employee = new Employee();
        //$employee->fill($request->all());
        $employee->name = $request['name'];
        $employee->sobrenome = $request['sobrenome'];
        $employee->area = $request['area'];
        $employee->salario = $request['salario'];
        $employee->save();

        return response()->json($employee, 201);
    }
    public function update(Request $request, $id)
    {
        $employee= Employee::find($id);

        if(!$employee) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        $employee>fill($request->all());
        $employee->save();

        return response()->json($employee);
    }
    public function destroy($id)
    {
        $employee = Employee::find($id);

        if(!$employee) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        $employee->delete();
    }
}
