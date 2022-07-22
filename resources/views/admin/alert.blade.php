

@if (Session::has('error'))
<div class="alert alert-danger">
  <span style="color: red">{{Session::get('error')}}</span>  
</div>
@endif

@if (Session::has('success'))
<div class="alert alert-success">
  <span style="color: rgb(134, 203, 246)">{{Session::get('success')}}</span>  
</div>
@endif

