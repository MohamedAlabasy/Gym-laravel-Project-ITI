{{-- @dd($banUsers) --}}
@extends('layouts.user-layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4>All Banned Users</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Coaches</li>
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
                    <h3 class="card-title">Banned</h3>
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
                                <th class="project-state">id</th>
                                <th class="project-state">Name</th>
                                <th class="project-state">Email</th>
                                <th class="project-state">Profile Image</th>
                                <th class="project-state">unBan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($banUsers as $user)
                                {{-- @dd($coach->banned_at) --}}
                                <tr>
                                    <th class="project-state" scope="row">{{ $user->id }}</th>
                                    <td class="project-state">
                                        <span>{{ $user->name }}</span>
                                    </td>
                                    <td class="project-state">
                                        <span>{{ $user->email }}</span>
                                    </td>
                                    <td class="project-state">
                                        <img alt="Avatar" class="table-avatar" src="{{ $user->profile_image }}">
                                    </td>
                                    <td class="project-actions text-center">
                                        <form id="myform" action="{{ route('user.unBan', $user->id) }}" method="POST"
                                            style="display:inline;"
                                            onsubmit="return confirm('Are you sure you want to delete it ?');">
                                            @csrf
                                            @method('PATCH')
                                            <input type="submit" class="btn btn-dark delete  fas fa-trash btn-sm"
                                                value="unban" title='unban'>
                                        </form>
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
