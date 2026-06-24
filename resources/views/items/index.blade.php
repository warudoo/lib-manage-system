@extends('layouts.app')

@section('content')

<h3>Data Item</h3>


{{-- Search data item menggunakan method GET --}}
<form method="GET" action="{{ route('items.index') }}" class="mb-3">

    <div class="row">

        <div class="col-md-10">

            <input 
                type="text"
                name="search"
                class="form-control"
                placeholder="Cari data item..."
                value="{{ $search ?? '' }}"
            >

        </div>


        <div class="col-md-2">

            <button class="btn btn-primary w-100">
                Cari
            </button>

        </div>

    </div>

</form>





{{-- Tombol tambah data --}}
<a href="{{ route('items.create') }}" class="btn btn-primary mb-3">
    Tambah Item
</a>





{{-- Pesan sukses setelah create/update/delete --}}
@if(session('success'))

    <div class="alert alert-success">
        {{ session('success') }}
    </div>

@endif





<table class="table table-bordered table-striped">

<thead>

<tr>
    <th>No</th>
    <th>Gambar</th>
    <th>Nama</th>
    <th>Kategori</th>
    <th>Stock</th>
    <th>Harga</th>
    <th>Aksi</th>
</tr>

</thead>



<tbody>


{{-- Looping data item dari ItemController --}}
@foreach($items as $item)

<tr>


    <td>
        {{ $loop->iteration }}
    </td>




    {{-- Menampilkan gambar item --}}
    <td>

        @if($item->image)

            <img 
                src="{{ asset('storage/'.$item->image) }}"
                width="70"
                class="rounded"
            >

        @else

            <span class="text-muted">
                Tidak ada
            </span>

        @endif

    </td>





    <td>
        {{ $item->name }}
    </td>




    {{-- Data kategori dari relationship Item Model --}}
    <td>

        {{ $item->category->name ?? '-' }}

    </td>




    <td>

        {{ $item->stock }}

    </td>





    <td>

        Rp {{ number_format($item->price) }}

    </td>





    <td>


        {{-- Edit data --}}
        <a 
            href="{{ route('items.edit',$item->id) }}"
            class="btn btn-warning btn-sm"
        >

            Edit

        </a>





        {{-- Hapus data --}}
        <form 
            action="{{ route('items.destroy',$item->id) }}"
            method="POST"
            class="d-inline"
        >

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