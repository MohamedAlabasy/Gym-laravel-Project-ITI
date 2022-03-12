@extends('layouts.user-layout')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper pb-4">
@if ($errors->any())
    <div class="alert bg-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>New Training Session</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create New Session</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <form action="{{route('TrainingSessions.store')}}" method="POST" enctype="multipart/form-data" class="w-75 m-auto">
            @csrf
            <div class="row">
                {{-- {{($coach)}} --}}
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Create</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" class="form-control"  name="name">
                            </div>

                            <div class="form-group">
                                <label for="name">Day</label>
                                <input type="date" id="name" class="form-control" name="day">
                            </div>
                            <div class="form-group">
                                <label for="coach">Coach</label>
                                <select id="coach" class="form-control custom-select" name="user_id" >
                                    @foreach ($coaches as $coach)
                                   <option value="{{$coach->id}}"> {{ $coach->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="starts_at">Starts At</label>
                                <input type="time" id="starts_at" class="form-control"  name="starts_at">
                            </div>
                            <div class="form-group">
                                <label for="finishes_at">Finishes At</label>
                                <input type="time" id="finishes_at" class="form-control"  name="finishes_at">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('TrainingSessions.listSessions') }}" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Save Changes" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
</div>
@endsection
