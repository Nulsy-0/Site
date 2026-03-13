<x-layout title="Register">
    <form action="{{ route('auth.register') }}" method="POST">
        @csrf

        <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4 mx-auto">
            <legend class="fieldset-legend">Register</legend>

            <label class="label" for="name">User Name</label>
            <input class="input" placeholder="User Name" autofocus required name="name" value="{{ old('name') }}" />
            <x-forms.error :error="$errors->first('name')" ml="{{ false }}" />

            <label class="label" for="email">Your Email</label>
            <input type="email" class="input" placeholder="Email" autofocus required name="email" value="{{ old('email') }}" />
            <x-forms.error :error="$errors->first('email')" ml="{{ false }}" />

            <label class="label" for="password">Password</label>
            <input type="password" class="input" placeholder="Password" autofocus required name="password" />
            <x-forms.error :error="$errors->first('password')" ml="{{ false }}" />

            <label class="label" for="password_confirmation">Confirm Password</label>
            <input type="password"  class="input" placeholder="Confirm Password" autofocus required name="password_confirmation" />
            <x-forms.error :error="$errors->first('password_confirmation')" ml="{{ false }}" />
                    
            <button class="btn btn-neutral mt-4" type="submit">Register</button>
        </fieldset>
    </form>
</x-layout>