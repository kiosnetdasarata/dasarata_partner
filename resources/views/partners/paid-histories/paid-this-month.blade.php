@extends('layouts.main')

@section('container')
<div class="flex items-center mb-4">
    {{-- <h4 class="text-2xl font-bold dark:text-white">Data Customer</h4> --}}
    @include('partners.paid-histories.tabs')
    @if ($histories->isNotEmpty())
        <a class="block ml-auto text-white bg-emerald-700 hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-emerald-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-emerald-600 dark:hover:bg-emerald-700 dark:focus:ring-emerald-800"
            href="{{ route('partners.payments.exportPaidThisMonth') }}"
            onclick="return confirm('Are you sure to export paid this month?')">
            Export Payment
        </a>
    @endif
</div>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
    <div class="container mb-3">
        <div class="row justify-content-center">
            <div class="col-md-2 mt-2">
                <form action="/partners/payments/paid-this-month">
                    <label for="default-search"
                        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="search" id="default-search" name="search"
                            class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500"
                            value="{{ request('search') }}" placeholder="Masukan TRX ID" autocomplete="off">
                        <button type="submit"
                            class="text-white absolute right-2.5 bottom-2.5 bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-900 dark:text-white">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No.
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Customer
                    </th>
                    <th scope="col" class="px-6 py-3">
                        TRX ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Payment Channel
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Ammount
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @isset($histories)
                @foreach ( $histories as $data)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $loop->iteration }}
                    </td>
                    <td class="gap-2 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $data->customerBill->customer->nama }}
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $data->trx_id }}
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $data->payment_channel }}
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ "Rp.".number_format($data->payment_total) }}
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <a href="{{ route('partners.payments.printInvoice', $data->id) }}"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><span>Print</span></a>
                    </td>
                </tr>
                @endforeach
                @endisset
            </tbody>
        </table>
        {{ $histories->links() }}
    </div>

    @endsection
