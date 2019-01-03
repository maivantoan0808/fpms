@extends('layouts.app')

@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title ">
                    Create New Sprint
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
        {{ Form::open([ 'method' => 'POST', 'files' => true, 'route' => [ 'user.sprint.store' ] ]) }}
            <div class="row">
                <div class="col-lg-8">
                    <div class="form-group m-form__group">
                        <label>
                            <h5>
                                Sprint
                            </h5>
                        </label>
                        <div class="m-input-icon m-input-icon--left m-input-icon--right">
                            <input type="text" name="sprint" class="form-control m-input m-input--pill" placeholder="Sprint...">
                            <span class="m-input-icon__icon m-input-icon__icon--left">
                                <span>
                                    <i class="la la-edit"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                    {!! Form::select('project', $project->pluck('name', 'id'), null, ['class' => 'form-control m-select2', 'id' => 'm_select2_12_1', 'tabindex' => -1, 'aria-hidden' => true]) !!}
                    <div class="m--space-10"></div>
                    {!! Form::select('release', $release->pluck('release_date', 'id'), null, ['class' => 'form-control m-select2', 'id' => 'm_select2_12_2', 'required' => true]) !!}
                    <div class="m--space-10"></div>
                    <div class="form-group m-form__group">
                        <label>
                            <h5>
                                Description
                            </h5>
                        </label>
                        <div class="m-input-icon m-input-icon--left m-input-icon--right">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <textarea class="summernote" name="description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="m-select2 m-select2--pill">
                        <label>
                            <h5>
                                Status
                            </h5>
                        </label>
                        {!! Form::select('status', ['0' => 'Open', '1' => 'Close'], null, ['class' => 'form-control m-select2', 'id' => 'm_select2_12_3']) !!}
                    </div>
                    <div class="m--space-10"></div>
                    <button type="submit" class="btn m-btn--pill btn-accent">CREATE</button>
                    <a class="btn m-btn--pill btn-metal" href="{{ route('user.sprint.index') }}">CANCEL</a>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
@push('js')
<script src="{{ asset('assets/js/summernote.js') }}"></script>
<script src="{{ asset('assets/js/select.js') }}"></script>
<script src="{{ asset('assets/js/datepicker.js') }}"></script>
<script src="{{ asset('assets/js/select2.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#m_select2_12_1").change(function() {
            var id = $(this).val();
            $.get("getRelease/" + id,function(data) {
                console.log(data);
                $("#m_select2_12_2").html(data);
            });
        });
    });
</script>
@endpush
