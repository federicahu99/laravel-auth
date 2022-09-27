@if(session('delete'))
<div class="container">
    <div class="alert alert-pimary"> {{ session('delete') }} </div>
</div>
@endif