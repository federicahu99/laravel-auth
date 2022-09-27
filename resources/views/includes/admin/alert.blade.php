@if(session('delete'))
<div class="container">
    <div class="alert alert-success mt-3"> {{ session('delete') }} </div>
</div>
@endif