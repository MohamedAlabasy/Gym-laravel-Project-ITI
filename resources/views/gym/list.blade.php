@extends('layouts.user-layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All Gyms</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Gyms</li>
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
                    <h3 class="card-title">Gyms</h3>
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
                                <th>id</th>
                                <th>Gyms Name</th>
                                <th>Gym City</th>
                                <th>Created at</th>
                                <th>Gyms Cover Image</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gyms as $gym)
                                <tr id="gid{{ $gym->id }}">

                                    <td>{{ $gym->id }}</td>

                                    <td>{{ $gym->name }}</td>
                                    <td class="project-state">
                                        <span>mansoura</span>
                                        {{-- <span>{{$gym->city}}</span> --}}
                                    </td>
                                    <td>{{ $gym->created_at->format('d - M - Y') }}</td>
                                    <td>
                                        <img alt="Avatar" class="table-avatar" src="{{ $gym->cover_image }}">
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-info btn-sm" href="#">
                                            <i class="fa fa-eye"></i>
                                        </a>



                                        <a class="btn btn-warning btn-sm text-white"
                                            href="{{ route('gym.edit', $gym['id']) }}">
                                            <i class="fas fa-pencil-alt"></i></a>


                                        <a href="javascript:void(0)" onclick="deleteGym({{ $gym->id }})"
                                            class="btn btn-danger btn btn-info btn-sm">Delete</a>



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
        function deleteGym(id) {
            if (confirm("Do you want to delete this record?")) {
                $.ajax({
                    url: '/gym/' + id,
                    type: 'DELETE',
                    data: {
                        _token: $("input[name=_token]").val()
                    },
                    success: function(response) {
                        $("#gid" + id).remove();
                    }
                });
            }
        }
    </script>
@endsection
