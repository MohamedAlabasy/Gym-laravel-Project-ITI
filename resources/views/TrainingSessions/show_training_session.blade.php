@extends('layouts.user-layout')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>Show Session {{$trainingSession->id}}</h4>
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
                            <th>ID</th>
                            <th>Name</th>
                            <th>Day</th>
                            <th>Starts At</th>
                            <th>Finishes At</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>{{$trainingSession->id}}</td>
                            <td>{{$trainingSession->name}} </td>
                            <td>{{$trainingSession->day}} </td>
                            <td>{{$trainingSession->starts_at}} </td>
                            <td>{{$trainingSession->finishes_at}} </td>
                            <td>{{$trainingSession->users->name}} </td>
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

