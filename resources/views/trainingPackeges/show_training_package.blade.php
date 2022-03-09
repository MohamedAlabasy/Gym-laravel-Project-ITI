@extends('layouts.user-layout')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>Show Session {{$package->id}}</h4>
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
                            <th>Name</th>
                            <th>Price</th>
                            <th>Session Number</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    
                        <tr>
                            {{-- <td>{{$package->id}}</td> --}}
                            <td>{{$package->name}} </td>
                            <td>{{$package->price}} </td>
                            <td>{{$package->session_number}} </td>
                            {{-- <td>{{$package->finishes_at}} </td> --}}
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

