@if (Session::has('primary'))
<div class="alert alert-primary" role="alert">
   {{ Session::get('primary') }}
</div>
@elseif (Session::has('secondary'))
<div class="alert alert-secondary" role="alert">
   {{ Session::get('secondary') }}
</div>
@elseif (Session::has('success'))
<div class="alert alert-success" role="alert">
   {{ Session::get('success') }}
</div>
@elseif (Session::has('danger'))
<div class="alert alert-danger" role="alert">
   {{ Session::get('danger') }}
</div>
@elseif (Session::has('warning'))
<div class="alert alert-warning" role="alert">
   {{ Session::get('warning') }}
</div>
@elseif (Session::has('info'))
<div class="alert alert-info" role="alert">
   {{ Session::get('info') }}
</div>
@elseif (Session::has('light'))
<div class="alert alert-light" role="alert">
   {{ Session::get('light') }}
</div>
@elseif (Session::has('dark'))
<div class="alert alert-dark" role="alert">
   {{ Session::get('dark') }}
</div>
@endif
