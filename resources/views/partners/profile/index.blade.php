@extends('layouts.main')

@section('container')

<div class="w-full max-w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    {{-- <div class="flex flex-col items-center pb-10"> --}}
    <div class="flex space-x-8 py-2 px-4">
        <div class="col-auto">
            <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="/img/mitra.jpg" alt="Bonnie image"/>
        </div>
        <div class="col-auto my-auto">
            <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Bonnie Green</h5>
            <span class="text-sm text-gray-500 dark:text-gray-400">ID : 92023120002</span>
        </div>
    </div>
</div>

<div class="mt-4 px-4 py-2 bg-white border rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <form action="#" method="post">
        @csrf
        @method('put')
        <div class="flex items-center mb-4">
            <h4 class="text-2xl font-bold dark:text-white">Edit Profile</h4>
            <button class="block ml-auto text-white bg-emerald-700 hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-emerald-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-emerald-600 dark:hover:bg-emerald-700 dark:focus:ring-emerald-800" type="submit">
                Update Profile
            </button>
        </div>
        <h6 class="mb-4 text-lg font-bold dark:text-white">Informasi Mitra</h6>
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <label for="nama_perusahaan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Perusahaan</label>
                <input type="text" id="nama_perusahaan" name="nama_perusahaan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div>
                <label for="penanggung_jawab" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penanggung Jawab</label>
                <input type="text" id="penanggung_jawab" name="penanggung_jawab" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Doe" required>
            </div>
            <div>
                <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                <input type="text" id="alamat" name="alamat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Flowbite" required>
            </div>
            <div>
                <label for="nomor_telpn" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Telephone</label>
                <input type="number" id="nomor_telpn" name="nomor_telpn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123-45-678" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required>
            </div>
            <div>
                <label for="npwp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NPWP</label>
                <input type="number" id="npwp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="flowbite.com" required>
            </div>
            <div>
                <label for="tipe_partner" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipe Mitra</label>
                <input type="text" id="tipe_partner" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
            </div>
        </div>
        {{-- <div class="mb-6">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email address</label>
            <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="john.doe@company.com" required>
        </div> --}}
        <div class="mb-6">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
            <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required>
        </div>
        <div class="mb-6">
            <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm password</label>
            <input type="password" id="confirm_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required>
        </div>
    </form>
</div>


@endsection
