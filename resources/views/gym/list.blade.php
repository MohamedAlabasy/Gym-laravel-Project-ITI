@extends('layouts.user-layout')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>All Gyms</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Gyms</li>
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
                <h3 class="card-title">Gyms</h3>
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
                            <th> Gyms Name</th>
                            <th>Gyms City</th>
                            <th>Created at</th>
                            <th>Gyms Cover Image</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($gyms as $gym)
                        <tr>
                            <th scope="row">{{$gym->id}}</th>
                            
                            <td>{{$gym->name}}</td>
                               
                            
                            <td class="project-state">
                                <span class="badge badge-success">Mansoura</span>
                                
                            </td>
                            <td>{{$gym->created_at}}</td>
                            <td>
                                <img alt="Avatar" class="table-avatar" src="imgs/avatar.png">
                            </td>
                            <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm" href="#">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a class="btn btn-warning btn-sm text-white" href="#">
                                    <i class="fas fa-pencil-alt"></i></a>
                                <a class="btn btn-danger btn-sm" href="#">
                                    <i class="fas fa-trash"> </i> </a>
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
