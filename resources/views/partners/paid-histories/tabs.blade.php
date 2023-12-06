<div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
    <ul class="flex flex-wrap -mb-px">
        <li class="me-2">
            <a href="{{ route('partners.payments.index') }}" class="inline-block p-4 {{ Request::is('partners/payments') ? 'ext-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500' : 'border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'}}">Paid Today</a>
        </li>
        <li class="me-2">
            <a href="{{ route('partners.payments.historyPaid') }}" class="inline-block p-4 {{ Request::is('partners/payments/histories-paid') ? 'ext-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500' : 'border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'}}">History Paid</a>
        </li>
    </ul>
</div>
