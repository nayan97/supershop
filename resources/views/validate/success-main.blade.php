@if(Session::has('success-main'))
    <p class="alert alert-success">{{Session::get('success-main')}} <button class="close" data-dismiss="alert">&times;</button></p>

@endif
