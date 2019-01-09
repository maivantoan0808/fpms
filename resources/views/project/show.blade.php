@extends('layouts.app')

@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title ">
                    {{ $project->name }}
                </h3>
                @if($project->documents()->count() == 0)
                    <form method="POST" action="{{ route('user.document_default.store', $project->id) }}">
                        @csrf
                        <button type="submit" class="btn m-btn--pill btn-primary">
                            <i class="fa fa-plus"></i>
                            Make Default Directory
                        </button>
                    </form>
                @else
                    <a href="{{ route('user.document.create', $project->id) }}">
                        <button type="button" class="btn m-btn--pill btn-primary">
                            <i class="fa fa-plus"></i>
                            Create Document
                        </button>
                    </a>
                @endif
            </div>
            <div class="col-4">
                <div class="m-input-icon m-input-icon--left m-input-icon--right">
                    <input type="search" id="search" class="form-control m-input m-input--pill" placeholder="Search Document...">
                    <span id="submit" class="m-input-icon__icon m-input-icon__icon--left">
                        <span>
                            <i class="la la-search"></i>
                        </span>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Subheader -->
    <div class="m-content" id="data-search">
        <div class="row">
            <div class="col-lg-6">
                <img src="{{ asset($project->image) }}" width="100%" alt="">
            </div>
            <div class="col-lg-6">
                <h4>Description: </h4>
                {!! $project->description !!}
                <br><br>
                <h4>Members</h4>
                <p>Product Owner: 
                    @foreach($productowners as $po)
                        <a href="">{{ $po->name }}, </a>
                    @endforeach
                </p>
                <p>Scrum Master: 
                    @foreach($scrummasters as $sm)
                        <a href="">{{ $sm->name }}, </a>
                    @endforeach
                </p>
                <p>Tech Leader: 
                    @foreach($techleaders as $tl)
                        <a href="">{{ $tl->name }}, </a>
                    @endforeach
                </p>
                <p>Team Members: 
                    @foreach($teammembers as $tm)
                        <a href="">{{ $tm->name }}, </a>
                    @endforeach
                </p>
                <p>Stackholder: 
                    @foreach($stackholders as $sh)
                        <a href="">{{ $sh->name }}, </a>
                    @endforeach
                </p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12">
                <!--begin::Portlet-->
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Folder
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div id="m_tree_4" class="tree-demo"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    var id = {!! $project->id !!};
</script>
<script src="{{ asset('assets/js/treeview.js') }}"></script>
<script src="{{ asset('assets/js/ajaxDocument.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.26.11/dist/sweetalert2.all.min.js"></script>

<script type="text/javascript">
function deleteDocument(id){
    const swalWithBootstrapButtons = swal.mixin({
        confirmButtonClass: 'btn btn-success',
        cancelButtonClass: 'btn btn-danger',
        buttonsStyling: false,
    })

    swalWithBootstrapButtons({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
            event.preventDefault();
            document.getElementById('delete-form-'+id).submit();
        } else if (
            // Read more about handling dismissals
            result.dismiss === swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons(
                'Cancelled',
                'Your data is safe :)',
                'error'
            )
        }
    })
}
</script>
@endpush
