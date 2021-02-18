<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderService;
use App\Customer;
use App\User;

class OrderServiceController extends Controller
{

    private $orderService;
    private $customer;
    private $user;

    public function __construct(OrderService $orderService, Customer $customer, User $user)
    {
        $this->orderService = $orderService;
        $this->customer = $customer;
        $this->user = $user;
    }
   
    public function index()
    {
        //$orderServices = $this->orderService->all();
        $orderServices = $this->orderService->with('customer')->get();

        return view('admin.orderservices.index', compact('orderServices'));
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.orderservices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
