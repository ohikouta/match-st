<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        
        <!-- Profile Image -->
        <div class="mt-4">
            <x-input-label for="image" :value="__('Image')" />
            <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')" />
            <x-input-error :messages="$errors->get('image')" class="mt-2" />
        </div>
        
        <!-- Birthday -->
        <div class="mt-4">
            <x-input-label for="birthdate" :value="__('Birthday')" />
            <x-text-input id="birthdate" class="block mt-1 w-full" type="date" name="birthdate" :value="old('birthdate')" />
            <x-input-error :messages="$errors->get('birthdate')" class="mt-2" />
        </div>

         <!--Univ -->
        <div class="mt-4">
            <x-input-label for="univ" :value="__('Univ')" />
            <x-text-input id="univ" class="block mt-1 w-full" type="text" name="univ" :value="old('univ')" />
            <x-input-error :messages="$errors->get('birthday')" class="mt-2" />
        </div>
        
        <!-- Grade -->
        <div class="mt-4">
            <x-input-label for="grade" :value="__('Grade')" />
            <select name="grade" id="grade" class="block mt-1 w-full">
                <option value="学部1年">学部1年</option>
                <option value="学部2年">学部2年</option>
                <option value="学部3年">学部3年</option>
                <option value="学部4年">学部4年</option>
                <option value="修士1年">修士1年</option>
                <option value="修士2年">修士2年</option>
                <option value="博士1年">博士1年</option>
                <option value="博士2年">博士2年</option>
                <option value="博士3年">博士3年</option>
            </select>
        </div>


        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
