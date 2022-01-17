<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <script src="{{mix('js/app.js')}}"></script>
    </head>
    <body class="antialiased">
        <div class="container">
            <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
                @if (Route::has('login'))
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                        @auth
                            <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif

                <h2 class="text-center pb-3 text-primary">Product Price List</h2>

                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="col-auto">
                        <select class="form-select form-select-sm">
                            <option value="5" selected>5</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="all">All</option>
                        </select>
                    </div>
                    <div class="col-auto">
                        <button type="button" class="btn btn-info btn-sm text-white" data-bs-toggle="modal" data-bs-target="#importModal">
                            Import
                        </button>
                    </div>
                </div>
                <div class="table-responsive-sm">
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="table-success">
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Product</th>
                              <th scope="col">Brand</th>
                              <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$product->name}}</td>
                                <td>{{$product->brand}}</td>
                                <td>{{$product->price}}<small class="float-end"> LE</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="position-absolute bottom-0 start-50 translate-middle">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="importModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Import Excel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="excelFile" class="form-label">Excel File</label>
                        <input class="form-control form-control-sm" id="excelFile" type="file">
                    </div>
                    <div class="mb-1">
                        <a href="{{route('template')}}" class="btn btn-dark btn-sm">Example Template</a>
                    </div>
                </div>
                <div class="modal-footer d-flex align-items-center justify-content-between">
                    <button type="button" class="btn btn-outline-success btn-sm">Submit</button>
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
            </div>
        </div>

    </body>
</html>
