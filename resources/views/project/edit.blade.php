@extends('layouts.app')

@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title ">
                    Edit Project: {{ $project->name }}
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
        {{ Form::open([ 'method' => 'PUT', 'files' => true, 'route' => [ 'user.project.update', 'id' => $project->id ] ]) }}
            <div class="row">
                <div class="col-lg-8">
                    <div class="form-group m-form__group">
                        <label>
                            <h5>
                                Project Name
                            </h5>
                        </label>
                        <div class="m-input-icon m-input-icon--left m-input-icon--right">
                            <input type="text" name="name" class="form-control m-input m-input--pill" placeholder="Name" value="{{ $project->name }}">
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
                                Description
                            </h5>
                        </label>
                        <div class="m-input-icon m-input-icon--left m-input-icon--right">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <textarea class="summernote" name="description">{{ $project->description }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-form__group">
                        <label>
                            <h5>
                                Vision
                            </h5>
                        </label>
                        <div class="m-input-icon m-input-icon--left m-input-icon--right">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <textarea class="summernote" name="vision">{{ $project->vision }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-form__group">
                        <label>
                            <h5>
                                Preface
                            </h5>
                        </label>
                        <div class="m-input-icon m-input-icon--left m-input-icon--right">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <textarea class="summernote" name="preface">{{ $project->preface }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-12 col-md-12 col-sm-12">
                                <h5>
                                    Members
                                </h5>
                            </label>
                            <label>
                                Product Owner
                            </label>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="m-select2 m-select2--pill">
                                    <select class="form-control m-select2" id="m_select2_3" name="productowners[]" multiple="multiple">
                                        @foreach($users as $user)
                                            <option
                                                @foreach ($project->users as $productowners)
                                                    {{ $productowners->id == $user->id && $productowners->pivot->position_id == 1 ? 'selected' : '' }}
                                                @endforeach
                                                value="{{ $user->id }}">
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <label>
                                Scrum Master
                            </label>
                            <div class="col-lg-12 col-md-12 col-sm-12 ">
                                <div class="m-select2 m-select2--pill">
                                    <select class="form-control m-select2" id="m_select2_3" name="scrummasters[]" multiple="multiple">
                                        @foreach($users as $user)
                                            <option
                                                @foreach ($project->users as $scrummasters)
                                                    {{ $scrummasters->id == $user->id && $scrummasters->pivot->position_id == 2 ? 'selected' : '' }}
                                                @endforeach
                                                value="{{ $user->id }}">
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <label>
                                Tech Leader
                            </label>
                            <div class="col-lg-12 col-md-12 col-sm-12 ">
                                <div class="m-select2 m-select2--pill">
                                    <select class="form-control m-select2" id="m_select2_3" name="techleaders[]" multiple="multiple">
                                        @foreach($users as $user)
                                            <option
                                                @foreach ($project->users as $techleaders)
                                                    {{ $techleaders->id == $user->id && $techleaders->pivot->position_id == 3 ? 'selected' : '' }}
                                                @endforeach
                                                value="{{ $user->id }}">
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <label>
                                Team Member
                            </label>
                            <div class="col-lg-12 col-md-12 col-sm-12 ">
                                <div class="m-select2 m-select2--pill">
                                    <select class="form-control m-select2" id="m_select2_3" name="teammembers[]" multiple="multiple">
                                        @foreach($users as $user)
                                            <option
                                                @foreach ($project->users as $teammembers)
                                                    {{ $teammembers->id == $user->id && $teammembers->pivot->position_id == 4 ? 'selected' : '' }}
                                                @endforeach
                                                value="{{ $user->id }}">
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <label>
                                Stackholder
                            </label>
                            <div class="col-lg-12 col-md-12 col-sm-12 ">
                                <div class="m-select2 m-select2--pill">
                                    <select class="form-control m-select2" id="m_select2_3" name="stackholders[]" multiple="multiple">
                                        @foreach($users as $user)
                                            <option
                                                @foreach ($project->users as $stackholders)
                                                    {{ $stackholders->id == $user->id && $stackholders->pivot->position_id == 5 ? 'selected' : '' }}
                                                @endforeach
                                                value="{{ $user->id }}">
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
                                Project Image
                            </h5>
                        </label>
                        <div class="m-input-icon">
                            <input type="file" accept="image/*" onchange="loadFile(event)" class="form-control m-input m-input--pill" value="{{ $project->image }}" name="image" placeholder="Image">
                            <br>
                            <img src="{{ $project->image }}" id="output" style="width: 100%;">
                        </div>
                    </div>
                    <div class="form-group m-form__group">
                        <label>
                            <h5>
                                Public
                            </h5>
                        </label>
                        <div class="m-input-icon">
                            <span class="m-switch m-switch--success">
                                <label class="col-form-label">
                                    <input type="checkbox" name="public" value="0" {{ $project->public == true ? 'checked' : '' }}>
                                    <span></span>
                                </label>
                            </span>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn m-btn--pill btn-accent">UPDATE</button>
                    <a class="btn m-btn--pill btn-metal" href="{{ route('user.project.index') }}">CANCEL</a>
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
