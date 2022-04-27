@extends('vendor.layouts.dashboardVendor')
@section('css-files')
    <link rel="stylesheet" href="{{asset('dashboard-vendor/multi-select/css/multi-select.css')}}">
@endsection
@section('content')
    <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content ">
                <!-- ============================================================== -->
                <!-- pageheader  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Product </h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item" aria-current="page">Product</li>
                                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end pageheader  -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- Start Form  -->
        <!-- ============================================================== -->

        <div class="container">
            <div class="card">
                <h5 class="card-header">Edit Product</h5>
                <div class="card-body">
                    <form action="{{route('vendor.dashboard.product.update', $product->slug)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name" class="col-form-label">Name</label>
                            <input id="inputText3" value="{{$product->name}}" name="name" type="text" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input id="quantity" value="{{$product->quantity}}" name="quantity" type="number" placeholder="Quantity" class="form-control @error('quantity') is-invalid @enderror">
                            @error('quantity')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price" class="col-form-label">Price</label>
                            <input id="price" value="{{$product->price}}" name="price" type="number" class="form-control @error('price') is-invalid @enderror" placeholder="Price">
                            @error('price')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{$product->description}}</textarea>
                            @error('description')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Parent Category</h5>
                                <div class="card-body">
                                    <select id='pre-selected-options' name="category[]" multiple='multiple'>
                                        @if(count($categories)>0)
                                            @foreach($categories as $category)
                                                @if(in_array($category->id,$cat))
                                                    <option selected value="{{$category->id}}">{{$category->name}}</option>
                                                @else
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endif
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="custom-file mb-3">
                            <input type="file" name="thumbnail" class="custom-file-input @error('thumbnail') is-invalid @enderror" id="customFile">
                            <label class="custom-file-label" for="customFile">Thumbnail</label>
                            @error('thumbnail')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                        <button class="btn btn-primary" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- end From  -->
        <!-- ============================================================== -->


        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
    @include('admin.inc.dashboardAdminFooter')
    <!-- ============================================================== -->
        <!-- end footer -->
        <!-- ============================================================== -->
    </div>
@endsection
@section('js-files')
    <script src="{{asset('dashboard-vendor/multi-select/js/jquery.multi-select.js')}}"></script>

    <script>
        $('#my-select, #pre-selected-options').multiSelect()
    </script>
    <script>
        $('#callbacks').multiSelect({
            afterSelect: function(values) {
                alert("Select value: " + values);
            },
            afterDeselect: function(values) {
                alert("Deselect value: " + values);
            }
        });
    </script>
    <script>
        $('#keep-order').multiSelect({ keepOrder: true });
    </script>
    <script>
        $('#public-methods').multiSelect();
        $('#select-all').click(function() {
            $('#public-methods').multiSelect('select_all');
            return false;
        });
        $('#deselect-all').click(function() {
            $('#public-methods').multiSelect('deselect_all');
            return false;
        });
        $('#select-100').click(function() {
            $('#public-methods').multiSelect('select', ['elem_0', 'elem_1'..., 'elem_99']);
            return false;
        });
        $('#deselect-100').click(function() {
            $('#public-methods').multiSelect('deselect', ['elem_0', 'elem_1'..., 'elem_99']);
            return false;
        });
        $('#refresh').on('click', function() {
            $('#public-methods').multiSelect('refresh');
            return false;
        });
        $('#add-option').on('click', function() {
            $('#public-methods').multiSelect('addOption', { value: 42, text: 'test 42', index: 0 });
            return false;
        });
    </script>
    <script>
        $('#optgroup').multiSelect({ selectableOptgroup: true });
    </script>
    <script>
        $('#disabled-attribute').multiSelect();
    </script>
    <script>
        $('#custom-headers').multiSelect({
            selectableHeader: "<div class='custom-header'>Selectable items</div>",
            selectionHeader: "<div class='custom-header'>Selection items</div>",
            selectableFooter: "<div class='custom-header'>Selectable footer</div>",
            selectionFooter: "<div class='custom-header'>Selection footer</div>"
        });
    </script>
@endsection
