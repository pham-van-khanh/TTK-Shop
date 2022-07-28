

@if (Session::has('error'))
<div class="alert alert-danger">
  <span style="color: white">{{Session::get('error')}}</span>
</div>
@endif

@if (Session::has('success'))
<div class="alert alert-success">
  <span style="color: white">{{Session::get('success')}}</span>
</div>
@endif

