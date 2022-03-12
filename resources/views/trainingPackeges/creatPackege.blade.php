@extends('layouts.user-layout')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper pb-4">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4>Package</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">New Package</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <section class="content">
            <form action="{{ route('trainingPackeges.store') }}" method="post" enctype="multipart/form-data"
                class="w-75 m-auto">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Adding</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    {{-- <input type="hidden" id="id" class="form-control" value="" name="id"> --}}

                                    <label for="name">Name</label>
                                    <input required type="text" id="name" class="form-control" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="price">price</label>
                                    <input type="text" required id="price" class="form-control" name="price">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Gym</label>
                                    <select class="form-control" name="gym_id">
                                        @foreach (App\Models\Gym::get() as $gym)
                                            <option value="{{ $gym->id }}">{{ $gym->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="sessions_number">Number of Sessions</label>
                                    <input type="text" required id="sessions_number" class="form-control"
                                        name="sessions_number">
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="#" class="btn btn-secondary">Cancel</a>
                        <input type="submit" value="Save Changes" class="btn btn-success float-right">
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection
