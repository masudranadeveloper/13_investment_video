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
    <h4 class="mt-4 mb-5 text-center">ADD NEW PACKAGE</h4>

    {{-- <form class="mb-5" action="{{route('api_tools_update_package_update_data_img', ['id' => $id])}}" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-8">
                <input type="file" class="form-control" required  name="package_img" />
            </div>
            <div class="col-4">
                <button style="width: 100%" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form> --}}

    <form action="{{route('api_tools_update_package_update_data', ['id' => $id])}}" method="POST" class="mb-5" enctype="multipart/form-data">


        <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" required value="{{$user_account['package_name']}}" name="package_name"   placeholder="Enter name..." />
        </div>

        <div class="form-group">
            <label for="">Min-Amount</label>
            <input type="text" class="form-control" required value="{{$user_account['minAmount']}}" name="minAmount"  placeholder="Min amount..." />
        </div>

        <div class="form-group">
            <label for="">Max-Amount</label>
            <input type="text" class="form-control" required value="{{$user_account['maxAmount']}}" name="maxAmount"  placeholder="Max amount..." />
        </div>

        <div class="form-group">
            <label for="">Daily task</label>
            <input type="text" class="form-control" required value="{{$user_account['task']}}" name="task"  placeholder="Daily task..." />
        </div>

        <div class="form-group">
            <label for="">Daily commission</label>
            <input type="text" class="form-control" required value="{{$user_account['commission']}}" name="commission"  placeholder="Daily commission..." />
        </div>

        <div class="row">
            <div class="col-6">
                <a href="{{route('show_dynamic_package')}}" style="width: 100%" class="btn btn-danger">Back</a>
            </div>

            <div class="col-6">
                <button type="submit" style="width: 100%" class="btn btn-success">Update</button>
            </div>
        </div>
    </form>
</div>

@endsection
