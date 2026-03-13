<x-layout title="Ideas">
    <form method="POST" action="{{ route('ideas.store') }}" class=" fieldset bg-base-200 border-base-300 rounded-box w-2xl border p-4 mx-auto" >
        @csrf
        <div class="col-span-full">

            <legend for="about" class="fieldset-legend">Create New Idea</legend>

            <div class=" mt-2 ">
                <textarea id="idea" name="idea" rows="3" class="textarea w-full @error('idea') textarea-error @enderror">{{ old('idea') }}</textarea>

                

                <fieldset class="@error('stat') textarea-error @enderror">
                    <legend class="text-sm/6 font-semibold text-white">State</legend>
                    <div class="mt-6 space-y-6">
                        <div class="flex items-center gap-x-3">
                            <input id="state" type="radio" name="state" value="Pending"
                                {{ old('state') === 'Pending' || old('state') === null ? 'checked' : '' }}
                                class="relative size-4 appearance-none rounded-full border border-white/10 bg-white/5 before:absolute before:inset-1 before:rounded-full before:bg-white not-checked:before:hidden checked:border-indigo-500 checked:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500 disabled:border-white/5 disabled:bg-white/10 disabled:before:bg-white/20 forced-colors:appearance-auto forced-colors:before:hidden" />
                            <label for="push-everything"
                                class="block text-sm/6 font-medium text-white">Pending</label>
                        </div>
                        <div class="flex items-center gap-x-3">
                            <input id="state" type="radio" name="state" value="Active"
                                {{ old('state') === 'Active' ? 'checked' : '' }}
                                class="relative size-4 appearance-none rounded-full border border-white/10 bg-white/5 before:absolute before:inset-1 before:rounded-full before:bg-white not-checked:before:hidden checked:border-indigo-500 checked:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500 disabled:border-white/5 disabled:bg-white/10 disabled:before:bg-white/20 forced-colors:appearance-auto forced-colors:before:hidden" />
                            <label for="push-email" class="block text-sm/6 font-medium text-white">Active</label>
                        </div>
                        <div class="flex items-center gap-x-3">
                            <input id="state" type="radio" name="state" value="Complete"
                                {{ old('state') === 'Complete' ? 'checked' : '' }}
                                class="relative size-4 appearance-none rounded-full border border-white/10 bg-white/5 before:absolute before:inset-1 before:rounded-full before:bg-white not-checked:before:hidden checked:border-indigo-500 checked:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500 disabled:border-white/5 disabled:bg-white/10 disabled:before:bg-white/20 forced-colors:appearance-auto forced-colors:before:hidden" />
                            <label for="push-nothing" class="block text-sm/6 font-medium text-white">Complete</label>
                        </div>
                    </div>
                </fieldset>
            </div>

            <p class=" mt-3 text-sm/6 text-gray-400 ">Any idea?</p>

        </div>

        <div class="mt-6 flex items-center gap-x-6">
            <button type="submit"
                class="btn">Save</button>
        </div>
    </form>
</x-layout>