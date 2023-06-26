@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="mb-3">Lista de quimicos registrados</h3>
        <a class="btn btn-info mb-3 w-100" href="{{ route('raw_material.create') }}">Registrar nuevo insumo</a>
        <ul class="list-group">
            @foreach ($raw_materials as $raw_material)
                <li class="list-group-item">
                    <h4>{{ $raw_material->name }}</h4>
                    <p>Componentes</p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Porcentaje</th>
                                <th>Numero CAS</th>
                                <th>¿Es GEI?</th>
                                <th>¿Es RETC?</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($raw_material->chemicals as $chemical)
                                <tr>
                                    <td>{{ $chemical->name }}</td>
                                    <td>{{ $chemical->percentage }}%</td>
                                    <td>{{ $chemical->cas_number ? $chemical->cas_number : 'N.D.' }}</td>
                                    <td class='fw-bold {{ $chemical->is_g_e_i ? 'text-danger' : '' }}'>
                                        {{ $chemical->is_g_e_i ? 'SI' : 'NO' }}
                                    </td>
                                    <td class='fw-bold {{ $chemical->is_r_e_t_c ? 'text-danger' : '' }}'>
                                        {{ $chemical->is_r_e_t_c ? 'SI' : 'NO' }}
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
