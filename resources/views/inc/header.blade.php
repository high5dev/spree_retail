<style>
    .form-group{
        margin-bottom: 0;
    }
</style>

<section class="navigation">
    <div class="nav-container">
        <div class="brand">
            <a href="{{route('home')}}" style="text-transform: capitalize;">Spree</a>
        </div>
        <style>
            .dropbtn {
                background-color: #4CAF50;
                color: white;
                padding: 16px;
                font-size: 16px;
                border: none;
                cursor: pointer;
            }

            .dropbtn:hover, .dropbtn:focus {
                background-color: #3e8e41;
            }

            #myInput {
                box-sizing: border-box;
                background-position: 12px 12px;
                background-repeat: no-repeat;
                font-size: 13px;
                padding: 8px 45px 8px 15px;
                border: none;
                border-radius: 1px;
                width: auto;
                vertical-align: auto;
            }

            #myInput:focus {outline: 0px solid #ddd;}

            .dropdown {
                position: relative;
                display: inline-block;
            }

            .content {
                position: absolute;
                background-color: black;
                min-width: 100%;
                overflow: auto;
                z-index: 1;
            }


            .content a {
                color: black;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
                background: white !important;
                margin-top: 0 !important;
                font-weight: 10;
                text-transform: none !important;
                font-family: acumin-pro,Helvetica,Avenir,sans-serif;
            }

            .dropdown a:hover {background-color: #ddd;}

            .show {display: block;}
        </style>
        <nav>
            <div class="nav-mobile"><a id="nav-toggle" href="#!"><span></span></a></div>
            <ul class="nav-list">
                <li class="nav-center">
                    <a href="{{route('main','Fashion')}}">Fashion</a>
                </li>
                <li class="nav-center">
                    <a href="{{route('main','Health & Beauty')}}">Health & beauty</a>
                </li>
                <li class="nav-center">
                    <a href="{{route('main','Electronics')}}">Electronics</a>
                </li>
                <li class="nav-center" id="navLast">
                    <a href="{{route('main','Groceries')}}">Groceries</a>
                </li>
                <li>
                    <div class="form-group has-search dropdown">
                        <input type="text" placeholder="Search" id="myInput" name="myInput" onkeyup="">
                        <span class="fa fa-search form-control-feedback mr-2"></span>
                        <div id="myDropdown" class="content">
                        </div>
                    </div>
                </li>
                <li class="icons mr-0">

                @guest
                        <a href="{{ route('login') }}" style="text-transform: capitalize;">
                            Login
                            <span>
								<img src="{{asset('icons/account.svg')}}" alt="account" class="account">
                        </span>
                        </a>
                @else
                        <a href="{{ route('profile') }}" style="text-transform: capitalize;">
                            Account
                            <span>
								<img src="{{asset('icons/account.svg')}}" alt="account" class="account">
                        </span>
                        </a>
                @endguest
                </li>
                <li class="icons ml-0" >
                    <a href="{{route('cart.index')}}" style="text-transform: capitalize;padding-left: 0 !important;">
                        Cart
                        <span>
								<img src="{{asset('icons/cart.svg')}}" alt="">
							</span>
                    </a>
                </li>
            </ul>
        </nav>

    </div>
</section>
