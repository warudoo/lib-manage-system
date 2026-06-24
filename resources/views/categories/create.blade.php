@extends('layouts.app')



@section('content')



<h3>

Tambah Category

</h3>




<form action="{{ route('categories.store') }}"

method="POST">



<!--

CSRF wajib Laravel

untuk keamanan form


-->


@csrf




<div class="mb-3">


<label>

Nama Category


</label>



<input

type="text"

name="name"

class="form-control"

placeholder="Masukkan nama kategori"

>


</div>






<button class="btn btn-success">


Simpan


</button>



</form>



@endsection