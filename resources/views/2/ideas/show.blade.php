<x-layout>
    <div class=" card bg-neutral p-6">

        <div>
            {{ $idea->idea }}
        </div>

        <div class="mt-6">
            <a href="/ideas/{{ $idea->id }}/edit" type="submit"
                class="btn btn-soft">Edit</a>
        </div>
    </div>
</x-layout>