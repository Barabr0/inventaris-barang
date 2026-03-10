<body class="bg-background text-slate-800 font-sans">

    <div class="flex h-screen overflow-hidden">

        <aside class="w-72 bg-primary text-slate-400 hidden md:flex flex-col border-r border-slate-800">
            <div class="p-8 flex items-center gap-3 border-b border-slate-800/50">
                <div class="bg-accent p-2 rounded-xl">
                    <i class="fas fa-box-open text-white text-xl"></i>
                </div>
                <div>
                    <h1 class="text-white font-bold leading-none tracking-tight">INV<span class="text-accent">PRO</span></h1>
                </div>
            </div>

            <nav class="flex-grow p-5 space-y-1.5 overflow-y-auto custom-scrollbar">
                <p class="text-[11px] font-bold text-slate-500 uppercase px-4 py-3">Menu</p>
                            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center py-3 px-4 rounded-xl
                {{ request()->routeIs('admin.dashboard') ? 'bg-accent/10 text-accent border border-accent/20' : 'hover:bg-secondary hover:text-white' }} transition-all">
                    <i class="fas fa-chart-pie mr-3 w-5"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('admin.barangadmin') }}"
                class="flex items-center py-3 px-4 rounded-xl
                {{ request()->routeIs('admin.barangadmin') ? 'bg-accent/10 text-accent border border-accent/20' : 'hover:bg-secondary hover:text-white' }} transition-all">
                    <i class="fas fa-boxes-stacked mr-3 w-5"></i>
                    <span>Barang</span>
                </a>
              <a href="{{ route('admin.barangmasukadmin') }}"
                class="flex items-center py-3 px-4 rounded-xl
                {{ request()->routeIs('admin.barangmasukadmin') ? 'bg-accent/10 text-accent border border-accent/20' : 'hover:bg-secondary hover:text-white' }} transition-all">
                    <i class="fa-solid fa-truck-ramp-box mr-3 w-5"></i>
                    <span> Barang Masuk</span>
                </a>
              <a href="{{ route('admin.barangkeluaradmin') }}"
                class="flex items-center py-3 px-4 rounded-xl
                {{ request()->routeIs('admin.barangkeluaradmin') ? 'bg-accent/10 text-accent border border-accent/20' : 'hover:bg-secondary hover:text-white' }} transition-all">
                    <i class="fa-solid fa-truck-moving mr-3 w-5"></i>
                    <span> Barang Keluar</span>
                </a>
              <a href="{{ route('admin.peminjamanadmin') }}"
                class="flex items-center py-3 px-4 rounded-xl
                {{ request()->routeIs('admin.peminjamanadmin') ? 'bg-accent/10 text-accent border border-accent/20' : 'hover:bg-secondary hover:text-white' }} transition-all">
                    <i class="fas fa-handshake mr-3 w-5"></i>
                    <span>Peminjaman</span>
                </a>
              <a href="{{ route('admin.useradmin') }}"
                class="flex items-center py-3 px-4 rounded-xl
                {{ request()->routeIs('admin.useradmin') ? 'bg-accent/10 text-accent border border-accent/20' : 'hover:bg-secondary hover:text-white' }} transition-all">
                    <i class="fas fa-user mr-3 w-5"></i>
                    <span>User</span>
                </a>
                <a href="{{route('home')}}" class="flex items-center py-3 px-4 rounded-xl hover:bg-secondary hover:text-white transition-all">
                    <i class="fas fa-home mr-3 w-5"></i> <span>Home</span>
                </a>
            </nav>

            <div class="p-4 border-t border-slate-800/50">
                <form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit" class="w-full flex items-center justify-center gap-2 py-2.5 text-xs font-bold text-rose-400 bg-rose-500/5 hover:bg-rose-500/10 border border-rose-500/20 rounded-xl transition-all">
        <i class="bx bx-power-off"></i> LOGOUT
    </button>
</form>
            </div>
</aside>
