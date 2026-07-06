<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin — {{ config('app.name') }}</title>
    @fonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen items-center justify-center hero-pattern px-4">
    <div class="w-full max-w-md">
        <div class="admin-card shadow-xl">
            <div class="mb-8 text-center">
                <p class="section-label justify-center">Admin Panel</p>
                <h1 class="mt-3 font-display text-2xl font-bold text-navy-900">Masuk ke Dashboard</h1>
                <p class="mt-2 text-sm text-navy-600">Kelola konten landing page PT Trivora Mitra Berkarya</p>
            </div>

            @if ($errors->any())
                <div class="admin-alert-error">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('admin.login.store') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="admin-label">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        class="admin-input"
                        placeholder="admin@trivora.local"
                    >
                </div>

                <div>
                    <label for="password" class="admin-label">Kata Sandi</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        required
                        class="admin-input"
                        placeholder="••••••••"
                    >
                </div>

                <label class="flex items-center gap-2 text-sm text-navy-600">
                    <input type="checkbox" name="remember" value="1" class="rounded border-silver-300 text-gold-600 focus:ring-gold-500" {{ old('remember') ? 'checked' : '' }}>
                    Ingat saya
                </label>

                <button type="submit" class="admin-btn-primary w-full py-2.5">
                    Masuk
                </button>
            </form>

            <p class="mt-6 text-center text-xs text-navy-500">
                <a href="{{ url('/') }}" class="text-gold-600 hover:underline">← Kembali ke situs</a>
            </p>
        </div>
    </div>
</body>
</html>
