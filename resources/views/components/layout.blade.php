<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Laravel App' }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @vite(['resources/css/app.css'])
</head>

<body class="min-h-screen bg-background font-sans antialiased text-foreground">

<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <header class="flex h-16 items-center justify-between border-b border-border">
        <div class="flex items-center gap-6">
            <h1 class="text-lg font-semibold tracking-tight">{{ __('app.app_title') }}</h1>
            <nav class="hidden md:flex items-center gap-4 text-sm font-medium">
                <a href="{{ route('tasks.index') }}" class="transition-colors hover:text-primary">
                    {{ __('Liste des tâches') }}
                </a>
                @auth
                    <a href="/dashboard" class="text-muted-foreground transition-colors hover:text-primary">Dashboard</a>
                @endauth
            </nav>
        </div>

        <div class="flex items-center gap-4">
            <div class="flex bg-muted rounded-md p-1">
                <a href="{{ route('lang.switch', 'fr') }}" class="px-2 py-0.5 text-xs rounded {{ app()->getLocale() == 'fr' ? 'bg-white shadow-sm' : '' }}">FR</a>
                <a href="{{ route('lang.switch', 'en') }}" class="px-2 py-0.5 text-xs rounded {{ app()->getLocale() == 'en' ? 'bg-white shadow-sm' : '' }}">EN</a>
            </div>

            @auth
                <div class="flex items-center gap-3">
                    <span class="text-sm text-muted-foreground">Bonjour, <strong>{{ Auth::user()->name }}</strong></span>
                    <a href="/settings/profile" class="inline-flex h-9 items-center justify-center rounded-md border border-input bg-background px-3 text-sm font-medium ring-offset-background transition-colors hover:bg-accent hover:text-accent-foreground">
                        Profil
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="inline-flex h-9 items-center justify-center rounded-md bg-destructive px-3 text-sm font-medium text-destructive-foreground transition-colors hover:bg-destructive/90">
                            Déconnexion
                        </button>
                    </form>
                </div>
            @endauth

            @guest
                <div class="flex items-center gap-2">
                    <a href="{{ route('login') }}" class="text-sm font-medium hover:underline">Connexion</a>
                    <a href="{{ route('register') }}" class="inline-flex h-9 items-center justify-center rounded-md bg-primary px-4 text-sm font-medium text-primary-foreground transition-colors hover:bg-primary/90">
                        Inscription
                    </a>
                </div>
            @endguest
        </div>
    </header>

    <main class="py-10">
        {{ $slot }}
    </main>

    <footer class="border-t border-border py-6 text-center text-sm text-muted-foreground">
        &copy; {{ date('Y') }} Laravel MVC – Démo Informatics
    </footer>
</div>

</body>
</html>
