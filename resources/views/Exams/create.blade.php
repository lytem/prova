@extends('layouts.app')
@section('content')

    <div class="card" >
        <div class="card-header">
           <h1>nuovo esame</h1>
        </div>
        <div class="card-body">
            <form action="{{route('exams.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="nome">nome esame</label>
                    <input type="text" name="esame[nome]" class="form-control" placeholder="nome reparto"/>
                </div>
                <div class="form-group">
                    <label for="costo">Costo</label>
                    <input type="text" name="esame[costo]" class="form-control" placeholder="indirizzo"/>
                </div>

                </div>
                <div class="card-footer text-muted">

                    <input type="submit" value="salva" class="btn btn-success">

                    <a href="{{url()->previous()}}" class="btn btn-dark" style="float: left">indietro</a>
                </div>
            </form>
        </div>



    </div>

@endsection
