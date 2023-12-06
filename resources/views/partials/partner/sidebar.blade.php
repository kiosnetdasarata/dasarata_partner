<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-60 h-screen pt-20 transition-transform -translate-x-full bg-sidebar border-r border-gray-300 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700 " aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-sidebar dark:bg-gray-800">
       <ul class="space-y-2 font-medium">
          <li class="{{ Request::is('operationals') ? 'bg-menubar dark:bg-purple-700 rounded-lg' : '' }}">
             <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-hover dark:hover:bg-purple-800">
                <svg aria-hidden="true" class="w-6 h-6 text-white transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
                <span class="flex-1 ml-3 text-white whitespace-nowrap">Dashboard</span>
             </a>
          </li>
          <li class="{{ Request::is('partners/customers*') ? 'bg-menubar dark:bg-purple-700 rounded-lg' : '' }}">
             <a href="{{ route('partners.customers.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-hover dark:hover:bg-purple-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" height="16" width="20" viewBox="0 0 640 512">
                    <path d="M211.2 96a64 64 0 1 0 -128 0 64 64 0 1 0 128 0zM32 256c0 17.7 14.3 32 32 32h85.6c10.1-39.4 38.6-71.5 75.8-86.6c-9.7-6-21.2-9.4-33.4-9.4H96c-35.3 0-64 28.7-64 64zm461.6 32H576c17.7 0 32-14.3 32-32c0-35.3-28.7-64-64-64H448c-11.7 0-22.7 3.1-32.1 8.6c38.1 14.8 67.4 47.3 77.7 87.4zM391.2 226.4c-6.9-1.6-14.2-2.4-21.6-2.4h-96c-8.5 0-16.7 1.1-24.5 3.1c-30.8 8.1-55.6 31.1-66.1 60.9c-3.5 10-5.5 20.8-5.5 32c0 17.7 14.3 32 32 32h224c17.7 0 32-14.3 32-32c0-11.2-1.9-22-5.5-32c-10.8-30.7-36.8-54.2-68.9-61.6zM563.2 96a64 64 0 1 0 -128 0 64 64 0 1 0 128 0zM321.6 192a80 80 0 1 0 0-160 80 80 0 1 0 0 160zM32 416c-17.7 0-32 14.3-32 32s14.3 32 32 32H608c17.7 0 32-14.3 32-32s-14.3-32-32-32H32z"/>
                </svg>
                <span class="flex-1 ml-3 text-white whitespace-nowrap">Customer</span>
             </a>
          </li>
          <li class="{{ Request::is('partners/payments*') ? 'bg-menubar dark:bg-purple-700 rounded-lg' : '' }}">
             <a href="{{ route('partners.payments.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-hover dark:hover:bg-purple-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" height="16" width="20" viewBox="0 0 640 512">
                    <path d="M64 64C28.7 64 0 92.7 0 128V384c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H64zm64 320H64V320c35.3 0 64 28.7 64 64zM64 192V128h64c0 35.3-28.7 64-64 64zM448 384c0-35.3 28.7-64 64-64v64H448zm64-192c-35.3 0-64-28.7-64-64h64v64zM288 160a96 96 0 1 1 0 192 96 96 0 1 1 0-192z"/>
                </svg>
                <span class="flex-1 ml-3 text-white whitespace-nowrap">Payment</span>
             </a>
          </li>
       </ul>
    </div>
 </aside>
