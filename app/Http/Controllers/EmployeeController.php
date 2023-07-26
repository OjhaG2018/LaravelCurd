<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = Employee::paginate(2);

        // print_r($records);
        return view('employee/index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        
        $request->validate([
            'first_name'    => 'required|min:2|max:10',
            'last_name'     => 'required',
            'email'         => 'required|unique:employees',
            'mobile'        => 'required|min:10|max:13|unique:employees',
            'doj'           => 'required',
            'featured_image'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        // $fileName = time() . '.' . $request->featured_image->extension();
        // $request->featured_image->storeAs('public/images', $fileName);

        $path = $request->file('featured_image')->store('public/images','public');

        $employee = new Employee;
        
        $employee->first_name   =	$request->first_name;
        $employee->last_name    =	$request->last_name;
        $employee->email        =	$request->email;
        $employee->mobile       =	$request->mobile;
        $employee->doj          =	$request->doj;
        $employee->status       =	$request->status;
        $employee->featured_image = $path;
        $employee->Save();
        return redirect()->route('employee.index')->with(['success'=>__('message.success')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $employee = Employee::findOrFail($id);
        return view('employee/create', [
            'record' => Employee::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'first_name'    => 'required|min:2|max:10',
            'last_name'     => 'required',
            'email'         => 'required|unique:employees,email,'.$id,
            'mobile'        => 'required|min:10|max:13|unique:employees,mobile,'.$id,
            'doj'           => 'required'
        ]);

        $employee = Employee::find($id);

        if($request->featured_image != ''){
            $file_old = storage_path().'/'.$employee->featured_image;
            // die;
            @unlink($file_old);
            $path = $request->file('featured_image')->store('public/images','public');
            $employee->featured_image       =	$path;
        }
        

        $employee->first_name   =	$request->first_name;
        $employee->last_name    =	$request->last_name;
        $employee->email        =	$request->email;
        $employee->mobile       =	$request->mobile;
        $employee->doj          =	$request->doj;
        $employee->status       =	$request->status;
        

        $update = $employee->save();
        if($update){
            return redirect()->route('employee.index')->with(['success'=>__('message.success')]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect()->route('employee.index')->with(['success'=>__('message.success_delete')]);
    }
}
