<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sistem Pencatatan Pengunjung - KKSE</title>
    <link rel="icon" type="image/png" href="{{ asset('images/kkse.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
body {
  margin: 0;
    height: 100vh;
  position: relative;
}

/* gradasi tetap di bawah */
body::before {
  content: "";
  position: fixed;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 25vh;
  background: linear-gradient(to top, rgba(205, 53, 11, 0.5), transparent);
  z-index: -1;
  pointer-events: none;
}
</style>
</head>
<body class="bg-white min-h-screen flex flex-col">
    <nav class="sticky top-0 z-50 flex justify-between items-center p-4 px-10">
        <div class="flex items-center">
            <a href="{{ route('landing') }}" class="flex items-center gap-2 group">
                <img src="{{ asset('images/kkse.png') }}" alt="Universitas Andalas Logo" class="w-12 h-auto mr-4">
                <div class="flex flex-col">
                    <span class="text-sm font-semibold text-gray-800">Laboratory of</span>
                    <span class="text-lg font-bold text-red-600 leading-tight">SYSTEM ENTERPRISE</span>
                    <div class="h-0.5 bg-red-600 mt-1"></div>
                </div>
            </a>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('landing') }}" target="_parent" class="px-3 py-2 bg-gray-100 text-gray-800 rounded-md shadow hover:bg-gray-200">
                Kembali
            </a>
            <a href="{{ route('login') }}" target="_parent" class="bg-gradient-to-r from-orange-500 to-red-600 hover:from-orange-600 hover:to-red-700 text-white font-bold py-2 px-4 rounded-lg transition-all duration-200 shadow-lg transform hover:scale-[1.02] active:scale-[0.98]">
                Login
            </a>
        </div>
    </nav>

    <!-- Main container -->
        <div class="relative flex flex-1 pb-20" style="min-height: calc(100vh - 4.5rem);">
        <!-- Background image kkse.png di tengah -->
        <div class="fixed inset-0 flex items-center justify-center opacity-20 z-0">
            <img src="{{ asset('images/kkse.png') }}" 
                 alt="Background KKSE" 
                 class="max-w-full max-h-full object-contain">
        </div>

        <!-- Bagian kiri dengan gambar poster - fixed -->
        <div class="hidden lg:flex lg:w-1/3 fixed left-6 top-1/2 transform -translate-y-1/2 z-10 items-center justify-center">
            <img src="{{ asset('images/poster.png') }}" 
                 alt="KKSE Lab" 
                 class="w-full max-w-sm h-auto">
        </div>

        <!-- Form di tengah - scrollable -->
        <div class="w-full lg:w-1/3 flex items-center justify-center z-10 ml-auto mr-auto">
            <div class="relative w-full max-w-md rounded-2xl shadow-xl p-8 bg-white">

                <!-- Header form menggunakan gambar -->
                <div class="flex justify-center mb-6">
                    <img src="{{ asset('images/image.png') }}" 
                         alt="Header KKSE" 
                         class="w-64 h-auto">
                </div>

                <!-- Alert success -->
                @if(session('success'))
                    <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 rounded-lg">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            {{ session('success') }}
                        </div>
                    </div>
                @endif

                <!-- Error list -->
                @if($errors->any())
                    <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-lg">
                        <ul class="list-disc list-inside">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form -->
                <form action="{{ route('visitor.store') }}" method="POST" >
                    @csrf

                    <div>
                        <label for="nama" class="block text-sm font-semibold text-orange-600 mb-2">Nama</label>
                        <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required
                               class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 text-gray-900 transition-all">
                    </div>

                    <div>
                        <label for="nim_nip" class="block text-sm font-semibold text-orange-600 mb-2">NIM/NIP</label>
                        <input type="text" id="nim_nip" name="nim_nip" value="{{ old('nim_nip') }}"
                               class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 text-gray-900 transition-all">
                    </div>

                    <div>
                        <label for="tingkat" class="block text-sm font-semibold text-orange-600 mb-2">Tingkat</label>
                        <select id="tingkat" name="tingkat" required
                                class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 text-gray-900 transition-all">
                            <option value="">Pilih Tingkat</option>
                            <option value="mahasiswa/i" {{ old('tingkat') == 'mahasiswa/i' ? 'selected' : '' }}>Mahasiswa/i</option>
                            <option value="dosen/pegawai" {{ old('tingkat') == 'dosen/pegawai' ? 'selected' : '' }}>Dosen/Pegawai</option>
                        </select>
                    </div>

                    <div>
                        <label for="department" class="block text-sm font-semibold text-orange-600 mb-2">Departemen</label>
                        <input type="text" id="department" name="department" value="{{ old('department') }}" required
                               class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 text-gray-900 transition-all">
                    </div>

                    <div>
                        <label for="keperluan" class="block text-sm font-semibold text-orange-600 mb-2">Keperluan</label>
                        <input id="keperluan" name="keperluan" rows="3" required
                                  class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 text-gray-900 resize-none transition-all">{{ old('keperluan') }}</input>
                    </div>

                    <button type="submit" 
                            class="w-full mt-3 bg-gradient-to-r from-orange-500 to-red-600 text-white font-bold py-3 px-6 rounded-lg hover:from-orange-600 hover:to-red-700 transition-all duration-200 shadow-lg transform hover:scale-[1.02] active:scale-[0.98]">
                        SUBMIT
                    </button>
                </form>
            </div>
        </div>

        <!-- Tabel pengunjung di kanan - fixed -->
        <div class="hidden lg:flex lg:w-1/3 fixed right-6 top-1/2 transform -translate-y-1/2 z-10 items-center justify-center">
    <div class="bg-white rounded-3xl shadow-2xl p-6 w-full max-w-md max-h-[75vh] overflow-y-auto border border-orange-200">
        
        <!-- Header -->
        <div class="flex items-center mb-5">
            <div class="w-10 h-10 bg-orange-500 rounded-full flex items-center justify-center shadow text-white">
                <svg class="w-6 h-6" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"/>
                </svg>
            </div>
            <div class="ml-3">
                <h2 class="text-lg font-bold text-orange-600">10 Pengunjung Terbaru</h2>
                <p class="text-xs text-gray-500">Update realtime</p>
            </div>
        </div>

        <!-- Card List -->
        <div class="space-y-4">
            @forelse($visitors as $visitor)
                <div class="flex items-center gap-3 p-4 bg-gray-50 rounded-xl shadow-sm hover:shadow-md transition duration-200 border border-gray-100">
                    
                    <!-- Avatar -->
                    <div class="w-10 h-10 flex-shrink-0 rounded-full bg-orange-200 text-orange-800 flex items-center justify-center font-bold">
                        {{ strtoupper(substr($visitor->nama, 0, 1)) }}
                    </div>

                    <div class="flex-1">
                        <p class="text-sm font-semibold text-gray-800">{{ $visitor->nama }}</p>

                        <!-- Tingkat Badge -->
                        @if($visitor->tingkat === 'mahasiswa/i')
                            <span class="text-xs font-semibold px-2 py-1 bg-green-100 text-green-700 rounded-full">
                                Mahasiswa
                            </span>
                        @else
                            <span class="text-xs font-semibold px-2 py-1 bg-blue-100 text-blue-700 rounded-full">
                                Dosen/Pegawai
                            </span>
                        @endif

                        <p class="text-xs text-gray-500 mt-1">{{ $visitor->department }}</p>
                    </div>

                    <!-- Timestamp -->
                    <div class="text-[10px] text-gray-400 whitespace-nowrap">
                        {{ $visitor->created_at->format('d/m H:i') }}
                    </div>

                </div>
            @empty
                <p class="text-center text-gray-400 py-4">Belum ada pengunjung.</p>
            @endforelse
        </div>
    </div>
</div>

        
    </div>
    

    <!-- Footer -->
        <div class="fixed bottom-0 left-0 w-full bg-white border-t py-3 z-50 text-center text-sm text-black shadow-lg">
        ©2025 Kelompok Keilmuan Sistem Enterprise. All rights reserved.
    </div>
</body>

<script>
    // If the form is loaded inside an iframe, nothing to do
    // The fullscreen control is only in the parent wrapper
    (function(){
        // Placeholder for any form-specific scripts
    })();
</script>

</body>
</html>
