<?php $__env->startSection('css-files'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('dashboard-vendor/datatables/css/dataTables.bootstrap4.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('dashboard-vendor/datatables/css/buttons.bootstrap4.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('dashboard-vendor/datatables/css/select.bootstrap4.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('dashboard-vendor/datatables/css/fixedHeader.bootstrap4.css')); ?>">

    <style type="text/css">
        /* Variables */
        :root {
            --gray-offset: rgba(0, 0, 0, 0.03);
            --gray-border: rgba(0, 0, 0, 0.15);
            --gray-light: rgba(0, 0, 0, 0.4);
            --gray-mid: rgba(0, 0, 0, 0.7);
            --gray-dark: rgba(0, 0, 0, 0.9);
            --body-color: var(--gray-mid);
            --headline-color: var(--gray-dark);
            --accent-color: #0066f0;
            --body-font-family: -apple-system, BlinkMacSystemFont, sans-serif;
            --radius: 6px;
            --logo-image: url("https://storage.googleapis.com/stripe-sample-images/KAVHOLM.svg");
            --form-width: 343px;
        }

        /* Base */
        * {
            box-sizing: border-box;
        }
        body {
            font-family: var(--body-font-family);
            font-size: 16px;
            color: var(--body-color);
            -webkit-font-smoothing: antialiased;
        }
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: var(--body-color);
            margin-top: 2px;
            margin-bottom: 4px;
        }
        h1 {
            font-size: 27px;
            color: var(--headline-color);
        }
        h4 {
            font-weight: 500;
            font-size: 14px;
            color: var(--gray-light);
        }

        /* Layout */
        .sr-root {
            display: flex;
            flex-direction: row;
            width: 100%;
            max-width: 980px;
            padding: 48px;
            align-content: center;
            justify-content: center;
            height: auto;
            min-height: 100vh;
            margin: 0 auto;
        }
        .sr-header {
            margin-bottom: 32px;
        }
        .sr-payment-summary {
            margin-bottom: 20px;
        }
        .sr-main,
        .sr-content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 100%;
            align-self: center;
        }
        .sr-main {
            width: var(--form-width);
        }
        .sr-content {
            padding-left: 48px;
        }
        .sr-header__logo {
            background-image: var(--logo-image);
            height: 24px;
            background-size: contain;
            background-repeat: no-repeat;
            width: 100%;
        }
        .sr-legal-text {
            color: var(--gray-light);
            text-align: center;
            font-size: 13px;
            line-height: 17px;
            margin-top: 12px;
        }
        .sr-field-error {
            color: var(--accent-color);
            text-align: left;
            font-size: 13px;
            line-height: 17px;
            margin-top: 12px;
        }

        /* Form */
        .sr-form-row {
            margin: 16px 0;
        }
        label {
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 8px;
            display: inline-block;
        }

        /* Inputs */
        .sr-input,
        .sr-select,
        input[type="text"] {
            border: 1px solid var(--gray-border);
            border-radius: var(--radius);
            padding: 5px 12px;
            height: 44px;
            width: 100%;
            transition: box-shadow 0.2s ease;
            background: white;
            -moz-appearance: none;
            -webkit-appearance: none;
            appearance: none;
            color: #32325d;
        }
        .sr-input:focus,
        input[type="text"]:focus,
        button:focus,
        .focused {
            box-shadow: 0 0 0 1px rgba(50, 151, 211, 0.3), 0 1px 1px 0 rgba(0, 0, 0, 0.07),
            0 0 0 4px rgba(50, 151, 211, 0.3);
            outline: none;
            z-index: 9;
        }
        .sr-input::placeholder,
        input[type="text"]::placeholder {
            color: var(--gray-light);
        }

        /* Checkbox */
        .sr-checkbox-label {
            position: relative;
            cursor: pointer;
        }

        .sr-checkbox-label input {
            opacity: 0;
            margin-right: 6px;
        }

        .sr-checkbox-label .sr-checkbox-check {
            position: absolute;
            left: 0;
            height: 16px;
            width: 16px;
            background-color: white;
            border: 1px solid var(--gray-border);
            border-radius: 4px;
            transition: all 0.2s ease;
        }

        .sr-checkbox-label input:focus ~ .sr-checkbox-check {
            box-shadow: 0 0 0 1px rgba(50, 151, 211, 0.3), 0 1px 1px 0 rgba(0, 0, 0, 0.07),
            0 0 0 4px rgba(50, 151, 211, 0.3);
            outline: none;
        }

        .sr-checkbox-label input:checked ~ .sr-checkbox-check {
            background-color: var(--accent-color);
            background-image: url("https://storage.googleapis.com/stripe-sample-images/icon-checkmark.svg");
            background-repeat: no-repeat;
            background-size: 16px;
            background-position: -1px -1px;
        }

        /* Select */
        .sr-select {
            display: block;
            height: 44px;
            margin: 0;
            background-image: url("https://storage.googleapis.com/stripe-sample-images/icon-chevron-down.svg");
            background-repeat: no-repeat, repeat;
            background-position: right 12px top 50%, 0 0;
            background-size: 0.65em auto, 100%;
        }
        .sr-select:after {
        }
        .sr-select::-ms-expand {
            display: none;
        }
        .sr-select:hover {
            cursor: pointer;
        }
        .sr-select:focus {
            box-shadow: 0 0 0 1px rgba(50, 151, 211, 0.3), 0 1px 1px 0 rgba(0, 0, 0, 0.07),
            0 0 0 4px rgba(50, 151, 211, 0.3);
            outline: none;
        }
        .sr-select option {
            font-weight: 400;
        }
        .sr-select:invalid {
            color: var(--gray-light);
            background-opacity: 0.4;
        }

        /* Combo inputs */
        .sr-combo-inputs {
            display: flex;
            flex-direction: column;
        }
        .sr-combo-inputs input,
        .sr-combo-inputs .sr-select {
            border-radius: 0;
            border-bottom: 0;
        }
        .sr-combo-inputs > input:first-child,
        .sr-combo-inputs > .sr-select:first-child {
            border-radius: var(--radius) var(--radius) 0 0;
        }
        .sr-combo-inputs > input:last-child,
        .sr-combo-inputs > .sr-select:last-child {
            border-radius: 0 0 var(--radius) var(--radius);
            border-bottom: 1px solid var(--gray-border);
        }
        .sr-combo-inputs > .sr-combo-inputs-row:last-child input:first-child {
            border-radius: 0 0 0 var(--radius);
            border-bottom: 1px solid var(--gray-border);
        }
        .sr-combo-inputs > .sr-combo-inputs-row:last-child input:last-child {
            border-radius: 0 0 var(--radius) 0;
            border-bottom: 1px solid var(--gray-border);
        }
        .sr-combo-inputs > .sr-combo-inputs-row:first-child input:first-child {
            border-radius: var(--radius) 0 0 0;
        }
        .sr-combo-inputs > .sr-combo-inputs-row:first-child input:last-child {
            border-radius: 0 var(--radius) 0 0;
        }
        .sr-combo-inputs > .sr-combo-inputs-row:first-child input:only-child {
            border-radius: var(--radius) var(--radius) 0 0;
        }
        .sr-combo-inputs-row {
            width: 100%;
            display: flex;
        }

        .sr-combo-inputs-row > input {
            width: 100%;
            border-radius: 0;
        }

        .sr-combo-inputs-row > input:first-child:not(:only-child) {
            border-right: 0;
        }

        .sr-combo-inputs-row:not(:first-of-type) .sr-input {
            border-radius: 0 0 var(--radius) var(--radius);
        }

        /* Buttons and links */
        button {
            background: var(--accent-color);
            border-radius: var(--radius);
            color: white;
            border: 0;
            padding: 12px 16px;
            margin-top: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            display: block;
        }
        button:hover {
            filter: contrast(115%);
        }
        button:active {
            transform: translateY(0px) scale(0.98);
            filter: brightness(0.9);
        }
        button:disabled {
            opacity: 0.5;
            cursor: none;
        }

        .sr-payment-form button,
        .fullwidth {
            width: 100%;
        }

        a {
            color: var(--accent-color);
            text-decoration: none;
            transition: all 0.2s ease;
        }

        a:hover {
            filter: brightness(0.8);
        }

        a:active {
            filter: brightness(0.5);
        }

        /* Code block */
        .sr-callout {
            background: var(--gray-offset);
            padding: 12px;
            border-radius: var(--radius);
            max-height: 200px;
            overflow: auto;
        }
        code,
        pre {
            font-family: "SF Mono", "IBM Plex Mono", "Menlo", monospace;
            font-size: 12px;
        }

        /* Stripe Element placeholder */
        .sr-card-element {
            padding-top: 12px;
        }

        /* Responsiveness */
        @media (max-width: 720px) {
            .sr-root {
                flex-direction: column;
                justify-content: flex-start;
                padding: 48px 20px;
                min-width: 320px;
            }

            .sr-header__logo {
                background-position: center;
            }

            .sr-payment-summary {
                text-align: center;
            }

            .sr-content {
                display: none;
            }

            .sr-main {
                width: 100%;
            }
        }

        /* todo: spinner/processing state, errors, animations */

        .spinner,
        .spinner:before,
        .spinner:after {
            border-radius: 50%;
        }
        .spinner {
            color: #ffffff;
            font-size: 22px;
            text-indent: -99999px;
            margin: 0px auto;
            position: relative;
            width: 20px;
            height: 20px;
            box-shadow: inset 0 0 0 2px;
            -webkit-transform: translateZ(0);
            -ms-transform: translateZ(0);
            transform: translateZ(0);
        }
        .spinner:before,
        .spinner:after {
            position: absolute;
            content: "";
        }
        .spinner:before {
            width: 10.4px;
            height: 20.4px;
            background: var(--accent-color);
            border-radius: 20.4px 0 0 20.4px;
            top: -0.2px;
            left: -0.2px;
            -webkit-transform-origin: 10.4px 10.2px;
            transform-origin: 10.4px 10.2px;
            -webkit-animation: loading 2s infinite ease 1.5s;
            animation: loading 2s infinite ease 1.5s;
        }
        .spinner:after {
            width: 10.4px;
            height: 10.2px;
            background: var(--accent-color);
            border-radius: 0 10.2px 10.2px 0;
            top: -0.1px;
            left: 10.2px;
            -webkit-transform-origin: 0px 10.2px;
            transform-origin: 0px 10.2px;
            -webkit-animation: loading 2s infinite ease;
            animation: loading 2s infinite ease;
        }
        @-webkit-keyframes loading {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
        @keyframes  loading {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        /* Animated form */

        .sr-root {
            animation: 0.4s form-in;
            animation-fill-mode: both;
            animation-timing-function: ease;
        }

        .sr-payment-form .sr-form-row {
            animation: 0.4s field-in;
            animation-fill-mode: both;
            animation-timing-function: ease;
            transform-origin: 50% 0%;
        }

        /* need saas for loop :D  */
        .sr-payment-form .sr-form-row:nth-child(1) {
            animation-delay: 0;
        }
        .sr-payment-form .sr-form-row:nth-child(2) {
            animation-delay: 60ms;
        }
        .sr-payment-form .sr-form-row:nth-child(3) {
            animation-delay: 120ms;
        }
        .sr-payment-form .sr-form-row:nth-child(4) {
            animation-delay: 180ms;
        }
        .sr-payment-form .sr-form-row:nth-child(5) {
            animation-delay: 240ms;
        }
        .sr-payment-form .sr-form-row:nth-child(6) {
            animation-delay: 300ms;
        }
        .hidden {
            display: none;
        }

        @keyframes  field-in {
            0% {
                opacity: 0;
                transform: translateY(8px) scale(0.95);
            }
            100% {
                opacity: 1;
                transform: translateY(0px) scale(1);
            }
        }

        @keyframes  form-in {
            0% {
                opacity: 0;
                transform: scale(0.98);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }


        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */

        /* Document
           ========================================================================== */

        /**
         * 1. Correct the line height in all browsers.
         * 2. Prevent adjustments of font size after orientation changes in iOS.
         */

        html {
            line-height: 1.15; /* 1 */
            -webkit-text-size-adjust: 100%; /* 2 */
        }

        /* Sections
           ========================================================================== */

        /**
         * Remove the margin in all browsers.
         */

        body {
            margin: 0;
        }

        /**
         * Render the `main` element consistently in IE.
         */

        main {
            display: block;
        }

        /**
         * Correct the font size and margin on `h1` elements within `section` and
         * `article` contexts in Chrome, Firefox, and Safari.
         */

        h1 {
            font-size: 2em;
            margin: 0.67em 0;
        }

        /* Grouping content
           ========================================================================== */

        /**
         * 1. Add the correct box sizing in Firefox.
         * 2. Show the overflow in Edge and IE.
         */

        hr {
            box-sizing: content-box; /* 1 */
            height: 0; /* 1 */
            overflow: visible; /* 2 */
        }

        /**
         * 1. Correct the inheritance and scaling of font size in all browsers.
         * 2. Correct the odd `em` font sizing in all browsers.
         */

        pre {
            font-family: monospace, monospace; /* 1 */
            font-size: 1em; /* 2 */
        }

        /* Text-level semantics
           ========================================================================== */

        /**
         * Remove the gray background on active links in IE 10.
         */

        a {
            background-color: transparent;
        }

        /**
         * 1. Remove the bottom border in Chrome 57-
         * 2. Add the correct text decoration in Chrome, Edge, IE, Opera, and Safari.
         */

        abbr[title] {
            border-bottom: none; /* 1 */
            text-decoration: underline; /* 2 */
            text-decoration: underline dotted; /* 2 */
        }

        /**
         * Add the correct font weight in Chrome, Edge, and Safari.
         */

        b,
        strong {
            font-weight: bolder;
        }

        /**
         * 1. Correct the inheritance and scaling of font size in all browsers.
         * 2. Correct the odd `em` font sizing in all browsers.
         */

        code,
        kbd,
        samp {
            font-family: monospace, monospace; /* 1 */
            font-size: 1em; /* 2 */
        }

        /**
         * Add the correct font size in all browsers.
         */

        small {
            font-size: 80%;
        }

        /**
         * Prevent `sub` and `sup` elements from affecting the line height in
         * all browsers.
         */

        sub,
        sup {
            font-size: 75%;
            line-height: 0;
            position: relative;
            vertical-align: baseline;
        }

        sub {
            bottom: -0.25em;
        }

        sup {
            top: -0.5em;
        }

        /* Embedded content
           ========================================================================== */

        /**
         * Remove the border on images inside links in IE 10.
         */

        img {
            border-style: none;
        }

        /* Forms
           ========================================================================== */

        /**
         * 1. Change the font styles in all browsers.
         * 2. Remove the margin in Firefox and Safari.
         */

        button,
        input,
        optgroup,
        select,
        textarea {
            font-family: inherit; /* 1 */
            font-size: 100%; /* 1 */
            line-height: 1.15; /* 1 */
            margin: 0; /* 2 */
        }

        /**
         * Show the overflow in IE.
         * 1. Show the overflow in Edge.
         */

        button,
        input { /* 1 */
            overflow: visible;
        }

        /**
         * Remove the inheritance of text transform in Edge, Firefox, and IE.
         * 1. Remove the inheritance of text transform in Firefox.
         */

        button,
        select { /* 1 */
            text-transform: none;
        }

        /**
         * Correct the inability to style clickable types in iOS and Safari.
         */

        button,
        [type="button"],
        [type="reset"],
        [type="submit"] {
            -webkit-appearance: button;
        }

        /**
         * Remove the inner border and padding in Firefox.
         */

        button::-moz-focus-inner,
        [type="button"]::-moz-focus-inner,
        [type="reset"]::-moz-focus-inner,
        [type="submit"]::-moz-focus-inner {
            border-style: none;
            padding: 0;
        }

        /**
         * Restore the focus styles unset by the previous rule.
         */

        button:-moz-focusring,
        [type="button"]:-moz-focusring,
        [type="reset"]:-moz-focusring,
        [type="submit"]:-moz-focusring {
            outline: 1px dotted ButtonText;
        }

        /**
         * Correct the padding in Firefox.
         */

        fieldset {
            padding: 0.35em 0.75em 0.625em;
        }

        /**
         * 1. Correct the text wrapping in Edge and IE.
         * 2. Correct the color inheritance from `fieldset` elements in IE.
         * 3. Remove the padding so developers are not caught out when they zero out
         *    `fieldset` elements in all browsers.
         */

        legend {
            box-sizing: border-box; /* 1 */
            color: inherit; /* 2 */
            display: table; /* 1 */
            max-width: 100%; /* 1 */
            padding: 0; /* 3 */
            white-space: normal; /* 1 */
        }

        /**
         * Add the correct vertical alignment in Chrome, Firefox, and Opera.
         */

        progress {
            vertical-align: baseline;
        }

        /**
         * Remove the default vertical scrollbar in IE 10+.
         */

        textarea {
            overflow: auto;
        }

        /**
         * 1. Add the correct box sizing in IE 10.
         * 2. Remove the padding in IE 10.
         */

        [type="checkbox"],
        [type="radio"] {
            box-sizing: border-box; /* 1 */
            padding: 0; /* 2 */
        }

        /**
         * Correct the cursor style of increment and decrement buttons in Chrome.
         */

        [type="number"]::-webkit-inner-spin-button,
        [type="number"]::-webkit-outer-spin-button {
            height: auto;
        }

        /**
         * 1. Correct the odd appearance in Chrome and Safari.
         * 2. Correct the outline style in Safari.
         */

        [type="search"] {
            -webkit-appearance: textfield; /* 1 */
            outline-offset: -2px; /* 2 */
        }

        /**
         * Remove the inner padding in Chrome and Safari on macOS.
         */

        [type="search"]::-webkit-search-decoration {
            -webkit-appearance: none;
        }

        /**
         * 1. Correct the inability to style clickable types in iOS and Safari.
         * 2. Change font properties to `inherit` in Safari.
         */

        ::-webkit-file-upload-button {
            -webkit-appearance: button; /* 1 */
            font: inherit; /* 2 */
        }

        /* Interactive
           ========================================================================== */

        /*
         * Add the correct display in Edge, IE 10+, and Firefox.
         */

        details {
            display: block;
        }

        /*
         * Add the correct display in all browsers.
         */

        summary {
            display: list-item;
        }

        /* Misc
           ========================================================================== */

        /**
         * Add the correct display in IE 10+.
         */

        template {
            display: none;
        }

        /**
         * Add the correct display in IE 10.
         */

        [hidden] {
            display: none;
        }
    </style>

    <script src="https://js.stripe.com/v3/"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="dashboard-wrapper">
        <div class="container-fluid  dashboard-content">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="sr-payment-summary payment-view">
                    <h1 class="order-amount">Setup payouts to list your products on Spree.</h1>
                    <span>Once Stripe is setup your products sales will be transfered to your Stripe account automatically with every sale.</span>
                </div>
                <?php if($connected): ?>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Basic Table</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Payouts</th>
                                            <th>Transfers</th>
                                            <th>Available Balance</th>
                                            <th>Status</th>
                                            <th>Date Added</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if($account != null): ?>
                                                <tr>
                                                    <td><?php echo e($account->business_profile->name ?? 'Not Available'); ?></td>
                                                    <td><?php echo e($account->payouts_enabled == 1 ? 'Enabled' : 'Disabled'); ?></td>
                                                    <td><?php echo e($account->capabilities->transfers == 1 ? 'Enabled' : 'Disabled'); ?></td>
                                                    <td>$<?php echo e($balance->available[0]->amount/100); ?></td>
                                                    <td><?php echo e($VendorStripe->status); ?></td>
                                                    <td><?php echo e($VendorStripe->created_at); ?></td>
                                                    <td>

                                                    </td>
                                                </tr>
                                        <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <button id="submit">Setup payouts on Stripe</button>
                <?php endif; ?>
            </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js-files'); ?>
    <script type="text/javascript">
        let elmButton = document.querySelector("#submit");

        if (elmButton) {
            elmButton.addEventListener(
                "click",
                e => {
                    elmButton.setAttribute("disabled", "disabled");
                    elmButton.textContent = "Opening...";

                    fetch("/vendor/dashboard/bank/onboard-user", {
                        method: "POST",
                        body: JSON.stringify({_token: '<?php echo e(csrf_token()); ?>'}),
                        headers: {
                            "Content-Type": "application/json"
                        }
                    })
                        .then(response => response.json())
                        .then(data => {
                            console.log(data);
                            if (data.url) {
                                window.location = data.url.url;
                            } else {
                                elmButton.removeAttribute("disabled");
                                elmButton.textContent = "<Something went wrong>";
                                console.log("data", data);
                            }
                        });
                },
                false
            );
        }
    </script>






    <script src="<?php echo e(asset('dashboard-vendor/multi-select/js/jquery.multi-select.js')); ?>"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo e(asset('dashboard-vendor/datatables/js/dataTables.bootstrap4.min.js')); ?>"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo e(asset('dashboard-vendor/datatables/js/buttons.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard-vendor/datatables/js/data-table.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('vendor.layouts.dashboardVendor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nirjhar/PROJECTs/JONES/spree/resources/views/vendor/dashboard/bank/index.blade.php ENDPATH**/ ?>