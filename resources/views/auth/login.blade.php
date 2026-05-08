<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Roudhotul Ilmi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; vertical-align: middle; }
    </style>
</head>
<body class="bg-gradient-to-br from-green-900 via-green-800 to-green-700 min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-md">
        <!-- Card -->
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-br from-green-800 to-green-600 p-8 text-center">
                <div class="w-20 h-20 bg-white/20 rounded-2xl flex items-center justify-center mx-auto mb-4 border-2 border-white/30">
                    <img src="{{ asset('images/Logo.jpg') }}" alt="Logo" class="w-16 h-16 object-contain rounded-xl" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <span class="material-symbols-outlined text-white text-4xl hidden">school</span>
                </div>
                <h1 class="text-white font-bold text-xl mb-1">Roudhotul Ilmi</h1>
                <p class="text-white/70 text-sm">Panel Admin Sistem Informasi Manajemen</p>
            </div>

            <!-- Form -->
            <div class="p-8">
                @if(session('success'))
                <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-xl mb-5 flex items-center gap-2 text-sm">
                    <span class="material-symbols-outlined text-green-600 text-lg">check_circle</span>
                    {{ session('success') }}
                </div>
                @endif

                @if($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl mb-5 text-sm">
                    @foreach($errors->all() as $error)
                    <p class="flex items-center gap-2"><span class="material-symbols-outlined text-sm">error</span> {{ $error }}</p>
                    @endforeach
                </div>
                @endif

                <form action="{{ route('login.post') }}" method="POST" class="space-y-5">
                    @csrf
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Email Admin</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-gray-400 text-xl">mail</span>
                            <input type="email" name="email" value="{{ old('email') }}" required autofocus
                                   class="w-full pl-11 pr-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent text-sm"
                                   placeholder="admin@roudhotulilmi.sch.id">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-gray-400 text-xl">lock</span>
                            <input type="password" name="password" id="password" required
                                   class="w-full pl-11 pr-12 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent text-sm"
                                   placeholder="••••••••">
                            <button type="button" onclick="togglePwd()" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                                <span class="material-symbols-outlined text-xl" id="pwd-eye">visibility</span>
                            </button>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <input type="checkbox" name="remember" id="remember" class="accent-green-700 w-4 h-4 rounded">
                        <label for="remember" class="text-sm text-gray-600">Ingat saya</label>
                    </div>
                    <button type="submit"
                            class="w-full bg-gradient-to-r from-green-800 to-green-600 text-white py-3 rounded-xl font-semibold text-sm hover:from-green-900 hover:to-green-700 transition-all shadow-lg hover:shadow-xl">
                        Masuk ke Panel Admin
                    </button>
                </form>

                <div class="mt-6 text-center">
                    <a href="{{ route('home') }}" class="text-sm text-gray-500 hover:text-green-700 flex items-center justify-center gap-1">
                        <span class="material-symbols-outlined text-sm">arrow_back</span> Kembali ke Website
                    </a>
                </div>
            </div>
        </div>

        <p class="text-center text-white/50 text-xs mt-6">© {{ date('Y') }} Roudhotul Ilmi. Akses terbatas.</p>
    </div>

    <script>
        function togglePwd() {
            var inp = document.getElementById('password');
            var eye = document.getElementById('pwd-eye');
            if (inp.type === 'password') { inp.type = 'text'; eye.textContent = 'visibility_off'; }
            else { inp.type = 'password'; eye.textContent = 'visibility'; }
        }
    </script>
</body>
</html>
