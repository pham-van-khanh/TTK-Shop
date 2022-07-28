@extends('admin.admin-master')

@section('title', 'Add Gallery')
@section('content-title', 'Add Gallery')
@section('danh-muc', 'Add Gallery')
@section('content')


    <form action="" method="POST" enctype="multipart/form-data">
        <br>
        @csrf
        @include('admin.alert')
        <div class="form-outline">
            <input type="hidden" value="{{ $prd_id }}" name="prd_id">
            <div id="gallery_load">
                <table class="table table-striped table-">
                    <thead>
                        <tr>
                            <th scope="col">Tên hình ảnh</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Thuộc Sp</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
{{-- <script type="text/javascript">
    $(document).ready(function() {
      load_gallery();
      function load_gallery(){
      var prd_id =  $('prd_id').val();
       console.log(prd_id);
      }
    });
    </script> --}}