
        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
        @endif
        <form method="POST">
            @csrf
            <div>
                <label for="email" value="{{ __('Email') }}" ></lable>
                <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus />
            </div>
            <div class="mt-4">
                <label for="password" value="{{ __('Password') }}" /></lable>
                <input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>
            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>
            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
                @endif
                <button class="ml-4">
                    {{ __('Login') }}
                </button>
            </div>
            {{-- Login with Facebook --}}
            <div class="flex items-center justify-end mt-4">
                <a class="btn" href="{{ url('auth/facebook') }}"
                    style="background: #3B5499; color: #ffffff; padding: 10px; width: 100%; text-align: center; display: block; border-radius:3px;">
                    Login with Facebook
                </a>
            </div>

            {{-- Login with Google --}}
            <div class="flex items-center justify-end mt-4">
                <a class="btn" href="{{ url('auth/google') }}"
                    style="background: #ce473c; color: #ffffff; padding: 10px; width: 100%; text-align: center; display: block; border-radius:3px;">
                    Login with Google
                </a>
            </div>
        </form>
