@extends('layout.app')

<head>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
      crossorigin="anonymous"
    />
    <meta name="csrf-token" content="{{ csrf_token() }}">
  </head>

@section('content')

    <div>
     <main class="min-h-screen flex flex-col items-center justify-center bg-gray-800 space-y-10 py-12 px-4 sm:px-6 lg:px-8">
       <div>
         <h1 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Money transactions</h1>
         <h3 class="mt-4 text-center text-3lg text-gray-900">Chose your transaction type</h3>

         <h3 class="mt-4 text-center text-3lg text-gray-900">solde</h3><h3 class="mt-4 text-center text-3lg text-gray-900" id="soldeDis">{{auth()->user()->solde}}</h3>
       </div>

       <!-- ---------------------deposite section------------------------------- -->

       <form id="deposit-form">
       @csrf
            <div class="max-w-md w-full mx-auto bg-white shadow rounded-lg p-7 space-y-6">
                    <h2 class="mt-4 text-center text-3lg text-gray-900">Deposite</h2>

                    <style>
                        #result {
                            font-size: 1.5rem;
                            color: red;
                        }
                    </style>

                    <div id="result"></div>
                        <div class="flex flex-col">
                            <label class="text-sm font-bold text-gray-600 mb-1" for="amount">amount</label>
                            <input class="border rounded-md bg-white px-3 py-2" type="number" step="0.01" name="amount" placeholder="Enter your amount to deposite" id="amount"/>
                        </div>
                        <div class="flex flex-col">
                            <label class="text-sm font-bold text-gray-600 mb-1" for="phone">Phone Number</label>
                            <input class="border rounded-md bg-white px-3 py-2" type="text" placeholder="Enter the phone number" id="number" name="from" />
                        </div>

                         <input class="border rounded-md bg-white px-3 py-2" type="text" value="{{ auth()->user()->id }}" name="idu" /> 
                        
                        <div>
                            <button class="w-full bg-indigo-600 text-white rounded-md p-2" type="submit">pay now</button>
                        </div>
            </div>
        </form>

       <!-- ---------------------withdraw section------------------------------- -->
       <form id="retrait-form">
       @csrf
            <div class="max-w-md w-full mx-auto bg-white shadow rounded-lg p-7 space-y-6">
                    <h2 class="mt-4 text-center text-3lg text-gray-900">Retrait</h2>

                    <style>
                        #result {
                            font-size: 1.5rem;
                            color: red;
                        }
                    </style>

                    <div id="result"></div>
                        <div class="flex flex-col">
                            <label class="text-sm font-bold text-gray-600 mb-1" for="amount">amount</label>
                            <input class="border rounded-md bg-white px-3 py-2" type="number" step="0.01" name="amountw" placeholder="Enter your amount to withdraw" id="amountW"/>
                        </div>
                        <div class="flex flex-col">
                            <label class="text-sm font-bold text-gray-600 mb-1" for="phone">Phone Number</label>
                            <input class="border rounded-md bg-white px-3 py-2" type="text" placeholder="Enter the phone number" id="numberW" name="to" />
                        </div>

                        <input class="border rounded-md bg-white px-3 py-2" type="text" value="{{ auth()->user()->id }}" name="iduW" /> 

                        <input class="border rounded-md bg-white px-3 py-2" type="number" value="{{ auth()->user()->solde }}" name="solde" /> 
                        
                        <div>
                            <button class="w-full bg-indigo-600 text-white rounded-md p-2" type="submit">pay now</button>
                        </div>
            </div>
        </form>

     </main>

     <script src="{{ asset('js/deposit.js') }}"></script>
     <script src="{{ asset('js/retrait.js') }}"></script>

    </div>
  
@endsection