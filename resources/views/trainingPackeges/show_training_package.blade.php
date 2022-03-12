@extends('layouts.user-layout')
@section('content')
    <div class="content-wrapper pb-4">
        <div class="container-fluid pt-5">
            <div class="row align-self-center d-flex">
                <div class="col-md-12">
                    <div class="row">

                        <div class="col-12">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ $package->name }}</h3>
                                    <p>Name</p>
                                </div>
                                <div class="icon">
                                    <i class="fas text-white" style="font-size: 50px !important"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            {{-- <a href="{{ route('gym.list') }}"> --}}
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{ $package->price }}</h3>
                                    <p>Price</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-dumbbell text-white" style="font-size: 50px !important"></i>
                                </div>
                            </div>
                            {{-- </a> --}}
                        </div>
                        <div class="col-6">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{ $package->sessions_number }} <sup style="font-size: 20px"></sup></h3>
                                    <p>Sessions Number</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user text-dark" style="font-size: 50px !important"></i>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endsection
