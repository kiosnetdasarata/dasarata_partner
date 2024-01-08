<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>

   <div class="sm:ml-64">
      <div class=" border-4 border-gray-200  rounded-lg  ">
         <table class="w-full text-sm text-left text-gray-500 " style="border: 1px solid black">
            <thead class="text-xs text-gray-700 uppercase">
               <tr>
                  <th style="border: 1px solid black" scope="col" class="px-6 py-3">Nama Customer</th>
                  <th style="border: 1px solid black" scope="col" class="px-6 py-3">Trx Id</th>
                  <th style="border: 1px solid black" scope="col" class="px-6 py-3">Payment Channel</th>
                  <th style="border: 1px solid black" scope="col" class="px-6 py-3">Payment Date</th>
                  <th style="border: 1px solid black" scope="col" class="px-6 py-3">Ammount</th>
               </tr>
            </thead>
            <tbody>
               @foreach($data as $customer)
               <tr class="border" style="border: 1px solid black">
                  <td style="border: 1px solid black" class="px-6 py-4">{{ $customer->customerBill->customer->nama }}</td>
                  <td style="border: 1px solid black" class="px-6 py-4">{{ $customer['trx_id'] }}</td>
                  <td style="border: 1px solid black" class="px-6 py-4">{{ $customer['payment_channel'] }}</td>
                  <td style="border: 1px solid black" class="px-6 py-4">{{ $customer['payment_date'] }}</td>
                  <td style="border: 1px solid black" class="px-6 py-4">{{ $customer['payment_total'] }}</td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
</body>

</html>