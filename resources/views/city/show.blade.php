@extends('layouts.user-layout')
@section('content')
    <div class="content-wrapper pb-4">
        <div class="container-fluid pt-5">
            <div class="row align-self-center d-flex">
                <div class="col-md-6">
                    <div class="row">
                        {{-- # ======================================= # Total Revenue # ======================================= # --}}
                        <div class="col-12">
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
                        <div class="col-6">
                            {{-- <a href="{{ route('gym.list') }}"> --}}
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{ $gyms }}</h3>
                                    <p>Gyms</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-dumbbell text-white" style="font-size: 50px !important"></i>
                                </div>
                            </div>
                            {{-- </a> --}}
                        </div>
                        {{-- # ======================================= # Gyms Managers # ======================================= # --}}
                        <div class="col-6">
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
                        <div class="col-6">
                            {{-- <a href="{{ route('coach.list') }}"> --}}
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>{{ $coaches }}<sup style="font-size: 20px"></sup></h3>
                                        <p>Coaches</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-user-ninja text-white" style="font-size: 50px !important"></i>
                                    </div>
                                </div>
                            {{-- </a> --}}
                        </div>
                        {{-- # ======================================= # Users # ======================================= # --}}
                        <div class="col-6">
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
                    </div>
                </div>
                <div class="col-6 bg-light small-box media text-center">
                    <div>
                        <div class="inner p-2">
                            @if ($citiesManagers == null)
                                <figure class="mt-5">
                                    <i class="fas fa-user-tie" style="font-size: 100px !important"></i>
                                    <h3>This city have no city manager <sup style="font-size: 20px"></sup></h3>
                                </figure>
                            @else
                                <figure class="mt-3">
                                    <img alt="Avatar" src="{{ $citiesManagers->profile_image }}"
                                        style=" vertical-align: middle;width: 150px; height: 150px;border-radius: 50%;">
                                </figure>
                                <h3>ID = {{ $citiesManagers->id }} <sup style="font-size: 20px"></sup></h3>
                                <h3>{{ $citiesManagers->name }} <sup style="font-size: 20px"></sup></h3>
                                <h3>{{ $citiesManagers->email }} <sup style="font-size: 10px"></sup></h3>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
