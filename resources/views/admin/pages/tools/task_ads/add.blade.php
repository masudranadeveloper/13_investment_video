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
    <h4 class="mt-4 mb-5 text-center">ADD NEW ADS </h4>
    <form action="{{route('api_show_tools_ads_add')}}" method="POST" class="mb-5" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">Add Picture</label>
            <input type="file" class="form-control" required name="img" />
        </div>

        <div class="form-group">
            <label for="">Add Video</label>
            <input type="file" class="form-control" required name="vid" />
        </div>

        <div class="form-group">
            <label for="">Video title</label>
            <input type="text" class="form-control" required name="title"   placeholder="Enter title..." />
        </div>

        <div class="form-group">
            <label for="">Video Duration</label>
            <input type="text" class="form-control" required name="vid_time"  placeholder="Video duration..." />
        </div>

        <div class="row">
            <div class="col-6">
                <a href="{{route('show_tools_ads_show')}}" style="width: 100%" class="btn btn-danger">Back</a>
            </div>

            <div class="col-6">
                <button type="submit" style="width: 100%" class="btn btn-success">Add New</button>
            </div>
        </div>
    </form>
</div>
@endsection
