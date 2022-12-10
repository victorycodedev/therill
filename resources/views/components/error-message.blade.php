<div>
    @if(Session::has('message'))
    <div class="row">
        <div class="col-lg-12">
            <div class="p-1 alert alert-danger alert-dismissable pmd-2">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="fa fa-info-circle"></i> {{ Session::get('message') }}
            </div>
        </div>
    </div>
    @endif
</div>