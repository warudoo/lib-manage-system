@extends('layouts.app')


@section('content')


<h3>Tambah User</h3>



<form action="{{ route('users.store') }}"
      method="POST">


@csrf



{{-- Nama --}}
<div class="mb-3">

    <label>Nama</label>


    <input type="text"
           name="name"
           class="form-control">


</div>





{{-- Email --}}
<div class="mb-3">

    <label>Email</label>


    <input type="email"
           name="email"
           class="form-control">


</div>






{{-- Password --}}
<div class="mb-3">

    <label>Password</label>


    <input type="password"
           name="password"
           class="form-control">


</div>






{{-- Role --}}
<div class="mb-3">


<label>Role</label>



<select name="role"
        class="form-control">


    <option value="admin">

        Admin

    </option>



    <option value="user">

        User

    </option>



</select>


</div>





<button class="btn btn-success">

    Simpan

</button>



</form>



@endsection