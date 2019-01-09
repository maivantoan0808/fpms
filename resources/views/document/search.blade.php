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
                                        {{ $document->name }}
                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li class="m-portlet__nav-item">
                                    <a href="" class="btn m-btn--pill btn-warning" data-toggle="tooltip" data-placement="bottom" title="Edit">
                                        <span>
                                            <i class="fa fa-edit"></i>
                                        </span>
                                    </a>
                                </li>
                                <li class="m-portlet__nav-item">
                                    <a href="" class="btn m-btn--pill btn-danger" data-toggle="tooltip" data-placement="bottom" title="Delete">
                                        <span>
                                            <i class="fa fa-trash"></i>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>