@extends('master')
@section('content')
<main class="px-3">
    <h1 class="mt-3">PCVS</h1>
    PCVS is a Vaccination Information system used to manage vaccination schedule and administration.
    <hr>
    {{-- Buat Baru --}}
    <h4>Login</h4>
    <p>Login as Healthcare Centre admin.</p>
    <form action="/admin/login" method="POST">
        @csrf
        <input required class="form-control mb-2" placeholder="username or email" type="text" name="username">
        <input required class="form-control mb-2" placeholder="password" type="password" name="password">
        <button type="submit" class="form-control btn btn-secondary fw-bold border-white bg-white mb-3">
            Login
        </button>
    </form>
    {{-- End Buat Baru --}}
    <hr>
    {{-- Pulihkan --}}
    <h4>Sign Up</h4>
    <p>Sign Up as Healthcare Centre admin.</p>
    <form action="/admin/signup" method="POST">
        @csrf
        <select required class="form-control mb-2" name="healthcare_id" id="">
            <option value="" selected disabled>Please select healthcare.</option>
            @foreach ($healthcares as $i)
            <option value="{{$i->id}}">{{$i->centrename}}, {{$i->address}}</option>
            @endforeach
        </select>
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