@extends('layouts.user-layout')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper pb-4">
    <div class="container-fluid pt-5">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>150</h3>
                        <p>Revenue</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-dollar-sign" style="font-size: 50px !important"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>53<sup style="font-size: 20px"></sup></h3>
                        <p>Coaches</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-dumbbell" style="font-size: 50px !important"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>44</h3>
                        <p>Users</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users" style="font-size: 50px !important"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>65</h3>
                        <p>Cities</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-city" style="font-size: 50px !important"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
    </div>
</div>
@endsection
