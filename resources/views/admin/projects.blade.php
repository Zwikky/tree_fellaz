@extends('admin.layouts.body')
@section('body')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Projects</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Projects</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div>
                <div id="toastsContainerTopRight" class="toasts-top-right fixed">
                    @if(Session::has('success'))
                    <div class="toast bg-success fade show" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header"><strong class="mr-auto">Success
                            </strong><small></small><button data-dismiss="toast" type="button" class="ml-2 mb-1 close"
                                aria-label="Close"><span aria-hidden="true">×</span></button></div>
                        <div class="toast-body">{{Session::get('success')}}</div>
                    </div>

                    @endif
                    @if(Session::has('errror'))
                    <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header"><strong class="mr-auto">Error</strong><button data-dismiss="toast"
                                type="button" class="ml-2 mb-1 close" aria-label="Close"><span
                                    aria-hidden="true">×</span></button></div>
                        <div class="toast-body">
                            {{Session::get('error')}}</div>
                    </div>
                    @endif
                </div>


            </div>
            <div class="col-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Manage List of Projects</h3>
                        <div class="card-tools">

                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#modal-project">
                                Create Project
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Created Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($projects as $data)
                                <tr>
                                    <td>{{$data->title}}</td>
                                    <td>
                                        @if($data->status == 'completed')
                                        <span class="badge bg-success">Completed</span>
                                        @endif
                                        @if($data->status == 'pending')
                                        <span class="badge bg-warning">Pending</span>
                                        @endif
                                        @if($data->status == 'not-started')
                                        <span class="badge bg-dark">Not Started</span>
                                        @endif
                                    </td>
                                    <td>{{$data->created_at}}</td>
                                    <td>
                                        <a href="#" class="btn btn-primary">

                                            <i class="fas fa-eye"></i>
                                        </a href="#">
                                        <a href="#" class="btn btn-warning">

                                            <i class="fas fa-edit"></i>
                                        </a href="#">

                                        <a href="#" class="btn btn-danger">

                                            <i class="fas fa-trash"></i>

                                        </a href="#">

                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Created Date</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->


            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- New Project Modal -->
<div class="modal fade" id="modal-project" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create New Project</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="add_project">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Project Title">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="status" id="status">
                            <option value="not-started">Not Started</option>
                        </select>
                    </div>


            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Project</button>
            </div>
            </form>
        </div>

    </div>

</div>

<!-- /New Project Modal -->
@endsection