@extends('layouts.app')
@section('content')

    <div class="card">
        <div class="card-header">
           <h1>mocifica Specialità</h1>
        </div>
        <div class="card-body">
            <form action="{{route('specialties.update',$specialty->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nome">nome esame</label>
                    <input type="text" name="specialty[nome]" class="form-control" value="{{$specialty->nome}}"/>
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
