<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\OrderService;
use PDF;

class ReportController extends Controller
{
    private $customer;
    private $orderService;

    public function __construct(Customer $customer, OrderService $orderService)
    {
        $this->customer = $customer;
        $this->orderService = $orderService;
    }

    public function reportAllCustomers()
    {
        $customers = $this->customer->all()->where('active',1);
        $pdf = PDF::loadView('reports.reportAllCustomers', compact('customers'));
        return $pdf->setPaper('a4')->stream('relatorio_todos_clientes.pdf');
    }

    public function reportOsPeding()
    {
        $os = $this->orderService->all() ->where('status','=',2);
        $pdf = PDF::loadView('reports.reportOsPeding', compact('os'));
        return $pdf->setPaper('a4')->stream('orden_de_servico_pendente.pdf');  
    }

    public function reportOsWaiting()
    {
        $os = $this->orderService->all()->where('status', '=', '4');
        $pdf = PDF::loadView('reports.reportOsWaiting', compact('os'));
        return $pdf->setPaper('a4')->stream('orden_de_servico.pdf');
    }
}
