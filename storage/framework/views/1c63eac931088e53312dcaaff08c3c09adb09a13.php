<?php $__env->startSection('css-files'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('dashboard-vendor/multi-select/css/multi-select.css')); ?>">
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
                    <form action="<?php echo e(route('admin.dashboard.career.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="name" class="col-form-label">Name</label>
                            <input id="inputText3" name="name" value="<?php echo e(old('name')); ?>" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
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
                            <label for="input-select">Job Type</label>
                            <select name="type" class="form-control" >
                                <option value="">Select</option>
                                <?php $__currentLoopData = config('enums.job_type'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($type == old('type')): ?>
                                        <option selected value="<?php echo e($type); ?>"><?php echo e($type); ?></option>
                                    <?php else: ?>
                                        <option value="<?php echo e($type); ?>"><?php echo e($type); ?></option>
                                    <?php endif; ?>
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
                            <label for="input-select">Job Category</label>
                            <select name="category" class="form-control" >
                                <option value="">Select</option>
                                <?php $__currentLoopData = config('enums.job_category'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($type == old('category')): ?>
                                        <option selected value="<?php echo e($cat); ?>"><?php echo e($cat); ?></option>
                                    <?php else: ?>
                                        <option value="<?php echo e($cat); ?>"><?php echo e($cat); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['job_category'];
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
                            <label for="description">Qualification</label>
                            <textarea class="form-control <?php $__errorArgs = ['qualification'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="qualification" name="qualification" rows="3"><?php echo e(old('qualification')); ?></textarea>
                            <?php $__errorArgs = ['qualification'];
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
                            <label for="name" class="col-form-label">City</label>
                            <input id="inputText3" value="<?php echo e(old('city')); ?>" name="city" type="text" class="form-control <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <?php $__errorArgs = ['city'];
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
                            <label for="name" class="col-form-label">Country</label>
                            <input id="inputText3" value="<?php echo e(old('country')); ?>" name="country" type="text" class="form-control <?php $__errorArgs = ['country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <?php $__errorArgs = ['country'];
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
        <!-- ============================================================== -->
        <!-- end footer -->
        <!-- ============================================================== -->
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js-files'); ?>
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
    <script src="<?php echo e(asset('dashboard-vendor/multi-select/js/jquery.multi-select.js')); ?>"></script>

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.dashboardAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mypc\laravelprojects\Jones\spree (1)\spree\resources\views/admin/dashboard/careers/create.blade.php ENDPATH**/ ?>