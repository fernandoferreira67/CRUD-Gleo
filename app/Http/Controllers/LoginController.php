<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Customer;
use App\OrderService;

class LoginController extends Controller
{
    private $customer;
    private $orderService;

    public function __construct(Customer $customer, OrderService $orderService)
    {
        $this->customer = $customer;
        $this->orderService = $orderService;

    }
    public function dashboard()
    {
        if(Auth::check() === true){
            
            $dashboard['customers'] = $this->customer->count();
            $dashboard['orders_finished'] = $this->orderService->where('status','=','1')->count();
            $dashboard['orders_pending'] = $this->orderService->where('status','=','2')->count();
            $dashboard['orders_pending_payment'] = $this->orderService->where('status','=','4')->count();
            
            
            //dd($dashboard['session_info']);
            return view('admin.dashboard', compact('dashboard'));
        }
        return redirect()->route('admin.login'); 
    }

    public function showLoginForm()
    {
        return view('admin.login.index');
    }

    public function login(Request $request)
    {   
        $credentials = 
        [
            'email' => $request->username,
            'password' => $request->password
        ];
       

        if(Auth::attempt($credentials)){
            return redirect()->route('admin');
        }

        return redirect()->back()->withInput()->withErrors(['Os dados inseridos não confere!']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin');
    }
}
