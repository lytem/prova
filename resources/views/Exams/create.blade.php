@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h1>nuovo esame</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('exams.store') }}" method="post">
                @csrf
                <div class="form-group">
<<<<<<< HEAD
                    <label for="nome">nome esame</label>
                    <input type="text" name="exam[nome]" class="form-control" placeholder="nome reparto"/>
                </div>
                <div class="form-group">
                    <label for="costo">Costo</label>
                    <input type="text" name="exam[costo]" class="form-control" placeholder="indirizzo"/>
=======
                    <label for="nome">nome esame:<span class="text-danger">*</span></label>
                    <input type="text" name="esame[nome]" class="form-control" placeholder="nome reparto"
                        value="{{ old('esame.nome') ? old('esame.nome') : $esame->nome ?? '' }}" />
                </div>
                <div class="form-group">
                    <label for="costo">Costo:<span class="text-danger">*</span></label>
                    <input type="text" name="esame[costo]" class="form-control" placeholder="indirizzo"
                        value="{{ old('esame.costo') ? old('esame.costo') : $esame->costo ?? '' }}" />
>>>>>>> develop
                </div>

                <div class="card-footer text-muted">

                    <input type="submit" value="salva" class="btn btn-success">

                    <a href="{{ url()->previous() }}" class="btn btn-dark" style="float: left">indietro</a>
                </div>
            </form>
        </div>
    </div>

@endsection
