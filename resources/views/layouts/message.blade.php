@if ($message = Session::get('info'))
<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>Alert !</strong> {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>
@endif
@if ($message = Session::get('error'))
<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Alert !</strong> {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>
@endif
@if ($message = Session::get('success'))
<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Alert !</strong> {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>
@endif