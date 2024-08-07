@extends('layout.app')


@section('content')
 <main class="min-h-screen flex flex-col items-center justify-center bg-gray-50 space-y-10 py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-md w-full mx-auto bg-white shadow rounded-lg p-7 space-y-6">
    <p class="text-2xl font-medium text-gray-800">
        click here to open the modal
    </p>
    <button class="bg-purple-500 text-white rounded-md px-8 py-2 text-base font-medium hover:bg-blue-600
    focus:outline-none focus:ring-2 focus:ring-green-300" id="open-btn">
        Open Modal
    </button>
   </div>

 <!---Modal -->
   <div class="fixed hidden insert-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" id="modal">
    <div class="max-w-md w-full mx-auto bg-white shadow rounded-lg p-7 space-y-6">
      <div class="mt-3 text-center">
           <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-purple-100">
               <svg class="h-6 w-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                   xmlnx="http://www.w.org/2000/svg">
                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                   </path>
                </svg>
            </div>
            <h3 class="text-lg leading-6 font-medium text-gray-900">Successfull</h3>
          <div class="mt-2 px-7 py-3">
             <p class="text-sm text-gray-500">successfully initiated payment.</p>
          </div>
          <div class="items-center px-4 py-3">
              <button id="ok-btn" class="px-4 py-2 bg-purple-500 text-white
                            text-base font-medium rounded-md w-full
                            shadow-sm hover:bg-purple-600 focus:outline-none focus:ring-2 focus:ring-purple-300">
                  OK
              </button>

          </div>
      </div>

    </div>
   </div>
  <script>
      let modal = document.getElementById('modal');
      let btn = document.getElementById('open-btn');
      let button = document.getElementById('ok-btn');

      btn.onclick = function () {
            modal.style.display = 'block';
        };

        button.onclick = function () {
            modal.style.display = 'none';
        };

      window.onclick = function (event) {
        if (event.target == modal) {
         modal.style.display = "none";
        }
      }

    </script>
 </main>

@endsection
