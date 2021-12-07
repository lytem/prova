@extends('layouts.app')
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="card">
                    <div class="card-header">
                        <h1>nuovo reparto</h1>
                    </div>

<<<<<<< HEAD
                </div>
                <div class="card-body">
                    <form action="{{ route('departments.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nome">reparto</label>
                            <input type="text" name="department[nome]" class="form-control" placeholder="nome reparto" />
                        </div>
                        <div class="form-group">
                            <label for="indirizzo">indirizzo</label>
                            <input type="text" name="department[indirizzo]" class="form-control" placeholder="indirizzo" />
                        </div>
                        <div class="form-group">
                            <label for="telefono">Telefono</label>
                            <input type="text" name="department[telefono]" class="form-control" placeholder="telefono" />
                        </div>
                        <div class="form-group">
                            <label for="email">email</label>
                            <input type="text" name="department[email]" class="form-control" placeholder="email" />
                        </div>

                        <div class="card-footer text-muted">

                            <input type="submit" value="salva" class="btn btn-success">

                            <a href="{{ url()->previous() }}" class="btn btn-dark" style="float: left">indietro</a>
                        </div>
                    </form>
                </div>
=======
    <div class="card">
        <div class="card-header">

           <h1>nuovo reparto</h1>
        </div>
        <div class="card-body">
            <form action="{{route('departments.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="nome">reparto:<span class="text-danger">*</span></label>
                    <input type="text" name="department[nome]" class="form-control" placeholder="nome reparto" value="{{old('department.nome') ? old('department.nome') : $department->nome ?? ''}}"/>
                </div>
                <div class="form-group">
                    <label for="indirizzo">indirizzo:<span class="text-danger">*</span></label>
                    <input type="text" name="department[indirizzo]" class="form-control" placeholder="indirizzo" value="{{ (old('department.indirizzo')) ? old('department.indirizzo') : $department->indirizzo ?? '' }}"/>
                </div>
                <div class="form-group">
                    <label for="telefono">Telefono:<span class="text-danger">*</span></label>
                    <input type="text" name="department[telefono]" class="form-control" placeholder="telefono" value="{{ (old('department.telefono')) ? old('department.telefono') : $department->telefono ??'' }}"/>
                </div>
                <div class="form-group">
                    <label for="email">email:<span class="text-danger">*</span></label>
                    <input type="text" name="department[email]" class="form-control" placeholder="email" value="{{ (old('department.nome')) ? old('department.nome') : $department-›nome ?? '' }}"/>
                </div>

                <div class="card-footer text-muted">
>>>>>>> develop

            </div>
        </div>
    </div>



@endsection
