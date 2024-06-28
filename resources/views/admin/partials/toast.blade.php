@session('messages')
<div class="ms_toast ms_hidden bg-success rounded-2 shadow">
    {{ session('messages') }} <i class="fa-regular fa-circle-check"></i>
    <div class="ms_line ms_hidden"> </div>
</div>
@endsession