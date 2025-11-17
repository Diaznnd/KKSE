<div>
    <div class="overflow-x-auto shadow-lg rounded-lg">
        <table class="min-w-full divide-y divide-gray-200 ">
            <thead class="bg-linear-to-r from-orange-500 to-red-600">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">NIM/NIP</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Tingkat</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Departemen</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Keperluan</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Waktu Kunjungan</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($recentVisitors as $v)
                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $v->nama }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $v->nim_nip ?? '-' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $v->tingkat == 'mahasiswa/i' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                                {{ ucfirst($v->tingkat) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $v->department }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $v->keperluan }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $v->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-8 text-center text-sm text-gray-500">
                            <p class="text-base">Belum ada data pengunjung</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $recentVisitors->links() }}
    </div>
</div>
