@extends('layouts.app')


@section('content')


<h3>Edit User</h3>



<form action="{{ route('users.update',$user->id) }}"
      method="POST">



@csrf

@method('PUT')





{{-- Nama --}}
<div class="mb-3">


<label>Nama</label>



<input type="text"

       name="name"

       value="{{ $user->name }}"

       class="form-control">


</div>






{{-- Email --}}
<div class="mb-3">


<label>Email</label>



<input type="email"

       name="email"

       value="{{ $user->email }}"

       class="form-control">


</div>







{{-- Role --}}
<div class="mb-3">


<label>Role</label>



<select name="role"

        class="form-control">



<option value="admin"

{{ $user->role == 'admin' ? 'selected' : '' }}>


Admin


</option>





<option value="user"

{{ $user->role == 'user' ? 'selected' : '' }}>


User


</option>




</select>


</div>





<button class="btn btn-primary">

Update

</button>




</form>


@endsection