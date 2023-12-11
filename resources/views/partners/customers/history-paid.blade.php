@extends('layouts.main')

@section('container')

<div class="col-lg-8 p-4 border-2 border-gray-300 border-solid rounded-lg dark:border-slate-500">
    <div class="mb-4 text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px">
            <li class="me-2">
                <a href="{{ route('partners.customers.show', $histories[0]->customerBill->customer->id) }}" class="inline-block p-4 {{ Request::is('partners/customers/*/show') ? 'ext-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500' : 'border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'}}">Detail</a>
            </li>
            <li class="me-2">
                <a href="{{ route('partners.customers.historyPaid', $histories[0]->customerBill->virtual_account) }}" class="inline-block p-4 {{ Request::is('partners/customers/*/history-paid') ? 'ext-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500' : 'border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'}}">History Paid</a>
            </li>
        </ul>
    </div>

    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-900 dark:text-white">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No.
                </th>
                <th scope="col" class="px-6 py-3">
                    ID Customer
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama Customer
                </th>
                <th scope="col" class="px-6 py-3">
                    Nomor Telepone
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $histories as $history)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $loop->iteration }}
                </td>
                <td class="gap-2 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $history->customerBill->customer->nama }}
                </td>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $history->trx_id }}
                </td>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $history->payment_channel }}
                </td>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ "Rp.".number_format($history->payment_total) }}
                </td>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <a href="{{ route('partners.payments.printInvoice', $history->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><span>Print</span></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $histories->links() }}
</div>

@endsection
