<?php $__env->startSection('css-files'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/style.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/product_detail.css')); ?>">
    <style>


        .card{
            border: none;
        }
        .card-img-top{
            height: 100%;
            width: 115% !important;
        }

        .radio-toolbar input[type="radio"] {
            opacity: 0;
            position: fixed;
            width: 0;
        }

        .radio-toolbar label {
            display: inline-block;
            background-color: #fff;
            font-family: sans-serif, Arial;
            font-size: 14px;
            border: 1px solid #aaa;
            border-radius: 4px;
            width: 55px;
            height: 40px;
            text-align: center;
            vertical-align: middle;
            margin-right: 5px;
            line-height: 40px;
            cursor: pointer;
        }

        .radio-toolbar input[type="radio"]:focus + label {
            border: 2px dashed #444;
        }

        .radio-toolbar input[type="radio"]:checked + label, .radio-toolbar label:hover {
            background-color: #222;
            border-color: #222;
            color:white;
        }

        .custom-radios div {
            display: inline-block;
        }
        .custom-radios input[type="radio"] {
            display: none;
        }
        .custom-radios input[type="radio"] + label {
            color: #333;
            font-family: Arial, sans-serif;
            font-size: 14px;
        }
        .custom-radios input[type="radio"] + label span  {
            display: inline-block;
            width: 24px;
            height: 24px;
   
            cursor: pointer;
            border-radius: 50%;
            /* border: 2px solid #fff; */
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.33);
            background-repeat: no-repeat;
            background-position: center;
            text-align: center;
            line-height: 30px;
            margin-right: 6px 
        }
        .custom-radios input[type="radio"]:checked + label .inner {
           border: 2px solid white;
           width: 22px;
            height: 22px;
        }

        .custom-radios input[type="radio"]:checked + label .outer {
           border: 1px solid #1d1e1f;
        }

        .save-for-later{
            font-weight: 300;
            font-size: 18px;
        }
        .options a{
            color: #333333;
        }

        .not-size{
            background-color: #eee!important;
        }
        .not-size {
            background-color: transparent;
            pointer-events: none;
            opacity: 0.6;
        }

        .font-thin{
            font-size: 14px;
            line-height: 24px;
            color: #272727;
            font-weight: 400;
        }

        .top_links a{
            font-size: 14px;
            color:#1d1e1f;
            font-weight: 300;
        }
        .top_links .active{
            font-weight: 900;
            border: none;
        }

        .top_links .active a{
            font-weight: 500;
        }

    </style>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
        <div class="top d-flex space-between mt-3">
            <div class="d-flex top_links">
                <span> <a href='/}}'><?php echo e($product->main); ?> </a> &nbsp; </span> / <span class="active"> &nbsp; <a href=""> <?php echo e($product->name); ?> </a> &nbsp; </span>
            </div>
            <!-- <div class="d-flex top_icons">
            <i class="fab fa-facebook-f"></i>
            <i class="fab fa-pinterest-p"></i>
            <i class="fab fa-twitter"></i>
        </div> -->
        </div>
        <article>
        <div class="detailRow">
            <div class="pro_col1 d-flex">
                <div>
                    <?php if(count($product->images) > 0): ?>
                        <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="sImg" onClick="changeImage('<?php echo e(asset('storage/product/'.$image->path)); ?>')">
                                <img src="<?php echo e(asset('storage/product/'.$image->path)); ?>" alt="">
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
                <div class="p-1">
                    <img class="img-fluid" src="<?php echo e(asset('storage/product/'.$product->thumbnail)); ?>" alt="">
                </div>
            </div>
            <div class="pro_col2">
                <p class="underline font-thin"><?php echo e($product->user->vendor_profile->brand_name); ?>

                    <h2 class="heading m-0 p-0 mb-3">
                        <?php echo e($product->name); ?>

                    </h2>
                </p>
                <div>
                    <!-- <div class="d-flex stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half"></i>
                    <p>(4.6)</p>
                    <p class="underline ml-2">
                        2267 rating
                    </p>
                    <p class="underline ml-3">
                        390 comments
                    </p>
                </div> -->
                    <div class="colorPick">
                        <p class="font-thin">
                            Color:
                        </p>
                    </div>
                    <div class="custom-radios">
                        <?php if(count($product->colors) > 0): ?>
                            <?php $__currentLoopData = $product->colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div>
                                    <input type="radio" id="color-<?php echo e($color->name); ?>" name="color" value="<?php echo e($color->name); ?>" onChange="setColor(this);">
                                    <label for="color-<?php echo e($color->name); ?>">
                                      <span class="outer">
                                      <span class='inner' style="background-color: <?php echo e($color->color_code); ?>"> </span>
                                      </span>
                                    </label>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>

                    <div class="colorPick ">
                        <p class="font-thin">
                            Size:
                        </p>
                    </div>
                    <div class="radio-toolbar">
                        <?php $__currentLoopData = $product->sizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <input type="radio" id="radio-<?php echo e($size->name); ?>" name="size" value="<?php echo e($size->name); ?>" onChange="setSize();" style="display: none">
                            <label for="radio-<?php echo e($size->name); ?>" ><?php echo e($size->name); ?></label>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    </div>


                    <div class="qtySection d-flex mt-4">
                        <div class="qty">
                            <label for="qty" class="text-bold">Qty:</label>
                            <select class="sQty">
                                <option value="1">1</option>
                                <option value="1">2</option>
                                <option value="1">3</option>
                                <option value="1">4</option>
                                <option value="1">5</option>
                            </select>
                        </div>

                    </div>
                    <div>
                        <h4 class="price mt-3 mb-3">
                            $<?php echo e(\App\Helpers\Helper::presentPrice($product->price)); ?>

                        </h4>
                    </div>
                    <div class="col-12 mt-4 options">
                        <div class="row">
                            <a href="<?php echo e(route('cart.saveForLaterDetail', $product->id)); ?>" class="btn btn-outline-default">
                                <div class="d-inline-flex ml-1 ">
                                    <i class="far fa-bookmark"></i>
                                    <h5 class="save-for-later ml-1">Save For Later</h5>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="flex">
                        <div>
                            <form id="buy" action="<?php echo e(route('cart.store')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="slug" value="<?php echo e($product->slug); ?>">
                                <input type="hidden" name="color" id="color">
                                <input type="hidden" name="size" id="size">
                            </form>
                            <button type="submit" form="buy" class="px-5  btn btn-primary">
                                Add to Cart
                            </button>
                        </div>
                    </div>


                    <div class="heading mt-5 aboutItem">

                        <button id="descriptionSlider" class="descriptionBtn">Description</button>
                        <p class="mt-3">
                            <?php echo e($product->description); ?>

                        </p>
                    </div>

                    <div class="specification mt-5">

                    </div>
                </div>
            </div>
        </div>




        <?php if(count($recommendations) > 0): ?>
            <div class="mt-2 mb-2">
                <div class="container-fluid">
                    <div class="d-flex space-between fs-15 mt-3" style="    margin-top: 44px !important;">
                        <div>
                            <h4 class="fs-15 mb-3" style="margin-left: 28px;margin-bottom: 20px"> <b>Products similar to this item</b> </h4>
                        </div>
                        <div class="shopAll">
                            <a href="" style="font-weight: 600;margin-right: 120px">Shop All <i class="fa fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row" style="margin-left: -2px;">
                        <?php $__currentLoopData = $recommendations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-sm-12 col-md-10 col-lg-6 col-xl-2 ml-3">
                                <div class="card" style="margin-bottom: 1rem">
                                    <a href="<?php echo e(route('product.show',$product->slug)); ?>"><img class="card-img-top" src="<?php echo e(asset('storage/product/'.$product->thumbnail)); ?>"></a>
                                </div>
                                <div class="mt-2">
                                    <p class="text-bold mb-1"><?php echo e($product->user->vendor_profile->brand_name); ?></p>
                                    <p title="Source Title" style="font-size: 13px" class="mb-1"><?php echo e($product->name); ?></p>
                                    <p class="text-bold">$<?php echo e($product->price); ?>.00</p>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </article>


    <!-- product details section -->

























































































































































    <!-- also bought section -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js-files'); ?>
    <script type="text/javascript">
        function changeImage(image) {
            var mainImg = document.getElementById('mainImg');
            if (image) {
                mainImg.src = image
            }
        }
        function setColor() {
            var input = document.getElementsByName("color");
            var colorValue = null;
            for (var i=0; i< input.length; i++) {
                if(input[i].checked) {
                    colorValue = input[i].value
                }
            }
            document.getElementById('color').value = colorValue
        }
        function setSize() {
            var input = document.getElementsByName("size");
            var sizeValue = null;
            for (var i=0; i< input.length; i++) {
                if(input[i].checked) {
                    sizeValue = input[i].value
                }
            }
            document.getElementById('size').value = sizeValue
        }
        (function ($) { // Begin jQuery
            $(function () { // DOM ready
                // If a link has a dropdown, add sub menu toggle.
                $('nav ul li a:not(:only-child)').click(function (e) {
                    $(this).siblings('.nav-dropdown').toggle();
                    // Close one dropdown when selecting another
                    $('.nav-dropdown').not($(this).siblings()).hide();
                    e.stopPropagation();
                });
                // Clicking away from dropdown will remove the dropdown class
                $('html').click(function () {
                    $('.nav-dropdown').hide();
                });
                // Toggle open and close nav styles on click
                $('#nav-toggle').click(function () {
                    $('nav ul').slideToggle();
                });
                // Hamburger to X toggle
                $('#nav-toggle').on('click', function () {
                    this.classList.toggle('active');
                });
            }); // end DOM ready
        })(jQuery); // end jQuery
        
    </script>

    <script>
        $("input[name=color]").first().click();
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mypc\laravelprojects\Jones\spree (1)\spree\resources\views/product/show.blade.php ENDPATH**/ ?>