@extends('layout.app')


@section('content')
@php
    $userId = auth()->user()->id; // Get the current user ID
    $link = route('external-payment', ['id' => $userId]);
@endphp

<main class="h-full pb-16 overflow-y-auto">
    <div class="container grid px-6 mx-auto">
      <h2
        class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
      >
        PAYMENT API
      </h2>

      <div
        class="max-w-2xl px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
      >
        <p class="mb-4 text-gray-600 dark:text-gray-400">
          
          <strong>This is possible</strong>
          using the following link
          <b id="external-pay-link">{{ $link }}</b>
          to create a
          <em>Portal</em>
          , which could permit you to collect pays from your clients for articles they buy in your business 
          <strong>100% SECURED</strong>
        </p>

        <p class="text-gray-600 dark:text-gray-400">
          This link opens a page where clients could enter thier informations and phone number for buying articles and saving momey directly in your 
          PAYGOAT e-wallet. This is very simple and secured. Click on the copy button bellow to copy the link and share to your clients.
        </p>
      </div>

      <div>
        <button
          id="copy-link-btn" onclick="copyLink()"
          class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
        >
          copy link
        </button>
      </div>
    </div>

    <script>
      function copyLink() {
          const linkInput = document.getElementById('external-pay-link').innerHTML;
          alert(linkInput);

          const tempElement = document.createElement('textarea');
          tempElement.value = linkInput;
          document.body.appendChild(tempElement);

          tempElement.select();
          document.execCommand('copy');
          document.body.removeChild(tempElement);
          alert("Linked Copied");
      }
    </script>
  </main>
@endsection
