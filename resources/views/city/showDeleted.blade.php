@extends('layouts.user-layout')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Deleted Cities</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Deleted Cities</li>
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
                        <tr>
                            <td class="project-state">{{ $city->id }}</td>
                            <td class="project-state">{{ $city->name }}</td>
                            <td class="project-state">{{ $city->deleted_at->format('d - M - Y') }}</td>
                            <td class="project-actions project-state">
                                <a class="btn btn-danger btn-sm" href="{{ route('city.restored', $city->id) }}" data-toggle="modal" data-target="#modal-danger">
                                    <i class="fa fa-eye"></i>
                                </a>
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
<div class="modal fade" id="modal-danger">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h4 class="modal-title">Danger Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you shure you want to delete this item??</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline-light">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection


<!-- <script>
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
</script> -->
