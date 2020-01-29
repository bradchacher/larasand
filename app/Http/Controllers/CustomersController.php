<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function list()
    {
        $activeCustomers = Customer::where('active', 1)->get();
        $inactiveCustomers = Customer::where('active', 0)->get();

        //dd($activeCustomers);

        //$customers = Customer::all();

        // $customers = [
        //     'Brandon Marwa',
        //     'Francis Nyongesa',
        //     'Peter Marangi',
        // ];
        //  return view('internals.customers', [
        //      //'customers' => $customers,
        //      'activeCustomers' => $activeCustomers,
        //      'inactiveCustomers' => $inactiveCustomers
        //  ]);
         return view('internals.customers', compact('activeCustomers', 'inactiveCustomers'));
    }

    public function store() {

        $data = request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'active' => 'required',
        ]);

        $customer = new Customer();
        $customer->name = request('name');
        $customer->email = request('email');
        $customer->active = request('active');
        $customer->save();

        return back();
        //dd(request('name'));
    }
}
