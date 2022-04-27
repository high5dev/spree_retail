<?php $__env->startSection('css-files'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/job.css')); ?>">
    <style>
        .filterContainer{
            position: sticky;
            top: 0;
            display: block;
            margin-top:50px;
            margin-bottom: 50px;
            margin-right: 10px;
            width:15%;

        }

        .firstInFilter h1{

            font-size: 28px;
            font-weight: 700;
        }

        .plus{
            float: right;
            font-size: 20px;
            color:  rgba(128, 128, 128, 0.747);

        }


        .filters{
            width: 200px;
            padding-bottom: 10px;
            padding-top: 10px;
            color: rgb(51, 51, 51);
        }
        .filters h3 {
            padding-bottom: 1px;
	font-size: 14px;
    line-height: 24px;
    font-weight: 700;
        }
        .separateFooter{
            margin-left: 23px;
            width: 97%;
            height: 1px;
            background-color: rgba(128, 128, 128, 0.267);
        }

        .underline{
            height: 1px;
            width: 200px;
            background-color: rgba(128, 128, 128, 0.274);
        }
        .boldUnderline{

            height: 2px;
            width: 285%;
            background-color: black;

        }
        .firstInFilter{
            padding-bottom: 45px;
        }

        .firstInFilter h1{
            padding-bottom: 7px;
        }

        .main{
            display: flex;
        }
        .imageSection{
            margin-top: 60px;
            width: 60%;
            display:flex;
        }

        .customImage{
            padding-left: 20px;
            height: 80%;
            width: 90%;
        }
        .leftSide{
            display: block;
        }

        .cardCustom{

            display: block;
        }
        .textUnderImg{
            padding-left: 20px;
        }
        .textUnderImg h4{
            padding-top: 20px;
        }

        .textUnderImg h4{
            font-size: 20px;
        }

        .textUnderImg p{

            padding: 0;
            margin-bottom: 4px;

        }
        .filters a:hover{
            text-decoration: none;
        }

        .filters .checbox-text {
            display: inline-block;
            margin-left: 5px;
        }

        .checkbox-price {
            border: 1px solid #e8e8e8;
            border-radius: 2px;
            -webkit-box-shadow: 0 1px 2px 0 rgb(29 30 31 / 4%);
            box-shadow: 0 1px 2px 0 rgb(29 30 31 / 4%);
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            background-color: #fff;
            cursor: pointer;
            display: inline;
            height: 20px;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            width: 20px;
            padding-left: 20px;
        }

        input[class="checkbox-color"] {
            display: none;
        }

        input[class="checkbox-color"] + label {
            color: #333;
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        input[class="checkbox-color"] + label span {
            display: inline-block;
            width: 30px;
            height: 30px;
            margin: -1px 4px 0 0;
            vertical-align: middle;
            cursor: pointer;
            border-radius: 50%;
            border: 2px solid #fff;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.33);
            background-repeat: no-repeat;
            background-position: center;
            text-align: center;
            line-height: 44px;
        }

        input[class="checkbox-color"] + label span img {
            opacity: 0;
            transition: all 0.3s ease;
            margin-top: -18px;
        }

        input[class="checkbox-color"]:checked + label span img {
            opacity: 1;
        }

        .collapse {
            max-height: 200px;
            overflow: auto;
        }

    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-1">

            </div>
            <div class="col-2">
                <div class="filterContainer">
                    <div class="firstInFilter">
                        <h1 style="white-space: nowrap;"><?php echo e($main); ?></h1>
                        <div class="boldUnderline"></div>
                    </div>
                    <div class="filters">
                        <a data-toggle="collapse" href="#price" role="button" aria-expanded="false" aria-controls="collapseExample" style="color: black">
                            <h3 class="align-text-top">Price <span class="plus">+</span></h3>
                        </a>
                        <div class="collapse" id="price">
                            <div><input type="checkbox" name="p[]" class="checkbox-price" onChange="filterByOption()" value="0-50"><div class="checbox-text">Under $50</div></div>
                            <div><input type="checkbox" name="p[]" class="checkbox-price" onChange="filterByOption()" value="50-100"><div class="checbox-text">$50 to $100</div></div>
                            <div><input type="checkbox" name="p[]" class="checkbox-price" onChange="filterByOption()" value="100-150"><div class="checbox-text">$100 to $150</div></div>
                            <div><input type="checkbox" name="p[]" class="checkbox-price" onChange="filterByOption()" value="200-300"><div class="checbox-text">$200 to $300</div></div>
                            <div><input type="checkbox" name="p[]" class="checkbox-price" onChange="filterByOption()" value="300-500"><div class="checbox-text">$300 to $500</div></div>
                            <div><input type="checkbox" name="p[]" class="checkbox-price" onChange="filterByOption()" value="500-1000"><div class="checbox-text">$500 to $1000</div></div>
                            <div><input type="checkbox" name="p[]" class="checkbox-price" onChange="filterByOption()" value="1000"><div class="checbox-text">Over $1000</div></div>
                        </div>
                        <div class="underline"></div>
                    </div>

                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="filters">
                            <a data-toggle="collapse" href="#collapseExample-<?php echo e($loop->iteration); ?>" role="button" aria-expanded="false" aria-controls="collapseExample-<?php echo e($loop->iteration); ?>" style="color: black">
                                <h3 class="align-text-top"><?php echo e($category->name); ?> <span class="plus">+</span></h3>
                            </a>
                            <div class="collapse" id="collapseExample-<?php echo e($loop->iteration); ?>">
                                <?php $__currentLoopData = $category->child; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="filters">
                                        <a style="color: black;cursor: pointer" onClick="goto('<?php echo e(route('category.child',[$main,$category->name,$child->name])); ?>')" class="toggle__text text-gray garage-title"><?php echo e($child->name); ?></a>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="underline"></div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <div class="filters">
                        <a data-toggle="collapse" href="#size" role="button" aria-expanded="false" aria-controls="collapseExample" style="color: black">
                            <h3 class="align-text-top">Size <span class="plus">+</span></h3>
                        </a>
                        <div class="collapse" id="size">
                            <div>
                                <?php if(count($sizes) > 0): ?>
                                    <?php $__currentLoopData = $sizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div><input type="checkbox" name="s[]" class="checkbox-price" onChange="filterByOption()" value="<?php echo e($size->id); ?>">
                                            <div class="checbox-text"><?php echo e($size->name); ?></div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="underline"></div>
                    </div>

                    <div class="filters">
                        <a data-toggle="collapse" href="#color" role="button" aria-expanded="false" aria-controls="collapseExample" style="color: black">
                            <h3 class="align-text-top">Color <span class="plus">+</span></h3>
                        </a>
                        <div class="collapse" id="color">
                            <?php if(count($colors) > 0): ?>
                                <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div>
                                        <input type="checkbox" id="color-<?php echo e($color->name); ?>" name="c[]" class="checkbox-color" value="<?php echo e($color->id); ?>" onChange="filterByOption()">
                                        <label for="color-<?php echo e($color->name); ?>">
                                            <span style="background-color: <?php echo e($color->color_code); ?>">
                                                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/242518/check-icn.svg" alt="Checked Icon" />
                                            </span>
                                        </label>
                                        <span><?php echo e($color->name); ?></span>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                        <div class="underline"></div>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="leftSide">
                    <div class="row" style="margin-top: 0.6rem;max-width: 97%">
                        <?php if(count($products) > 0): ?>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-3 mt-5 pl-0 pr-0">
                                    <a href="<?php echo e(route('product.show',[$product->slug,$main])); ?>"><img class= "customImage" src="<?php echo e(asset('storage/product/'.$product->thumbnail)); ?>" alt=""></a>
                                    <div class="textUnderImg">
                                        <h4><?php echo e($product->user->vendor_profile->brand_name); ?></h4>
                                        <p><?php echo e($product->name); ?></p>
                                        <h5>$<?php echo e($product->price); ?>.00</h5>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <script>
        var accordion = (function () {

            var $accordion = $('.js-accordion');
            var $accordion_header = $accordion.find('.js-accordion-header');
            var $accordion_item = $('.js-accordion-item');

            // default settings
            var settings = {
                // animation speed
                speed: 3000,

                // close all other accordion items if true
                oneOpen: true
            };

            return {
                // pass configurable object literal
                init: function ($settings) {
                    $accordion_header.on('click', function () {
                        accordion.toggle($(this));

                        setTimeout(() => {
                            $('body, html').animate({

                            }, 0)
                        }, 0)
                    });

                    $.extend(settings, $settings);

                    // ensure only one accordion is active if oneOpen is true
                    if (settings.oneOpen && $('.js-accordion-item.active').length > 1) {
                        $('.js-accordion-item.active:not(:first)').removeClass('active');
                    }

                    // reveal the active accordion bodies
                    $('.js-accordion-item.active').find('> .js-accordion-body').show();
                },
                toggle: function ($this) {

                    if (settings.oneOpen && $this[0] != $this.closest('.js-accordion').find('> .js-accordion-item.active > .js-accordion-header')[0]) {
                        $this.closest('.js-accordion')
                            .find('> .js-accordion-item')
                            .removeClass('active')
                            .find('.js-accordion-body')
                            .slideUp()
                    }

                    // show/hide the clicked accordion item
                    $this.closest('.js-accordion-item').toggleClass('active');
                    $this.next().stop().slideToggle(settings.speed);
                }
            }
        })();

        $(document).ready(function () {
            accordion.init({ speed: 1000, oneOpen: true });
        });

        init();
        function init() {
            var url = window.location.href.split('?')
            var uri = []
            if (url.length > 1) {
                uri = url[1].split('&')
            }
            var prices = document.getElementsByName('p[]')
            var colors = document.getElementsByName('c[]')
            var sizes = document.getElementsByName('s[]')
            uri.forEach(u => {
                var temp = u.split('=')
                if (temp.length === 2) {
                    if (temp[0] === 'p[]') {
                        for(var i=0; i < prices.length; i++) {
                            if (prices[i].value === temp[1]) {
                                prices[i].checked = true
                            }
                        }
                    }
                    if (temp[0] === 'c[]') {
                        for(var i=0; i < colors.length; i++) {
                            if (colors[i].value === temp[1]) {
                                colors[i].checked = true
                            }
                        }
                    }
                    if (temp[0] === 's[]') {
                        for(var i=0; i < sizes.length; i++) {
                            if (sizes[i].value === temp[1]) {
                                sizes[i].checked = true
                            }
                        }
                    }
                }
            })
        }

        function filterByOption() {
            window.location.href = handleUrl()
        }

        function goto(link) {
            window.location.href = link + '?' + getUri(handleUrl())
        }

        function getUri(url) {
            var uri = url.split('?')

            if (uri.length > 1) return uri[1]
            return ''
        }

        function handleUrl() {
            var prices = document.getElementsByName('p[]')
            var colors = document.getElementsByName('c[]')
            var sizes = document.getElementsByName('s[]')
            var url = window.location.href.split('?')
            var uri = []
            if (url.length > 1) {
                uri = url[1].split('&')
            }
            for(var i=0; i < prices.length; i++) {
                var index
                if (prices[i].checked) {
                    index = uri.findIndex(u => {
                        var temp = u.split('=')
                        if (temp.length > 1) {
                            return temp[1] === prices[i].value && temp[0] === 'p[]'
                        }
                        return false
                    })
                    if (index === -1) {
                        uri.push('p[]=' + prices[i].value)
                    }
                } else {
                    index = uri.findIndex(u => {
                        var temp = u.split('=')
                        if (temp.length > 1) {
                            return temp[1] === prices[i].value && temp[0] === 'p[]'
                        }
                        return false
                    })
                    if (index > -1) {
                        uri.splice(index, 1)
                    }
                }
            }

            for(var s=0; s < sizes.length; s++) {
                var indexs
                if (sizes[s].checked) {
                    indexs = uri.findIndex(u => {
                        var temp = u.split('=')
                        if (temp.length > 1) {
                            return temp[1] === sizes[s].value && temp[0] === 's[]'
                        }
                        return false
                    })
                    if (indexs === -1) {
                        uri.push('s[]=' + sizes[s].value)
                    }
                } else {
                    indexs = uri.findIndex(u => {
                        var temp = u.split('=')
                        if (temp.length > 1) {
                            return temp[1] === sizes[s].value && temp[0] === 's[]'
                        }
                        return false
                    })
                    if (indexs > -1) {
                        uri.splice(indexs, 1)
                    }
                }
            }

            for(var c=0; c < colors.length; c++) {
                var indexc
                if (colors[c].checked) {
                    indexc = uri.findIndex(u => {
                        var temp = u.split('=')
                        if (temp.length > 1) {
                            return temp[1] === colors[c].value && temp[0] === 'c[]'
                        }
                        return false
                    })
                    if (indexc === -1) {
                        uri.push('c[]=' + colors[c].value)
                    }
                } else {
                    indexc = uri.findIndex(u => {
                        var temp = u.split('=')
                        if (temp.length > 1) {
                            return temp[1] === colors[c].value && temp[0] === 'c[]'
                        }
                        return false
                    })
                    if (index > -1) {
                        uri.splice(indexc, 1)
                    }
                }
            }
            var new_uri = uri.join('&')
            url = url[0] + '?' + new_uri
            return url
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mypc\laravelprojects\Jones\spree (1)\spree\resources\views/pages/main.blade.php ENDPATH**/ ?>