@extends('layouts.app')
@section('content')

    <div class="card">
        <div class="card-header">
           <h1>nuova Specialità</h1>
        </div>
        <div class="card-body">
            <form action="{{route('specialties.store')}}" method="post">
                @csrf
                <div class="form-group">
<<<<<<< HEAD
                    <label for="nome">nome Specialità</label>
                    <input type="text" name="specialty[nome]" class="form-control" placeholder="nome reparto"/>
=======
                    <label for="nome">nome esame:<span class="text-danger">*</span></label>
                    <input type="text" name="specialita[nome]" class="form-control" placeholder="nome reparto"/>

>>>>>>> develop
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
