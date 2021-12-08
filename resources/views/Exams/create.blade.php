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
                    <label for="nome">nome esame:<span class="text-danger">*</span></label>
                    <input type="text" name="exam[nome]" class="form-control" placeholder="nome esame"
                        value="{{ old('exam.nome') ? old('exam.nome') : $exam->nome ?? '' }}" />
                </div>
                <div class="form-group">
                    <label for="costo">Costo:<span class="text-danger">*</span></label>
                    <input type="text" name="exam[costo]" class="form-control" placeholder="costo"
                        value="{{ old('exam.costo') ? old('exam.costo') : $exam->costo ?? '' }}" />
                </div>
                <div class="card-footer text-muted">

                    <input type="submit" value="salva" class="btn btn-success">

                    <a href="{{ url()->previous() }}" class="btn btn-dark" style="float: left">indietro</a>
                </div>
            </form>
        </div>
    </div>

@endsection
