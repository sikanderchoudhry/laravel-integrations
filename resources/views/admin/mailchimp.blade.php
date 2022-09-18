<x-layouts.base>
    <div class="m-10 p-10 border-spacing-2 bg-teal-100 rounded-xl shadow-xl">

        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1 md:row-span-2">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Mailchimp Integration Details</h3>
                        <p class="mt-1 text-sm text-gray-600">Enter details for connecting to mailchimp</p>
                    </div>
                </div>
                <div class="mt-5 md:col-span-2 md:mt-0">
                    <form action="/config-mailchimp" method="POST">
                        @csrf
                        <div class="overflow-hidden shadow sm:rounded-md">
                            <div class="bg-white px-4 py-5 sm:p-6">
                                <div class="grid grid-cols-1">
                                    @if (Session::has('success'))
                                    <div id="alert-3" class="flex p-4 mb-4 bg-green-100 rounded-lg dark:bg-green-200" role="alert">
                                        <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-green-700 dark:text-green-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                                        <span class="sr-only">Info</span>
                                        <div class="ml-3 text-sm font-medium text-green-700 dark:text-green-800">
                                         {{ Session::get('success')}}
                                        </div>
                                        <button type="button" onClick="hideMe()" class="ml-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-green-200 dark:text-green-600 dark:hover:bg-green-300" data-dismiss-target="#alert-3" aria-label="Close">
                                          <span class="sr-only">Close</span>
                                          <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        </button>
                                      </div>
                                      @endif
                                    <div class="col-auto mb-4">
                                        <label for="api_key" class="block text-sm font-medium text-gray-700">Your API
                                            Key</label>
                                        <input type="text" name="api_key" id="api_key" autocomplete="api_key" value="{{ env('MAILCHIMP_API')}}"
                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">

                                        @error('api_key')
                                        <div class="p-4 mt-2 mb-2 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                                            <span class="font-medium">{{ $message }}</span>
                                          </div>
                                        @enderror

                                    </div>

                                    <div class="col-auto mb-4">
                                        <label for="server_prefix" class="block text-sm font-medium text-gray-700">Your
                                            Server Prefix</label>
                                        <input type="text" name="server_prefix" id="server_prefix"
                                               autocomplete="server_prefix" value="{{ env('MAILCHIMP_SERVER_PREFIX')}}"
                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">

                                        @error('server_prefix')
                                        <div class="p-4 mt-2 mb-2 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                                            <span class="font-medium">{{ $message }}</span>
                                          </div>
                                        @enderror

                                    </div>

                                </div>
                            </div>
                            <div class="bg-white px-4 py-3 text-right sm:px-6">
                                <button type="submit"
                                        class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
                            </div>

                            @isset($ping)
                            <div>
                                {{ $ping->health_status }}
                            </div>
                            @endisset

                        </div>
                    </form>
                </div>

                <div class="mt-5 md:col-span-2 md:mt-0">
                    <form action="/test-mailchimp" method="GET">
                        @csrf
                        <div class="overflow-hidden shadow sm:rounded-md">

                            @if (Session::has('ping'))
                            <x-alert msg="ping" color="green" />
                            @endif

                            @if (Session::has('error'))
                            <x-alert msg="error" color="red "/>
                            @endif

                            <div class="bg-white px-4 py-3 sm:px-6">
                                <button type="submit"
                                        class="inline-flex justify-center rounded-md border border-transparent bg-green-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">Test Connection</button>
                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>

<a href="/">HOME</a>


    </div>

    <script>

        function hideMe() {
            document.getElementById("alert-3").style.display = "none";
        }

       window.onload = (event) => { setTimeout(hideMe, 5000) };

    </script>
</x-layouts.base>
