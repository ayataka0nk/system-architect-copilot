<x-layouts.guest title='ログイン'>
    <form action="{{ route('login') }}" method="post">
        @csrf
        <x-text-field label="Email" name="email" :error="$errors->first('email')" />
        <x-text-field type='password' label="Password" name='password' :error="$errors->first('password')" />
        <x-button type='submit' class="w-full">ログイン</x-button>
    </form>
</x-layouts.guest>
