<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\User;



class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = session('user');
        $accounts = Account::all();
        // dd($accounts);
        return view('accounts.index', compact('accounts','user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedAccount = $request->validate([
            'titulo' => 'required|min:5|max:100',
            'descricao' => 'required|max:499',
            'valor' => 'required|numeric|min:0||max:1000000',
            'data_vencimento' => 'required|date|date_format:Y-m-d',
            'status' => 'required|in:pago,pendente',
        ],[
            // Retorno dos textos resultados de suas requisições
            'titulo.required' => 'Informe o título da anotação.',
            'titulo.min' =>'Insira no mínimo 5 caracteres para prosseguir!',
            'titulo.max' =>'O limite máximo do titulo é de 100 caracteres!',
            'descricao.required' => 'Insira uma descrição.',
            'descricao.max' =>'O limite máximo da descrição é de 500 caracteres!',
            'valor.required' => 'Digite o valor da conta!',
            'valor.numeric' => 'Somente valores numéricos!',
            'valor.min' =>'Digite um valor aceitável!',
            'valor.max' =>'Digite um valor aceitável, abaixo de 1.000.000!',
            'data_vencimento.required'=>'Insira uma data!',
            'data_vencimento.date'=>'Insira uma data válida!',
            'data_vencimento.date_format'=>'Insira um formato válido de data dd/mm/aaaa!',
            'status.required' => 'É necessário inserir um status!',
        ]);

        try{
            $account = new Account($validatedAccount);
            $account->user_id = Auth::id();
            $account->save();

            session()->flash('status', 'Conta adicionada com sucesso!');
            return redirect()->route('accounts.index');
        }catch(\Exception $e){
            session()->flash('error', 'Ocorreu um erro ao adicionar uma conta: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
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
    public function edit(string $id)
    {
        $user = session('user');
        $accounts = Account::findOrFail($id);
        return view('accounts.edit', compact('accounts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedAccount = $request->validate([
            'titulo' => 'required|min:5|max:100',
            'descricao' => 'required|max:499',
            'valor' => 'required|numeric|min:0||max:1000000',
            'data_vencimento' => 'required|date|date_format:Y-m-d',
            'status' => 'required|in:pago,pendente',
        ],[
            // Retorno dos textos resultados de suas requisições
            'titulo.required' => 'Informe o título da anotação.',
            'titulo.min' =>'Insira no mínimo 5 caracteres para prosseguir!',
            'titulo.max' =>'O limite máximo do titulo é de 100 caracteres!',
            'descricao.required' => 'Insira uma descrição.',
            'descricao.max' =>'O limite máximo da descrição é de 500 caracteres!',
            'valor.required' => 'Digite o valor da conta!',
            'valor.numeric' => 'Somente valores numéricos!',
            'valor.min' =>'Digite um valor aceitável!',
            'valor.max' =>'Digite um valor aceitável, abaixo de 1.000.000!',
            'data_vencimento.required'=>'Insira uma data!',
            'data_vencimento.date'=>'Insira uma data válida!',
            'data_vencimento.date_format'=>'Insira um formato válido de data dd/mm/aaaa!',
            'status.required' => 'É necessário inserir um status!',
        ]);

        try{
            $user = session('user');
            $accounts = Account::findOrFail($id);
            $accounts->update($validatedAccount);

            session()->flash('status', 'Conta modificada com sucesso!');
            return redirect()->route('accounts.index');
        }catch(\Exception $e){
            session()->flash('error', 'Ocorreu um erro ao editar a conta: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $accounts = Account::findOrFail($id);
            $accounts->delete();
            session()->flash('status', 'Anotação excluída com sucesso!');
            return redirect()->back();
        } catch (\Exception $e) {
            session()->flash('error', 'Ocorreu um erro ao excluir a anotação: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
