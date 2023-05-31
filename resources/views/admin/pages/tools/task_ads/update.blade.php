@extends('admin.layout.master')
@section('admin_master')
<div class="container">
    <div class="row">
        @if (session() -> has('msg'))
            <div class="alert alert-success col-12" role="alert">
                <h4 class="alert-heading">Alert</h4>
                <hr>
                <p>{{session() -> get('msg')}}</p>
            </div>
        @endif
    </div>
</div>

<div class="container">
    <h4 class="mt-4 mb-5 text-center">UPDATE ADS</h4>

    <form class="mb-5" action="{{route('api_show_tools_ads_update_img', ['id' => $id])}}" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-12">
                <label for="">Update images!</label>
            </div>
            <div class="col-8">
                <input type="file" class="form-control" required  name="img" />
            </div>
            <div class="col-4">
                <button style="width: 100%" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>

    <form class="mb-5" action="{{route('api_show_tools_ads_update_video', ['id' => $id])}}" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-12">
                <label for="">Update Video images!</label>
            </div>
            <div class="col-8">
                <input type="file" class="form-control" required  name="vid" />
            </div>
            <div class="col-4">
                <button style="width: 100%" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>

    <form action="{{route('api_show_tools_ads_update', ['id' => $id])}}" method="POST" class="mb-5" enctype="multipart/form-data">

        <div class="form-group">
            <label for="">Video title</label>
            <input type="text" class="form-control" required name="title" value="{{$user_account['title']}}"  placeholder="Enter title..." />
        </div>

        <div class="form-group">
            <label for="">Video Duration</label>
            <input type="text" class="form-control" required name="vid_time" value="{{$user_account['time']}}" placeholder="Video duration..." />
        </div>

        <div class="row">
            <div class="col-6">
                <a href="{{route('show_tools_ads_show')}}" style="width: 100%" class="btn btn-danger">Back</a>
            </div>

            <div class="col-6">
                <button type="submit" style="width: 100%" class="btn btn-success">Update</button>
            </div>
        </div>
    </form>
</div>
@endsection
