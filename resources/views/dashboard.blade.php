@extends('layouts.app')


@section('content')


<h3>

Dashboard

</h3>


<p>

Ringkasan data aplikasi

</p>




<div class="row">



<!-- CARD CATEGORY -->


<div class="col-md-4">


<div class="card shadow">


<div class="card-body">


<h5>

Total Category

</h5>


<h2>


{{ $totalCategory }}


</h2>


</div>


</div>


</div>






<!-- CARD ITEM -->


<div class="col-md-4">


<div class="card shadow">


<div class="card-body">


<h5>

Total Item

</h5>


<h2>


{{ $totalItem }}


</h2>


</div>


</div>


</div>







<!-- CARD STOCK -->


<div class="col-md-4">


<div class="card shadow">


<div class="card-body">


<h5>

Total Stock

</h5>


<h2>


{{ $totalStock }}


</h2>


</div>


</div>


</div>




</div>



@endsection