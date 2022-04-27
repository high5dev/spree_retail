@extends('admin.layouts.dashboardAdmin')
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
                            <h2 class="pageheader-title">Career </h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item" aria-current="page">Career</li>
                                        <li class="breadcrumb-item active" aria-current="page">Create</li>
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
                <h5 class="card-header">Create Job</h5>
                <div class="card-body">
                    <form action="{{route('admin.dashboard.career.update',$career['id'])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="col-form-label">Name</label>
                            <input id="inputText3" name="name" value="{{old('name') ?? $career['name']}}" type="text" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="input-select">Job Type</label>
                            <select name="type" class="form-control" >
                                <option value="">Select</option>
                                @foreach(config('enums.job_type') as $type)
                                    @if($type == (old('type') == null) ? $career['type'] : old('type'))
                                        <option selected value="{{$type}}">{{$type}}</option>
                                    @else
                                        <option value="{{$type}}">{{$type}}</option>
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
                            <label for="input-select">Job Category</label>
                            <select name="category" class="form-control" >
                                <option value="">Select</option>
                                @foreach(config('enums.job_category') as $cat)
                                    @if($cat == (old('category') == null) ? $career['category'] : old('category'))
                                        <option selected value="{{$cat}}">{{$cat}}</option>
                                    @else
                                        <option value="{{$cat}}">{{$cat}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('job_category')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{old('description') ?? $career['description']}}</textarea>
                            @error('description')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Qualification</label>
                            <textarea class="form-control @error('qualification') is-invalid @enderror" id="qualification" name="qualification" rows="3">{{old('qualification') ?? $career['qualification']}}</textarea>
                            @error('qualification')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-form-label">City</label>
                            <input id="inputText3" value="{{old('city') ?? $career['city']}}" name="city" type="text" class="form-control @error('city') is-invalid @enderror">
                            @error('city')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-form-label">Country</label>
                            <input id="inputText3" value="{{old('country') ?? $career['country']}}" name="country" type="text" class="form-control @error('country') is-invalid @enderror">
                            @error('country')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Create</button>
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
        <!-- ============================================================== -->
        <!-- end footer -->
        <!-- ============================================================== -->
    </div>
@endsection
@section('js-files')
    <script type="text/javascript">
        function parentSelected(sel)
        {
            var data = sel.options[sel.selectedIndex].text;


            var select = document.getElementById("parent");
            var length = select.options.length;
            for (i = length-1; i > 0; i--) {
                select.options[i] = null;
            }

            var select = document.getElementById("sub-parent");
            var length = select.options.length;
            for (i = length-1; i > 0; i--) {
                select.options[i] = null;
            }

            $.ajax({
                url:"/admin/dashboard/category/parent/"+data,
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
