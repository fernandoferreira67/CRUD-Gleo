<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OrderServiceRequest;
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
        $orderServices = $this->orderService->paginate(10);
        //$orderServices = $this->orderService->with('customer')->get();

        //dd($orderServices);
        return view('admin.orderservices.index', compact('orderServices'));
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = $this->customer->all();
        return view('admin.orderservices.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderServiceRequest $request)
    {
        $data = $request->all();

        $orderService = $this->orderService->create($data);

        flash('Orden de serviço aberta com sucesso')->success();
        return redirect()->route('os.index');

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
        $os = $this->orderService->findorFail($id);
        return view('admin.orderservices.edit', compact('os'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrderServiceRequest $request, $orderService)
    {
        $data = $request->all();
        $orderService = $this->orderService->find($orderService);
        $orderService->update($data);
        
        flash('Orden de Serviço atualizada com sucesso!')->success();
        return redirect()->route('os.index');
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

    public function openOs()
    {

    }
}
