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
                        <button type="button"
                            onclick="openEditModal({{ $produk->id }}, '{{ addslashes($produk->name) }}', '{{ addslashes($produk->description) }}', {{ $produk->price }})"
                            class="text-blue-600 hover:text-blue-800 font-semibold mr-2">Edit</button>
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

<!-- Modal Edit Produk -->
<div id="editModal" class="fixed inset-0 z-50 items-center justify-center bg-black bg-opacity-40 hidden">
    <div class="bg-white rounded-lg p-6 w-full max-w-lg relative">
        <button type="button" onclick="closeModal()" class="absolute top-2 right-3 text-gray-500 text-xl">&times;</button>
        <h2 class="text-xl font-bold mb-4">Edit Produk</h2>
        <form id="editForm" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="edit_nama" class="block text-gray-700 font-medium mb-2">Nama</label>
                <input type="text" id="edit_nama" name="nama" class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
            </div>
            <div class="mb-4">
                <label for="edit_deskripsi" class="block text-gray-700 font-medium mb-2">Deskripsi</label>
                <textarea id="edit_deskripsi" name="deskripsi" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-md" required></textarea>
            </div>
            <div class="mb-6">
                <label for="edit_harga" class="block text-gray-700 font-medium mb-2">Harga</label>
                <input type="number" id="edit_harga" name="harga" class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 transition">Update</button>
            <button type="button" onclick="closeModal()" class="w-full mt-2 bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded-md hover:bg-gray-400 transition">Batal</button>
        </form>
    </div>
</div>

<script>
function openEditModal(id, name, description, price) {
    const modal = document.getElementById('editModal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    document.getElementById('edit_nama').value = name;
    document.getElementById('edit_deskripsi').value = description;
    document.getElementById('edit_harga').value = price;
    document.getElementById('editForm').action = '/list/' + id;
}
function closeModal() {
    const modal = document.getElementById('editModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}
</script>