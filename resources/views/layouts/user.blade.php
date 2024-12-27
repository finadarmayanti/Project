<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>@yield('title')</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>
<body class="bg-gray-100 h-full">

    <div class="flex h-full">
        <div class="flex flex-col w-64 h-full bg-gray-800 text-white border-r fixed top-0 left-0">
            <div class="p-4 flex items-center justify-start space-x-3">
                <img src="/images/logo.jpg" alt="Logo" class="w-12 h-12 rounded-full"> <!-- Menyesuaikan ukuran logo -->
                <h1 class="font-bold text-lg">Pemerintah Desa</h1>
            </div>  
            <div class="my-2 bg-gray-600 h-[1px]"></div>

            <a href="/home" class="p-3 mt-3 flex items-center rounded-md hover:bg-blue-600">
                <i class="bi bi-house-door-fill text-xl"></i>
                <span class="ml-4 font-bold">Home</span>
            </a>

            <a href="{{ route('surat.create') }}" class="p-3 mt-3 flex items-center rounded-md hover:bg-blue-600">
                <i class="bi bi-file-earmark-text-fill text-xl"></i>
                <span class="ml-4 font-bold">Pengajuan Surat</span>
            </a>

            <a href="{{ route('surat.index') }}" class="p-3 mt-3 flex items-center rounded-md hover:bg-blue-600">
                <i class="bi bi-file-earmark-text-fill text-xl"></i>
                <span class="ml-4 font-bold">Riwayat Pengajuan Surat</span>
            </a>

            <a href="{{ route('user.profile') }}" class="p-3 mt-3 flex items-center rounded-md hover:bg-blue-600">
                <i class="bi bi-person-fill text-xl"></i>
                <span class="ml-4 font-bold">Profile</span>
            </a>

            <a href="{{ route('logout') }}" class="p-3 mt-4 flex items-center rounded-md hover:bg-blue-600">
                <i class="bi bi-box-arrow-in-right text-xl"></i>
                <span class="ml-4 font-bold">Logout</span>
            </a>
        </div>

        <main class="flex-1 p-6 ml-64">
            @yield('contents')
        </main>
    </div>

</body>
</html>
