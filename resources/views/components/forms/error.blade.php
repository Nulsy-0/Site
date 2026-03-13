@if($error)
    <p class="text-xs text-error mt-1">{{ $error }}</p>
@elseif ($errors->any() && $ml)
    @foreach ($errors->all() as $error)
        <p class="text-xs text-error mt-1">{{ $error }}</p>
    @endforeach
@endif