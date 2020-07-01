@extends('layouts.app')

@section('content')
<div class="col-md-9">
    <div class="bg-white">
                    <div class="row doctor-home-stats">
                        <div class="col-md-4">
                            <div>
                                <h5>Admins</h5>
                                <h2>{{ count($users) }}</h2>
                                <span class="fa fa-user fa-3x"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div>
                                <h5>Activities</h5>
                                <h2>{{ count($activities) }}</h2>
                                <span class="fa fa-cogs fa-3x"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div>
                                <h5>Updates</h5>
                                <h2>{{ count($updates) }}</h2>
                                <span class="fa fa-edit fa-3x"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                       
                        <div class="col-md-12">
                            <div align="center">
                             <p align="center"><h3>Recent Activities</h3></p>
                         </div>
                            <div class="table-responsive">
                              <table class="table table-striped table-hover" style="margin-top: 2% !important;">
                                <thead>
                                    <tr>
                                        <th>Activity Name</th>
                                        <th>Created By:</th>
                                        <th>Status</th>
                                        <th>Created At:</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($activities as $activity)
                                    <tr>
                                        <td>{{ $activity->name }}</td>
                                        <td>{{ $activity->users->name}}</td>
                                        <td><small class="badge badge-success">{{ $activity->status }}</small></td>
                                        <td>{{ $activity->created_at }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-custom">
                                                <a href="activity/{{ $activity->id }}/{{$activity->name}}">
                                                    <span class="fa fa-eye"></span>
                                                </a>
                                        </button>
                                            <button class="btn btn-sm btn-custom">
                                                <a href="edit-activity/{{ $activity->id }}">
                                                    <span class="fa fa-edit"></span>
                                                </a>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                              </table>
                          </div>
                          <div class="row d-flex justify-content-center pt-5">
            {{ $activities->links() }}
        </div>
                        </div>
                    </div>
                </div>
</div>
@endsection
