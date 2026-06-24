<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    {{-- Responsive mobile --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Management System</title>

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container-fluid">
    <div class="row">

        {{-- Sidebar menu --}}
        <div class="col-md-2 bg-dark min-vh-100 p-3 shadow">

            <h4 class="text-white">
                📚 Management App
            </h4>

            <p class="text-white small">
                Laravel 13 CRUD System
            </p>

            <hr class="text-white">


            {{-- Dashboard --}}
            <a href="/dashboard"
               class="btn w-100 text-start mb-2 
               {{ request()->is('dashboard') ? 'btn-primary' : 'btn-dark' }}">

                Dashboard

            </a>



            {{-- Menu khusus admin --}}
            @if(auth()->user()->role == 'admin')


                {{-- Category CRUD --}}
                <a href="{{ route('categories.index') }}"
                   class="btn w-100 text-start mb-2
                   {{ request()->is('categories*') ? 'btn-primary' : 'btn-dark' }}">

                    Category

                </a>



                {{-- Item CRUD --}}
                <a href="{{ route('items.index') }}"
                   class="btn w-100 text-start mb-2
                   {{ request()->is('items*') ? 'btn-primary' : 'btn-dark' }}">

                    Item

                </a>

                {{-- User Management --}}
                <a href="{{ route('users.index') }}"
                class="btn w-100 text-start mb-2
                {{ request()->is('users*') ? 'btn-primary' : 'btn-dark' }}">

                    Kelola User

                </a>


            @endif



            <hr class="text-white">



            {{-- Logout --}}
            <form action="{{ route('logout') }}" method="POST">

                @csrf

                <button class="btn btn-danger w-100 text-start">
                    Logout
                </button>

            </form>


        </div>



        {{-- Content halaman --}}
        <div class="col-md-10 p-4">

            @yield('content')

        </div>


    </div>
</div>


{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>