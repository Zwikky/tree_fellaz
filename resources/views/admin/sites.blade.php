@extends('admin.layouts.body')
@section('body')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Work Sites</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Sites</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Manage List of Sites</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-site">
                                Add Site
                            </button>
                        </div>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Site Name</th>
                                    <th>Code</th>
                                    <th>Project</th>
                                    <th>Number of Tress</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sites as $data)
                                <tr>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->site_code}}
                                    </td>
                                    <td>{{$data->project}}</td>
                                    <td>{{$data->trees}}</td>
                                    <td>{{$data->start_date}}</td>
                                    <td>{{$data->end_date}}</td>
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
                                    <th>Site Name</th>
                                    <th>Code</th>
                                    <th>Project</th>
                                    <th>Number of Tress</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
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


<!-- New Site Modal -->
<div class="modal fade" id="modal-site" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create New Site</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="add_site">
                    @csrf
                    <div class="form-group">
                        <label for="name">Site Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Site Name">
                    </div>
                    <div class="form-group">
                        <label for="code">Site Code</label>
                        <input type="text" class="form-control" name="code" id="code" placeholder="Site Code">
                    </div>
                    <div class="form-group">
                        <label for="trees"># of Trees</label>
                        <input type="text" class="form-control" name="trees" id="trees" placeholder="Number of Tress">
                    </div>
                    <div class="form-group">
                        <label for="project">Project</label>
                        <select class="form-control" name="project" id="project">
                            @foreach($projects as $project)
                            <option value="{{$project->id}}">{{$project->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="start_date">Start Date</label>
                        <input type="text" class="form-control" name="start_date" data-inputmask-alias="datetime"
                            data-inputmask-inputformat="dd/mm/yyyy" data-mask="" inputmode="numeric">
                    </div>
                    <div class="form-group">
                        <label for="end_date">End Date</label>
                        <input type="text" class="form-control" name="end_date" data-inputmask-alias="datetime"
                            data-inputmask-inputformat="dd/mm/yyyy" data-mask="" inputmode="numeric">
                    </div>


            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Site</button>
            </div>
            </form>
        </div>

    </div>

</div>

<!-- /New Project Modal -->

@endsection