
                    <!DOCTYPE html>
                    <html lang="id">
                    <head>
                        <meta charset="utf-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <title>Dashboard Admin - KKSE</title>
                        @vite(['resources/css/app.css', 'resources/js/app.js'])
                    </head>
                    <body class="bg-gray-50 min-h-screen">
                        <nav class="bg-white shadow sticky top-0 z-50">
                            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                                <div class="flex justify-between h-16 items-center">
                                    <div class="flex items-center gap-3">
                                        <div class="rounded-full p-1 bg-gradient-to-r from-orange-500 to-red-600 flex items-center justify-center">
                                            <img src="{{ asset('images/kkse.png') }}" alt="KKSE" class="w-10 h-10 rounded-full bg-white p-1 object-contain">
                                        </div>
                                        <div>
                                            <div class="text-s font-bold text-gray-800">Kelompok Keilmuan</div>
                                            <div class="text-sm text-gray-500">Sistem Enterprise - Admin</div>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="{{ route('landing') }}" class="text-sm text-gray-600 hover:text-gray-900">Kembali ke situs</a>
                                    </div>
                                </div>
                            </div>
                        </nav>

                        <main class="py-10">
                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                <!-- Statistic Cards -->
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                                    <!-- Total Pengunjung Card -->
                                    <div class="bg-linear-to-br from-orange-50 to-red-50 overflow-hidden shadow-lg rounded-lg border-l-4 border-orange-500">
                                        <div class="p-6">
                                            <div class="flex items-center justify-between">
                                                <div>
                                                    <p class="text-sm font-medium text-orange-600 uppercase tracking-wide">Total Pengunjung</p>
                                                    <p class="text-4xl font-bold text-orange-900 mt-2">{{ $totalVisitors }}</p>
                                                    <p class="mt-2 text-xs font-semibold {{ $totalVisitorsChangePct >= 0 ? 'text-green-700' : 'text-red-700' }}">
                                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-bold {{ $totalVisitorsChangePct >= 0 ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                                            @if($totalVisitorsChangePct >= 0)
                                                                ▲ {{ $totalVisitorsChangePct }}%
                                                            @else
                                                                ▼ {{ abs($totalVisitorsChangePct) }}%
                                                            @endif
                                                        </span>
                                                        <span class="ml-1 text-[11px] text-gray-600 font-normal">vs 7 hari sebelumnya</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Dosen Card -->
                                    <div class="bg-linear-to-br from-red-50 to-red-100 overflow-hidden shadow-lg rounded-lg border-l-4 border-red-500">
                                        <div class="p-6">
                                            <div class="flex items-center justify-between">
                                                <div>
                                                    <p class="text-sm font-medium text-red-600 uppercase tracking-wide">Dosen/Pegawai</p>
                                                    <p class="text-4xl font-bold text-red-900 mt-2">{{ $countDosen }}</p>
                                                    <p class="mt-2 text-xs font-semibold {{ $countDosenChangePct >= 0 ? 'text-green-700' : 'text-red-700' }}">
                                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-bold {{ $countDosenChangePct >= 0 ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                                            @if($countDosenChangePct >= 0)
                                                                ▲ {{ $countDosenChangePct }}%
                                                            @else
                                                                ▼ {{ abs($countDosenChangePct) }}%
                                                            @endif
                                                        </span>
                                                        <span class="ml-1 text-[11px] text-gray-600 font-normal">vs 7 hari sebelumnya</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Mahasiswa Card -->
                                    <div class="bg-linear-to-br from-amber-50 to-amber-100 overflow-hidden shadow-lg rounded-lg border-l-4 border-amber-500">
                                        <div class="p-6">
                                            <div class="flex items-center justify-between">
                                                <div>
                                                    <p class="text-sm font-medium text-amber-600 uppercase tracking-wide">Mahasiswa</p>
                                                    <p class="text-4xl font-bold text-amber-900 mt-2">{{ $countMahasiswa }}</p>
                                                    <p class="mt-2 text-xs font-semibold {{ $countMahasiswaChangePct >= 0 ? 'text-green-700' : 'text-red-700' }}">
                                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-bold {{ $countMahasiswaChangePct >= 0 ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                                            @if($countMahasiswaChangePct >= 0)
                                                                ▲ {{ $countMahasiswaChangePct }}%
                                                            @else
                                                                ▼ {{ abs($countMahasiswaChangePct) }}%
                                                            @endif
                                                        </span>
                                                        <span class="ml-1 text-[11px] text-gray-600 font-normal">vs 7 hari sebelumnya</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Tabel Pengunjung Terbaru -->
                                <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                                    <div class="p-6">
                                        <h3 class="text-lg font-bold text-gray-900 mb-6 flex items-center">
                                            <svg class="w-6 h-6 mr-3 text-orange-600" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"></path>
                                                </svg>
                                            Pengunjung Terbaru
                                        </h3>
                        <div class="flex items-center justify-between mb-6">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.dashboard') }}" class="text-sm text-gray-600 hover:text-gray-900">Reset</a>
                                <a href="{{ route('admin.dashboard.export', array_merge(request()->query(), ['format' => 'csv'])) }}" class="inline-flex items-center px-3 py-2 bg-orange-500 text-white text-sm rounded-md shadow hover:bg-orange-600">Export CSV</a>
                                <a href="{{ route('admin.dashboard.export', array_merge(request()->query(), ['format' => 'print'])) }}" target="_blank" class="inline-flex items-center px-3 py-2 bg-gray-100 text-gray-800 text-sm rounded-md shadow hover:bg-gray-200">Print / PDF</a>
                            </div>
                        </div>

                        <!-- Filters -->
                        <form id="filter-form" method="GET" action="{{ route('admin.dashboard') }}" class="mb-4 grid grid-cols-1 md:grid-cols-4 gap-3">
                            <div>
                                <label class="text-xs text-gray-600">Start Date</label>
                                <input type="date" name="start_date" value="{{ request('start_date') }}" class="w-full mt-1 px-3 py-2 border rounded-md">
                            </div>
                            <div>
                                <label class="text-xs text-gray-600">End Date</label>
                                <input type="date" name="end_date" value="{{ request('end_date') }}" class="w-full mt-1 px-3 py-2 border rounded-md">
                            </div>
                            <div>
                                <label class="text-xs text-gray-600">Tingkat</label>
                                <select name="tingkat" class="w-full mt-1 px-3 py-2 border rounded-md">
                                    <option value="">Semua</option>
                                    <option value="mahasiswa/i" {{ request('tingkat') == 'mahasiswa/i' ? 'selected' : '' }}>Mahasiswa/i</option>
                                    <option value="dosen/pegawai" {{ request('tingkat') == 'dosen/pegawai' ? 'selected' : '' }}>Dosen/Pegawai</option>
                                </select>
                            </div>
                            <div class="flex items-end">
                                <button type="submit" class="w-full inline-flex justify-center px-4 py-2 bg-orange-500 text-white rounded-md">Filter</button>
                            </div>
                        </form>
                        <div id="visitors-container">
                            @include('admin.partials.visitors_table')
                        </div>
                                    </div>
                                </div>
                            </div>
                        </main>
    
                        <script>
                            // AJAX pagination and filter submission (progressive enhancement)
                            (function(){
                                const container = document.getElementById('visitors-container');
                                const form = document.getElementById('filter-form');

                                function fetchUrl(url, push=true){
                                    fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
                                        .then(response => response.text())
                                        .then(html => {
                                            container.innerHTML = html;
                                            if(push) history.pushState({}, '', url);
                                        })
                                        .catch(err => console.error('Fetch error', err));
                                }

                                // Intercept clicks on pagination links inside container
                                container.addEventListener('click', function(e){
                                    const a = e.target.closest('a');
                                    if(!a) return;
                                    const href = a.getAttribute('href');
                                    if(!href) return;
                                    // only intercept internal dashboard links
                                    if(href.includes('{{ route('admin.dashboard') }}') || href.match(/\bpage=\d+/)){
                                        e.preventDefault();
                                        fetchUrl(href);
                                    }
                                });

                                // Intercept filter form submit
                                if(form){
                                    form.addEventListener('submit', function(e){
                                        e.preventDefault();
                                        const data = new URLSearchParams(new FormData(form)).toString();
                                        const url = form.action + (data ? ('?' + data) : '');
                                        fetchUrl(url);
                                    });
                                }

                                // Handle back/forward navigation
                                window.addEventListener('popstate', function(){
                                    fetchUrl(location.href, false);
                                });
                            })();
                        </script>
                    </body>
                    </html>
