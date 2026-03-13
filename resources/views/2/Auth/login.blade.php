<x-layout title="Log In">
    <form action="{{ route('auth.login') }}" method="POST">
        @csrf

        <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4 mx-auto">
            <legend class="fieldset-legend">Log In</legend>

            <label class="label" for="name">User Name or Email</label>
            <input class="input" placeholder="User Name or Email" autofocus required name="nameOrEmail" value="{{ old('name') }}" />
            <x-forms.error :error="$errors->first('nameOrEmail')" ml="{{ false }}" />
            
            <label class="label" for="password">Password</label>
            <input type="password" class="input" placeholder="Password" autofocus required name="password" />
            <x-forms.error :error="$errors->first('password')" ml="{{ false }}" />
        
            <button class="btn btn-neutral mt-4" type="submit">Log In</button>
        </fieldset>
    </form>
</x-layout>