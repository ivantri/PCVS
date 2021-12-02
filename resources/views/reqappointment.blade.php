@extends('master')
@section('content')
<main class="px-3">
    <h1 class="mt-3">PCVS</h1>
    PCVS is a Vaccination Information system used to manage vaccination schedule and administration.
    <hr>
    {{-- Buat Baru --}}
    <h4>Request Appointment</h4>
    <p>Sign Up as patient to get Vaccination.</p>
    <form action="/appointment/create" method="POST">
        @csrf
        <input required class="form-control mb-2" placeholder="Appointment Date" type="date" name="appointmentdate">
        <input type="hidden" name="batch_id" value="{{$batch->id}}">
        <button type="submit" class="form-control btn btn-secondary fw-bold border-white bg-white mb-3">
            Reques Appointment
        </button>
    </form>
    {{-- End Buat Baru --}}
    <hr>
    
</main>
@endsection