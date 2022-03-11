@extends('layouts.user-layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper pb-4">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>New City</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Create New City</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <form action="{{ route('city.update', $cityData->id) }}" method="post" class="w-75 m-auto">
                @csrf
                @method('put')
                <input value="{{ $cityData->id }}" type="hidden" name="cityID">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Create</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label" for="name">Name</label>
                                    <input required minlength="4" maxlength="100" type="text" id="name" name="name"
                                        class=" form-control @error('name') is-invalid @enderror"
                                        value="{{ $cityData->name }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="manager_id">City Manger</label>
                                    <select required class=" form-control @error('manager_id') is-invalid @enderror"
                                        name="manager_id" id="manager_id">
                                        @if ($cityData->manager != null)
                                            <option value="{{ $cityData->manager->id }}">
                                                {{ $cityData->manager->name }}
                                            </option>
                                            <option value='optional'>Remove City Manager</option>
                                        @else
                                            <option value='optional' hidden>optional</option>
                                        @endif
                                        <optgroup label="Available City Managers">
                                            @foreach ($cityManagers as $manager)
                                                <option value={{ $manager->id }}>{{ $manager->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                    @error('manager_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a>
                                    <input type="submit" value="Update" class="btn btn-primary float-right">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
    </div>
    </section>
    </div>
@endsection
