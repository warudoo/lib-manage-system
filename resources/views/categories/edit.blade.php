@extends('layouts.app')



@section('content')



<h3>

Edit Category

</h3>





<form

action="{{ route('categories.update',$category->id) }}"

method="POST">



@csrf


<!--

Karena HTML tidak punya PUT,
Laravel membuat method palsu

-->


@method('PUT')




<input

type="text"

name="name"

class="form-control mb-3"

value="{{ $category->name }}"

>





<button class="btn btn-primary">


Update


</button>




</form>



@endsection