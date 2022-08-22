@extends('layouts.main')

@section('title', 'imagens')

@section('content')

<div class="container-fluid mt-4 p-2">
    <div class="row">
        <div class="col-md-6">
            <div class="d-flex  mb-3 mx-auto">
                <h2 class="fw-bold">
                    <i class="bi bi-image" aria-hidden="true"></i>
                    Imagens cadastradas
                </h2>
            </div>
            @if( $btn == false)
            <div class="d-flex mx-auto p-2">
                <a href='{{ url("/imagens/create") }}' class="btn btn-success float-r">
                    <i class="bi bi-plus"></i>Adicionar imagem</a>
            </div>

            @else
        </div>
        <div class="col-md-6">
            <div class="d-flex flex-row-reverse p-2 mx-auto">
                <a href='{{ url("/downloads") }}' class="btn btn-success float-r">
                    <i class="bi bi-save"></i> Baixar Imagens</a>
            </div>

            <div class="d-flex flex-row-reverse p-2 mx-auto">
                <form method="POST" action='{{ route('imagens.delete') }}' style="display:contents">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger">Remover
                    </button>
                </form>
            </div>
        </div>
        @endif

    </div>
</div>




<div class="container-fluid ms-auto">

    <div class="container-flex p-2">
        <table class="table table-bordered border-dark border-3 align-middle">
            <thead>
                <tr class="table-secondary">
                    <th scope="col">Código</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Imagem</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($imagens as $img)
                <tr>
                    <td class="border px-4 py-2">{{ $img->codigo }}</td>
                    <td class="border px-4 py-2">{{ $img->nome }}</td>
                    <td class="border px-4 py-2">
                        <a href='{{ url("/storage/imagens/$img->imagem") }}' target="_blank" data-toggle="tooltip" data-placement="top" title="{{ __('default.view_front_image') }}" style="margin-right: 3px" class="btn btn-info btn-sm">
                            <i class="bi bi-image"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>


        <nav aria-label="Navegação de página exemplo">
            <ul class="pagination justify-content-center">
                {{ $imagens->links()}}

            </ul>
        </nav>
    </div>




    @yield('content')
    @endsection

