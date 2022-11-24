@include('user.header');

<div class="container">

    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">Doctor Name</th>
            <th scope="col">Date</th>
            <th scope="col">Message</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        @foreach($appointments as $appointment)
        <tr>
            <td>{{$appointment->doctor}}</td>
            <td>{{$appointment->date}}</td>
            <td>{{$appointment->message}}</td>
            <td>{{$appointment->status}}</td>
            <td>
                <a class="btn btn-danger" href="{{url('cancel_appoint',$appointment->id)}}" onclick="return confirm('Are you sure ! to cancel this Appointment?');">Cancel Appointment</a>
            </td>
        </tr>
        @endforeach
    </table>

</div>