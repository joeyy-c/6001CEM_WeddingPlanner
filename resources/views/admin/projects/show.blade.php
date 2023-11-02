@extends('layouts.administrator')

@section('content')
<h3 class="pl-3 pb-3">Project Details</h3>

@php
    if (Auth::user()->role->role_name == 'Admin') {
        $readOnly = "readonly";
    }
    else {
        $readOnly = "";
    }
@endphp

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Project Details</h4>
                <form class="form-style-2">
                    @csrf
                    @method('patch')

                    <div class="row">
                        <div class="col">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">ID</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" id="id" name="id" value="{{ $project->project_id }}" readonly/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Project Name</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" id="project_name" name="project_name" value="{{ $project->project_name }}" readonly/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Customer Name</label>
                                <div class="col-sm-9">
                                    {{ $project->cust_name }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Project Budget</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" id="budget" name="budget" value="{{ $project->budget }}" readonly/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Wedding Date</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" id="wedding_date" name="wedding_date" value="{{ date('d M Y', strtotime($project->wedding_date)) }}" readonly/>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Customer Remark</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="remark" name="remark" readonly>{{ $project->project_remark }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Services Included</h4>
                <form class="form-style-2" action="" method="post">
                    @csrf
                    @method('post')

                    @foreach ($project->services as $service)
                        <div class="row">
                            <div class="col">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">{{ ucwords(str_replace('_', ' ', $service->service->vendor->user_info->business_category)) }}</label>
                                    <div class="col-sm-9">
                                        {{ $service->service->service_name }}<br/>
                                        <x-service-status-badge :status="$service->status"/><br/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </form>
            </div>
        </div>
    </div>
</div>

@endsection