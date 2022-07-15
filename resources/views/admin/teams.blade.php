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
                        <h3 class="card-title">Manage List of Teams</h3>
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
                                    <th>Team Name</th>
                                    <th>Site Assigned</th>
                                    <th>Leader</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($teams as $team)
                                <tr>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->site}}</td>
                                    <td>{{$data->leader}}</td>
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
                                    <th>Team Name</th>
                                    <th>Site Assigned</th>
                                    <th>Leader</th>
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


<!-- New Team Modal -->
<div class="modal fade" id="modal-team" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create New Team</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="add_team">
                    @csrf
                    <div class="form-group">
                        <label for="name">Team Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Team Name">
                    </div>
                    <div class="form-group">
                        <label for="site">Site Assigned</label>
                        <select class="form-control" name="site" id="site">
                            @foreach($sites as $site)
                            <option value="{{$site->id}}">{{$site->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="leader">Leader</label>
                        <select class="form-control" name="leader" id="leader">
                            @foreach($leaders as $leader)
                            <option value="{{$leader->id}}">{{$leader->name}}</option>
                            @endforeach
                        </select>
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