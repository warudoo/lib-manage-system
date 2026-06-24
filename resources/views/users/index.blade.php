@extends('layouts.app')

@section('content')

<h3>Kelola User</h3>


{{-- Tambah akun --}}
<a href="{{ route('users.create') }}" 
   class="btn btn-primary mb-3">

    Tambah User

</a>



{{-- Pesan berhasil --}}
@if(session('success'))

<div class="alert alert-success">
    {{ session('success') }}
</div>

@endif



<table class="table table-bordered table-striped">

<thead>

<tr>
    <th>No</th>
    <th>Nama</th>
    <th>Email</th>
    <th>Role</th>
    <th>Aksi</th>
</tr>

</thead>


<tbody>


{{-- Menampilkan semua user dari UserController --}}
@foreach($users as $user)


<tr>

    <td>
        {{ $loop->iteration }}
    </td>


    <td>
        {{ $user->name }}
    </td>


    <td>
        {{ $user->email }}
    </td>



    <td>

        {{-- Tampilan role --}}
        @if($user->role == 'admin')

            <span class="badge bg-danger">
                Admin
            </span>

        @else

            <span class="badge bg-primary">
                User
            </span>

        @endif


    </td>




    <td>


        {{-- Edit user --}}
        <a href="{{ route('users.edit',$user->id) }}"
           class="btn btn-warning btn-sm">

            Edit

        </a>




        {{-- Hapus user --}}
        <form 
            action="{{ route('users.destroy',$user->id) }}"
            method="POST"
            class="d-inline"
        >

            @csrf

            @method('DELETE')


            <button 
                onclick="return confirm('Yakin hapus user?')"
                class="btn btn-danger btn-sm"
            >

                Delete

            </button>


        </form>


    </td>


</tr>


@endforeach


</tbody>


</table>


@endsection