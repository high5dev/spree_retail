@extends('layouts.app')
@section('css-files')
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/profile.css')}}">
@endsection
@section('content')
    <main>
        <section class="profile">
            @include('inc.profileSidebar')
            <div class="pCol2">
                <div class="heading">
                    <h2>Shipping Addresses</h2>
                </div>
                <div class="row">
                    <div class="col-lg-12" style="padding: 0px;">
                        <div style="overflow-x: auto;">
                            <table>
                                <thead>
                                <tr>
                                    <th>
                                        First Name
                                    </th>
                                    <th>
                                        Last Name
                                    </th>
                                    <th>
                                        Address
                                    </th>
                                    <th>
                                        Apartment Address
                                    </th>
                                    <th>
                                        City
                                    </th>
                                    <th>
                                        Region
                                    </th>
                                    <th>
                                        Country
                                    </th>
                                    <th>
                                        Zip Code
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>

                                    @if(count($addresses) > 0)
                                        @foreach($addresses as $address)
                                            <tr>
                                            <td>
                                                {{$address->first_name}}
                                            </td>
                                                <td>
                                                    {{$address->last_name}}
                                                </td>
                                            <td>
                                                {{$address->address}}
                                            </td>
                                                <td>
                                                    {{$address->app_address ?? 'Nill'}}
                                                </td>
                                            <td>
                                                {{$address->city}}
                                            </td>
                                            <td>
                                                {{$address->region}}
                                            </td>
                                            <td>
                                                {{$address->country}}
                                            </td>
                                            <td>
                                                {{$address->zipcode}}
                                            </td>
                                            <td>
                                                <a class="edit" href="" data-toggle="modal" data-target="#edit-modal-{{$loop->iteration}}">
                                                    Edit
                                                </a>
                                                <div class="modal fade" id="edit-modal-{{$loop->iteration}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">Edit Address {{$loop->iteration}}</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form id="update-address-{{$loop->iteration}}" method="POST"  action="{{route('profile.address.update',$address->id)}}">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlInput1">First Name</label>
                                                                        <input type="text" name="first_name" value="{{$address->first_name}}" class="form-control" id="exampleFormControlInput1" placeholder="First Name">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlInput1">Last Name</label>
                                                                        <input type="text" name="last_name" value="{{$address->last_name}}" class="form-control" id="exampleFormControlInput1" placeholder="Last Name">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlInput1">Address</label>
                                                                        <input type="text" name="address" value="{{$address->address}}" class="form-control" id="exampleFormControlInput1" placeholder="Address">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlInput1">Apartment Address</label>
                                                                        <input type="text" name="app_address" value="{{$address->app_address}}" class="form-control" id="exampleFormControlInput1" placeholder="Address">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlInput1">City</label>
                                                                        <input type="text" name="city" value="{{$address->city}}" class="form-control" id="exampleFormControlInput1" placeholder="City">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlInput1">Region</label>
                                                                        <input type="text" name="region" value="{{$address->region}}" class="form-control" id="exampleFormControlInput1" placeholder="Region">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlInput1">Country</label>
                                                                        <input type="text" name="country" value="{{$address->country}}" class="form-control" id="exampleFormControlInput1" placeholder="Country">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlInput1">Zip Code</label>
                                                                        <input type="text" name="zipcode" value="{{$address->zipcode}}" class="form-control" id="exampleFormControlInput1" placeholder="Zip Code">
                                                                    </div>

                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" form="update-address-{{$loop->iteration}}" class="btn btn-primary">Update</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            </tr>
                                        @endforeach
                                    @endif

                                </tbody>
                            </table>
                        </div>
                        <div class="addBtn">
                            <button class="button" data-toggle="modal" data-target="#exampleModalCenter">
                                + Add New Address
                            </button>
                        </div>
                        <!-- Add New -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Add New Address</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="new-address" method="POST"  action="{{route('profile.address.store')}}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">First Name</label>
                                                <input type="text" name="first_name" value="" class="form-control" id="exampleFormControlInput1" placeholder="First Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Last Name</label>
                                                <input type="text" name="last_name" value="" class="form-control" id="exampleFormControlInput1" placeholder="Last Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Address</label>
                                                <input type="text" name="address" value="" class="form-control" id="exampleFormControlInput1" placeholder="Address">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Apartment Address</label>
                                                <input type="text" name="app_address" value="" class="form-control" id="exampleFormControlInput1" placeholder="Address">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">City</label>
                                                <input type="text" name="city" class="form-control" id="exampleFormControlInput1" placeholder="City">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Region</label>
                                                <input type="text" name="region" class="form-control" id="exampleFormControlInput1" placeholder="Region">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Country</label>
                                                <input type="text" name="country" class="form-control" id="exampleFormControlInput1" placeholder="Country">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Zip Code</label>
                                                <input type="text" name="zipcode" class="form-control" id="exampleFormControlInput1" placeholder="Zip Code">
                                            </div>

                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" form="new-address" class="btn btn-primary">Add</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Edit -->
                        <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Address</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="new-address" method="POST"  action="{{route('profile.address.store')}}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Name</label>
                                                <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Address</label>
                                                <input type="text" name="address" class="form-control" id="exampleFormControlInput1" placeholder="Address">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">City</label>
                                                <input type="text" name="city" class="form-control" id="exampleFormControlInput1" placeholder="City">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Region</label>
                                                <input type="text" name="region" class="form-control" id="exampleFormControlInput1" placeholder="Region">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Country</label>
                                                <input type="text" name="country" class="form-control" id="exampleFormControlInput1" placeholder="Country">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Zip Code</label>
                                                <input type="text" name="zipcode" class="form-control" id="exampleFormControlInput1" placeholder="Zip Code">
                                            </div>

                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" form="new-address" class="btn btn-primary">Add</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
