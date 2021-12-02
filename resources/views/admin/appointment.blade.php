@extends('master')
@section('content')
<main class="px-3">
    <h1 class="mt-3">PCVS</h1>
    PCVS is a Vaccination Information system used to manage vaccination schedule and administration.
    <hr>
    {{-- Buat Baru --}}
    <h4>Record New Vaccine Batch</h4>
    <p>Add new vaccine batch to the healthcare.</p>
    <form action="/admin/addbatch" method="POST">
        @csrf
        <select required class="form-control mb-2" name="vaccine_id" id="">
            <option value="" selected disabled>Please select vaccine.</option>
            @foreach ($vaccines as $i)
            <option value="{{$i->id}}">{{$i->vaccinename}}, {{$i->manufacturer}}</option>
            @endforeach
        </select>
        <input required class="form-control mb-2" placeholder="Batch Number" type="text" name="batchno">
        <input required class="form-control mb-2" placeholder="Expiry Date" type="date" name="expirydate">
        <input required class="form-control mb-2" placeholder="Quanitity Available" type="number" name="quantityavailable">
        <input required class="form-control mb-2" placeholder="Batch Number" type="hidden" value="0" name="quantittadministered">
        <button type="submit" class="form-control btn btn-secondary fw-bold border-white bg-white mb-3">
            Record Batch
        </button>
    </form>
    {{-- End Buat Baru --}}
    <hr>
    {{-- Buat Baru --}}
    <h4>Batch List</h4>
    <div>
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
                @foreach ($batches as $i)
                <tr>
                    <td>{{$i->batchno}}</td>
                    <td>{{$i->vaccine->vaccinename}}</td>
                    <td>{{$i->expirydate}}</td>
                    <td>{{$i->quantityavailable}}</td>
                    <td>{{$i->quantittadministered}}</td>
                    <td>
                        <a href="/appointments/{{$i->id}}"><button type="button" >Appointments</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <hr>
    {{-- Pulihkan --}}
    <h4>Sign Up</h4>
    <p>Sign Up as Healthcare Centre admin.</p>
    <form action="/admin/signup" method="POST">
        @csrf
        <input required class="form-control mb-2" placeholder="username" type="text" name="username">
        <input required class="form-control mb-2" placeholder="password" type="password" name="password">
        <input required class="form-control mb-2" placeholder="email" type="email" name="email">
        <input required class="form-control mb-2" placeholder="full name" type="text" name="fullname">
        <button type="submit" class="form-control btn btn-secondary fw-bold border-white bg-white mb-3">
            Sign Up
        </button>
    </form>
    {{-- End Pulihkan --}}
    
    
</main>
@endsection