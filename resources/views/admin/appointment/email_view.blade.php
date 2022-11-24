<base href="/public">
@include('admin.header');

@include('admin.sidebar');


@include('admin.navbar');

<div class="container-fluid page-body-wrapper">
    <div class="container">
        @if(Session::has('message'))
            <p class="alert alert-success">{{ Session::get('message') }}</p>
        @endif
        <form action="{{url('send_email',$data->id)}}" method="post" style="color: #FFFFFF;">
            @csrf
            <div class="form-group">
                <label for="name">Greetings</label>
                <input type="text" name="greeting" class="form-control" id="greeting" placeholder="Enter Greetings" style="color: #000;">
            </div>

            <div class="form-group">
                <label for="phone">Mail Body</label>
                <input type="text" name="body" class="form-control" id="body" placeholder="Enter Mail Body Text" style="color: #000;">
            </div>


            <div class="form-group">
                <label for="room">Action Text</label>
                <input type="text" name="action_text" class="form-control" id="action_text" placeholder="Enter Mail Action Text" style="color: #000;">
            </div>


            <div class="form-group">
                <label for="room">Action Url</label>
                <input type="text" name="action_url" class="form-control" id="action_url" placeholder="Enter Mail Action Url" style="color: #000;">
            </div>

            <div class="form-group">
                <label for="room">End Part</label>
                <input type="text" name="end" class="form-control" id="end" placeholder="Enter Mail End Part" style="color: #000;">
            </div>

            <div class="form-group">
                <input class="btn btn-success" type="submit" value="Send">
            </div>
        </form>
    </div>
</div>

@include('admin.footer')