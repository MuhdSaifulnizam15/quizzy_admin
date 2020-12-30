@if(session('status-success'))
<div class="alert alert-success alert-dismissible show fade">
    <div class="alert-body">
        <button class="close" data-dismiss="alert"><span>×</span></button>
        <span class="alert-message">{!! session('status-success') !!}</span>
    </div>
</div>
@endif

@if(session('status-warning'))
<div class="alert alert-warning alert-dismissible show fade">
    <div class="alert-body">
        <button class="close" data-dismiss="alert"><span>×</span></button>
        <span class="alert-message">{!! session('status-warning') !!}</span>
    </div>
</div>
@endif

@if(session('status-danger'))
<div class="alert alert-danger alert-dismissible show fade">
    <div class="alert-body">
        <button class="close" data-dismiss="alert"><span>×</span></button>
        <span class="alert-message">{!! session('status-danger') !!}</span>
    </div>
</div>
@endif

@if (count($errors) > 0)
<div class="alert-container">
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button class="close" data-dismiss="alert"><span>×</span></button>
        <ul class="list-unstyled mb-0">
            @foreach ($errors->all() as $error)
            <li><span class="alert-message">{!! $error !!}</span></li>
            @endforeach
        </ul>
    </div>
</div>
@endif