@extends('layouts.app')

@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title ">
                    Create New Document {{ $project->name }}
                </h3>
            </div>
            <div>
                <span class="m-subheader__daterange" id="m_dashboard_daterangepicker">
                    <span class="m-subheader__daterange-label">
                        <span class="m-subheader__daterange-title"></span>
                        <span class="m-subheader__daterange-date m--font-brand"></span>
                    </span>
                    <a href="#" class="btn btn-sm btn-brand m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                        <i class="la la-angle-down"></i>
                    </a>
                </span>
            </div>
        </div>
    </div>
    <!-- END: Subheader -->
    <div class="m-content">
        {{ Form::open([ 'method' => 'POST', 'files' => true, 'route' => [ 'user.document.store', $project->id ] ]) }}
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group m-form__group">
                        <label>
                            <h5>
                                {{ __('Document Version') }}
                            </h5>
                        </label>
                        <div class="m-input-icon m-input-icon--left m-input-icon--right">
                            <span class="m-input-icon__icon m-input-icon__icon--left">
                                <span>
                                    <i class="la la-edit"></i>
                                </span>
                            </span>
                            <select name="document_version_id" class="form-control m-input m-input--pill" id="exampleSelect1">
                                @foreach($project->documentVersions as $documentVersion)
                                    <option value="{{ $documentVersion->id }}">
                                        {{ $documentVersion->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group m-form__group">
                        <label>
                            <h5>
                                {{ __('Document Type') }}
                            </h5>
                        </label>
                        <div class="m-input-icon m-input-icon--left m-input-icon--right">
                            <span class="m-input-icon__icon m-input-icon__icon--left">
                                <span>
                                    <i class="la la-edit"></i>
                                </span>
                            </span>
                            <select name="document_type" class="form-control m-input m-input--pill" id="type">
                                <option value="dir">
                                    Directory
                                </option>
                                <option value="file">
                                    File
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group m-form__group">
                        <label>
                            <h5>
                                {{ __('Document Name') }}
                            </h5>
                        </label>
                        <div class="m-input-icon m-input-icon--left m-input-icon--right">
                            <input type="text" name="name" class="form-control m-input m-input--pill" placeholder="Name">
                            <span class="m-input-icon__icon m-input-icon__icon--left">
                                <span>
                                    <i class="la la-edit"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                    <div class="form-group m-form__group">
                        <label>
                            <h5>
                                {{ __('Folder Parent') }}
                            </h5>
                        </label>
                        <div class="m-input-icon m-input-icon--left m-input-icon--right">
                            <span class="m-input-icon__icon m-input-icon__icon--left">
                                <span>
                                    <i class="la la-edit"></i>
                                </span>
                            </span>
                            <select name="document_parent" class="form-control m-input m-input--pill" id="exampleSelect1">
                                @foreach($documents as $document)
                                    <option value="{{ $document->id }}">
                                        {{ $document->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div id="upload">
                    </div>
                    <button type="submit" class="btn m-btn--pill btn-accent">CREATE</button>
                    <a class="btn m-btn--pill btn-metal" href="{{ route('user.project.show', $project->id) }}">CANCEL</a>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
@push('js')
<script src="{{ asset('assets/js/summernote.js') }}"></script>
<script src="{{ asset('assets/js/select2.js') }}"></script>
<script src="{{ asset('assets/js/document.js') }}"></script>
@endpush
