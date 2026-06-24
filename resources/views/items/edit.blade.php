@extends('layouts.app')



@section('content')



<h3>

Edit Item

</h3>






<form

action="{{ route('items.update',$item->id) }}"

method="POST">



@csrf


@method('PUT')







<div class="mb-3">


<label>

Category

</label>



<select

name="category_id"

class="form-control">






@foreach($categories as $category)




<option

value="{{ $category->id }}"


@if($item->category_id == $category->id)

selected

@endif


>



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


value="{{ $item->name }}"

>


</div>








<div class="mb-3">


<label>

Description


</label>



<textarea

name="description"

class="form-control">

{{ $item->description }}

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


value="{{ $item->stock }}"

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


value="{{ $item->price }}"

>


</div>






<button class="btn btn-primary">


Update


</button>




</form>





@endsection