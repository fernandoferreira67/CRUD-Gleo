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

    public function reportAllOS()
    {   
        $typeRPT = 'Ordem de Serviço - Completo';
        $data = $this->orderService
                ->all();
        $pdf = PDF::loadView('reports.report', compact('data','typeRPT'));
        return $pdf->setPaper('a4')->stream('relatorio_os_todas.pdf');
    }

    public function reportOSCancel()
    {   
        $typeRPT = 'Relatório de Ordem de Serviço - Canceladas';
        $data = $this->orderService
                ->all()
                ->where('status','=',0);
        $pdf = PDF::loadView('reports.report', compact('data','typeRPT'));
        return $pdf->setPaper('a4')->stream('relatorio_os_canceladas.pdf');
    }

    public function reportOSProgress()
    {   
        $typeRPT = 'Relatório de Ordem de Serviço - Em Andamento';
        $data = $this->orderService
                ->all()
                ->where('status','=',3);
        $pdf = PDF::loadView('reports.report', compact('data','typeRPT'));
        return $pdf->setPaper('a4')->stream('relatorio_os_andamento.pdf');
    }

    public function reportOSFinished()
    {   
        $typeRPT = 'Relatório de Ordem de Serviço - Finalizadas';
        $data = $this->orderService
                ->all()
                ->where('status','=',1);
        $pdf = PDF::loadView('reports.report', compact('data','typeRPT'));
        return $pdf->setPaper('a4')->stream('relatorio_os_finalizada.pdf');
    }

    public function reportOsPeding()
    {
        $os = $this->orderService->all()->where('status','=',2);
        $pdf = PDF::loadView('reports.reportOsPeding', compact('os'));
        return $pdf->setPaper('a4')->stream('relatorio_os_pendente.pdf');  
    }

    public function reportOsWaiting()
    {
        $os = $this->orderService->all()->where('status', '=', '4');
        $pdf = PDF::loadView('reports.reportOsWaiting', compact('os'));
        return $pdf->setPaper('a4')->stream('relatorio_os_aguardando_pagamento.pdf');
    }
}
