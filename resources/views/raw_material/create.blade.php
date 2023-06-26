@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Dar de alta un nuevo insumo</h1>
        <form action="{{ route('raw_material.store') }}" method="POST">
            @csrf

            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Datos generales</h5>
                    {{ form_input_text(
                        id_name: 'name',
                        label: 'Nombre del químico',
                        placeholder: 'Nombre del químico',
                        div_class: 'mb-3',
                    ) }}
                    {{ form_input_text(id_name: 'brand', label: 'Marca del químico', placeholder: 'Marca del químico') }}
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Áreas de uso</h5>
                    <div class="row mx-3">
                        @foreach ($areas as $area)
                            {{ form_input_check(label: $area->name, id_name: $area->id, div_class: 'form-check col-6') }}
                        @endforeach
                    </div>

                </div>
            </div>
            <button class="btn btn-info w-100" type="submit">Dar de alta</button>
        </form>
    </div>
@endsection
