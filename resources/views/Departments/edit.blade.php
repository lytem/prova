@extends('layouts.app')
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="card">
                    <div class="card-header">
                        <h1>nuovo reparto</h1>
                    </div>

                </div>
                <div class="card-body">
                    <form action="{{ route('departments.update', $department->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nome">reparto</label>
                            <input type="text" name="department[nome]" class="form-control"
                                value="{{ $department->nome }}" />
                        </div>
                        <div class="form-group">
                            <label for="indirizzo">indirizzo</label>
                            <input type="text" name="department[indirizzo]" class="form-control"
                                value="{{ $department->indirizzo }}" />
                        </div>
                        <div class="form-group">
                            <label for="telefono">Telefono</label>
                            <input type="text" name="department[telefono]" class="form-control"
                                value="{{ $department->telefono }}" />
                        </div>
                        <div class="form-group">
                            <label for="email">email</label>
                            <input type="text" name="department[email]" class="form-control"
                                value="{{ $department->email }}" />
                        </div>

                        <div class="card-footer text-muted">

                            <input type="submit" value="salva" class="btn btn-success">

                            <a href="{{ url()->previous() }}" class="btn btn-dark" style="float: left">indietro</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>







@endsection
