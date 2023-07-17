@extends('layout.app')


@section('content')
<main class="h-full overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        <h1 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">My Products</h1>

        @if ($products->count() > 0)
            <ul>
                @foreach ($products as $product)
                    <li>
                        <h3>{{ $product->name }}</h3>
                        <p>Category: {{ $product->category }}</p>
                        <img src="{{ asset($product->image) }}" alt="Product Image" width="200">
                    </li>
                @endforeach
            </ul>
        @else
            <p>No products found.</p>
        @endif

        <h4
        class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
      >
        
      </h4>
        <div class="grid gap-6 mb-8 md:grid-cols-2">
        <div
          class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
        >
          <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
            ADD PRODUCT
          </h4>
          <p class="text-gray-600 dark:text-gray-400">
          <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <!-- Helper text -->
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Name</span>
                    <input type="text" name="name" id="name" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Jane Doe"/>

                    <span class="text-gray-700 dark:text-gray-400">Category</span>
                    <input type="text" name="category" id="category" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Jane Doe"/>

                    <span class="text-gray-700 dark:text-gray-400">Image</span>
                    <input type="file" name="image" id="image" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Jane Doe"/>
                    
                    <div>
                        <label for="price">Price</label>
                        <input type="number" step="0.01" name="price" id="price">
                    </div>

                </label>

                <button type="submit">Add Product</button>
            </form>
          </p>
        </div>
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