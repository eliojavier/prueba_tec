<div class="{{$container}} top-padding">
    <div class="row">
        <div class="col-md-12">
            @if(Session::has('flash_message_error'))
                <div class="alert alert-danger flash">
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">&times;</button>
                    {{session('flash_message_error')}}
                </div>
            @elseif(Session::has('flash_message_success'))
                <div class="alert alert-success flash">
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">&times;</button>
                    {{session('flash_message_success')}}
                </div>
            @endif
        </div>
    </div>
</div>