<section>
    <header>
        <h2 class="text-xl font-medium text-gray-900 border-l-4 border-blue-500 pl-4 font-bold">
            {{ __('プロフィール編集') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("プロフィール情報の変更を行います。") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6"  enctype="multipart/form-data">
        @csrf
        @method('patch')
        <!-- image -->
        <div>
            <img src="{{ $user->image }}" class="overflow-hidden h-[210px] w-[210px] my-auto">
            <x-input-label for="image" :value="__('Image')" />
            <x-text-input id="image" name="image" type="file" class="mt-1 block w-full" :value="old('image', $user->image)"/>
            <x-input-error class="mt-2" :messages="$errors->get('image')" />
        </div>
        <!-- name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        <!-- univ -->
        <div>
            <x-input-label for="univ" :value="__('Univ')" />
            <x-text-input id="univ" name="univ" type="text" class="mt-1 block w-full" :value="old('univ', $user->univ)" required autofocus autocomplete="univ" />
            <x-input-error class="mt-2" :messages="$errors->get('univ')" />
        </div>
        <!-- birthdate -->
        <div>
            <x-input-label for="buirthdate" :value="__('Birthdate')" />
            <x-text-input id="birthdate" name="birthdate" type="date" class="mt-1 block w-full" :value="old('birthdate', $user->birthdate)" required autofocus autocomplete="birthdate" />
            <x-input-error class="mt-2" :messages="$errors->get('birthdate')" />
        </div>
        <!-- grade -->
        <div>
            <x-input-label for="grade" :value="__('Grade')" />
            <select id="grade" name="grade" class="mt-1 block w-full" required autofocus>
                <option value="学部1年" {{ old('grade', $user->grade) === '学部1年' ? 'selected' : '' }}>学部1年</option>
                <option value="学部2年" {{ old('grade', $user->grade) === '学部2年' ? 'selected' : '' }}>学部2年</option>
                <option value="学部3年" {{ old('grade', $user->grade) === '学部3年' ? 'selected' : '' }}>学部3年</option>
                <option value="学部4年" {{ old('grade', $user->grade) === '学部4年' ? 'selected' : '' }}>学部4年</option>
                <option value="修士1年" {{ old('grade', $user->grade) === '修士1年' ? 'selected' : '' }}>修士1年</option>
                <option value="修士2年" {{ old('grade', $user->grade) === '修士2年' ? 'selected' : '' }}>修士2年</option>
                <option value="博士1年" {{ old('grade', $user->grade) === '博士1年' ? 'selected' : '' }}>博士1年</option>
                <option value="博士2年" {{ old('grade', $user->grade) === '博士2年' ? 'selected' : '' }}>博士2年</option>
                <option value="博士3年" {{ old('grade', $user->grade) === '博士3年' ? 'selected' : '' }}>博士3年</option>
                <!-- 他の選択肢も同様に追加 -->
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('grade')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
