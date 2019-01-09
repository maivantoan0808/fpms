<div class="m-content" id="data-search">
    <div class="row">
        @foreach($documents as $document)
            <div class="col-lg-6">
                <!--begin::Portlet-->
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <p class="m-portlet__head-text">
                                    <span>
                                        <i class="{{ $document->icon }}"></i>
                                    </span>
                                    <span>
                                        {{ $document->text }}
                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li class="m-portlet__nav-item">
                                    <button class="btn m-btn--pill btn-danger" type="button" data-toggle="tooltip" onclick="deleteDocument({{ $document->id }})" title="Delete">
                                        <span>
                                            <i class="fa fa-trash"></i>
                                        </span>
                                    </button>
                                    <form id="delete-form-{{ $document->id }}" action="{{ route('user.document.destroy', $document->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@push('js')

@endpush
