<script>
    //for message.blade.php
    function submit_button() {
        if(document.getElementById("popup"))
            document.getElementById("popup").click();
    }
</script>

@if(count($errors)>0)
    <div>
        <button style="display: none" type="button" id="popup" data-toggle="modal" data-target="#myModal"></button>
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Errors</h4>
                    </div>
                    <div class="modal-body">
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{$error}}
                            </div>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

    </div>

@endif

@if(session('popup_success'))
    <div>
        <button style="display: none" type="button" id="popup" data-toggle="modal" data-target="#myModal"></button>
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Message</h4>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-success">
                            {{session('popup_success')}}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endif

@if(session('popup_error'))
    <div>
        <button style="display: none" type="button" id="popup" data-toggle="modal" data-target="#myModal"></button>
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Errors</h4>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger">
                            {{session('popup_error')}}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endif

