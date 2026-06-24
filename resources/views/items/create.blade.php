@extends('layouts.app')



@section('content')



<h3>

Tambah Item

</h3>






<form

action="{{ route('items.store') }}"

method="POST"

enctype="multipart/form-data">



@csrf








<!--

Dropdown kategori


Data berasal dari:

ItemController

$categories = Category::all();


-->



<div class="mb-3">


<label>

Category

</label>



<select

name="category_id"

class="form-control">



<option value="">


Pilih Category


</option>





@foreach($categories as $category)



<option value="{{ $category->id }}">


{{ $category->name }}


</option>



@endforeach





</select>


</div>








<div class="mb-3">


<label>

Nama Item

</label>




<input

type="text"

name="name"

class="form-control"

placeholder="Nama Item"

>


</div>









<div class="mb-3">


<label>

Description

</label>



<textarea

name="description"

class="form-control">


</textarea>


</div>









<div class="mb-3">


<label>

Stock

</label>



<input

type="number"

name="stock"

class="form-control"

>


</div>









<div class="mb-3">


<label>

Price

</label>




<input

type="number"

name="price"

class="form-control"

>


</div>




{{-- Upload gambar item --}}
<div class="mb-3">

<label>Image</label>


<input 
type="file"

name="image"

class="form-control"

>

</div>


<button class="btn btn-success">


Simpan


</button>





</form>





@endsection