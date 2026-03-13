<a {{ $attributes->merge(['class' => 'card bg-neutral text-neutral-content w-96']) }}>
    <div class="card-body">
        
        <div class="flex items-center justify-between">
            <h2 class="card-title">{{ $idea->idea }}</h2>

            <span class="w-3 h-3 rounded-full bg-{{ $idea->state === 'Pending' ? 'gray' : ($idea->state === 'Active' ? 'yellow' : 'green') }}-500"></span>
        </div>

    </div>
</a>