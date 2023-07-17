<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PAYGOAT Dashboard</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
    <script src="{{asset('js/init-alpine.js')}}"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"
    />
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
      defer
    ></script>
    <script src="{{asset('js/charts-lines.js')}}" defer></script>
    <script src="{{asset('js/charts-pie.js')}}" defer></script>
    <script src="{{asset('js/focus-trap.js')}}" defer></script>
    <script src="{{asset('js/charts-bars.js')}}" defer></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">

  </head>
  <body>
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2
                class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
            </h2>
            <h2
                class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
            </h2>
            <div
            class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
            >
            <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                Make your pays
            </h4>
            <p class="text-gray-600 dark:text-gray-400">
            <form id="external-form">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <div>
                        <label>Client Name</label>
                        <input type="text" name="client_name" class="block w-full mt-1 text-sm border-green-600 dark:text-gray-300 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green form-input">
                    </div>

                    <div>
                        <label>Client Profession</label>
                        <input type="text" name="client_prof" class="block w-full mt-1 text-sm border-green-600 dark:text-gray-300 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green form-input">
                    </div>
                    
                    <div>
                        <label>Product ID</label>
                        <input type="text" name="prodID" class="block w-full mt-1 text-sm border-green-600 dark:text-gray-300 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green form-input">
                    </div>

                    <div>
                        <label>Depit Number</label>
                        <input type="text" name="number" class="block w-full mt-1 text-sm border-green-600 dark:text-gray-300 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green form-input">
                    </div>

                    <!-- Other form fields for client details, product reference, etc. -->
                    <button type="submit">Pay</button>
                </form>
            </p>
            </div>
        </div>
    </main>
    <script src="{{ asset('js/externalpay.js') }}"></script>
    @include('partial.footer')
  </body>


</html>
