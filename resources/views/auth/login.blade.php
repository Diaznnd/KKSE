<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login KKSE</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="bg-linear-to-br from-orange-50 via-white to-red-50">
    <div class="min-h-screen flex items-center justify-center px-4 py-8">
        <div class="flex flex-col lg:flex-row items-center justify-center gap-8 lg:gap-20 max-w-6xl w-full">
            
            <!-- Gambar KKSE di kiri (hidden on mobile) -->
            <img src="{{ asset('images/kkse.png') }}" 
                 alt="Header KKSE" 
                 class="hidden lg:block w-64 lg:w-80 h-auto object-contain">

            <!-- Form Login + Logo di kanan -->
            <div class="w-full max-w-md">

                <!-- Logo -->
                <div class="flex flex-col justify-center items-center mb-8">
                    <img src="{{ asset('images/image.png') }}" 
                         alt="Header KKSE" 
                         class="w-48 lg:w-80 h-auto object-contain">
                </div>

                <!-- Session Status -->
                @if (session('status'))
                    <div class="mb-4 text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="bg-white rounded-xl shadow-xl p-8 border border-orange-100">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Masuk Akun KKSE</h2>
                    
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Username -->
                        <div>
                            <label for="username" class="block text-sm font-semibold text-gray-700 mb-2">Username</label>
                            <input id="username" 
                                   class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 focus:bg-white text-gray-900 transition-all" 
                                   type="text" 
                                   name="username" 
                                   value="{{ old('username') }}" 
                                   placeholder="Masukkan username"
                                   required autofocus autocomplete="username" />

                            @if($errors->has('username'))
                                <p class="text-red-500 text-sm mt-2">{{ $errors->first('username') }}</p>
                            @endif
                        </div>

                        <!-- Password -->
                        <div class="mt-5">
                            <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                            <input id="password" 
                                   class="w-full px-4 py-3 bg-gray-50 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 focus:bg-white text-gray-900 transition-all"
                                   type="password"
                                   name="password"
                                   placeholder="Masukkan password"
                                   required autocomplete="current-password" />

                            @if($errors->has('password'))
                                <p class="text-red-500 text-sm mt-2">{{ $errors->first('password') }}</p>
                            @endif
                        </div>

                        <!-- Remember Me -->
                        <div class="block mt-5">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded text-orange-600 shadow-sm focus:ring-orange-500" name="remember">
                                <span class="ms-2 text-sm text-gray-600">{{ __('Ingat saya') }}</span>
                            </label>
                        </div>

                        <div class="flex flex-col gap-3 mt-7">
                            <button type="submit"
                                class="w-full bg-linear-to-r from-orange-500 to-red-600 text-white font-bold py-3 px-6 rounded-lg hover:from-orange-600 hover:to-red-700 transition-all duration-200 shadow-lg transform hover:scale-[1.02] active:scale-[0.98]">
                                {{ __('Masuk') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="text-center text-sm text-gray-600 hover:text-orange-600 transition-colors"
                                   href="{{ route('password.request') }}">
                                    {{ __('Lupa password?') }}
                                </a>
                            @endif
                        </div>
                    </form>
                </div>

                <!-- Back to Form -->
                <div class="text-center mt-6">
                    <a href="{{ route('visitor.form') }}" 
                       class="text-sm text-gray-600 hover:text-orange-600">
                        ← Kembali ke Form Pengunjung
                    </a>
                </div>

            </div><!-- End kanan -->
        </div>
    </div>
</body>
</html>
