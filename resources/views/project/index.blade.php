@extends('layouts.app')

@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title ">
                    Your Projects
                </h3>
                <a href="{{ route('user.project.create') }}">
                    <button class="btn m-btn--pill btn-primary">
                        <i class="fa fa-plus"></i>
                        Create New Project
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
            @foreach($projects as $project)
            <div class="col-lg-6">
                <!--begin::Portlet-->
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <a href="{{ route('user.project.show', $project->id) }}" class="m-portlet__head-text">
                                    {{ $project->name }}
                                </a>
                            </div>
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
                                                        Description: {{ $project->description }}
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="m-nav__item">
                                                <a class="m-nav__link">
                                                    <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                    <span class="m-nav__link-title">
                                                        <span class="m-nav__link-wrap">
                                                            <span class="m-nav__link-text">
                                                                Members
                                                            </span>
                                                            <span class="m-nav__link-badge">
                                                                <span class="m-badge m-badge--success m-badge--wide">
                                                                    {{ $project->users()->count() }}
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <br>
                                            <li class="m-nav__item">
                                                <img src="{{ $project->image }}" alt="" style="width: 100%;">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!--end::Preview-->
                                <!--begin::Dropdown-->
                                <div class="m-dropdown m-dropdown--inline  m-dropdown--arrow" data-dropdown-toggle="click">
                                    <a href="{{ route('user.dashboard') }}" class="btn btn-success">
                                        Details
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
