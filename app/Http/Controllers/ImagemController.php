<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imagem;
use App\Http\Requests\ImagemRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use File;



class imagemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
   
           $imagens = imagem::paginate(10);
           $btn = Imagem::where('id', '!=', null)->exists();

           return view('imagens.index',[
            'imagens'=> $imagens,
            'btn' => $btn
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $find_number = Imagem::orderBy('id', 'desc')->first();
        return view('imagens.create',[
            'find_number' => $find_number,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImagemRequest $request)
    {
        $arquivo_tmp = $_FILES['nome']['tmp_name'];
        $dados = file($arquivo_tmp);
        
        $codigo = random_int(1, 9999);

        foreach ($dados as $linha) {
        
            $linha = trim($linha);
            $value= explode("/n", $linha);

          $imagem = new Imagem;
            
        if($request->hasFile('imagem')){ 
            foreach ($value as $key => $name) {
            
            $new_file_name = $name . '.' . $request->file('imagem')->extension();
             
            Storage::disk('public')->put('imagens/' . $new_file_name, file_get_contents($request->file('imagem')));
        }
        }

        $imagem->nome = $value[0];

        $imagem->codigo = $codigo;
        $imagem->imagem = $new_file_name;
    
        $imagem->save();
    }

        
        Alert::toast('imagem criado!', 'success');
    

    return redirect('/imagens');
    
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $imagem = imagem::findOrFail($id);
        return view('imagens.edit', compact(['imagem']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $imagem = imagem::findOrFail($id);
        return view('imagens.edit', compact(['imagem']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(imagemRequest $request, $id)
    {
      
         
       
        $imagem = imagem::findOrFail($id);
       
        $imagem->nome = $request->nome;
      
        $imagem->descricao = $request->descricao;
        $imagem->quantidade = $request->quantidade;


        if($request->hasFile('imagem')){
            $new_file_name = md5(strtotime('now')) . '.' . $request->file('imagem')->extension();

            Storage::disk('public')->put('imagens/' . $new_file_name, file_get_contents($request->file('imagem')));
            $imagem->imagem = $new_file_name;
        }

        $imagem->save();
        

        Alert::toast('imagem atualizado!', 'success');

        return redirect('/imagens');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $img = Imagem::all();
        
        $imagens = imagem::where('id', '!=', null);
 
        File::delete(File::glob(storage_path('app/public/*/*.*')));

        $imagens->delete();

        Alert::toast('Imagens deletadas!', 'error');

        return redirect('/imagens');
    }
}
