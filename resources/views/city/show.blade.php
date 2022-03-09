@extends('layouts.user-layout')
@section('content')
    <div class="content-wrapper pb-4">
        <div class="container-fluid pt-5">
            <div class="row">
                {{-- # ======================================= # Total Revenue # ======================================= # --}}
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $revenueInDollars }}</h3>
                            <p>Total Revenue</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-dollar-sign text-white" style="font-size: 50px !important"></i>
                        </div>
                    </div>
                </div>
                {{-- # ======================================= # Gyms # ======================================= # --}}
                <div class="col-lg-3 col-6">
                    <a href="{{ route('gym.list') }}">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $gyms }}</h3>
                                <p>Gyms</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-dumbbell text-white" style="font-size: 50px !important"></i>
                            </div>
                        </div>
                    </a>
                </div>
                {{-- # ======================================= # Gyms Managers # ======================================= # --}}
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $gymsManagers }}<sup style="font-size: 20px"></sup></h3>
                            <p>Gyms Managers</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user text-dark" style="font-size: 50px !important"></i>
                        </div>
                    </div>
                </div>
                {{-- # ======================================= # Coaches # ======================================= # --}}
                <div class="col-lg-3 col-6">
                    <a href="{{ route('coach.list') }}">
                        <div class="small-box bg-light">
                            <div class="inner">
                                <h3>{{ $coaches }}<sup style="font-size: 20px"></sup></h3>
                                <p>Coaches</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user-ninja text-dark" style="font-size: 50px !important"></i>
                            </div>
                        </div>
                    </a>
                </div>
                {{-- # ======================================= # Users # ======================================= # --}}
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-dark">
                        <div class="inner">
                            <h3>{{ $users }}</h3>
                            <p>Users</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users text-white" style="font-size: 50px !important"></i>
                        </div>
                    </div>
                </div>
                {{-- # ======================================= # Cities Managers # ======================================= # --}}
                <div class="col-lg-4 col-2">
                    <div class="small-box bg-secondary">
                        <div class="inner ">
                            <p>Cities Managers Name</p>
                            <h3>{{ $citiesManagers->name }}<sup style="font-size: 20px"></sup></h3>
                            <p>Cities Managers Id</p>
                            <h3>{{ $citiesManagers->id }}<sup style="font-size: 20px"></sup></h3>
                            <p>Cities Managers Email</p>
                            <h3>{{ $citiesManagers->email }}<sup style="font-size: 20px"></sup></h3>
                            <figure>
                                <img src="{{ $citiesManagers->profile_image }}" {{-- <i class="fas fa-user-tie"></i> --}} <i </div>
                            </figure>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
