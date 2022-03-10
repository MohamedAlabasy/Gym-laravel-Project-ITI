@extends('layouts.user-layout')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Show {{$singleGym->id}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Show</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <h6 class="d-inline-block d-sm-none">Coach Name</h6>
                        <div class="col-12">
                            <img src="../../dist/img/prod-1.jpg" class="product-image" alt="Product Image">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 d-flex  align-items-center">
                        <div>
                            <p class="my-3">{{$singleGym->id}}</p>
                            <p class="my-3">{{$singleGym->name}}</p>
                            <p class="my-3">{{$singleGym->city->name}}</p>
                            <p class="my-3">{{$singleGym->created_at}}</p>
                            <p><img alt="Avatar" class="table-avatar" src="{{$singleGym->cover_image}}"></p>
                        <div class="project-actions mt-5">
                                <a class="btn btn-info btn-sm" href="#">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a class="btn btn-warning btn-sm text-white" href="">
                                    <i class="fas fa-pencil-alt"></i></a>
                                <a href="javascript:void(0)" onclick="deleteGym({{$singleGym->id}})"
                                    class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


@endsection
