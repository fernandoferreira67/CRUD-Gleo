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

    public function reportOsPeding()
    {
        $os = $this->orderService->all();
        $pdf = PDF::loadView('reports.reportOsPeding', compact('os'));
        //dd($os);
        return $pdf->setPaper('a4')->stream('orden_de_servico.pdf');
       
    }

    public function reportOsWaiting()
    {
        $os = $this->orderService->where('status', '=', '1');
        $pdf = PDF::loadView('reports.reportOsWaiting', compact('os'));
        //$pdf = PDF::set_base_path(realpath(dirname(__FILE__).'public/css/app.css'));
        return $pdf->setPaper('a4')->stream('orden_de_servico.pdf');
        dd($os);
    }
}
