@include('admin.header');

@include('admin.sidebar');


@include('admin.navbar');

<div class="container-fluid page-body-wrapper">
    <div class="container">
        @if(Session::has('message'))
            <p class="alert alert-success">{{ Session::get('message') }}</p>
        @endif
        <form action="{{url('upload_doctor')}}" method="post" style="color: #FFFFFF;" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label for="name">Doctor Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter Doctor Name">
            </div>

            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter Doctor Phone Number">
            </div>

            <div class="form-group">
                <label for="speciality">Speciality</label>
                <select name="speciality" name="speciality" class="form-control" style="color: #fff;">
                    <option value="default">---Select---</option>
                    <option value="Skin">Skin</option>
                    <option value="Eye">Eye</option>
                    <option value="Face">Face</option>
                    <option value="Nose">Nose</option>
                </select>
            </div>
            <div class="form-group">
                <label for="room">Room Number</label>
                <input type="text" name="room" class="form-control" id="room" placeholder="Enter Doctor Room Number">
            </div>

            <div class="form-group">
                <label for="image">Doctor Image</label>
                <input type="file" name="image" class="form-control" id="image">
            </div>
            <div class="form-group">
                <input class="btn btn-success" type="submit" value="Submit">
            </div>
        </form>
    </div>
</div>

@include('admin.footer')