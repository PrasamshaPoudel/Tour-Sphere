@extends('layouts.app')

@section('title', 'Login & Signup - Tour Sphere Nepal')

@section('content')
{{-- HERO SECTION --}}
<section class="hero">
    <div class="hero-bg" style="background-image:url('{{ asset('images/back.jpg') }}')"></div>
    <div class="hero-overlay"></div>

    <div class="hero-content">
        <h1>Join <span>Tour Sphere</span></h1>
        <p>Create your account and start your adventure in Nepal</p>
    </div>

    {{-- bottom wave --}}
    <svg class="wave" viewBox="0 0 1440 100" preserveAspectRatio="none">
        <path d="M0,80 C300,120 600,0 900,60 C1100,100 1300,80 1440,60 L1440,100 L0,100 Z"></path>
    </svg>
</section>

<div class="min-h-screen bg-gradient-to-br from-purple-50 via-indigo-50 to-pink-50 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl w-full">
        <!-- Main Container -->
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
            <!-- Forms Section -->
            <div class="w-full p-8 lg:p-12 relative overflow-hidden">
                <!-- Simple Toggle Section -->
                <div class="text-center mb-8">
                    <button type="button" id="toggleAuth" 
                            class="inline-flex items-center px-8 py-3 text-lg font-semibold rounded-xl transition-all duration-300 bg-gradient-to-r from-purple-600 to-indigo-600 text-white hover:from-purple-700 hover:to-indigo-700 shadow-lg transform hover:scale-105">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <span id="toggleText">Register</span>
                    </button>
                    <p class="mt-3 text-sm text-gray-600" id="toggleSubtext">Create your account to get started</p>
                </div>

                    <!-- Login Form -->
                    <div id="loginForm" class="space-y-8 hidden form-container">
                        <!-- Form Header with Elegant Design -->
                        <div class="text-center mb-10">
                            <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-purple-100 to-indigo-100 rounded-2xl mb-4 shadow-lg">
                                <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                                </svg>
                            </div>
                            <h2 class="text-3xl font-bold text-gray-900 mb-3">Welcome Back</h2>
                            <p class="text-lg text-gray-600 font-medium">Sign in to your Tour Sphere account</p>
                            <div class="w-16 h-1 bg-gradient-to-r from-purple-500 to-indigo-500 rounded-full mx-auto mt-4"></div>
                        </div>
                            
                            <!-- Success Message -->
                            @if(session('success'))
                                <div class="mt-4 bg-green-50 border border-green-200 rounded-lg p-4">
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <!-- Error Messages -->
                            @if($errors->any())
                                <div class="mt-4 bg-red-50 border border-red-200 rounded-lg p-4">
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <div class="text-sm text-red-800">
                                                @foreach($errors->all() as $error)
                                                    <p>{{ $error }}</p>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <form action="{{ route('login.post') }}" method="POST" class="space-y-6">
                            @csrf
                            
                            <!-- Email Field -->
                            <div class="form-group">
                                <label for="loginEmail" class="block text-sm font-semibold text-gray-700 mb-3">
                                    Email Address
                                </label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-purple-400 group-focus-within:text-purple-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                        </svg>
                                    </div>
                                    <input id="loginEmail" name="email" type="email" required 
                                           class="appearance-none relative block w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-2xl placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-4 focus:ring-purple-500/20 focus:border-purple-500 transition-all duration-300 bg-white/80 backdrop-blur-sm"
                                           placeholder="Enter your email address"
                                           value="{{ old('email') }}">
                                </div>
                                @error('email')
                                    <p class="mt-2 text-sm text-red-500 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Password Field -->
                            <div class="form-group">
                                <label for="loginPassword" class="block text-sm font-semibold text-gray-700 mb-3">
                                    Password
                                </label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-purple-400 group-focus-within:text-purple-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                        </svg>
                                    </div>
                                    <input id="loginPassword" name="password" type="password" required 
                                           class="appearance-none relative block w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-2xl placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-4 focus:ring-purple-500/20 focus:border-purple-500 transition-all duration-300 bg-white/80 backdrop-blur-sm"
                                           placeholder="Enter your password">
                                </div>
                                @error('password')
                                    <p class="mt-2 text-sm text-red-500 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Remember Me & Forgot Password -->
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <input id="remember_me" name="remember" type="checkbox" 
                                           class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded">
                                    <label for="remember_me" class="ml-2 block text-sm text-gray-700">
                                        Remember me
                                    </label>
                                </div>
                                <div class="text-sm">
                                    <a href="#" class="font-medium text-purple-600 hover:text-purple-500 transition-colors">
                                        Forgot password?
                                    </a>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" 
                                    class="w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-xl text-white bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition-all duration-300 transform hover:scale-105 shadow-lg">
                                Sign In
                            </button>
                        </form>

                        <!-- Social Login -->
                        <div class="relative">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-2 bg-white text-gray-500">Or continue with</span>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-3">
                            <button type="button" 
                                    class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-xl shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 transition-colors">
                                <svg class="h-5 w-5" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                                    <path fill="currentColor" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                                    <path fill="currentColor" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                                    <path fill="currentColor" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                                </svg>
                                <span class="ml-2">Google</span>
                            </button>
                            <button type="button" 
                                    class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-xl shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 transition-colors">
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                                </svg>
                                <span class="ml-2">Twitter</span>
                            </button>
                        </div>
                    </div>

                    <!-- Signup Form -->
                    <div id="signupForm" class="space-y-8 form-container">
                        <!-- Form Header with Elegant Design -->
                        <div class="text-center mb-10">
                            <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-purple-100 to-indigo-100 rounded-2xl mb-4 shadow-lg">
                                <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                                </svg>
                            </div>
                            <h2 class="text-3xl font-bold text-gray-900 mb-3">Join Tour Sphere</h2>
                            <p class="text-lg text-gray-600 font-medium">Create your account and start your adventure</p>
                            <div class="w-16 h-1 bg-gradient-to-r from-purple-500 to-indigo-500 rounded-full mx-auto mt-4"></div>
                        </div>

                        <form action="{{ route('register.post') }}" method="POST" class="space-y-6">
                            @csrf
                            
                            <!-- Full Name Field -->
                            <div>
                                <label for="signupName" class="block text-sm font-medium text-gray-700 mb-2">
                                    Full Name
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    </div>
                                    <input id="signupName" name="name" type="text" required 
                                           class="appearance-none relative block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-xl placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-colors"
                                           placeholder="Enter your full name"
                                           value="{{ old('name') }}">
                                </div>
                                @error('name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Email Field -->
                            <div>
                                <label for="signupEmail" class="block text-sm font-medium text-gray-700 mb-2">
                                    Email Address
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                        </svg>
                                    </div>
                                    <input id="signupEmail" name="email" type="email" required 
                                           class="appearance-none relative block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-xl placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-colors"
                                           placeholder="Enter your email address"
                                           value="{{ old('email') }}">
                                </div>
                                @error('email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Phone Field -->
                            <div>
                                <label for="signupPhone" class="block text-sm font-medium text-gray-700 mb-2">
                                    Phone Number
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                        </svg>
                                    </div>
                                    <input id="signupPhone" name="phone" type="tel" required 
                                           class="appearance-none relative block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-xl placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-colors"
                                           placeholder="Enter your phone number"
                                           value="{{ old('phone') }}">
                                </div>
                                @error('phone')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Password Field -->
                            <div>
                                <label for="signupPassword" class="block text-sm font-medium text-gray-700 mb-2">
                                    Password
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                        </svg>
                                    </div>
                                    <input id="signupPassword" name="password" type="password" required 
                                           class="appearance-none relative block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-xl placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-colors"
                                           placeholder="Create a strong password">
                                </div>
                                @error('password')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Confirm Password Field -->
                            <div>
                                <label for="signupPasswordConfirmation" class="block text-sm font-medium text-gray-700 mb-2">
                                    Confirm Password
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <input id="signupPasswordConfirmation" name="password_confirmation" type="password" required 
                                           class="appearance-none relative block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-xl placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-colors"
                                           placeholder="Confirm your password">
                                </div>
                            </div>

                            <!-- Terms and Conditions -->
                            <div class="flex items-center">
                                <input id="terms" name="terms" type="checkbox" required 
                                       class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded">
                                <label for="terms" class="ml-2 block text-sm text-gray-700">
                                    I agree to the 
                                    <a href="#" class="text-purple-600 hover:text-purple-500">Terms of Service</a> and 
                                    <a href="#" class="text-purple-600 hover:text-purple-500">Privacy Policy</a>
                                </label>
                            </div>

                            <!-- Newsletter Subscription -->
                            <div class="flex items-center">
                                <input id="newsletter" name="newsletter" type="checkbox" 
                                       class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded">
                                <label for="newsletter" class="ml-2 block text-sm text-gray-700">
                                    Subscribe to our newsletter for travel updates and special offers
                                </label>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" 
                                    class="w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-xl text-white bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition-all duration-300 transform hover:scale-105 shadow-lg">
                                Create Account
                            </button>
                        </form>

                        <!-- Social Signup -->
                        <div class="relative">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-2 bg-white text-gray-500">Or sign up with</span>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-3">
                            <button type="button" 
                                    class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-xl shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 transition-colors">
                                <svg class="h-5 w-5" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                                    <path fill="currentColor" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                                    <path fill="currentColor" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                                    <path fill="currentColor" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                                </svg>
                                <span class="ml-2">Google</span>
                            </button>
                            <button type="button" 
                                    class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-xl shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 transition-colors">
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                                </svg>
                                <span class="ml-2">Twitter</span>
                            </button>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const toggleAuth = document.getElementById('toggleAuth');
    const toggleText = document.getElementById('toggleText');
    const toggleSubtext = document.getElementById('toggleSubtext');
    const loginForm = document.getElementById('loginForm');
    const signupForm = document.getElementById('signupForm');
    
    let isLoginMode = false;

    // Function to toggle between login and signup with elegant animations
    function toggleAuthMode() {
        isLoginMode = !isLoginMode;
        
        if (isLoginMode) {
            // Switch to Login with elegant transition
            toggleText.textContent = 'Login';
            toggleSubtext.textContent = 'Already have an account? Sign in here';
            
            // Add exit animation to current form
            signupForm.style.animation = 'slideOutToRight 0.4s cubic-bezier(0.4, 0, 0.2, 1)';
            
            setTimeout(() => {
                signupForm.classList.add('hidden');
                loginForm.classList.remove('hidden');
                
                // Add elegant entrance animation
                loginForm.style.animation = 'slideInFromLeft 0.7s cubic-bezier(0.4, 0, 0.2, 1)';
                
                // Add stagger animation to form elements
                const formElements = loginForm.querySelectorAll('.form-group, .space-y-6 > div');
                formElements.forEach((element, index) => {
                    element.style.opacity = '0';
                    element.style.transform = 'translateY(20px)';
                    setTimeout(() => {
                        element.style.transition = 'all 0.5s cubic-bezier(0.4, 0, 0.2, 1)';
                        element.style.opacity = '1';
                        element.style.transform = 'translateY(0)';
                    }, 200 + (index * 100));
                });
                
                setTimeout(() => {
                    loginForm.style.animation = '';
                }, 700);
            }, 400);
        } else {
            // Switch to Signup with elegant transition
            toggleText.textContent = 'Register';
            toggleSubtext.textContent = 'Create your account to get started';
            
            // Add exit animation to current form
            loginForm.style.animation = 'slideOutToLeft 0.4s cubic-bezier(0.4, 0, 0.2, 1)';
            
            setTimeout(() => {
                loginForm.classList.add('hidden');
                signupForm.classList.remove('hidden');
                
                // Add elegant entrance animation
                signupForm.style.animation = 'slideInFromRight 0.7s cubic-bezier(0.4, 0, 0.2, 1)';
                
                // Add stagger animation to form elements
                const formElements = signupForm.querySelectorAll('.form-group, .space-y-6 > div');
                formElements.forEach((element, index) => {
                    element.style.opacity = '0';
                    element.style.transform = 'translateY(20px)';
                    setTimeout(() => {
                        element.style.transition = 'all 0.5s cubic-bezier(0.4, 0, 0.2, 1)';
                        element.style.opacity = '1';
                        element.style.transform = 'translateY(0)';
                    }, 200 + (index * 100));
                });
                
                setTimeout(() => {
                    signupForm.style.animation = '';
                }, 700);
            }, 400);
        }
    }

    // Event listener for toggle button
    toggleAuth.addEventListener('click', toggleAuthMode);

    // Initialize with signup form visible
    toggleAuthMode();
});
</script>

<style>
/* Hero Section Styles */
.hero {
    position: relative;
    height: 60vh;
    min-height: 400px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    overflow: hidden;
}

.hero-bg {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.4);
}

.hero-content {
    position: relative;
    z-index: 10;
    color: white;
    max-width: 800px;
    padding: 0 20px;
}

.hero-content h1 {
    font-size: 3.5rem;
    font-weight: bold;
    margin-bottom: 1rem;
    line-height: 1.2;
}

.hero-content h1 span {
    color: #3b82f6;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
}

.hero-content p {
    font-size: 1.25rem;
    opacity: 0.9;
    margin-bottom: 2rem;
}

.wave {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 100px;
    fill: #f8fafc;
}

/* Responsive Hero */
@media (max-width: 768px) {
    .hero {
        height: 50vh;
        min-height: 300px;
    }
    
    .hero-content h1 {
        font-size: 2.5rem;
    }
    
    .hero-content p {
        font-size: 1.1rem;
    }
}

/* Professional Form Animation Styles */
@keyframes slideInFromLeft {
    0% {
        opacity: 0;
        transform: translateX(-80px) scale(0.9) rotateY(-15deg);
    }
    50% {
        opacity: 0.8;
        transform: translateX(-20px) scale(0.95) rotateY(-5deg);
    }
    100% {
        opacity: 1;
        transform: translateX(0) scale(1) rotateY(0deg);
    }
}

@keyframes slideInFromRight {
    0% {
        opacity: 0;
        transform: translateX(80px) scale(0.9) rotateY(15deg);
    }
    50% {
        opacity: 0.8;
        transform: translateX(20px) scale(0.95) rotateY(5deg);
    }
    100% {
        opacity: 1;
        transform: translateX(0) scale(1) rotateY(0deg);
    }
}

@keyframes slideOutToLeft {
    0% {
        opacity: 1;
        transform: translateX(0) scale(1) rotateY(0deg);
    }
    100% {
        opacity: 0;
        transform: translateX(-80px) scale(0.9) rotateY(-15deg);
    }
}

@keyframes slideOutToRight {
    0% {
        opacity: 1;
        transform: translateX(0) scale(1) rotateY(0deg);
    }
    100% {
        opacity: 0;
        transform: translateX(80px) scale(0.9) rotateY(15deg);
    }
}

@keyframes fadeInUp {
    0% {
        opacity: 0;
        transform: translateY(30px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fadeInUp {
    animation: fadeInUp 0.8s cubic-bezier(0.4, 0, 0.2, 1) forwards;
    opacity: 0;
}

@keyframes pulse {
    0%, 100% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.05);
    }
}

/* Professional Form Container Styling */
.form-container {
    position: relative;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border-radius: 24px;
    padding: 2rem;
    box-shadow: 
        0 25px 50px -12px rgba(0, 0, 0, 0.25),
        0 0 0 1px rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.form-container::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 1px;
    background: linear-gradient(90deg, transparent, rgba(139, 92, 246, 0.3), transparent);
}

/* Enhanced Input Styling */
.form-container input[type="text"],
.form-container input[type="email"],
.form-container input[type="password"],
.form-container input[type="tel"] {
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(10px);
    border: 2px solid rgba(139, 92, 246, 0.1);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.form-container input:focus {
    background: rgba(255, 255, 255, 0.95);
    border-color: rgba(139, 92, 246, 0.3);
    box-shadow: 
        0 0 0 4px rgba(139, 92, 246, 0.1),
        0 4px 20px rgba(139, 92, 246, 0.15);
    transform: translateY(-2px);
}

/* Professional Button Enhancements */
.form-container button[type="submit"] {
    position: relative;
    overflow: hidden;
    background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 50%, #6d28d9 100%);
    box-shadow: 
        0 10px 25px rgba(139, 92, 246, 0.3),
        0 0 0 1px rgba(255, 255, 255, 0.1);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.form-container button[type="submit"]:hover {
    transform: translateY(-3px) scale(1.02);
    box-shadow: 
        0 15px 35px rgba(139, 92, 246, 0.4),
        0 0 0 1px rgba(255, 255, 255, 0.2);
}

.form-container button[type="submit"]:active {
    transform: translateY(-1px) scale(1.01);
}

/* Elegant Toggle Button Enhancements */
#toggleAuth {
    position: relative;
    overflow: hidden;
    background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 50%, #6d28d9 100%);
    box-shadow: 
        0 15px 35px rgba(139, 92, 246, 0.3),
        inset 0 1px 0 rgba(255, 255, 255, 0.2);
    transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
}

#toggleAuth:hover {
    transform: translateY(-4px) scale(1.05);
    box-shadow: 
        0 20px 40px rgba(139, 92, 246, 0.4),
        inset 0 1px 0 rgba(255, 255, 255, 0.3);
}

#toggleAuth:active {
    transform: translateY(-2px) scale(1.02);
}

/* Stagger Animation for Form Elements */
.form-container .space-y-6 > div,
.form-container .space-y-8 > div {
    opacity: 0;
    transform: translateY(20px);
    animation: fadeInUp 0.6s cubic-bezier(0.4, 0, 0.2, 1) forwards;
}

.form-container .space-y-6 > div:nth-child(1) { animation-delay: 0.1s; }
.form-container .space-y-6 > div:nth-child(2) { animation-delay: 0.2s; }
.form-container .space-y-6 > div:nth-child(3) { animation-delay: 0.3s; }
.form-container .space-y-6 > div:nth-child(4) { animation-delay: 0.4s; }
.form-container .space-y-6 > div:nth-child(5) { animation-delay: 0.5s; }
.form-container .space-y-6 > div:nth-child(6) { animation-delay: 0.6s; }

.active-tab {
    background: white;
    color: #374151;
    box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
}
</style>
@endpush
@endsection
