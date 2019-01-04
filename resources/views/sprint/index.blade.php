@extends('layouts.app')

@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title ">
                    {{ __('quantity sprint') }} ({{ $sprints->count() }})
                </h3>
                <a href="{{ route('user.sprint.create') }}">
                    <button class="btn m-btn--pill btn-primary">
                        <i class="fa fa-plus"></i>
                        {{ __('create new sprint') }}
                    </button>
                </a>
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
        <div class="row">
            @foreach($sprints as $sprint)
            <div class="col-lg-6">
                <!--begin::Portlet-->
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <a href="{{ route('user.sprint.show', $sprint->id) }}" class="m-portlet__head-text">
                                    <span>
                                        {{ $sprint->sprint }}<br>
                                        ({{ $sprint->release->project->name }}/{{ $sprint->release->release_date }})
                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li class="m-portlet__nav-item">
                                    <a href="{{ route('user.sprint.edit', $sprint->id) }}" class="btn m-btn--pill btn-warning" data-toggle="tooltip" data-placement="bottom" title="Edit">
                                        <span>
                                            <i class="fa fa-edit"></i>
                                        </span>
                                    </a>
                                </li>
                                {{ Form::open([ 'method' => 'DELETE', 'route' => [ 'user.sprint.destroy', $sprint->id], 'class' => 'm-portlet__nav-item']) }}
                                    {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn m-btn--pill btn-danger'] )  }}
                                {{ Form::close() }}
                            </ul>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <!--begin::Section-->
                        <div class="m-section m-section--last">
                            <div class="m-section__content">
                                <!--begin::Preview-->
                                <div class="m-demo" data-code-preview="true" data-code-html="true" data-code-js="false">
                                    <div class="m-demo__preview">
                                        <ul class="m-nav">
                                            <li class="m-nav__item">
                                                <a class="m-nav__link">
                                                    <i class="m-nav__link-icon flaticon-info"></i>
                                                    <span class="m-nav__link-text">
                                                        {{ __('description') }}: {!! $sprint->description !!}
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="m-nav__item">
                                                <a class="m-nav__link">
                                                    <i class="m-nav__link-icon flaticon-info"></i>
                                                    <span class="m-nav__link-text">
                                                        {{ __('status') }}: {!! ($sprint->status == 1) ? 'Close' : 'Open' !!}
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!--end::Preview-->
                                <!--begin::Dropdown-->
                                <div class="m-dropdown m-dropdown--inline  m-dropdown--arrow" data-dropdown-toggle="click">
                                    <a href="{{ route('user.sprint.show', $sprint->id) }}" class="btn btn-success">
                                        {{ __('Detail') }}
                                    </a>
                                </div>
                                <!--end::Dropdown-->
                            </div>
                        </div>
                        <!--end::Section-->
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
