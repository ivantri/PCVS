@extends('master')
@section('content')
<main class="px-3">
    <h1 class="mt-3">PCVS</h1>
    PCVS is a Vaccination Information system used to manage vaccination schedule and administration.
    <hr>
    <h4>Appointments</h4>
    <p>Your Vaccination Appointment status.</p>
    <div class="col-lg-12">
        <table class="table" style="color: white;">
            <thead>
                <tr>
                    <th>Batch No</th>
                    <th>Vaccine</th>
                    <th>App Date</th>
                    <th>Status</th>
                    <th>Remarks</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($appointments as $i)
                <tr>
                    <td>{{$i->batch->batchno}}</td>
                    <td>{{$i->batch->vaccine->vaccinename}}</td>
                    <td>{{$i->appointmentdate}}</td>
                    <td>{{$i->status}}</td>
                    <td>{{$i->remarks}}</td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <hr>
    {{-- Buat Baru --}}
    <h4>Vaccine Batches</h4>
    <p>Available Vaccine batch list.</p>
    @foreach ($healthcares as $h)
    <h5>{{$h->centrename}}</h5>
    <div class="col-lg-12">
        <table class="table" style="color: white;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Vaccine</th>
                    <th>Exp Date</th>
                    <th>Qty Avl</th>
                    <th>Qty Adm</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($h->batches as $i)
                <tr>
                    <td>{{$i->batchno}}</td>
                    <td>{{$i->vaccine->vaccinename}}</td>
                    <td>{{$i->expirydate}}</td>
                    <td>{{$i->quantityavailable}}</td>
                    <td>{{$i->quantittadministered}}</td>
                    <td>
                        <a href="/appointment/request/{{$i->id}}"><button type="button" >Req Appointment</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endforeach
    {{-- End Buat Baru --}}
    <hr>
    
</main>
@endsection