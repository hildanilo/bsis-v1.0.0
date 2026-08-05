<!DOCTYPE html>
<html lang="pt-BR" class="h-full bg-slate-900 text-slate-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>BSIS - Sistema de Gestão de Montagens e Assistências</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '#eef2ff',
                            100: '#e0e7ff',
                            500: '#6366f1',
                            600: '#4f46e5',
                            700: '#4338ca',
                            800: '#3730a3',
                            900: '#312e81',
                        },
                        accent: {
                            500: '#06b6d4',
                            600: '#0891b2',
                        }
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                        heading: ['Outfit', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        .glass-card {
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
        .glass-card-hover {
            transition: all 0.3s ease;
        }
        .glass-card-hover:hover {
            transform: translateY(-2px);
            border-color: rgba(99, 102, 241, 0.4);
            box-shadow: 0 10px 25px -5px rgba(79, 70, 229, 0.25);
        }
    </style>
</head>
<body class="h-full font-sans antialiased flex flex-col md:flex-row bg-slate-950 text-slate-200 selection:bg-brand-500 selection:text-white">

    <!-- Sidebar Navigation -->
    <aside class="w-full md:w-64 bg-slate-900 border-r border-slate-800 flex flex-col shrink-0">
        <div class="p-5 flex items-center justify-between md:justify-start space-x-3 border-b border-slate-800">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-brand-600 to-accent-500 flex items-center justify-center text-white font-heading font-bold text-xl shadow-lg shadow-brand-500/20">
                B
            </div>
            <div>
                <h1 class="font-heading font-bold text-lg text-white leading-none tracking-wide">BSIS <span class="text-xs px-2 py-0.5 rounded bg-brand-500/20 text-brand-400 font-normal">v2.0</span></h1>
                <p class="text-xs text-slate-400">Montagens & Assistências</p>
            </div>
        </div>

        <!-- Menu items -->
        <nav class="flex-1 p-4 space-y-1.5 overflow-y-auto">
            <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl text-sm font-medium transition {{ request()->routeIs('dashboard') ? 'bg-brand-600 text-white shadow-lg shadow-brand-600/30' : 'text-slate-400 hover:text-slate-200 hover:bg-slate-800/60' }}">
                <i class="fa-solid fa-chart-pie w-5 text-center"></i>
                <span>Painel Principal</span>
            </a>

            <div class="pt-4 pb-1 text-xs font-semibold uppercase tracking-wider text-slate-500 px-3">Operacional</div>

            <a href="{{ route('fichas.index') }}" class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl text-sm font-medium transition {{ request()->routeIs('fichas.*') ? 'bg-brand-600 text-white shadow-lg shadow-brand-600/30' : 'text-slate-400 hover:text-slate-200 hover:bg-slate-800/60' }}">
                <i class="fa-solid fa-clipboard-list w-5 text-center"></i>
                <span>Fichas de Montagem</span>
            </a>

            <a href="{{ route('assistencias.index') }}" class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl text-sm font-medium transition {{ request()->routeIs('assistencias.*') ? 'bg-brand-600 text-white shadow-lg shadow-brand-600/30' : 'text-slate-400 hover:text-slate-200 hover:bg-slate-800/60' }}">
                <i class="fa-solid fa-wrench w-5 text-center"></i>
                <span>Assistências Técnicas</span>
            </a>

            <a href="{{ route('fechamentos.index') }}" class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl text-sm font-medium transition {{ request()->routeIs('fechamentos.*') ? 'bg-brand-600 text-white shadow-lg shadow-brand-600/30' : 'text-slate-400 hover:text-slate-200 hover:bg-slate-800/60' }}">
                <i class="fa-solid fa-file-invoice-dollar w-5 text-center"></i>
                <span>Fechamentos</span>
            </a>

            <div class="pt-4 pb-1 text-xs font-semibold uppercase tracking-wider text-slate-500 px-3">Cadastros</div>

            <a href="{{ route('clientes.index') }}" class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl text-sm font-medium transition {{ request()->routeIs('clientes.*') ? 'bg-brand-600 text-white shadow-lg shadow-brand-600/30' : 'text-slate-400 hover:text-slate-200 hover:bg-slate-800/60' }}">
                <i class="fa-solid fa-users w-5 text-center"></i>
                <span>Clientes</span>
            </a>

            <a href="{{ route('produtos.index') }}" class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl text-sm font-medium transition {{ request()->routeIs('produtos.*') ? 'bg-brand-600 text-white shadow-lg shadow-brand-600/30' : 'text-slate-400 hover:text-slate-200 hover:bg-slate-800/60' }}">
                <i class="fa-solid fa-box w-5 text-center"></i>
                <span>Produtos</span>
            </a>

            <a href="{{ route('montadores.index') }}" class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl text-sm font-medium transition {{ request()->routeIs('montadores.*') ? 'bg-brand-600 text-white shadow-lg shadow-brand-600/30' : 'text-slate-400 hover:text-slate-200 hover:bg-slate-800/60' }}">
                <i class="fa-solid fa-user-gear w-5 text-center"></i>
                <span>Montadores</span>
            </a>

            <a href="{{ route('lojas.index') }}" class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl text-sm font-medium transition {{ request()->routeIs('lojas.*') ? 'bg-brand-600 text-white shadow-lg shadow-brand-600/30' : 'text-slate-400 hover:text-slate-200 hover:bg-slate-800/60' }}">
                <i class="fa-solid fa-store w-5 text-center"></i>
                <span>Lojas</span>
            </a>
        </nav>

        <!-- User profile footer -->
        <div class="p-4 border-t border-slate-800 flex items-center justify-between">
            <div class="flex items-center space-x-3 truncate">
                <div class="w-8 h-8 rounded-full bg-slate-800 border border-slate-700 flex items-center justify-center text-brand-400 font-bold">
                    {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                </div>
                <div class="truncate text-xs">
                    <div class="font-medium text-white truncate">{{ auth()->user()->name ?? 'Usuário' }}</div>
                    <div class="text-slate-400 capitalize">{{ auth()->user()->cargo ?? 'Atendente' }}</div>
                </div>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" title="Sair" class="text-slate-400 hover:text-red-400 p-1.5 rounded-lg hover:bg-slate-800 transition">
                    <i class="fa-solid fa-right-from-bracket"></i>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div class="flex-1 flex flex-col min-w-0 overflow-y-auto">
        <!-- Top bar -->
        <header class="h-16 border-b border-slate-800/80 bg-slate-900/60 backdrop-blur-md px-6 flex items-center justify-between sticky top-0 z-30">
            <h2 class="text-lg font-heading font-semibold text-white">
                @yield('title', 'Painel')
            </h2>

            <div class="flex items-center space-x-4">
                <div class="text-xs text-slate-400 hidden sm:block">
                    <i class="fa-regular fa-clock mr-1 text-slate-500"></i> {{ date('d/m/Y') }}
                </div>
                @yield('header_actions')
            </div>
        </header>

        <!-- Flash messages -->
        <main class="flex-1 p-6 space-y-6">
            @if(session('success'))
                <div class="p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-sm flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <i class="fa-solid fa-circle-check text-lg"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                    <button onclick="this.parentElement.remove()" class="text-emerald-400 hover:text-emerald-200">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
            @endif

            @if($errors->any())
                <div class="p-4 rounded-xl bg-rose-500/10 border border-rose-500/20 text-rose-400 text-sm space-y-1">
                    <div class="flex items-center space-x-3 font-semibold">
                        <i class="fa-solid fa-triangle-exclamation text-lg"></i>
                        <span>Por favor, verifique os erros abaixo:</span>
                    </div>
                    <ul class="list-disc pl-9 text-xs space-y-0.5">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

</body>
</html>
