<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\User;
use App\Http\Requests\CustomerRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerRequest $request)
    {
        $image = $request->file('image');
        $slug = Str::slug($request->name);
        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            if (!file_exists('uploads/customers')) {
                mkdir('uploads/customers', 0777, true);
            }
            $image->move('uploads/customers', $imagename);
        } else {
            $imagename = "";
        }

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->identification_document = $request->identification_document;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->status = 1;
        $customer->registeredby = $request->user()->id;
        $customer->image = $imagename;
        $customer->save();

        return redirect()->route('customers.index')->with('successMsg', 'Successful Registration');

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

    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerRequest $request, string $id)
    {
        $customer = Customer::find($id);

        $image = $request->file('image');
        $slug = str::slug($request->name);
        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            if (!file_exists('uploads/customers')) {
                mkdir('uploads/customers', 0777, true);
            }
            $image->move('uploads/customers', $imagename);
        } else {
            $imagename = $customer->image;
        }


        $customer->name = $request->name;
        $customer->identification_document = $request->identification_document;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->status = 1;
        $customer->registeredby = $request->user()->name;
        $customer->image = $imagename;
        $customer->save();

        return redirect()->route('customers.index')->with('successMsg', 'Successful Registration');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('successMsg', 'Customer Delete');
    }
    public function changestatuscustomer(Request $request)
    {
        $customer = Customer::find($request->customer_id);
        $customer->status = $request->status;
        $customer->save();
    }
}
