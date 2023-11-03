@extends('layouts.administrator')

@section('content')
<h3 class="pl-3 pb-3">Edit Project</h3>

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
                <form class="form-style-2" action="{{ route('vendor.projects.update', ['project_service' => $project]) }}" method="post">
                    @csrf
                    @method('patch')

                    <p class="card-description mb-4">
                        Edit the project status to make sure it is up to date.
                    </p>

                    <div class="row">
                        <div class="col">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">ID</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" id="id" name="id" value="{{ $project->id }}" readonly/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Project Name</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" id="project_name" name="project_name" value="{{ $project->project->project_name }}" readonly/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Service Name</label>
                                <div class="col-sm-9">
                                    <a href="{{ route('vendor.services.edit', ['service' => $project->service]) }}" target="_blank" class="form-control-plaintext">{{ $project->service->service_name }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Customer Remark</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="remark" name="remark" readonly>{{ $project->project->project_remark }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Project Start Date</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" id="start_date" name="start_date" value="{{ empty($project->start_date) ? '-' : date('d M Y', strtotime($project->start_date)) }}" readonly/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Project End Date</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" id="end_date" name="end_date" value="{{ empty($project->end_date) ? '-' : date('d M Y', strtotime($project->end_date)) }}" readonly/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Wedding Date</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" id="wedding_date" name="wedding_date" value="{{ date('d M Y', strtotime($project->project->wedding_date)) }}" readonly/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9 d-flex align-items-center">
                                    @if ($project->status == 'Waiting for Vendor\'s Confirmation')
                                        <p>{{ $project->status }}</p> 
                                        <button type="submit" class="btn btn-success btn-icon-text btn-sm" name="status" value="Vendor Confirmed">
                                            <i class="ti-check btn-icon-prepend"></i>
                                            Confirm
                                        </button>
                                        <button type="submit" class="btn btn-danger btn-icon-text btn-sm" name="status" value="Vendor Declined">
                                            <i class="ti-close btn-icon-prepend"></i>
                                            Decline
                                        </button>
                                    @else
                                        @if ($project->status == 'Vendor Declined' || $project->status == 'Completed' || $project->status == 'Cancelled')
                                            <x-service-status-badge :status="$project->status"/>
                                        @else
                                        <select name="status" class="form-control">
                                            @php 
                                                $status = array(
                                                    'Vendor Confirmed',
                                                    'Waiting for Deposit Payment',
                                                    'Project Confirmed',
                                                    'Planning',
                                                    'Preparation and Setup',
                                                    'Completed',
                                                    'Cancelled'
                                                );

                                                $startIndex = array_search($project->status, $status);
                                                $status = array_slice($status, $startIndex);
                                            @endphp 

                                            @foreach ($status as $s)
                                                <option value="{{ $s }}" {{ $project->status == $s ? 'selected' : '' }}>
                                                    {{ $s }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <input type="submit" class="btn btn-primary" value="Save">
                    <a href="{{ route('vendor.projects.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Customer Details</h4>
                <form class="form-style-2" action="" method="post">
                    @csrf
                    @method('post')

                    <div class="row">
                        <div class="col">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" id="name" name="name" value="{{ $project->project->cust->name }}" readonly/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Phone</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" id="phone" name="phone" value="{{ $project->project->cust->user_info->phone }}" readonly/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">E-mail</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" id="email" name="email" value="{{ $project->project->cust->email }}" readonly/>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection