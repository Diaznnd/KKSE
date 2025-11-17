<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Pengunjung') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Filters -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Filter Data</h3>
                    <form id="filterForm" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div>
                            <label for="date_from" class="block text-sm font-medium text-gray-700 mb-2">Dari Tanggal</label>
                            <input type="date" id="date_from" name="date_from" class="w-full px-3 py-2 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all">
                        </div>
                        <div>
                            <label for="date_to" class="block text-sm font-medium text-gray-700 mb-2">Sampai Tanggal</label>
                            <input type="date" id="date_to" name="date_to" class="w-full px-3 py-2 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all">
                        </div>
                        <div>
                            <label for="tingkat" class="block text-sm font-medium text-gray-700 mb-2">Tingkat</label>
                            <select id="tingkat" name="tingkat" class="w-full px-3 py-2 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all">
                                <option value="">Semua Tingkat</option>
                                <option value="mahasiswa/i">Mahasiswa/i</option>
                                <option value="dosen/pegawai">Dosen/Pegawai</option>
                            </select>
                        </div>
                        <div>
                            <label for="department" class="block text-sm font-medium text-gray-700 mb-2">Departemen</label>
                            <select id="department" name="department" class="w-full px-3 py-2 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all">
                                <option value="">Semua Departemen</option>
                                @foreach($departmentList as $dep)
                                    <option value="{{ $dep }}">{{ $dep }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                    <div class="mt-4 flex gap-2">
                        <button type="button" id="applyFilter" class="bg-gradient-to-r from-orange-500 to-red-600 hover:from-orange-600 hover:to-red-700 text-white font-bold py-2 px-4 rounded-lg transition-all duration-200 shadow-lg transform hover:scale-[1.02] active:scale-[0.98]">
                            Terapkan Filter
                        </button>
                        <button type="button" id="resetFilter" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-lg transition-all duration-200 shadow-lg transform hover:scale-[1.02] active:scale-[0.98]">
                            Reset
                        </button>
                    </div>
                </div>
            </div>

            <!-- Export Buttons -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <div class="flex flex-wrap gap-4">
                        <a href="{{ route('admin.visitors.export.excel') }}" id="exportExcel" class="bg-gradient-to-r from-orange-500 to-red-600 hover:from-orange-600 hover:to-red-700 text-white font-bold py-2 px-4 rounded-lg transition-all duration-200 shadow-lg transform hover:scale-[1.02] active:scale-[0.98]">
                            Export ke Excel
                        </a>
                        <a href="{{ route('admin.visitors.export.pdf') }}" id="exportPdf" class="bg-gradient-to-r from-orange-500 to-red-600 hover:from-orange-600 hover:to-red-700 text-white font-bold py-2 px-4 rounded-lg transition-all duration-200 shadow-lg transform hover:scale-[1.02] active:scale-[0.98]">
                            Export ke PDF
                        </a>
                    </div>
                </div>
            </div>

            <!-- Data Table -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <table id="visitorsTable" class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIM/NIP</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tingkat</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Departemen</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Keperluan</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Waktu Kunjungan</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script>
        $(document).ready(function() {
            var table = $('#visitorsTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('admin.visitors.index') }}",
                    data: function(d) {
                        d.date_from = $('#date_from').val();
                        d.date_to = $('#date_to').val();
                        d.tingkat = $('#tingkat').val();
                        d.department = $('#department').val();
                    }
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'nama', name: 'nama'},
                    {data: 'nim_nip', name: 'nim_nip'},
                    {data: 'tingkat', name: 'tingkat'},
                    {data: 'department', name: 'department'},
                    {data: 'keperluan', name: 'keperluan'},
                    {data: 'formatted_date', name: 'created_at'}
                ],
                order: [[6, 'desc']],
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json'
                }
            });

            $('#applyFilter').click(function() {
                table.ajax.reload();
            });

            $('#resetFilter').click(function() {
                $('#filterForm')[0].reset();
                table.ajax.reload();
            });

            // Update export links with filters
            function updateExportLinks() {
                const params = new URLSearchParams();
                if ($('#date_from').val()) params.append('date_from', $('#date_from').val());
                if ($('#date_to').val()) params.append('date_to', $('#date_to').val());
                if ($('#tingkat').val()) params.append('tingkat', $('#tingkat').val());
                if ($('#department').val()) params.append('department', $('#department').val());
                
                const queryString = params.toString();
                $('#exportExcel').attr('href', "{{ route('admin.visitors.export.excel') }}" + (queryString ? '?' + queryString : ''));
                $('#exportPdf').attr('href', "{{ route('admin.visitors.export.pdf') }}" + (queryString ? '?' + queryString : ''));
            }

            $('#date_from, #date_to, #tingkat, #department').change(function() {
                updateExportLinks();
            });
        });
    </script>
    @endpush
</x-app-layout>

