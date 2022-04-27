<div class="pCol1" style="margin-left: 2.4rem;margin-top: 2.6rem">
    <a href="{{route('profile')}}">
        <h3 class="@if(\Request::route()->getName() == 'profile')pActive @else @endif">Account Manage</h3>
    </a>
    <a href="{{route('profile.payment')}}">
        <h3 style="font-weight: 400" class="@if(\Request::route()->getName() == 'profile.payment')pActive @else @endif">Payment Methods</h3>
    </a>
    <a href="{{route('profile.address')}}">
        <h3 style="font-weight: 400" class="@if(\Request::route()->getName() == 'profile.address')pActive @else @endif">Shipping Addresses</h3>
    </a>
    <a href="{{route('profile.saveForLater')}}">
        <h3 style="font-weight: 400" class="@if(\Request::route()->getName() == 'profile.saveForLater')pActive @else @endif">Saved Products</h3>
    </a>
    <a href="{{route('profile.order')}}">
        <h3 style="font-weight: 400" class="@if(\Request::route()->getName() == 'profile.order')pActive @else @endif">Purchase History</h3>
    </a>
    <a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <h3 style="font-weight: 400">Sign Out</h3>
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>
