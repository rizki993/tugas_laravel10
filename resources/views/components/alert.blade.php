@if (Session::has('success'))
<div class="alert alert-success alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button>
    {!! Session::get('success') !!}
</div>
@endif
@if (Session::has('error'))
<div class="alert alert-danger alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button>
    <strong>Error!</strong></br>{!! Session::get('error') !!}
</div>
@endif
@if (Session::has('warning'))
<div class="alert alert-warning alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button>
    <strong>Warning!</strong></br>{!! Session::get('warning') !!}
</div>
@endif
