<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OrderServiceRequest;
use App\OrderService;
use App\Customer;
use App\User;
use PDF;

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
   
    public function index(Request $request)
    {
      $orderServices = $this->orderService->where('status','>=',2)->orderBy('id','DESC')->paginate(10);
      return view('admin.orderservices.index', compact('orderServices'));
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      
        if($request->filled('search')) {
         
          $search = $request->get('search');

          $customers = $this->customer->where('fullname', 'like', "%{$search}%")
          ->paginate(10);

          $customers->appends(['search' => $search]);

            if(count($customers) > 0) { 
              return view('admin.orderservices.create', compact('customers','search'));
            }
            
            flash('Pesquisa não encontrou nenhum resultado')->warning();
            return view('admin.orderservices.create',  compact('customers','search'));
        }

          $customers = $this->customer->where('active',1)->orderBy('id','DESC')->paginate(15);
          return view('admin.orderservices.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = $request->all();
        $data['status'] = 3; //Status Em Andamento
        
        $orderService = $this->orderService->create($data);

        $lastOS = $orderService->id; //Retorno do ID do Banco

        return redirect()->route('os.edit',['orderService' => $lastOS]);
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
      
      //Filter Role 'User' Não Encerrar OS
      
      if(auth()->user()->level == 'user' &&  $request['status'] == 1){
        flash('Você Não Tem Permissão Para Encerrar Order de Serviço!')->error();
        return redirect()->back();
      }  
           
        $data = $request->all();
        $orderService = $this->orderService->find($orderService);

        $data['price'] = formatPriceToDatabase($data['price']);
        
        //dd($data['price']);
        if($data['status'] == 1){

            $id = $data['id'];
            
            $data['finished_user_id'] = auth()->user()->id;
            $orderService->update($data);

            flash('Orden de Serviço finalizada com sucesso!')->success();
            return view('admin.orderservices.endOs', compact('id'));
            
        };

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
        $orderService = $this->orderService->find($id);
      
        $data['status'] = 0;
        $data['finished_user_id'] = auth()->user()->id;
       
        $orderService->update($data);

        flash('Orden de Serviço cancelada com sucesso!')->success();
        return redirect()->route('os.index');
         
    }

    public function generatePDF($id)
    {
        $os = $this->orderService->find($id);
        $pdf = PDF::loadView('reports.orders', compact('os'));
        return $pdf->setPaper('a4')->stream('orden_de_servico.pdf');
        //dd($os);

    }

    public function generatePrint($id)
    {
        $os = $this->orderService->find($id);
        return view('reports.orders', compact('os'));
        //dd($os);

    }

    public function generatePrintFinished($id)
    {
        $os = $this->orderService->find($id);
        return view('reports.orderfinished', compact('os'));
    }

    public function searchCustom($status)
    {
      $orderServices = $this->orderService->Where('status', '=', "{$status}")->orderBy('id','DESC')->paginate(10);
      return view('admin.orderservices.index', compact('orderServices'));
    }

    
    public function search(Request $request)
    {       
      
        if($request->filled('search')) {

          $search = $request->search;

          $orderServices = OrderService::select('order_services.*')
            ->join('customers','customers.id','=','order_services.customer_id')
            ->where(function($query) use($search){
              $query->where('order_services.id','=',"{$search}")
                  ->orWhere('customers.fullname','like',"%{$search}%");
              })
            ->where('order_services.status','>=','1')
            ->paginate(10);

            $orderServices->appends(['search' => $search]);  

              
            if(count($orderServices) > 0) { 
              return view('admin.orderservices.index', compact('orderServices','search'));
            }

            flash('Pesquisa não encontrou nenhum resultado')->warning();
            return redirect()->route('os.index');

        }
        
        flash('Pesquisa não encontrou nenhum resultado')->warning();
        return redirect()->route('os.index');    
    }

    public function history($id)
    {
      //dd('chegou'. $id);
      //dd(auth()->user()->level);
      if($id){

        if(auth()->user()->level != 'user'){

          $OSCustomer = $this->orderService->with('customer')->where('customer_id', '=', $id)->get();

          //dd($OSCustomer);
          return view('admin.customers.history', compact('OSCustomer', 'id'));

        }
  
        flash('Você Não Tem Permissão, Fale Com Suporte!')->error();
        return redirect()->back();
      }
      
    }
}
