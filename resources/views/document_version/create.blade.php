<div class="modal fade" id="m_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Create New Document Version
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        &times;
                    </span>
                </button>
            </div>
            {{ Form::open([ 'method' => 'POST', 'route' => [ 'user.document_version.store', $project->id ] ]) }}
                <div class="m-input-icon m-input-icon--left m-input-icon--right">
                    <input type="text" name="name" class="form-control m-input" placeholder="Name">
                    <span class="m-input-icon__icon m-input-icon__icon--left">
                        <span>
                            <i class="la la-edit"></i>
                        </span>
                    </span>
                </div>
            
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        {{ __('Cancel') }}
                    </button>
                    <button type="submit" class="btn btn-primary">
                        {{ __('Create') }}
                    </button>
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
