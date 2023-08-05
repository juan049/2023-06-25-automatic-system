@extends('layouts.app')

@section('content')
    <style>
        table td {
            position: relative;
        }

        table td input {
            position: absolute;
            display: block;
            top: 0;
            left: 0;
            margin: 0;
            height: 100%;
            width: 100%;
            border: none;
            padding: 10px;
            box-sizing: border-box;
        }
    </style>
    <div class="container">
        <h1>Dar de alta un nuevo insumo</h1>
        {{ $validation_errors }}

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
                        errors: $errors->get('name'),
                        value: old('name'),
                    ) }}

                    {{ form_input_text(
                        id_name: 'brand',
                        label: 'Marca del químico',
                        placeholder: 'Marca del químico',
                        errors: $errors->get('brand'),
                        value: old('brand'),
                    ) }}
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Componentes</h5>
                    <input type="hidden" name="components" id="components">
                    <table class="table table-bordered text-center" id="components-table">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Porcentaje</th>
                                <th scope="col">Numero CAS</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>



                        </tbody>
                    </table>

                </div>
            </div>


            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Áreas de uso</h5>
                    <div class="row mx-3">
                        <input type="hidden" name="areas" id="areas">
                        @foreach ($areas as $area)
                            {{ form_input_check(label: $area->name, id_name: $area->id, div_class: 'form-check col-6') }}
                        @endforeach
                    </div>

                </div>
            </div>
            <button class="btn btn-info w-100" type="submit">Dar de alta</button>
        </form>
    </div>
    <script src="{{ asset('assets/js/raw_material/create.js') }}"></script>
@endsection
