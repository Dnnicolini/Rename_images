@extends('layouts.main')

@section('title', 'Criar imagem')

@section('content')


<div class="container-fluid mt-3">
    <div class="d-flex mb-2">
        <h2 class="fw-bold"> Seleção de imagem </h2>
    </div>
</div>


<div class="container-fluid">
    <div class="d-flex flex-row-reverse mb-1 mx-auto">
        <a href="{{ url('/imagens') }}" class="btn btn-primary float-r">Voltar</a>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ url('/imagens/store') }}" enctype="multipart/form-data" method="post" id="formAdd">
                <div class="row">
                    @csrf
                    <div class="col-md-12 p-2">
                        <div class="row">
                            <div class="col-md-6 p-2">
                                <div class="form-group">
                                    <label for="" class="fw-bold">Arquivo txt:<span class="text-danger">*</span></label>
                                    <input type="file" class="form-control mt-2" accept=".txt" name="nome" id="file" />
                                </div>
                            </div>
                            <div class="col-md-6 p-2">
                                <div class="form-group">
                                    <label for="" class="fw-bold">Imagem:<span class="text-danger">*</span></label>
                                    <input type="file" name="imagem" class="form-control mt-2" id="imagem" required>

                                    @if($errors->has('imagem'))
                                    <span class="text-danger">{{ $errors->first('imagem') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    <div class="col-md-12">
                        <hr>
                        <button class="btn btn-success float-r" type="submit" id="btnAdicionar">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection

