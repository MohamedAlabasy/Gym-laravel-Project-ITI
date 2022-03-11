@extends('layouts.user-layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Restored Cities</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Restored Cities</li>
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
                    <h3 class="card-title">Cities</h3>
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
                                <th class="project-state"> ID </th>
                                <th class="project-state"> City Name</th>
                                <th class="project-state">Deleted at</th>
                                <th class="project-state"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($deletedCity as $city)
                                <tr id="did{{ $city->id }}">
                                    <td class="project-state">{{ $city->id }}</td>
                                    <td class="project-state">{{ $city->name }}</td>
                                    <td class="project-state">{{ $city->deleted_at->format('d - M - Y') }}</td>
                                    <td class="project-actions project-state">
                                        <a href="javascript:void(0)" onclick="restoredCity({{ $city->id }})"
                                            class="btn btn-danger btn-sm"> <i class="fas fa-unlock"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>

            <!-- /.card -->
            <!-- ##################################Start Modal ##################################-->
            {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-dialog">
                        <div class="modal-content bg-danger">
                            <div class="modal-header">
                                <h4 class="modal-title">Deleting</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Are you shure you want to delete this item ??</p>
                            </div>
                            <div class="modal-footer justify-content-between" aria-label="Close"
                                id="cid{{ $city->id }}">
                                <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal"
                                    aria-label="Close">Close</button>
                                {{-- <a href="{{ route('city.restored', $city->id) }}" class="btn btn-outline-light">Delete</a> --}}
            {{-- <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal" aria-label="Close">
                <a href="javascript:void(0)" onclick="restoredCity({{ $city->id }})"
                    class="btn btn-outline-light">Delete</a></button> --}}
            {{-- </div>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
    </div> --}}
            <!-- ##################################Start Modal ##################################-->
        </section>
        <script>
            function restoredCity(id) {
                if (confirm("Do you want to delete this record?")) {
                    $.ajax({
                        url: '/restoredCities/' + id,
                        type: 'get',
                        data: {
                            _token: $("input[name=_token]").val()
                        },
                        success: function(response) {
                            $("#did" + id).remove();
                        }
                    });
                }
            }
        </script>
    @endsection
