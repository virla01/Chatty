@if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        <i class="fa fa-check-circle alert-icon" aria-hidden="true"></i>{{ Session::get('success') }}
    </div>
@endif

@if (Session::has('info'))
    <div class="alert alert-info" role="alert">
        <i class="fa fa-info-circle alert-icon" aria-hidden="true"></i>{{ Session::get('info') }}
    </div>
@endif

@if (Session::has('danger'))
    <div class="alert alert-danger" role="alert">
        <i class="fa fa-ban alert-icon" aria-hidden="true"></i>{{ Session::get('danger') }}
    </div>
@endif
