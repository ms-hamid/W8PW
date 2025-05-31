<script src="https://cdn.tailwindcss.com"></script>
<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left border border-gray-300 rounded-lg">
        <thead>
            <tr>
                <th scope="col" class="px-6 py-3 text-[#000000] border-b border-gray-300 font-semibold bg-transparent">No</th>
                <th scope="col" class="px-6 py-3 text-[#000000] border-b border-gray-300 font-semibold bg-transparent">Nama Produk</th>
                <th scope="col" class="px-6 py-3 text-[#000000] border-b border-gray-300 font-semibold bg-transparent">Deskripsi Produk</th>
                <th scope="col" class="px-6 py-3 text-[#000000] border-b border-gray-300 font-semibold bg-transparent">Harga Produk</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nama as $index => $item)
                <tr class="bg-transparent border-b border-gray-300 hover:bg-gray-100/30">
                    <th scope="row" class="px-6 py-4 font-medium text-[#1f1f1f] whitespace-nowrap">
                        {{ $index + 1 }}
                    </th>
                    <td class="px-6 py-4 font-medium text-[#1f1f1f] whitespace-nowrap">
                        {{ $item }}
                    </td>
                    <td class="px-6 py-4 text-[#1f1f1f]">
                        {{ $deskripsi[$index] }}
                    </td>
                    <td class="px-6 py-4 text-[#1f1f1f]">
                        {{ $harga[$index] }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div><h1>Input Produk</h1></div>
<form method="POST" action="{{ route('produk.simpan') }}">
    <table class="table">
        <tr>
            <td>Nama</td>
            <td colspan="3">
                <input type="text" class="form-control" id="nama" name="nama"> </td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td colspan="3">
                    <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
                </td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="number" class="form-control" id="harga" name="harga"></td>
                <td></td>
                <td></td>
            </tr>
        </table>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
