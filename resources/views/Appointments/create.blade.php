@extends('layouts.app')
@section('content')

    <div class="card">
        <div class="card-header">
           <h1>nuovo appuntamento</h1>
        </div>
        <div class="card-body">
            <form action="{{route('appointments.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="doctor_id">Scelgi dottore</label>

                    <select name="appointment[doctor_id]" class="form-control">
                        <option value="0"> ---dottore--- </option>
                        @foreach ($doctor as $item)

                            <option value="{{ $item->id }}">
                                {{ $item->cognome }}
                            </option>

                        @endforeach
                    </select>

                </div>
                <div class="form-group">
                    <label for="patient_id">Scelgi paziente: <span class="text-danger">*</span> </label>

                    <select name="appointment[patient_id]" class="form-control">
                        <option value="0"> ---paziente-- </option>
                        @foreach ($patient as $item)

                            <option value="{{ $item->id }}">
                                {{ $item->cognome }}
                            </option>

                        @endforeach
                    </select>
                  <small class="text-danger">{{$errors->first('patient')}}</small>
                </div>
                <label for="exam_id">Scelgi esame:<span class="text-danger">*</span></label>
                <select name="appointment[exam_id]" class="form-control">
                    <option value="0"> ---reparto-- </option>
                    @foreach ($exam as $item)
                    <option value="{{$item->id}}">
                        {{$item->nome}}
                    </option>
                    @endforeach
                </select>
                <div class="form-group">
                    <label for="department_id">Scelgi reparto:<span class="text-danger">*</span></label>

                    <select name="appointment[department_id]" class="form-control">
                        <option value="0"> ---reparto-- </option>
                        @foreach ($department as $item)

                            <option value="{{ $item->id }}">
                                {{ $item->nome}}
                            </option>

                        @endforeach
                    </select>

                </div>
                <div class="form-group">
                    <label for="data">Data:<span class="text-danger">*</span></label>
                    <input type="date" name="appointment[data]" class="form-control" placeholder="date" value="{{ (old('appointment.data')) ? old('appointment.data') : $appointment->data ?? '' }}"/>
                </div>
                <div class="form-group">
                    <label for="data">Ora:<span class="text-danger">*</span></label>
                    <input type="time" name="appointment[ora]" class="form-control" placeholder="date" value="{{ (old('appointment.ora')) ? old('appointment.ora') : $appointment->ora ?? '' }}"/>
                </div>


                <div class="card-footer text-muted">

                    <input type="submit" value="salva" class="btn btn-success">
                    <a href="{{route('patients.create')}}" class="btn btn-info" style="float: right">nuovo paziente</a>
                    <a href="{{url()->previous()}}" class="btn btn-dark" style="float: left">indietro</a>
                </div>
            </form>
        </div>



    </div>

@endsection
