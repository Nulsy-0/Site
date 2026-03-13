<x-layout title="Your Idea">
    <form method="POST" action="/ideas/{{ $idea->id }}">
        @csrf
        @method('PATCH')

        <div class="col-span-full">

            <label for="about" class="block text-sm/6 font-medium text-white">Edit Your Idea</label>

            <div class="mt-2">
                <textarea id="idea" name="idea" rows="3" class="textarea w-full @error('idea') textarea-error @enderror">{{ $idea->idea }}</textarea>

                <x-forms.error :error="null" ml="{{ true }}" />

                <fieldset class="@error('stat') textarea-error @enderror">
                    <legend class="text-sm/6 font-semibold text-white">State</legend>

                    <div class="mt-6 space-y-6">

                        <div class="flex items-center gap-x-3">
                            <input type="radio" name="state" value="Pending"
                                {{ $idea->state === 'Pending' ? 'checked' : '' }}
                                class="relative size-4 appearance-none rounded-full border border-white/10 bg-white/5 before:absolute before:inset-1 before:rounded-full before:bg-white not-checked:before:hidden checked:border-indigo-500 checked:bg-indigo-500">
                            <label class="block text-sm/6 font-medium text-white">Pending</label>
                        </div>

                        <div class="flex items-center gap-x-3">
                            <input type="radio" name="state" value="Active"
                                {{ $idea->state === 'Active' ? 'checked' : '' }}
                                class="relative size-4 appearance-none rounded-full border border-white/10 bg-white/5 before:absolute before:inset-1 before:rounded-full before:bg-white not-checked:before:hidden checked:border-indigo-500 checked:bg-indigo-500">
                            <label class="block text-sm/6 font-medium text-white">Active</label>
                        </div>

                        <div class="flex items-center gap-x-3">
                            <input type="radio" name="state" value="Complete"
                                {{ $idea->state === 'Complete' ? 'checked' : '' }}
                                class="relative size-4 appearance-none rounded-full border border-white/10 bg-white/5 before:absolute before:inset-1 before:rounded-full before:bg-white not-checked:before:hidden checked:border-indigo-500 checked:bg-indigo-500">
                            <label class="block text-sm/6 font-medium text-white">Complete</label>
                        </div>

                    </div>
                </fieldset>
            </div>
        </div>

        <div class="mt-6 flex items-center gap-x-2">
            <button type="submit"
                class="btn btn-primary">
                Update
            </button>

            <button type="submit" form="delete"
                class="btn btn-error">
                Delete
            </button>
        </div>
    </form>

    <form id="delete" method="POST" action="/ideas/{{ $idea->id }}">
        @csrf
        @method('DELETE')
    </form>
</x-layout>