@extends('layouts.main')

@section('container')

<div class="col-lg-8 p-4 border-2 border-gray-300 border-solid rounded-lg dark:border-slate-500">
    <div class="flex px-4 sm:px-0">
        <div>
            <h3 class="text-base font-semibold leading-7 text-gray-900 dark:text-white ">Informasi Customer</h3>
            <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500 dark:text-slate-200">Personal details.</p>
        </div>
        <div class="ml-auto">
            <button id="updateCustomerButton" data-modal-target="updateCustomerModal" data-modal-toggle="updateCustomerModal" class="block text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800" type="button">
                Update customer
            </button>
        </div>
    </div>
    <div class="mt-6 border-t border-gray-100 dark:border-slate-500">
        <dl class="divide-y divide-gray-100">
          <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-white">NIK</dt>
            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 dark:text-white">{{ $customer->nik }}</dd>
          </div>
          <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-white">Nama Lengkap</dt>
            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 dark:text-white">{{ $customer->nama }}</dd>
          </div>
          <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-white">Alamat</dt>
            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 dark:text-white">{{ $customer->alamat }}</dd>
          </div>
          <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-white">Nomor Telepone</dt>
            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 dark:text-white">{{ $customer->nomor_telpn }}</dd>
          </div>
          <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-white">Area</dt>
            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 dark:text-white">{{ $customer->area_cover }}</dd>
          </div>
          <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-white">Tanggal Daftar</dt>
            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 dark:text-white">{{ $customer->tanggal_daftar }}</dd>
          </div>
          @if ($customer->customer_id != null)
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-white">Customer ID</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 dark:text-white">{{ $customer->customer_id }}</dd>
            </div>
          @endif
          <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-white">Nama Paket</dt>
            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 dark:text-white">{{ $customer->paymentBill->nama_paket }}</dd>
          </div>
          <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-white">Amount</dt>
            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 dark:text-white">{{ "Rp.".number_format($customer->paymentBill->amount) }}</dd>
          </div>
        </dl>
    </div>
    @if ($customer->customer_id == null)
        <div class="flex justify-end">
            <button id="regisCustomerButton" data-modal-target="regisCustomerModal" data-modal-toggle="regisCustomerModal" class="block text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800" type="button">
                Regis customer
            </button>
        </div>
    @endif
</div>

@if ($customer->customer_id == null)
    @include('partners.customers.modal-regis')
@endif

@include('partners.customers.modal-edit')

@endsection
