<script src="https://cdn.tailwindcss.com"></script>
<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left border border-gray-300 rounded-lg">
        <thead>
            <tr>
                <th scope="col" class="px-6 py-3 text-[#000000] border-b border-gray-300 font-semibold bg-transparent">No</th>
                <th scope="col" class="px-6 py-3 text-[#000000] border-b border-gray-300 font-semibold bg-transparent">Nama Produk</th>
                <th scope="col" class="px-6 py-3 text-[#000000] border-b border-gray-300 font-semibold bg-transparent">Deskripsi Produk</th>
                <th scope="col" class="px-6 py-3 text-[#000000] border-b border-gray-300 font-semibold bg-transparent">Harga Produk</th>
                <th scope="col" class="px-6 py-3 text-[#000000] border-b border-gray-300 font-semibold bg-transparent">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $index => $produk)
                <tr class="bg-transparent border-b border-gray-300 hover:bg-gray-100/30">
                    <th scope="row" class="px-6 py-4 font-medium text-[#1f1f1f] whitespace-nowrap">
                        {{ $index + 1 }}
                    </th>
                    <td class="px-6 py-4 font-medium text-[#1f1f1f] whitespace-nowrap">
                        {{ $produk->name }}
                    </td>
                    <td class="px-6 py-4 text-[#1f1f1f]">
                        {{ $produk->description }}
                    </td>
                    <td class="px-6 py-4 text-[#1f1f1f]">
                        {{ $produk->price }}
                    </td>
                    <td class="px-6 py-4">
                        <form action="{{ route('produk.hapus', $produk->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus produk {{$produk->name}} ini?')" class="text-red-600 hover:text-red-800 font-semibold">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="mt-8 mb-4">
    <h1 class="text-2xl font-bold text-gray-800 mb-4 text-center">Input Produk</h1>
</div>
<form method="POST" action="{{ route('produk.simpan') }}" class="bg-white p-6 rounded-lg shadow-md max-w-lg mx-auto">
    @csrf
    <div class="mb-4">
        <label for="nama" class="block text-gray-700 font-medium mb-2">Nama</label>
        <input type="text" id="nama" name="nama" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required>
    </div>
    <div class="mb-4">
        <label for="deskripsi" class="block text-gray-700 font-medium mb-2">Deskripsi</label>
        <textarea id="deskripsi" name="deskripsi" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required></textarea>
    </div>
    <div class="mb-6">
        <label for="harga" class="block text-gray-700 font-medium mb-2">Harga</label>
        <input type="number" id="harga" name="harga" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required>
    </div>
    <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 transition">Simpan</button>
</form>