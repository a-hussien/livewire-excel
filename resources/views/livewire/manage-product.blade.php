<div>
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
            <button type="button" class="btn btn-success btn-sm text-white" wire:click="exportToExcel">
                Export
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
                  <th scope="col">Last Update</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$product->name}}</td>
                    <td>{{$product->brand}}</td>
                    <td>{{$product->price}}<small class="float-end"> LE</span></td>
                    <td>{{$product->updated_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="position-absolute bottom-0 start-50 translate-middle">
            {{ $products->links() }}
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="importModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <form wire:submit.prevent="import">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Import Excel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="excelFile" class="form-label">Excel File</label>
                            <input class="form-control form-control-sm @error('excelFile') is-invalid @enderror" wire:model.debounce.500ms="excelFile" type="file">
                            @error('excelFile')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="mb-1">
                            <a href="{{route('template')}}" class="btn btn-dark btn-sm">Example Template</a>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="modal-footer d-flex align-items-center justify-content-between" wire:ignore>
                        <button type="submit" class="btn btn-outline-success btn-sm">Import</button>
                        <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

