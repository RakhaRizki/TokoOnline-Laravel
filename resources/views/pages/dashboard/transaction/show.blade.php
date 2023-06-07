
<x-app-layout>
<x-slot name="header">

<nav class="flex" aria-label="Breadcrumb">
  <ol class="inline-flex items-center space-x-1 md:space-x-3">
    <li class="inline-flex items-center">
      <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
        <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
        Home
      </a>
    </li>
    <li>
      <div class="flex items-center">
        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
        <a href="#" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-black">{{ $transaction->id }} {{ $transaction->name }} </a>
      </div>
    </li>
  </ol>
</nav>

</x-slot>

    <x-slot name="script">
        <script>
            // AJAX DataTable
            var datatable = $('#crudTable').DataTable({
                ajax: {
                    url: '{!! url()->current() !!}',
                },
                columns: [
                    { data: 'id', name: 'id', width: '5%'},
                    { data: 'product.title', name: 'product.title' },
                    { data: 'product.price', name: 'product.price' },
                ],
            });
        </script>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold text-lg text-gray-800 leading-tight mb-5">Transaction Details</h2>

            <div class="bg-white overflow-hidden shadow sm:rounded-lg mb-5">
                 <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table-auto w-full">
                        <tbody>

                            <tr>
                                <th class="border px-6 py-4 text-right">Nama</th>
                                <td class="border px-6 py-4">{{ $transaction->name }}</td>
                            </tr>

                            <tr>
                                <th class="border px-6 py-4 text-right">Email</th>
                                <td class="border px-6 py-4">{{ $transaction->email }}</td>
                            </tr>

                            <tr>
                                <th class="border px-6 py-4 text-right">No Telp</th>
                                <td class="border px-6 py-4">{{ $transaction->telp }}</td>
                            </tr>

                            <tr>
                                <th class="border px-6 py-4 text-right">Kurir</th>
                                <td class="border px-6 py-4">{{ $transaction->courier }}</td>
                            </tr>

                            <tr>
                                <th class="border px-6 py-4 text-right">Pembayaran</th>
                                <td class="border px-6 py-4">{{ $transaction->payment }}</td>
                            </tr>

                            <tr>
                                <th class="border px-6 py-4 text-right">Link Pembayaran</th>
                                <td class="border px-6 py-4">{{ $transaction->payment_url }}</td>
                            </tr>

                            <tr>
                                <th class="border px-6 py-4 text-right">Total Harga</th>
                                <td class="border px-6 py-4">{{ number_format($transaction->total_price) }}</td>
                            </tr>

                            <tr>
                                <th class="border px-6 py-4 text-right">Status</th>
                                <td class="border px-6 py-4">{{ $transaction->status }}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>

            <h2 class="font-semibold text-lg text-gray-800 leading-tight mb-5">
            Transaction Items</h2>
            
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <table id="crudTable">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Produk</th>
                            <th>Harga</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.tailwindcss.com"></script>

</x-app-layout>

