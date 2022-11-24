@include('admin.header');

@include('admin.sidebar');

@include('admin.navbar');


<div class="container-fluid page-body-wrapper">

    <div class="container-fluid">
        <h1 class="d-flex justify-content-center pb-4" style="font-size: 45px;">Appointment Request and list</h1>

        @if(Session::has('message'))
            <p class="alert alert-success">{{ Session::get('message') }}</p>
        @endif
        <table class="table table-bordered">
            <thead class="thead-light">
            <tr>
                <th scope="col">SL No.</th>
                <th scope="col">Patient Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Doctor Name</th>
                <th scope="col">Date</th>
                <th scope="col">Message</th>
                <th scope="col">Status</th>
                <th scope="col">Approved</th>
                <th scope="col">Cancel</th>
                <th scope="col">Send Mail</th>
            </tr>
            </thead>
            @foreach($appoints as $appoint)
                <tr style="color: #fff;">
                    <td>{{$appoint->id}}</td>
                    <td>{{$appoint->name}}</td>
                    <td>{{$appoint->email}}</td>
                    <td>{{$appoint->phone}}</td>
                    <td>{{$appoint->doctor}}</td>
                    <td>{{$appoint->date}}</td>
                    <td>{{$appoint->message}}</td>
                    <td>{{$appoint->status}}</td>
                    <td>
                        <a href="{{url('approved',$appoint->id)}}" class="btn btn-info">Approved</a>
                    </td>
                    <td>
                        <a href="{{url('canceled',$appoint->id)}}" class="btn btn-danger">Cancel</a>
                    </td>
                    <td>
                        <a href="{{url('emailview',$appoint->id)}}" class="btn btn-primary">Send Mail</a>
                    </td>
                </tr>
            @endforeach
        </table>

    </div>

</div>
@include('admin.footer')