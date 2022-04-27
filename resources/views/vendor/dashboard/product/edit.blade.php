@extends('vendor.layouts.dashboardVendor')
@section('css-files')
    <link rel="stylesheet" href="{{asset('dashboard-vendor/multi-select/css/multi-select.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard-vendor/select2/css/select2.css')}}">
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
                                        <li class="breadcrumb-item" aria-current="page">{{$product->name}}</li>
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
                    <form action="{{route('vendor.dashboard.product.update',$product->slug)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name" class="col-form-label">Name</label>
                            <input id="inputText3" name="name" value="{{old('name') ?? $product->name}}" type="text" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input id="quantity" name="quantity" value="{{old('quantity') ?? $product->quantity}}" type="number" placeholder="Quantity" class="form-control @error('quantity') is-invalid @enderror">
                            @error('quantity')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price" class="col-form-label">Price</label>
                            <input id="price" name="price" value="{{old('price') ?? $product->price}}" type="number" class="form-control @error('price') is-invalid @enderror" placeholder="Price" step="0.01">
                            @error('price')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="length" class="col-form-label">Length (Inches)</label>
                            <input id="length" name="length" value="{{old('length') ?? $product->length}}" type="number" class="form-control @error('length') is-invalid @enderror" placeholder="Length" step="0.01">
                            @error('length')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="width" class="col-form-label">Width (Inches)</label>
                            <input id="width" name="width" value="{{old('width') ?? $product->width}}" type="number" class="form-control @error('width') is-invalid @enderror" placeholder="Width" step="0.01">
                            @error('width')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="height" class="col-form-label">Height (Inches)</label>
                            <input id="height" name="height" value="{{old('height') ?? $product->height}}" type="number" class="form-control @error('height') is-invalid @enderror" placeholder="Height" step="0.01">
                            @error('height')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="weight" class="col-form-label">Weight (LBS)</label>
                            <input id="weight" name="weight" value="{{old('weight') ?? $product->weight}}" type="number" class="form-control @error('weight') is-invalid @enderror" placeholder="Weight" step="0.01">
                            @error('weight')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{old('description') ?? $product->description}}</textarea>
                            @error('description')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="input-select">Main Category</label>
                            <select onChange="parentSelected(this);" name="main_category" class="form-control" id="main">
                                <option>Select</option>
                                @foreach(config('enums.main_categories') as $item)
                                    @if($product->main == $item)
                                        <option selected value="{{$item}}">{{$item}}</option>
                                    @else
                                        <option value="{{$item}}">{{$item}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('main_category')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="input-select">Sub Category</label>
                            <select multiple name="parent_category[]" class="form-control" id="parent">
                                <option value="">Select</option>
                                @foreach($parents as $item)
                                    @if(in_array($item->name, $product->categories->pluck('name')->toArray()))
                                        <option selected value="{{$item->name}}">{{$item->name}}</option>
                                    @else
                                        <option value="{{$item->name}}">{{$item->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('parent_category')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                        {{-- Type Size --}}
                        <div id="parent-sub-div" class="form-group">
                            <label for="input-select">Type Sizes</label>
                            <select onChange="typeSizeSelected(this);" name="type_size" class="form-control" id="type_size" onChange="typeSizeSelected(this);" >
                                <option value="">Select</option>
                                @if(count($type_sizes) > 0)
                                    @foreach($type_sizes as $item)
                                        @if ($product->type_size_id == $item->id)
                                            <option selected value="{{$item->id}}" data-type="{{$item->product_type}}">{{$item->name}}</option>                                            
                                        @else
                                            <option value="{{$item->id}}" data-type="{{$item->product_type}}">{{$item->name}}</option>
                                        @endif
                                    @endforeach
                                @endif
                            </select>
                            @error('type_size')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                        <div id="parent-sub-div" class="form-group">
                            <label for="input-select">Sizes</label>
                            <select name="size[]" class="form-control" id="size" multiple="multiple">
                                @foreach ($sizes as $size)                                    
                                    @if($product->sizes->contains('name', $size->name))
                                        <option selected value="{{ $size->id }}">{{$size->name}}</option>
                                    @else
                                        <option value="{{ $size->id }}">{{$size->name}}</option>
                                    @endif                                        
                                @endforeach
                            </select>
                            @error('size')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>

                        {{-- Color Field --}}
                        <div class="form-group">
                            <label for="input-select">Color</label>
                            <select multiple name="color[]" id="color" class="form-control">
                                <option value="">Select</option>
                                @foreach ($colors as $color)
                                    @if($productColors->contains('color_id', $color->id))
                                        <option selected value="{{ $color->id }}">{{$color->name}}</option>
                                    @else
                                        <option value="{{ $color->id }}">{{$color->name}}</option>
                                    @endif                                        
                                @endforeach
                            </select>
                            @error('parent_category')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>

                        <div class="custom-file mb-3 col-4">
                            <input type="file" name="thumbnail" class="custom-file-input @error('thumbnail') is-invalid @enderror" id="customFile">
                            <label class="custom-file-label" for="customFile">Update Product Picture</label>
                            @error('thumbnail')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>

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
    @include('vendor.inc.dashboardVendorFooter')
    <!-- ============================================================== -->
        <!-- end footer -->
        <!-- ============================================================== -->
    </div>
@endsection
@section('js-files')
    <script type="text/javascript">
        function typeSizeSelected(sel) {
            var sizeSelect = $('#size').select2().empty();            
            var typeSize = $(sel).prop('selectedIndex')
            console.log(typeSize)
            $.ajax({
                url: '/vendor/dashboard/product/type-size/' + typeSize,
                method:"GET",
                dataType:'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success:function(data)
                {
                    var arr = JSON.parse(data.array);
                    console.log(arr)
                    arr.map(item => {
                        var option = new Option(item.name, item.id, false, false);
                        sizeSelect.append(option).trigger('change');
                    })
                }
            });
        }
        function parentSelected(sel)
        {
            var data = sel.options[sel.selectedIndex].text;


            var select = document.getElementById("parent");
            var length = select.options.length;
            for (i = length-1; i > 0; i--) {
                select.options[i] = null;
            }

            $.ajax({
                url:"/vendor/dashboard/category/parent/"+data,
                method:"GET",
                dataType:'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success:function(data)
                {
                    enable_parent(data.array);
                }
            });

        }

        function enable_parent(data){
            var a = JSON.parse(data);
            for (var i =0; i<a.length; i++)
            {
                var x = document.getElementById("parent");
                var option = document.createElement("option");
                option.text = a[i];
                x.add(option);
            }
        }
        function parentSubSelected(sel)
        {
            var data = sel.options[sel.selectedIndex].text;

            var select = document.getElementById("sub-parent");
            var length = select.options.length;
            for (i = length-1; i > 0; i--) {
                select.options[i] = null;
            }

            $.ajax({
                url:"/admin/dashboard/category/sub_parent/"+data,
                method:"GET",
                dataType:'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success:function(data)
                {
                    enable_sub_parent(data.array);
                }
            });

            function enable_sub_parent(data){
                var a = JSON.parse(data);
                var y = document.getElementById("parent-sub-div");
                y.style.display = 'block';
                for (var i =0; i<a.length; i++)
                {
                    var x = document.getElementById("sub-parent");
                    var option = document.createElement("option");
                    option.text = a[i];
                    x.add(option);
                }
            }

        }
    </script>
    <script src="{{asset('dashboard-vendor/multi-select/js/jquery.multi-select.js')}}"></script>
    <script src="{{asset('dashboard-vendor/select2/js/select2.min.js')}}"></script>

    <script>
        $('#my-select, #pre-selected-options').multiSelect()
        $('#color').select2({
            placeholder: "Select a color"
        });
        $('#size').select2({
            placeholder: "Select a size"
        });
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










{{--@extends('admin.layouts.dashboardAdmin')--}}
{{--@section('css-files')--}}
{{--    <link rel="stylesheet" href="{{asset('dashboard-vendor/multi-select/css/multi-select.css')}}">--}}
{{--@endsection--}}
{{--@section('content')--}}
{{--    <div class="dashboard-wrapper">--}}
{{--        <div class="dashboard-ecommerce">--}}
{{--            <div class="container-fluid dashboard-content ">--}}
{{--                <!-- ============================================================== -->--}}
{{--                <!-- pageheader  -->--}}
{{--                <!-- ============================================================== -->--}}
{{--                <div class="row">--}}
{{--                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">--}}
{{--                        <div class="page-header">--}}
{{--                            <h2 class="pageheader-title">Product </h2>--}}
{{--                            <div class="page-breadcrumb">--}}
{{--                                <nav aria-label="breadcrumb">--}}
{{--                                    <ol class="breadcrumb">--}}
{{--                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>--}}
{{--                                        <li class="breadcrumb-item" aria-current="page">Product</li>--}}
{{--                                        <li class="breadcrumb-item" aria-current="page">{{$product->name}}</li>--}}
{{--                                        <li class="breadcrumb-item active" aria-current="page">Edit</li>--}}
{{--                                    </ol>--}}
{{--                                </nav>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- ============================================================== -->--}}
{{--        <!-- end pageheader  -->--}}
{{--        <!-- ============================================================== -->--}}

{{--        <!-- ============================================================== -->--}}
{{--        <!-- Start Form  -->--}}
{{--        <!-- ============================================================== -->--}}

{{--        <div class="container">--}}
{{--            <div class="card">--}}
{{--                <h5 class="card-header">Edit Product</h5>--}}
{{--                <div class="card-body">--}}
{{--                    <form action="{{route('product.update',$product->slug)}}" method="POST" enctype="multipart/form-data">--}}
{{--                        @csrf--}}
{{--                        @method('PUT')--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="name" class="col-form-label">Name</label>--}}
{{--                            <input id="inputText3" name="name" type="text" value="{{old('name') ?? $product->name}}" class="form-control @error('name') is-invalid @enderror">--}}
{{--                            @error('name')--}}
{{--                            <div class="invalid-feedback">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </div>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="quantity">Quantity</label>--}}
{{--                            <input id="quantity" name="quantity" value="{{old('quantity') ?? $product->quantity}}" type="number" placeholder="Quantity" class="form-control @error('quantity') is-invalid @enderror">--}}
{{--                            @error('quantity')--}}
{{--                            <div class="invalid-feedback">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </div>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="price" class="col-form-label">Price</label>--}}
{{--                            <input id="price" name="price" type="number" value="{{old('price') ?? $product->price}}" class="form-control @error('price') is-invalid @enderror" placeholder="Price">--}}
{{--                            @error('price')--}}
{{--                            <div class="invalid-feedback">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </div>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="description">Description</label>--}}
{{--                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{old('description') ?? $product->description}}</textarea>--}}
{{--                            @error('description')--}}
{{--                            <div class="invalid-feedback">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </div>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="input-select">Main Category</label>--}}
{{--                            <select onChange="parentSelected(this);" name="main_category" class="form-control" id="main">--}}
{{--                                <option value="">Select</option>--}}
{{--                                @foreach(config('enums.main_categories') as $item)--}}
{{--                                    @if($product->main == $item)--}}
{{--                                        <option selected value="{{$item}}">{{$item}}</option>--}}
{{--                                    @else--}}
{{--                                        <option value="{{$item}}">{{$item}}</option>--}}
{{--                                    @endif--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                            @error('main_category')--}}
{{--                            <div class="invalid-feedback">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </div>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="input-select">Sub Category</label>--}}
{{--                            <select onChange="parentSubSelected(this);" name="parent_category" class="form-control" id="parent">--}}
{{--                                <option value="">Select</option>--}}
{{--                                @foreach($parents as $item)--}}
{{--                                    @if(in_array($item->name, $product->categories->pluck('name')->toArray()))--}}
{{--                                        <option selected value="{{$item->name}}">{{$item->name}}</option>--}}
{{--                                    @else--}}
{{--                                        <option value="{{$item->name}}">{{$item->name}}</option>--}}
{{--                                    @endif--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                            @error('parent_category')--}}
{{--                            <div class="invalid-feedback">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </div>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                        <div style="display: none" id="parent-sub-div" class="form-group">--}}
{{--                            <label for="input-select">Sub Category of </label>--}}
{{--                            <select name="parent_sub_category" class="form-control" id="sub-parent">--}}
{{--                                <option value="">Select</option>--}}
{{--                            </select>--}}
{{--                            @error('parent_category')--}}
{{--                            <div class="invalid-feedback">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </div>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                        <div class="custom-file mb-3">--}}
{{--                            <input type="file" name="thumbnail" class="custom-file-input @error('thumbnail') is-invalid @enderror" id="customFile">--}}
{{--                            <label class="custom-file-label" for="customFile">Thumbnail</label>--}}
{{--                            @error('thumbnail')--}}
{{--                            <div class="invalid-feedback">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </div>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                        <button class="btn btn-primary" type="submit">Create</button>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <!-- ============================================================== -->--}}
{{--        <!-- end From  -->--}}
{{--        <!-- ============================================================== -->--}}


{{--        <!-- ============================================================== -->--}}
{{--        <!-- footer -->--}}
{{--        <!-- ============================================================== -->--}}
{{--    @include('admin.inc.dashboardAdminFooter')--}}
{{--    <!-- ============================================================== -->--}}
{{--        <!-- end footer -->--}}
{{--        <!-- ============================================================== -->--}}
{{--    </div>--}}
{{--@endsection--}}
{{--@section('js-files')--}}
{{--    <script type="text/javascript">--}}
{{--        function parentSelected(sel)--}}
{{--        {--}}
{{--            var data = sel.options[sel.selectedIndex].text;--}}


{{--            var select = document.getElementById("parent");--}}
{{--            var length = select.options.length;--}}
{{--            for (i = length-1; i > 0; i--) {--}}
{{--                select.options[i] = null;--}}
{{--            }--}}

{{--            $.ajax({--}}
{{--                url:"/admin/dashboard/category/parent/"+data,--}}
{{--                method:"GET",--}}
{{--                dataType:'JSON',--}}
{{--                contentType: false,--}}
{{--                cache: false,--}}
{{--                processData: false,--}}
{{--                success:function(data)--}}
{{--                {--}}
{{--                    enable_parent(data.array);--}}
{{--                }--}}
{{--            });--}}

{{--        }--}}

{{--        function enable_parent(data){--}}
{{--            var a = JSON.parse(data);--}}
{{--            for (var i =0; i<a.length; i++)--}}
{{--            {--}}
{{--                var x = document.getElementById("parent");--}}
{{--                var option = document.createElement("option");--}}
{{--                option.text = a[i];--}}
{{--                x.add(option);--}}
{{--            }--}}
{{--        }--}}
{{--        function parentSubSelected(sel)--}}
{{--        {--}}
{{--            var data = sel.options[sel.selectedIndex].text;--}}

{{--            var select = document.getElementById("sub-parent");--}}
{{--            var length = select.options.length;--}}
{{--            for (i = length-1; i > 0; i--) {--}}
{{--                select.options[i] = null;--}}
{{--            }--}}

{{--            $.ajax({--}}
{{--                url:"/admin/dashboard/category/sub_parent/"+data,--}}
{{--                method:"GET",--}}
{{--                dataType:'JSON',--}}
{{--                contentType: false,--}}
{{--                cache: false,--}}
{{--                processData: false,--}}
{{--                success:function(data)--}}
{{--                {--}}
{{--                    enable_sub_parent(data.array);--}}
{{--                }--}}
{{--            });--}}

{{--            function enable_sub_parent(data){--}}
{{--                var a = JSON.parse(data);--}}
{{--                var y = document.getElementById("parent-sub-div");--}}
{{--                y.style.display = 'block';--}}
{{--                for (var i =0; i<a.length; i++)--}}
{{--                {--}}
{{--                    var x = document.getElementById("sub-parent");--}}
{{--                    var option = document.createElement("option");--}}
{{--                    option.text = a[i];--}}
{{--                    x.add(option);--}}
{{--                }--}}
{{--            }--}}

{{--        }--}}
{{--    </script>--}}
{{--    <script src="{{asset('dashboard-vendor/multi-select/js/jquery.multi-select.js')}}"></script>--}}

{{--    <script>--}}
{{--        $('#my-select, #pre-selected-options').multiSelect()--}}
{{--    </script>--}}
{{--    <script>--}}
{{--        $('#callbacks').multiSelect({--}}
{{--            afterSelect: function(values) {--}}
{{--                alert("Select value: " + values);--}}
{{--            },--}}
{{--            afterDeselect: function(values) {--}}
{{--                alert("Deselect value: " + values);--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}
{{--    <script>--}}
{{--        $('#keep-order').multiSelect({ keepOrder: true });--}}
{{--    </script>--}}
{{--    <script>--}}
{{--        $('#public-methods').multiSelect();--}}
{{--        $('#select-all').click(function() {--}}
{{--            $('#public-methods').multiSelect('select_all');--}}
{{--            return false;--}}
{{--        });--}}
{{--        $('#deselect-all').click(function() {--}}
{{--            $('#public-methods').multiSelect('deselect_all');--}}
{{--            return false;--}}
{{--        });--}}
{{--        $('#select-100').click(function() {--}}
{{--            $('#public-methods').multiSelect('select', ['elem_0', 'elem_1'..., 'elem_99']);--}}
{{--            return false;--}}
{{--        });--}}
{{--        $('#deselect-100').click(function() {--}}
{{--            $('#public-methods').multiSelect('deselect', ['elem_0', 'elem_1'..., 'elem_99']);--}}
{{--            return false;--}}
{{--        });--}}
{{--        $('#refresh').on('click', function() {--}}
{{--            $('#public-methods').multiSelect('refresh');--}}
{{--            return false;--}}
{{--        });--}}
{{--        $('#add-option').on('click', function() {--}}
{{--            $('#public-methods').multiSelect('addOption', { value: 42, text: 'test 42', index: 0 });--}}
{{--            return false;--}}
{{--        });--}}
{{--    </script>--}}
{{--    <script>--}}
{{--        $('#optgroup').multiSelect({ selectableOptgroup: true });--}}
{{--    </script>--}}
{{--    <script>--}}
{{--        $('#disabled-attribute').multiSelect();--}}
{{--    </script>--}}
{{--    <script>--}}
{{--        $('#custom-headers').multiSelect({--}}
{{--            selectableHeader: "<div class='custom-header'>Selectable items</div>",--}}
{{--            selectionHeader: "<div class='custom-header'>Selection items</div>",--}}
{{--            selectableFooter: "<div class='custom-header'>Selectable footer</div>",--}}
{{--            selectionFooter: "<div class='custom-header'>Selection footer</div>"--}}
{{--        });--}}
{{--    </script>--}}
{{--@endsection--}}
