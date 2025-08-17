<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Dark Theme</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-gray-900 text-white min-h-screen flex items-center justify-center">


    <div class="w-full max-w-md bg-gray-800 p-8 rounded-xl shadow-md">
        @if (session('error'))
            <div class="mb-4 p-4 bg-red-800 border border-red-600 text-red-200 rounded">
                {{ session('error') }}
            </div>
        @endif

        <h2 class="text-2xl font-semibold text-center mb-6">Login</h2>

        <form action="{{ route('login') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label for="email" class="block text-sm mb-1 text-gray-300">Email</label>
                <input type="email" id="email" name="email" required
                    class="w-full px-4 py-2 bg-gray-700 text-white border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500" />
            </div>

            <div>
                <label for="password" class="block text-sm mb-1 text-gray-300">Password</label>
                <input type="password" id="password" name="password" required
                    class="w-full px-4 py-2 bg-gray-700 text-white border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500" />
            </div>

            <button type="submit"
                class="w-full bg-purple-600 hover:bg-purple-700 transition duration-200 text-white font-semibold py-2 rounded-md">
                Login
            </button>
        </form>


    </div>

</body>

</html>
