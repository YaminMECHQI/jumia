<div>
  @if (session()->has('message'))
  <div class="relative px-4 py-3 my-3 text-green-700 bg-green-100 border border-green-400 rounded" role="alert">
    <strong class="font-bold">Holy smokes!</strong>
    <span class="block sm:inline">{{ session('message') }}</span>
    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
      <svg class="w-6 h-6 text-green-500 fill-current" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
    </span>
  </div>
  @endif

@if(!$open)
<div x-data="{ open: false }" class="inline-block">
  <button @click="open = !open" class="inline-flex px-4 py-2 m-2 font-bold text-white bg-green-500 rounded hover:bg-green-700">
    Add New
  </button>
   <button wire:click="open" x-show="open" class="inline-flex px-4 py-2 m-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
    <svg wire:loading wire:target="open" class="w-5 h-5 mr-3 -ml-1 text-white animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
      <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
      <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
    </svg>
    Add new product
  </button>
  <button wire:click="open" x-show="open" class="inline-flex px-4 py-2 m-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
    <svg wire:loading wire:target="open" class="w-5 h-5 mr-3 -ml-1 text-white animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
      <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
      <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
    </svg>
    Add quick product
  </button> 
</div>
<input class="inline-block w-1/4 mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" wire:model.debounce.500ms="search" id="search" type="text" autocomplete="off">
@else
  <button wire:click="close" class="inline-flex px-4 py-2 m-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
    <svg wire:loading wire:target="close" class="w-5 h-5 mr-3 -ml-1 text-white animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
      <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
      <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
    </svg>
    Cancel
  </button>
@endif

@if($type == "table" && !$open)
<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
        <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                  Name
                </th>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                  Price
                </th>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                  Status
                </th>
                <th scope="col" class="relative px-6 py-3">
                  <span class="sr-only">Edit</span>
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              @foreach($products as $product)
              <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="flex-shrink-0 w-10 h-10">
                      <img class="w-10 h-10 rounded-full" src="{{ asset('storage/'.$product->cover) }}"  alt="">
                    </div>
                    <div class="ml-4">
                      <div class="text-sm font-medium text-gray-900">
                        {{$product->title}}
                      </div>
                      <div class="text-sm text-gray-500">
                        Category {{$product->category_id}}
                      </div>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900">{{$product->price}}</div>
                  <div class="text-sm text-gray-500">{{$product->quantity}} Item</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <span class="inline-flex px-2 text-xs font-semibold leading-5 {{  $product->status === "PUBLISHED" ? "text-green-800 bg-green-100" : "text-red-800 bg-red-100" }} rounded-full">
                    {{$product->status}}
                  </span>
                </td>
                <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                  <button wire:click="edit({{$product->id}})" class="inline-flex px-4 py-2 m-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700"> Edit </button>
                  <button wire:click="delete({{$product->id}})" class="inline-flex px-4 py-2 m-2 font-bold text-white bg-red-500 rounded hover:bg-red-700"> Delete </button>
                </td>
              </tr>
              @endforeach
              <!-- More people... -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>
@endif

@if($type == "list" && !$open)
<div class="flex justify-center p-5">
    <div class="w-1/2 bg-white rounded-lg shadow-xl">
        <ul class="divide-y divide-gray-300">
            <li class="p-4 cursor-pointer hover:bg-gray-50">Peli list ni item</li>
            <li class="p-4 cursor-pointer hover:bg-gray-50">Biji list ni item </li>
            <li class="p-4 cursor-pointer hover:bg-gray-50">Triji list ni item</li>
            <li class="p-4 cursor-pointer hover:bg-gray-50">Chothi list ni item</li>
        </ul>
    </div>
</div>
@endif

@if($open)
<div>
    <form wire:submit.prevent="saveOrUpdate">

        <div class="col-span-6 m-4 sm:col-span-4">
            <label class="block text-sm font-medium text-gray-700" for="title">
            Product title 
            </label>
            <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" wire:model.debounce.500ms="product.title" id="title" type="text" autocomplete="off">
            @error('product.title') <span class="text-red-600 error hover:text-red-900">{{ $message }}</span> @enderror
          </div>
        <div class="col-span-6 m-4 sm:col-span-4">
            <label class="block text-sm font-medium text-gray-700" for="price">
            Product price
            </label>
            <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" wire:model.debounce.500ms="product.price" id="price" type="text" autocomplete="off">
        </div>
        <div class="col-span-6 m-4 sm:col-span-4">
            <label class="block text-sm font-medium text-gray-700" for="quantity">
            Product quantity
            </label>
            <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" wire:model.debounce.500ms="product.quantity" id="quantity" type="text" autocomplete="off">
        </div>
        <div class="col-span-6 m-4 sm:col-span-4">
            <label class="block text-sm font-medium text-gray-700" for="status">
            Product status
            </label>
            <select class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" wire:model="product.status" id="status">
              <option>choose the status ..</option>
              <option value="PUBLISHED">PUBLISHED</option>
              <option value="DRAFT">DRAFT</option>
            </select>
        </div>
        <div class="col-span-6 m-4 sm:col-span-4">
            <label class="block text-sm font-medium text-gray-700" for="cover">
            Product cover
            </label>
            <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" wire:model="cover" id="cover" type="file">
            @error('cover') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div wire:loading wire:target="cover">Uploading...</div>

        <button type="submit" class="inline-flex items-center px-4 py-2 mb-4 ml-4 text-xs font-semibold tracking-widest text-white uppercase transition bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25">
            Save
        </button>
        
    </form>  
</div>
@endif

</div>