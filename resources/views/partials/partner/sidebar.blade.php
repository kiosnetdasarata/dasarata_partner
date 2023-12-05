<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-60 h-screen pt-20 transition-transform -translate-x-full bg-sidebar border-r border-gray-300 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700 " aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-sidebar dark:bg-gray-800">
       <ul class="space-y-2 font-medium">
          <li class="{{ Request::is('operationals') ? 'bg-menubar dark:bg-purple-700 rounded-lg' : '' }}">
             <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-hover dark:hover:bg-purple-800">
                <svg aria-hidden="true" class="w-6 h-6 text-white transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
                <span class="flex-1 ml-3 text-white whitespace-nowrap">Dashboard</span>
             </a>
          </li>
          <li class="{{ Request::is('operationals') ? 'bg-menubar dark:bg-purple-700 rounded-lg' : '' }}">
             <a href="{{ route('customers.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-hover dark:hover:bg-purple-800">
                <svg aria-hidden="true" class="w-6 h-6 text-white transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
                <span class="flex-1 ml-3 text-white whitespace-nowrap">Customer</span>
             </a>
          </li>
         {{-- <li class="{{ Request::is('operationals/customer-news*') || Request::is('operationals/verify-customer*') || Request::is('operationals/customer-admin*') || Request::is('operationals/customer-uncovered*') ? 'bg-menubar dark:bg-purple-700 rounded-lg' : '' }}">
            <a href="{{ route('operationals.customer-news.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-hover dark:hover:bg-purple-800">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-white transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z"/></svg>
                <span class="flex-1 ml-3 text-white whitespace-nowrap">Customer New</span>
            </a>
         </li>
            <button type="button" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group hover:bg-hover dark:text-white dark:hover:bg-purple-800" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-white transition duration-75 group-hover:text-white dark:text-gray-400 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M357.7 8.5c-12.3-11.3-31.2-11.3-43.4 0l-208 192c-9.4 8.6-12.7 22-8.5 34c87.1 25.3 155.6 94.2 180.3 181.6H464c26.5 0 48-21.5 48-48V256h32c13.2 0 25-8.1 29.8-20.3s1.6-26.2-8.1-35.2l-208-192zM288 208c0-8.8 7.2-16 16-16h64c8.8 0 16 7.2 16 16v64c0 8.8-7.2 16-16 16H304c-8.8 0-16-7.2-16-16V208zM24 256c-13.3 0-24 10.7-24 24s10.7 24 24 24c101.6 0 184 82.4 184 184c0 13.3 10.7 24 24 24s24-10.7 24-24c0-128.1-103.9-232-232-232zm8 256a32 32 0 1 0 0-64 32 32 0 1 0 0 64zM0 376c0 13.3 10.7 24 24 24c48.6 0 88 39.4 88 88c0 13.3 10.7 24 24 24s24-10.7 24-24c0-75.1-60.9-136-136-136c-13.3 0-24 10.7-24 24z"/></svg>
                  <span class="flex-1 ml-3 text-white text-left whitespace-nowrap" sidebar-toggle-item>Pemasangan</span>
                  <svg sidebar-toggle-item class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
            <ul id="dropdown-example" class="{{ Request::is('operationals/tiket-customer*') ||  Request::is('operationals/workorders*') ? '' : 'hidden' }} px-5 py-2 space-y-2">
                <li class="{{ Request::is('operationals/tiket-customer*')  ? 'bg-menubar dark:bg-purple-700 rounded-lg' : '' }}">
                    <a href="{{ route('operationals.tiket-customer') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-hover dark:hover:bg-purple-800">
                        <span class="flex-1 ml-3 text-white whitespace-nowrap">Tiketing WO</span>
                    </a>
                </li>
                <li class="{{ Request::is('operationals/workorders*') ? 'bg-menubar dark:bg-purple-700 rounded-lg' : '' }}">
                    <a href="{{ route('operationals.workorders.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-hover dark:hover:bg-purple-800">
                        <span class="flex-1 ml-3 text-white whitespace-nowrap">Work Order</span>
                    </a>
                </li>
            </ul>
            <li>
                <button type="button" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group hover:bg-hover dark:text-white dark:hover:bg-purple-800" aria-controls="dropdown-distribution" data-collapse-toggle="dropdown-distribution">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-white transition duration-75 group-hover:text-white dark:text-gray-400 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M246.6 150.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l96-96c12.5-12.5 32.8-12.5 45.3 0l96 96c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L352 109.3V384c0 35.3 28.7 64 64 64h64c17.7 0 32 14.3 32 32s-14.3 32-32 32H416c-70.7 0-128-57.3-128-128c0-35.3-28.7-64-64-64H109.3l41.4 41.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0l-96-96c-12.5-12.5-12.5-32.8 0-45.3l96-96c12.5-12.5 32.8-12.5 45.3 0s12.5 32.8 0 45.3L109.3 256H224c23.3 0 45.2 6.2 64 17.1V109.3l-41.4 41.4z"/></svg>
                      <span class="flex-1 ml-3 text-white text-left whitespace-nowrap" sidebar-toggle-item>Distribution</span>
                      <svg sidebar-toggle-item class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
                <ul id="dropdown-distribution" class="{{ Request::is('operationals/distributions*') ? '' : 'hidden' }} px-5 py-2 space-y-2">
                   <li class="{{ Request::is('operationals/distributions/access*') || Request::is('operationals/distributions/data-distribusion*') ? 'bg-menubar dark:bg-purple-700 rounded-lg' : '' }}">
                       <a href="{{ route('operationals.distributions.access.index')  }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-hover dark:hover:bg-purple-800">
                          <span class="flex-1 ml-3 text-white whitespace-nowrap">Data Distribution</span>
                       </a>
                    </li>
                   <li class="{{ Request::is('operationals/distributions/workorders*') ? 'bg-menubar dark:bg-purple-700 rounded-lg' : '' }}">
                       <a href="{{ route('operationals.distributions.workorders.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-hover dark:hover:bg-purple-800">
                          <span class="flex-1 ml-3 text-white whitespace-nowrap">Work Order</span>
                       </a>
                    </li>
                </ul>
            </li> --}}
       </ul>
    </div>
 </aside>
