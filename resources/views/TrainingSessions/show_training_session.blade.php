@extends('layouts.user-layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4>Show Session {{ $trainingSession->id }}</h4>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">

                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th class="project-state">ID</th>
                                <th class="project-state">Name</th>
                                <th class="project-state">Day</th>
                                <th class="project-state">Starts At</th>
                                <th class="project-state">Finishes At</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td class="project-state">{{ $trainingSession->id }}</td>
                                <td class="project-state">{{ $trainingSession->name }} </td>
                                <td class="project-state">{{ $trainingSession->day }} </td>
                                <td class="project-state">{{ $trainingSession->starts_at }} </td>
                                <td class="project-state">{{ $trainingSession->finishes_at }} </td>
                            </tr>
                        </tbody>
                        <tbody>


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
