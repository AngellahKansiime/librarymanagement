<!DOCTYPE html>
<html>
<head>
    <title>Choose Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">

    <div class="bg-white p-8 rounded-xl shadow-lg text-center space-y-6">
        <h1 class="text-2xl font-bold text-gray-800">Welcome to the System</h1>
        <p class="text-gray-600">Please choose how you want to login:</p>

        <div class="flex justify-center space-x-6">
            <a href="{{ route('login') }}" 
               class="px-6 py-3 bg-blue-600 text-black rounded-lg shadow hover:bg-blue-700">
                Student Login
            </a>

            <a href="{{ route('adminlogin') }}" 
               class="px-6 py-3 bg-green-600 text-blue rounded-lg shadow hover:bg-green-700">
               Admin Login
            </a>
        </div>
    </div>

</body>
</html>
