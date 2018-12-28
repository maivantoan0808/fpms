@extends('layouts.app')

@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title ">
                    Create New Release Plan
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
        {{ Form::open([ 'method' => 'PUT', 'files' => true, 'route' => [ 'user.release.update', $release->id ] ]) }}
            <div class="row">
                <div class="col-lg-8">
                    <div class="form-group m-form__group">
                        <label>
                            <h5>Release Plan Date</h5>
                        </label>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="input-group date" id="m_datepicker_1">
                                <input type="text" class="form-control m-input" readonly="" name="release_date" placeholder="Select date" value="{{ $release->release_date }}">
                                <span class="input-group-addon">
                                    <i class="la la-calendar-check-o"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-form__group">
                        <label>
                            <h5>
                                Goal
                            </h5>
                        </label>
                        <div class="m-input-icon m-input-icon--left m-input-icon--right">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <textarea class="summernote" name="goal">{{ $release->goal }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-form__group">
                        <label>
                            <h5>
                                Note
                            </h5>
                        </label>
                        <div class="m-input-icon m-input-icon--left m-input-icon--right">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <textarea class="summernote" name="note">{{ $release->note }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-form__group">
                        <label>
                            <h5>
                                Version
                            </h5>
                        </label>
                        <div class="m-input-icon m-input-icon--left m-input-icon--right">
                            <input type="text" name="version" class="form-control m-input m-input--pill" placeholder="Version" value="{{ $release->version }}">
                            <span class="m-input-icon__icon m-input-icon__icon--left">
                                <span>
                                    <i class="la la-edit"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                    <button type="submit" class="btn m-btn--pill btn-accent">UPDATE</button>
                    <a class="btn m-btn--pill btn-metal" href="{{ route('user.release.index') }}">CANCEL</a>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
@push('js')
<script src="{{ asset('assets/js/summernote.js') }}"></script>
<script src="{{ asset('assets/js/select2.js') }}"></script>
<script src="{{ asset('assets/js/datepicker.js') }}"></script>
@endpush
