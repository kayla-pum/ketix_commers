<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Ketix</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center font-[Inter]">

    <div class="w-full max-w-md bg-white rounded-3xl shadow-2xl p-8">

        <!-- Logo -->
        <div class="flex flex-col items-center mb-8">

            <div class="w-20 h-20 bg-[#334EAC] rounded-2xl flex items-center justify-center shadow-lg">
                <img src="{{ asset('assets/logo2.png') }}" 
                     alt="Logo" 
                     class="w-10 h-10">
            </div>

            <h1 class="text-3xl font-bold text-gray-800 mt-4">
                Login
            </h1>

            <p class="text-gray-500 mt-2">
                Masuk ke akun Ketix Anda
            </p>
        </div>

        <!-- Error -->
        @if($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded-xl mb-5">
                {{ $errors->first() }}
            </div>
        @endif

        <!-- Form -->
        <form action="{{ route('login.post') }}" method="POST">

            @csrf

            <!-- Email -->
            <div class="mb-5">

                <label class="block text-gray-700 mb-2 font-medium">
                    Email
                </label>

                <div class="relative">

                    <i class="fa-solid fa-envelope absolute left-4 top-4 text-gray-400"></i>

                    <input 
                        type="email"
                        name="email"
                        placeholder="Masukkan email"
                        class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#334EAC]"
                        required
                    >

                </div>
            </div>

            <!-- Password -->
            <div class="mb-6">

                <label class="block text-gray-700 mb-2 font-medium">
                    Password
                </label>

                <div class="relative">

                    <i class="fa-solid fa-lock absolute left-4 top-4 text-gray-400"></i>

                    <input 
                        type="password"
                        name="password"
                        placeholder="Masukkan password"
                        class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#334EAC]"
                        required
                    >

                </div>
            </div>

            <!-- Button -->
            <button 
                type="submit"
                class="w-full bg-[#334EAC] hover:bg-[#2a3e8a] text-white py-3 rounded-xl font-semibold transition duration-300 shadow-md"
            >
                Masuk
            </button>

        </form>

        <!-- Register -->
        <div class="text-center mt-6">

            <p class="text-gray-500">
                Belum punya akun?

                <a href="{{ route('register') }}"
                   class="text-[#334EAC] font-semibold hover:underline">
                    Daftar
                </a>
            </p>

        </div>

    </div>

</body>
</html>