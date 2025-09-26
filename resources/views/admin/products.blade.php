@extends('admin.index')
@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row align-items-center my-4">
                        <div class="col">
                            <h2 class="h3 mb-0 page-title">Contacts</h2>
                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-secondary"><span
                                    class="fe fe-trash fe-12 mr-2"></span>Delete</button>
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target=".modal-right"><span class="fe fe-filter fe-12 mr-2"></span>Create</button>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Bordered table -->
                        <div class="col-md-12 my-6">
                            <div class="card shadow">
                                <div class="card-body">
                                    <h5 class="card-title">Product table</h5>
                                    <p class="card-text">Add .table-bordered for borders on all sides of the table and
                                        cells.</p>
                                    <table class="table table-bordered table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Price</th>
                                                <th>Stok</th>
                                                <th>Activate</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $item)
                                                <tr>
                                                    <td>{{ $item->code_product }}</td>
                                                    <td>{{ $item->name_product }}</td>
                                                    <td>{{ $item->category }}</td>
                                                    <td>{{ number_format($item->price) }}</td>
                                                    <td>{{ $item->stok }}</td>
                                                    <td>
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="c1">
                                                            <label class="custom-control-label" for="c1"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-sm dropdown-toggle" type="button"
                                                                id="dr2" data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                <span class="text-muted sr-only">Action</span>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-right"
                                                                aria-labelledby="dr2">
                                                                <a class="dropdown-item"
                                                                    href="/editprodutcs/{{ $item->id }}">Edit</a>
                                                                <a class="dropdown-item"
                                                                    href="/removeproducts/{{ $item->id }}">Remove</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- Bordered table -->
                    </div> <!-- end section -->
                    <!-- Slide Modal -->
                    <div class="modal fade modal-right modal-slide" tabindex="-1" role="dialog"
                        aria-labelledby="defaultModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="defaultModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="/create/product" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="inputEmail4">Name Product</label>
                                                <input type="text" name="name_product" class="form-control"
                                                    id="inputEmail4" placeholder="Input your product">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="inputPassword4">Process</label>
                                                <input type="text" name="process" class="form-control"
                                                    placeholder="Input process">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-8">
                                                <label for="customFile">Input Image</label>
                                                <div class="custom-file">
                                                    <input type="file" name="image_product"
                                                        class="custom-file-input custom-file-label" id="customFile">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Price</label>
                                                <input type="number" name="price" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-8">
                                                <label for="validationSelect2">Category</label>
                                                <select class="form-control select2" name="category" id="validationSelect2"
                                                    required>
                                                    <option selected disabled>Select category</option>
                                                    <optgroup label="Category">
                                                        <option>Reguler</option>
                                                        <option>Exotic</option>
                                                        <option>Deluxe</option>
                                                        <option>Esspreso</option>
                                                    </optgroup>
                                                </select>
                                                <div class="invalid-feedback"> Please select a valid category. </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Stok</label>
                                                <input type="number" name="stok" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label for="exampleFormControlTextarea1">Notes</label>
                                                <textarea class="form-control" name="notes" id="exampleFormControlTextarea1" rows="3"></textarea>
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn mb-2 btn-secondary"
                                        data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn mb-2 btn-primary">Save</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> <!-- .col-12 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->
    </main>
@endsection
