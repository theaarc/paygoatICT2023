@extends('layout.app')


@section('content')




  <div class="bg-gray-50">
    <main class="min-h-screen flex flex-col items-center justify-center bg-gray-50 space-y-10 py-12 px-4 sm:px-6 lg:px-8">
      <div>
        <h1 class="mt-6 text-center text-3xl font-extrabold text-gray-900">transaction details</h1>

      </div>
      <div class="max-w-md w-full mx-auto bg-white shadow rounded-lg p-7 space-y-6">
        <div class="flex flex-col">
          <label class="text-sm font-bold text-gray-600 mb-1" for="email">Name</label>
          <input class="border rounded-md bg-white px-3 py-2" type="text" name="text" id="email" placeholder="Enter your Email Address" />
        </div>
        <div class="flex flex-col">
          <label class="text-sm font-bold text-gray-600 mb-1" for="password">Rising</label>
          <input class="border rounded-md bg-white px-3 py-2" type="text" name="Rising" id="password" placeholder="Enter your Password" />
        </div>
        <div>
          <button  class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
          type="submit">pay now</button>
        </div>


      </div>


        <div class="max-w-md w-full mx-auto bg-white shadow rounded-lg p-7 space-y-6">
          <div class="flex flex-col">
            <label class="text-sm font-bold text-gray-600 mb-1" for="email">Name</label>
            <input class="border rounded-md bg-white px-3 py-2" type="text" name="text" id="email" placeholder="Enter your Email Address" />
          </div>
          <div class="flex flex-col">
            <label class="text-sm font-bold text-gray-600 mb-1" for="password">Rising</label>
            <input class="border rounded-md bg-white px-3 py-2" type="text" name="Rising" id="password" placeholder="Enter your Password" />
          </div>
          <div>
            <button  class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            type="submit">pay now</button>
          </div>
          <div class="relative pb-2">
            <div class="absolute top-0 left-0 w-full border-b"></div>
            <div class="absolute -top-3 left-0 w-full text-center">
              <span class="bg-white px-3 text-sm">or continue via</span>
            </div>
          </div>
          <div class="grid grid-cols-3 gap-3 text-xl">
            <div class="border-2 rounded-md p-3 text-center cursor-pointer hover:border-gray-600">
              <i class="fab fa-twitter"></i>
            </div>
            <div class="border-2 rounded-md p-3 text-center cursor-pointer hover:border-gray-600">
              <i class="fab fa-facebook"></i>
            </div>
            <div class="border-2 rounded-md p-3 text-center cursor-pointer hover:border-gray-600">
              <i class="fab fa-linkedin"></i>
            </div>
          </div>
        </div>
    </main>
</div>

 @endsection
