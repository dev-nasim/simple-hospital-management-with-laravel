<base href="/public">
@include('admin.header');

@include('admin.sidebar');

@include('admin.navbar');

<div class="container-fluid page-body-wrapper">
    <div class="container">
        @if(Session::has('message'))
            <p class="alert alert-success">{{ Session::get('message') }}</p>
        @endif
        <form action="{{url('edit_doctor',$data->id)}}" method="post" style="color: #FFFFFF;" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Doctor Name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{$data->name}}" style="color: #000000;">
            </div>

            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" name="phone" class="form-control" id="phone" value="{{$data->phone}}" style="color: #000;">
            </div>

            <div class="form-group">
                <label for="speciality">Speciality</label>
                <input type="text" name="speciality" class="form-control" id="speciality" value="{{$data->speciality}}" style="color: #000;">
            </div>
            <div class="form-group">
                <label for="room">Room Number</label>
                <input type="text" name="room" class="form-control" id="room" value="{{$data->room}}" style="color: #000;">
            </div>

            <div class="form-group">
                <label for="image">Old Image</label>
                <img src="doctorimage/{{$data->image}}" height="80px" width="80px" id="image">
            </div>
            <div class="form-group">
                <label for="room">Change Image</label>
                <input type="file" name="file" class="form-control">
            </div>
            <div class="form-group">
                <input class="btn btn-success" type="submit" value="Submit" >
            </div>
        </form>
    </div>
</div>

@include('admin.footer')