
<div class="dashboard-header">
    <nav class="navbar navbar-expand-lg bg-white fixed-top">
        <a class="navbar-brand" href="{{'admin'}}">Spree</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        @php
            $notifications = \App\Models\Notification::where('read_at',null)->take(10)->get();
        @endphp
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto navbar-right-top">
                <li class="nav-item dropdown notification dropdown-notifications">
                    <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-bell"></i> <span class="indicator"></span></a>
                    <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                        <li>
                            <div class="notification-title"> Notification</div>
                            <div class="notification-list">
                                <span class="list-group">
                                    @foreach($notifications as $notification)
                                        <a href="{{route('admin.dashboard.notification.read',[$notification->id,0])}}" class="list-group-item list-group-item-action active">
                                            <div class="notification-info">
                                                <div class="notification-list-user-block"><span class="notification-list-user-name">{{$notification->name}}</span> made an order
                                                    <div class="notification-date">2 min ago</div>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
{{--                                    <a href="#" class="list-group-item list-group-item-action">--}}
{{--                                        <div class="notification-info">--}}
{{--                                            <div class="notification-list-user-img"><img src="assets/images/avatar-3.jpg" alt="" class="user-avatar-md rounded-circle"></div>--}}
{{--                                            <div class="notification-list-user-block"><span class="notification-list-user-name">John Abraham </span>is now following you--}}
{{--                                                <div class="notification-date">2 days ago</div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                    <a href="#" class="list-group-item list-group-item-action">--}}
{{--                                        <div class="notification-info">--}}
{{--                                            <div class="notification-list-user-img"><img src="assets/images/avatar-4.jpg" alt="" class="user-avatar-md rounded-circle"></div>--}}
{{--                                            <div class="notification-list-user-block"><span class="notification-list-user-name">Monaan Pechi</span> is watching your main repository--}}
{{--                                                <div class="notification-date">2 min ago</div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                    <a href="#" class="list-group-item list-group-item-action">--}}
{{--                                        <div class="notification-info">--}}
{{--                                            <div class="notification-list-user-img"><img src="assets/images/avatar-5.jpg" alt="" class="user-avatar-md rounded-circle"></div>--}}
{{--                                            <div class="notification-list-user-block"><span class="notification-list-user-name">Jessica Caruso</span>accepted your invitation to join the team.--}}
{{--                                                <div class="notification-date">2 min ago</div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
                                </span>
                            </div>
                        </li>
                        <li>
                            <div class="list-footer"> <a href="{{route('admin.dashboard.notification')}}">View all notifications</a></div>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown nav-user">
                    <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{asset('images/dashboard/avatar-1.jpg')}}" alt="" class="user-avatar-md rounded-circle"></a>
                    <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                        <div class="nav-user-info">
                            <h5 class="mb-0 text-white nav-user-name">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</h5>
                        </div>
                        <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Account</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a>
                        <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-power-off mr-2"></i>Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>
@section('js-files')


{{--    <script>--}}
{{--        var interval = 1000;  // 1000 = 1 second, 3000 = 3 seconds--}}
{{--        function doAjax() {--}}
{{--            $.ajax({--}}
{{--                type: 'GET',--}}
{{--                url: '/test',--}}
{{--                data: $(this).serialize(),--}}
{{--                dataType: 'json',--}}
{{--                success: function (data) {--}}
{{--                    console.log(data);--}}
{{--                    //$('#hidden').val(data);// first set the value--}}
{{--                },--}}
{{--                complete: function (data) {--}}
{{--                    // Schedule the next--}}
{{--                    setTimeout(doAjax, interval);--}}
{{--                }--}}
{{--            });--}}
{{--        }--}}
{{--        setTimeout(doAjax, interval);--}}
{{--    </script>--}}

@endsection
