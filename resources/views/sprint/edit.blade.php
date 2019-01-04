@extends('layouts.app')

@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title ">
                    {{ __('Update New Sprint') }}
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
        {{ Form::open([ 'method' => 'PUT', 'files' => true, 'route' => [ 'user.sprint.update', $sprint->id]]) }}
            <div class="row">
                <div class="col-lg-8">
                    <div class="form-group m-form__group">
                        <label>
                            <h5>
                                {{ __('sprint') }}
                            </h5>
                        </label>
                        <div class="m-input-icon m-input-icon--left m-input-icon--right">
                            {{ Form::text('sprint', $sprint->sprint, ['class' => 'form-control m-input m-input--pill', 'placeholder' => __('sprint')]) }}
                            <span class="m-input-icon__icon m-input-icon__icon--left">
                                <span>
                                    <i class="la la-edit"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                    <div class="m-select2 m-select2--pill">
                        <label>
                            <h5>
                                {{ __('Project') }}
                            </h5>
                        </label>
                        {!! Form::select('project', $projects->pluck('name', 'id'), $sprint->release->project->id, ['class' => 'form-control m-select2', 'id' => 'm_select2_12_1', 'tabindex' => -1, 'aria-hidden' => true]) !!}
                    </div>
                    <div class="m--space-10"></div>
                    <div class="m-select2 m-select2--pill">
                        <label>
                            <h5>
                                {{ __('Release Plan') }}
                            </h5>
                        </label>
                        {!! Form::select('release', $releases->pluck('release_date', 'id'), $sprint->release->id, ['class' => 'form-control m-select2', 'id' => 'm_select2_12_2', 'required' => true]) !!}
                    </div>
                    <div class="m--space-10"></div>
                    <div class="form-group m-form__group">
                        <label>
                            <h5>
                                {{ __('description') }}
                            </h5>
                        </label>
                        <div class="m-input-icon m-input-icon--left m-input-icon--right">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                {{ Form::textarea('description', $sprint->description, ['class' => 'summernote']) }}
                            </div>
                        </div>
                    </div>
                    <div class="m-select2 m-select2--pill">
                        <label>
                            <h5>
                                {{ __('status') }}
                            </h5>
                        </label>
                        {!! Form::select('status', [0 => 'Open', 1 => 'Close'], $sprint->status, ['class' => 'form-control m-select2', 'id' => 'm_select2_12_3']) !!}
                    </div>
                    <div class="m--space-10"></div>
                    {!! Form::submit( __('UPDATE'), ['class' => 'btn m-btn--pill btn-accent']) !!}
                    <a class="btn m-btn--pill btn-metal" href="{{ route('user.sprint.index') }}">{{ __('CANCEL')}}</a>
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
        $('#m_select2_12_1').change(function() {
            var id = $(this).val();
            $.ajax({
                url: '/sprint/getRelease/' + id,
                type: 'GET',
            })
            .done(function(data) {
               $('#m_select2_12_2').html(data); 
            });
        });
    });
</script>
@endpush
