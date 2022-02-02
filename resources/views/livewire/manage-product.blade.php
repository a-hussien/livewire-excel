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
            <button type="button" class="btn btn-success btn-sm text-white" wire:click="export('xlsx')">
                Export
            </button>
            <button type="button" class="btn btn-danger btn-sm text-white" wire:click="export('pdf')">
                PDF
            </button>
        </div>
    </div>
    <div class="table-responsive-sm">
        <table class="table table-bordered table-striped table-hover">
            <thead class="text-center text-white bg-secondary">
                <tr class="text-wrap">
                  <th rowspan="2" class="py-4"> {{__('#')}} </th>
                  <th rowspan="2" class="py-4">Model Name</th>
                  <th rowspan="2" class="py-4">Category</th>
                  <th colspan="3">Price</th>
                  <th rowspan="2" class="py-4">Last Update</th>
                </tr>
                <tr>
                  <th scope="col">Minimum Price</th>
                  <th scope="col">Unit Price</th>
                  <th scope="col">Bulk Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$product->model}} <span class="float-end">{{$product->type_name}}</span></td>
                    <td>{{$product->category}}</td>
                    <td>{{$product->minimum_price}}<small class="float-end"> LE</span></td>
                    <td>{{$product->unit_price}}<small class="float-end"> LE</span></td>
                    <td>{{$product->bulk_price}}<small class="float-end"> LE</span></td>
                    <td>{{$product->updated_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center p-3">
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

