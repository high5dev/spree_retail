<?php $__env->startSection('css-files'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('dashboard-vendor/multi-select/css/multi-select.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('dashboard-vendor/select2/css/select2.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
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
                <h5 class="card-header">Create Product</h5>
                <div class="card-body">
                    <form action="<?php echo e(route('vendor.dashboard.product.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="name" class="col-form-label">Name</label>
                            <input id="inputText3" name="name" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('name')); ?>">
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback">
                                    <strong><?php echo e($message); ?></strong>
                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input id="quantity" name="quantity" type="number" placeholder="Quantity" class="form-control <?php $__errorArgs = ['quantity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('quantity')); ?>">
                            <?php $__errorArgs = ['quantity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback">
                                <strong><?php echo e($message); ?></strong>
                            </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label for="price" class="col-form-label">Price</label>
                            <input id="price" name="price" type="number" class="form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Price" value="<?php echo e(old('price')); ?>" step="0.01">
                            <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback">
                                <strong><?php echo e($message); ?></strong>
                            </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label for="length" class="col-form-label">Length (Inches)</label>
                            <input id="length" name="length" type="number" class="form-control <?php $__errorArgs = ['length'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Length" value="<?php echo e(old('length')); ?>" step="0.01">
                            <?php $__errorArgs = ['length'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback">
                                <strong><?php echo e($message); ?></strong>
                            </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label for="width" class="col-form-label">Width (Inches)</label>
                            <input id="width" name="width" type="number" class="form-control <?php $__errorArgs = ['width'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Width" value="<?php echo e(old('width')); ?>" step="0.01">
                            <?php $__errorArgs = ['width'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback">
                                <strong><?php echo e($message); ?></strong>
                            </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label for="height" class="col-form-label">Height (Inches)</label>
                            <input id="height" name="height" type="number" class="form-control <?php $__errorArgs = ['height'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Height" value="<?php echo e(old('height')); ?>" step="0.01">
                            <?php $__errorArgs = ['height'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback">
                                <strong><?php echo e($message); ?></strong>
                            </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label for="weight" class="col-form-label">Weight (LBS)</label>
                            <input id="weight" name="weight" type="number" class="form-control <?php $__errorArgs = ['weight'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Weight" value="<?php echo e(old('weight')); ?>" step="0.01">
                            <?php $__errorArgs = ['weight'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback">
                                <strong><?php echo e($message); ?></strong>
                            </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="description" name="description" rows="3"><?php echo e(old('description')); ?></textarea>
                            <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback">
                                <strong><?php echo e($message); ?></strong>
                            </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label for="input-select">Main Category</label>
                            <select onChange="parentSelected(this);" name="main_category" class="form-control" id="main">
                                <option>Select</option>
                                <?php $__currentLoopData = config('enums.main_categories'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category); ?>"><?php echo e($category); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['main_category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback">
                                <strong><?php echo e($message); ?></strong>
                            </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label for="input-select">Sub Category</label>
                            <select multiple name="parent_category[]" class="form-control" id="parent">
                                <option value="">Select</option>
                            </select>
                            <?php $__errorArgs = ['parent_category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback">
                                <strong><?php echo e($message); ?></strong>
                            </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        
                        <div id="parent-sub-div" class="form-group">
                            <label for="input-select">Type Sizes</label>
                            <select onChange="typeSizeSelected(this);" name="type_size" class="form-control" id="type_size" onChange="typeSizeSelected(this);" >
                                <option value="">Select</option>
                                <?php if(count($type_sizes) > 0): ?>
                                    <?php $__currentLoopData = $type_sizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->id); ?>" data-type="<?php echo e($item->product_type); ?>"><?php echo e($item->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                            <?php $__errorArgs = ['type_size'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback">
                                <strong><?php echo e($message); ?></strong>
                            </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div id="parent-sub-div" class="form-group">
                            <label for="input-select">Sizes</label>
                            <select name="size[]" class="form-control" id="size" multiple="multiple">
                            </select>
                            <?php $__errorArgs = ['size'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback">
                                <strong><?php echo e($message); ?></strong>
                            </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        
                        <div class="form-group">
                            <label for="input-select">Color</label>
                            <select multiple name="color[]" id="color" class="form-control">
                                <option value="">Select</option>
                                <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($color->id); ?>"><?php echo e($color->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['parent_category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback">
                                <strong><?php echo e($message); ?></strong>
                            </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="custom-file mb-3 col-4">
                            <input type="file" name="thumbnail" class="custom-file-input <?php $__errorArgs = ['thumbnail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="customFile">
                            <label class="custom-file-label" for="customFile">Add Product Picture</label>
                            <?php $__errorArgs = ['thumbnail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback">
                                <strong><?php echo e($message); ?></strong>
                            </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
    <?php echo $__env->make('vendor.inc.dashboardVendorFooter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- ============================================================== -->
        <!-- end footer -->
        <!-- ============================================================== -->
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js-files'); ?>
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
                url:"/vendor/dashboard/category/parent/" + data,
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
    <script src="<?php echo e(asset('dashboard-vendor/multi-select/js/jquery.multi-select.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard-vendor/select2/js/select2.min.js')); ?>"></script>

    <script>
        $('#my-select, #pre-selected-options').multiSelect()
        $('#color').select2({
            placeholder: "Select a color"
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('vendor.layouts.dashboardVendor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mypc\laravelprojects\Jones\spree (1)\spree\resources\views/vendor/dashboard/product/create.blade.php ENDPATH**/ ?>