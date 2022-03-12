@extends('layouts.user-layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4>All Coaches</h4>
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
                    <h3 class="card-title">Coaches</h3>
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
                                <th class="project-state"> id</th>
                                <th class="project-state">Coach Name</th>
                                <th class="project-state">Coach Email</th>
                                <th class="project-state">Coach City</th>
                                <th class="project-state">Created at</th>
                                <th class="project-state">Coach Image</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($coaches as $coach)
                                <tr id="cid{{ $coach->id }}">
                                    <td class="project-state">{{ $coach->id }}</td>
                                    <td class="project-state">{{ $coach->name }}</td>
                                    <td class="project-state">
                                        <span class="project-state">{{ $coach->email }}</span>
                                    </td>
                                    <td class="project-state">

                                        @if ($coach->city == null)
                                            <span class="project-state">this coach has no city</span>
                                        @else
                                            <span class="project-state">{{ $coach->city->name }}</span>
                                        @endif
                                    </td>
                                    <td class="project-state">{{ $coach->created_at->format('d - M - Y') }}</td>
                                    <td class="project-state">
                                        <img alt="Avatar" class="table-avatar" src="{{ $coach->profile_image }}">
                                    </td>
                                    <td class="project-actions project-state">
                                        <a class="btn btn-info btn-sm" href="{{ route('coach.show', $coach['id']) }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a class="btn btn-warning btn-sm text-white"
                                            href="{{ route('coach.edit', $coach['id']) }}">
                                            <i class="fas fa-pencil-alt"></i></a>
                                            <a href="javascript:void(0)" onclick="deleteCoach({{ $coach->id }})"
                                            class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                           
                                        <a href="javascript:void(0)" onclick="banUser({{ $coach->id }})"
                                            class="btn btn-dark btn-sm"><i class="fa fa-user-lock"></i></a>
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
    <script>
        function banUser(id) {
            if (confirm("Do you want to ban this user?")) {
                $.ajax({
                    url: '/banUser/' + id,
                    type: 'get',
                    data: {
                        _token: $("input[name=_token]").val()
                    },
                    success: function(response) {
                        $("#cid" + id).remove();
                    }
                });
            }
        }

        function deleteCoach(id) {
            if (confirm("Do you want to delete this record?")) {
                $.ajax({
                    url: '/coach/' + id,
                    type: 'DELETE',
                    data: {
                        _token: $("input[name=_token]").val()
                    },
                    success: function(response) {
                        $("#cid" + id).remove();
                    }
                });
            }
        }
    </script>
@endsection
