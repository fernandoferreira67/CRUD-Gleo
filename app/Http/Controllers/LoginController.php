<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Customer;
use App\OrderService;
use App\User;

class LoginController extends Controller
{
    private $customer;
    private $orderService;
    private $user;

    public function __construct(Customer $customer, OrderService $orderService, User $user)
    {
        $this->customer = $customer;
        $this->orderService = $orderService;
        $this->user = $user;

    }
    public function dashboard()
    {

        if(Auth::check() === true){

           if(Auth::user()->active){
            $dashboard['customers'] = $this->customer->count();
            $dashboard['orders_finished'] = $this->orderService->where('status','=','1')->count();
            $dashboard['orders_pending'] = $this->orderService->where('status','=','2')->count();
            $dashboard['orders_pending_payment'] = $this->orderService->where('status','=','4')->count();          
            
            //dd($dashboard['session_info']);
            return view('admin.dashboard', compact('dashboard'));

           }else{
                flash('Usuário Desativado! Entre Contato com o Administrador')->error();
                return redirect()->route('admin.login');
           }
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
            'username' => $request->username,
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

    public function index()
    {
        $users = $this->user->where('level','admin')
        ->where('active',1)
        ->orWhere('level','user')
        ->orderBy('id', 'DESC')->get();

        return view('admin.settings.users.index',compact('users'));
    }

    public function create()
    {
        return view('admin.settings.users.create');
    }

    public function store(LoginRequest $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        
        $user = $this->user->create($data);
        
        flash('Usuário Criado com Sucesso!')->success();
        return redirect()->route('admin.settings.users.index');

    }

    public function edit($user)
    {
        $user = $this->user->find($user);
        return view('admin.settings.users.edit',compact('user'));
        //dd($user);
    }

    public function update(LoginRequest $request, $user)
    {
        $data = $request->all();
        $user = $this->user->find($user);

        if(($request->password) == ($user->password))
        {
            $user->update($data);

            flash('Cadastro atualizado com sucesso!')->success();
            return redirect()->route('admin.settings.users.index');
            
        }

        $data['password'] = Hash::make($request->password);
        $user->update($data);

        flash('Cadastro de Usuário atualizado com sucesso!')->success();
        return redirect()->route('admin.settings.users.index');
       
    }
}
