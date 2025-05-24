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
