@extends('layouts.app')
@section('content')

<div class="card">
    <form action="{{route('appointments.update',$appointment->id)}}" method="post">
@csrf
@method('PUT')
        <div class="card-header">
            modifica appuntamento
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="doctor_id">Scelgi dottore</label>

                <select name="appointment[doctor_id]" class="form-control">
                    <option value="0"> ---dottore--- </option>
                    @foreach ($doctor as $item)

                        <option value="{{ $item->id }}" @if($item->id == $appointment->doctor_id) selected="selected" @endif>
                            {{ $item->cognome }}
                        </option>

                    @endforeach
                </select>

            </div>
            <div class="form-group">
                <label for="patient_id">Scelgi patient</label>

                <select name="appointment[patient_id]" class="form-control">
                    <option value="0"> ---paziente-- </option>
                    @foreach ($patient as $item)

                        <option value="{{ $item->id }}" @if($item->id == $appointment->patient_id) selected="selected" @endif>
                            {{ $item->cognome }} {{ $item->nome }}
                        </option>

                    @endforeach
                </select>

            </div>
            <div class="form-group">
                <label for="department_id">Scelgi reparto</label>

                <select name="appointment[department_id]" class="form-control">
                    <option value="0"> ---reparto-- </option>
                    @foreach ($department as $item)

                        <option value="{{ $item->id }}" @if($item->id == $appointment->department_id) selected="selected" @endif>
                            {{ $item->nome}}
                        </option>

                    @endforeach
                </select>

            </div>
            <div class="form-group">
                <label for="data">data</label>
                <input type="date" name="appointment[data]" class="form-control"  value="{{$appointment->data}}"/>
            </div>
            <div class="form-group">
                <label for="ora">data</label>
                <input type="time" name="appointment[ora]" class="form-control"  value="{{$appointment->ora}}"/>
            </div>
        </div>
        <div class="card-footer text-muted">
            <input type="submit" value="salva" class="btn btn-info">
            <a href="{{url()->previous()}}" class="btn btn-dark">indietro</a>
        </div>


    </form>


</div>

@endsection
