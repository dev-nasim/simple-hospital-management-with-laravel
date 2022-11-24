<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{$doctors}}</h3>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-success ">
                                    <i class="fa-solid fa-user-doctor"></i>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Doctor</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{$appointments}}</h3>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-info">
                                    <i class="fa-solid fa-code-pull-request"></i>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Appointment Request</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{$users->total()}}</h3>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-success">
                                    <i class="fa-solid fa-user"></i>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">User</h6>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row ">
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="d-flex justify-content-center pb-4" style="font-size: 30px;">User List with new registration</h2></h2>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="thead-light">
                                        <tr>
                                            <th> User Name </th>
                                            <th> User Email </th>
                                            <th> User Phone </th>
                                            <th> User Address </th>
                                            <th>Action </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                            <tr>

                                                <td> {{$user->name}} </td>
                                                <td> {{$user->email}} </td>
                                                <td> {{$user->phone}} </td>
                                                <td> {{$user->address}} </td>
                                                <td>
                                                    <a href="" onclick="return confirm('Are you sure ! to Delete this data')" class="btn btn-danger">Delete User</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            {{$users->links()}}
                        </div>
                    </div>
                </div>

            </div>
    <!-- content-wrapper ends -->
    <!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>