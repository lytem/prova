@extends('layouts.app')
@section('content')

    <div class="card">
        <div class="card-header">
           <h1>nuovo appuntamento</h1>
        </div>
        <div class="card-body">
            <form action="{{route('departments.update',$department->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nome">reparto</label>
                    <input type="text" name="department[nome]" class="form-control" value="{{$department->nome}}"/>
                </div>
                <div class="form-group">
                    <label for="indirizzo">indirizzo</label>
                    <input type="text" name="department[indirizzo]" class="form-control" value="{{$department->indirizzo}}"/>
                </div>
                <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input type="text" name="department[telefono]" class="form-control" value="{{$department->telefono}}"/>
                </div>
                <div class="form-group">
                    <label for="email">email</label>
                    <input type="text" name="department[email]" class="form-control" value="{{$department->email}}"/>
                </div>
                <div class="form-group">
                    <label for="exam_id">Scelgi esame</label>

                    <select name="department[exam_id]" class="form-control">
                        <option value="0"> ---esame--- </option>
                        @foreach ($esame as $item)

                            <option value="{{ $item->id }}" @if ($item->id ==$department->exam_id) selected='selected' @endif>
                                {{ $item->nome }}
                            </option>

                        @endforeach
                    </select>

                </div>
                <div class="card-footer text-muted">

                    <input type="submit" value="salva" class="btn btn-success">

                    <a href="{{url()->previous()}}" class="btn btn-dark" style="float: left">indietro</a>
                </div>
            </form>
        </div>



    </div>

@endsection
