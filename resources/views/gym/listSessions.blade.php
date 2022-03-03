@extends('layouts.user-layout')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>All Sessions</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Sessions</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Sessions</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects" id="proj">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Session Name</th>
                            <th>Day</th>
                            <th>Starts at</th>
                            <th>Finishes at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trainingSessions as $trainingSession)

                        <tr>
                            <td>
                                {{$trainingSession->id}}
                            </td>
                            <td>
                                {{$trainingSession->name}}
                            </td>
                            <td class="project-state">
                                <span class="badge badge-success">{{$trainingSession->day}}</span>
                            </td>
                            <td>
                                {{$trainingSession->starts_at}}

                            </td>
                            <td>
                                {{$trainingSession->finishes_at}}

                            </td>
                            <td class="project-actions"> 
                                <a class="btn btn-info btn-sm" href="{{route('gym.show_training_session', $trainingSession['id'])}}">
                                    <i class="fa fa-eye"> View</i>
                                </a>
                                <a class="btn btn-warning btn-sm text-white" href="{{route('gym.edit_training_session', $trainingSession['id'])}}">
                                    <i class="fas fa-pencil-alt">Edit</i>
                                </a>
                                <a class="btn btn-danger btn-sm" href="">
                                    <i class="fas fa-trash">Delete </i> 
                                </a>
                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
</div>
<!-- /.content-wrapper -->

@endsection