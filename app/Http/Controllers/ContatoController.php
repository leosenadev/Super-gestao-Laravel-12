<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
use App\Models\MotivoContato;
class ContatoController extends Controller
{
    public function contato(){
        $motivo_contatos = MotivoContato::all();
      
        return view('site.contato',['titulo'=>'Contato(teste)','motivo_contatos'=>$motivo_contatos]);
    }
    public function salvar(Request $request){
        
        $regras=[
            'nome'=>'required|min:3|max:40|unique:site_contatos',
            'telefone'=>'required',
            'email'=>'email',
            'motivo_contatos_id'=>'required',
            'mensagem'=>'required|max:2000'
        ];
        $feedback = [
            'nome.min'=>'O Campo nome precisa ter no minimo 3 caracteres',
            'nome.max'=>'O Campo nome deve ter no máximo 40 caracteres',
            'nome.unique'=>'O nome informado já está em uso',
            'email.email'=>'O email informado não é válido',
            'mensagem.max'=>'A mensagem deve ter no máximo 2000 caracteres',
            'required'=>'O campo :attributes deve ser preenchido'
        ];
        $request->validate($regras,$feedback);
        SiteContato::create($request->all());
        return redirect()->route('site.contato');
    }
    
}
