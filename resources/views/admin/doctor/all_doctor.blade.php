@include('admin.header');

@include('admin.sidebar');


@include('admin.navbar');

<div class="container-fluid page-body-wrapper">

    <div class="container-fluid">
        <h1 class="d-flex justify-content-center" style="font-size: 45px;">All Doctor</h1>
        <button type="button" class="btn btn-primary mb-3">
            <a class="nav-link" href="{{url('add_doctor')}}">
          <span class="menu-icon">
            <i class="fa-solid fa-plus"></i>
          </span>
                <span class="menu-title">Add Doctors</span>
            </a>
        </button>
        @if(Session::has('message'))
            <p class="alert alert-success">{{ Session::get('message') }}</p>
        @endif
        <table class="table table-bordered">

            <thead class="thead-light">
            <tr>
                <th scope="col">SL No.</th>
                <th scope="col">Doctor Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Speciality</th>
                <th scope="col">Room No.</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            @foreach($doctors as $doctor)
                <tr>
                    <td>{{$doctor->id}}</td>
                    <td>{{$doctor->name}}</td>
                    <td>{{$doctor->phone}}</td>
                    <td>{{$doctor->speciality}}</td>
                    <td>{{$doctor->room}}</td>
                    <td>
                        <img src="doctorimage/{{$doctor->image}}" style="width: 80px;height: 80px">
                    </td>
                    <td>
                        <a href="{{url('update_doctor',$doctor->id)}}" class="btn btn-info">Edit</a>
                        <a href="{{url('delete_doctor',$doctor->id)}}" onclick="return confirm('Are you sure ! to Delete this data')" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>

    </div>

</div>
@include('admin.footer')
