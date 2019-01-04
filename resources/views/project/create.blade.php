@extends('layouts.app')

@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title ">
                    {{ __('Create New Project') }}
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
        {{ Form::open([ 'method' => 'POST', 'files' => true, 'route' => [ 'user.project.store' ] ]) }}
            <div class="row">
                <div class="col-lg-8">
                    <div class="form-group m-form__group">
                        <label>
                            <h5>
                                {{ __('Project Name') }}
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
                                {{ __('description') }}
                            </h5>
                        </label>
                        <div class="m-input-icon m-input-icon--left m-input-icon--right">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <textarea class="summernote" name="description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-form__group">
                        <label>
                            <h5>
                                {{ __('Vision') }}
                            </h5>
                        </label>
                        <div class="m-input-icon m-input-icon--left m-input-icon--right">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <textarea class="summernote" name="vision"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-form__group">
                        <label>
                            <h5>
                                {{ __('Preface') }}
                            </h5>
                        </label>
                        <div class="m-input-icon m-input-icon--left m-input-icon--right">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <textarea class="summernote" name="preface"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-12 col-md-12 col-sm-12">
                                <h5>
                                    {{ __('Members') }}
                                </h5>
                            </label>
                            <label>
                                {{ __('Product Owner') }}
                            </label>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="m-select2 m-select2--pill">
                                    <select class="form-control m-select2" id="m_select2_3" name="productowners[]" multiple="multiple">
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}">
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <label>
                                {{ __('Scrum Master') }}
                            </label>
                            <div class="col-lg-12 col-md-12 col-sm-12 ">
                                <div class="m-select2 m-select2--pill">
                                    <select class="form-control m-select2" id="m_select2_3" name="scrummasters[]" multiple="multiple">
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}">
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <label>
                                {{ __('Tech Leader') }}
                            </label>
                            <div class="col-lg-12 col-md-12 col-sm-12 ">
                                <div class="m-select2 m-select2--pill">
                                    <select class="form-control m-select2" id="m_select2_3" name="techleaders[]" multiple="multiple">
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}">
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <label>
                                {{ __('Team Member') }}
                            </label>
                            <div class="col-lg-12 col-md-12 col-sm-12 ">
                                <div class="m-select2 m-select2--pill">
                                    <select class="form-control m-select2" id="m_select2_3" name="teammembers[]" multiple="multiple">
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}">
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <label>
                                {{ __('Stackholder') }}
                            </label>
                            <div class="col-lg-12 col-md-12 col-sm-12 ">
                                <div class="m-select2 m-select2--pill">
                                    <select class="form-control m-select2" id="m_select2_3" name="stackholders[]" multiple="multiple">
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}">
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-form__group">
                        <label>
                            <h5>
                                {{ __('Project Image') }}
                            </h5>
                        </label>
                        <div class="m-input-icon">
                            <input type="file" accept="image/*" onchange="loadFile(event)" class="form-control m-input m-input--pill" name="image" placeholder="Image">
                            <br>
                            <img id="output" style="width: 100%;">
                        </div>
                    </div>
                    <div class="form-group m-form__group">
                        <label>
                            <h5>
                                {{ __('Public') }}
                            </h5>
                        </label>
                        <div class="m-input-icon">
                            <span class="m-switch m-switch--success">
                                <label class="col-form-label">
                                    <input type="checkbox" name="public" value="0">
                                    <span></span>
                                </label>
                            </span>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn m-btn--pill btn-accent">{{ __('CREATE') }}</button>
                    <a class="btn m-btn--pill btn-metal" href="{{ route('user.project.index') }}">{{ __('CANCEL') }}</a>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
@push('js')
<script src="{{ asset('assets/js/summernote.js') }}"></script>
<script src="{{ asset('assets/js/select2.js') }}"></script>
<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
@endpush
