@extends('layouts.user-layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4>All Coaches</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Coaches</li>
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
                    <h3 class="card-title">Coaches</h3>
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
                                <th> id</th>
                                <th> Coach Name</th>
                                <th> Coach Email</th>
                                <th>Coach City</th>
                                <th>Created at</th>
                                <th>Coach Image</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($coaches as $coach)
                                <tr>
                                    <th scope="row">{{ $coach->id }}</th>
                                    <td>{{ $coach->name }}</td>

                                    <td class="project-state">
                                        <span>{{ $coach->email }}</span>
                                    </td>
                                    <td class="project-state">
                                        <span>{{ $coach->city->name }}</span>
                                    </td>
                                    <td>{{ $coach->created_at->format('d - M - Y') }}</td>
                                    <td>
                                        <img alt="Avatar" class="table-avatar" src="{{ $coach->profile_image }}">
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-info btn-sm" href="#">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a class="btn btn-warning btn-sm text-white"
                                            href="{{ route('coach.edit', $coach['id']) }}">
                                            <i class="fas fa-pencil-alt"></i></a>

                                        <form id="myform" action="{{ route('coach.delete', $coach['id']) }}" method="POST"
                                            style="display:inline;"
                                            onsubmit="return confirm('Are you sure you want to delete it ?');">
                                            @method('delete')
                                            @csrf
                                            <input type="submit" class="btn btn-danger delete  fas fa-trash btn-sm"
                                                value="Delete" title='Delete'>
                                        </form>
                                        <a class="btn btn-dark btn-sm" href="#">
                                            <i class="fa fa-user-lock"></i>
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
