@extends('layouts.app')


        @section('content')
                <div class="container">
                        <h1>Listado</h1>

                        <hr>

                                <table class="table table-responsive">

                                <thead>
                                        <tr>
                                                <td>Nombre</td>
                                                <td>Email</td>
                                                <td>Acciones</td>
                                        </tr>
                                </thead>
                                                <tr>

                                                                @foreach($usuarios as $user)
                                                                        <td>{{ $user->name }}</td>
                                                                        <td>{{ $user->email }}</td>
                                                                        <td>
                                                                                <button>Eliminar</button>
                                                                        </td>
                                                                @endforeach

                                                </tr>

                                </table>
                </div>
        @endsection