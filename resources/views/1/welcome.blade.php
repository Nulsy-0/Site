<x-layout title="Home1">
    <p>
        {{ $greeting }}, {{ $user }}!
    </p>

    @dump($tasks)
    
    @if ($nTasks = count($tasks))
        <p>Yes, we have some tasks. How many? {{ $nTasks }} tasks in fact!</p>
    @endif

    @forelse ($tasks as $task)
        <li>{{ $task }}</li>
    @empty
        <p>There are no tasks</p>
    @endforelse
        
</x-layout>