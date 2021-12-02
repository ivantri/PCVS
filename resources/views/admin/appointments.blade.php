@extends('master')
@section('content')
<main class="px-3">
    <h1 class="mt-3">PCVS</h1>
    PCVS is a Vaccination Information system used to manage vaccination schedule and administration.
    <hr>
    {{-- Buat Baru --}}
    
    {{-- Buat Baru --}}
    <h4>Appointments</h4>
    <div>
        <table class="table" style="color: white;">
            <thead>
                <tr>
                    <th>Batch</th>
                    <th>Appmnt Date</th>
                    <th>status</th>
                    <th>remarks</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($batch->appointments as $i)
                <tr>
                    <td>{{$batch->batchno}}</td>
                    <td>{{$i->appointmentdate}}</td>
                    <td>{{$i->status}}</td>
                    <td>{{$i->remarks}}</td>
                    <td>
                        {{-- <form action="/appointment/update/" method="POST">
                            @csrf
                            <input type="hidden" name="status" value="accepted">
                            <button type="submit" >Accept</button>
                        </form>
                        <form action="/appointment/update/" method="POST">
                            @csrf
                            <input type="hidden" name="status" value="rejected">
                            <button type="submit" >Reject</button>
                        </form> --}}
                        <form action="/admin/appointment/update/" method="POST">
                            @csrf
                            <input type="hidden" name="remarks" value="-">
                            <input type="hidden" name="appointment_id" value="{{$i->id}}">
                            <button type="submit" name="status" value="accepted" >Accept</button>
                            <button type="submit" name="status" value="rejected" >Reject</button>
                            <button type="submit" name="status" value="administered" >Admnstr</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <hr>
    
    
    
</main>
@endsection