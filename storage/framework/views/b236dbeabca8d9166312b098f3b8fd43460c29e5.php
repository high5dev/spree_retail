<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Spree <?php echo $__env->yieldContent('title'); ?></title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Jquery -->
    <script type="text/javascript"
            src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel='stylesheet' href='/css/splide.min.css'>

    <!-- Other CSS files -->
    <?php echo $__env->yieldContent('css-files'); ?>
</head>

<body onload="submit_button()">
<!-- Session Messages -->
<?php echo $__env->make('inc.message_popup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Navigation -->
<?php echo $__env->make('inc.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- End Navigation -->

<!-- Start Content -->
<?php echo $__env->yieldContent('content'); ?>
<!-- End Content -->

<!-- Start Footer -->
<?php echo $__env->make('inc.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!--- End Footer -->


<!--- Script Js Files -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/15ce08dfb5.js" crossorigin="anonymous"></script>
<script src='/js/splide.min.js'></script>

<script>
    /* When the user clicks on the button,
    toggle between hiding and showing the dropdown content */
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    function filterFunction() {
        var input, filter, ul, li, a, i;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        div = document.getElementById("myDropdown");
        a = div.getElementsByTagName("a");
        for (i = 0; i < a.length; i++) {
            txtValue = a[i].textContent || a[i].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                a[i].style.display = "";
            }else {
                a[i].style.display = "none";
            }
            if(filter == ''){
                a[i].style.display = "none";
            }
        }
    }

    window.addEventListener('click', function(e){
        if (document.getElementById('myInput').contains(e.target)){
            // Clicked in box
        } else{
            document.getElementById('myInput').value = '';
            filterFunction();
        }
    });
</script>

<script type="text/javascript">
    $('#myInput').on('keyup',function(e){
        $value=$(this).val();
        if (e.keyCode === 13) {
            window.location.href = `<?php echo e(URL::to('search')); ?>?k=` + $value;
        } else {
            $.ajax({
                type : 'get',
                url : '<?php echo e(URL::to('search')); ?>',
                data:{'search':$value},
                success:function(data){
                    $('#myDropdown').html(data);
                    filterFunction();
                }
            });
        }
    })
</script>

<script type="text/javascript">
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
    // Instantiate the Bootstrap carousel
    $('.multi-item-carousel').carousel({
        interval: false
    });

    // for every slide in carousel, copy the next slide's item in the slide.
    // Do the same for the next, next item.
    $('.multi-item-carousel .item').each(function(){
        var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));

        if (next.next().length>0) {
            next.next().children(':first-child').clone().appendTo($(this));
        } else {
            $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
        }
    });
</script>
<!-- Other JS files -->
<?php echo $__env->yieldContent('js-files'); ?>
</body>
</html>
<?php /**PATH C:\Users\mypc\laravelprojects\Jones\spree (1)\spree\resources\views/layouts/app.blade.php ENDPATH**/ ?>