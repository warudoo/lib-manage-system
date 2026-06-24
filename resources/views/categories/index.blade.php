@extends('layouts.app')



@section('content')



<h3>

Data Category

</h3>

<!--
================================

SEARCH BAR

================================


method GET:

karena kita hanya mengambil data


contoh hasil URL:


categories?search=obat


-->



<form

method="GET"

action="{{ route('categories.index') }}"

class="mb-3"

>


<div class="row">



<div class="col-md-10">



<input

type="text"


name="search"


class="form-control"


placeholder="Cari kategori..."


value="{{ $search ?? '' }}"


>



</div>







<div class="col-md-2">



<div class="col-md-2 d-flex gap-2">



<button

class="btn btn-primary"


>


Cari


</button>





<a

href="{{ route('categories.index') }}"


class="btn btn-secondary"


>


Reset


</a>




</div>



</div>




</div>



</form>

<!-- tombol tambah -->


<a href="{{ route('categories.create') }}"
class="btn btn-primary mb-3">

Tambah Category

</a>






<!-- Alert setelah tambah edit delete -->


@if(session('success'))


<div class="alert alert-success">


    {{ session('success') }}


</div>


@endif







<table class="table table-bordered">



<thead>


<tr>


    <th>No</th>

    <th>Nama Category</th>

    <th>Aksi</th>


</tr>


</thead>






<tbody>



<!--

Looping data dari controller


$categories berasal dari:


compact('categories')


-->


@foreach($categories as $category)



<tr>


<td>


{{ $loop->iteration }}


</td>





<td>


{{ $category->name }}


</td>






<td>



<a href="{{ route('categories.edit',$category->id) }}"

class="btn btn-warning btn-sm">


Edit


</a>





<form

action="{{ route('categories.destroy',$category->id) }}"


method="POST"


class="d-inline">



@csrf


@method('DELETE')



<button 

onclick="return confirm('Yakin hapus data ini?')"


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