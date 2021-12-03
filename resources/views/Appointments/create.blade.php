@extends('layouts.app')
@section('content')

    <div class="card">
        <div class="card-header">
            Header
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
                    <label for="patient_id">Scelgi paziente</label>

                    <select name="appointment[patient_id]" class="form-control">
                        <option value="0"> ---paziente-- </option>
                        @foreach ($patient as $item)

                            <option value="{{ $item->id }}">
                                {{ $item->cognome }}
                            </option>

                        @endforeach
                    </select>

                </div>
                <div class="form-group">
                    <label for="data">data</label>
                    <input type="date" name="appointment[data]" class="form-control" placeholder="date"/>
                </div>


                <div class="card-footer text-muted">

                    <input type="submit" value="salva" class="btn btn-success">
                    <a href="{{route('patients.create')}}" class="btn btn-info">nuovo paziente</a>
                </div>
            </form>
        </div>



    </div>

@endsection
