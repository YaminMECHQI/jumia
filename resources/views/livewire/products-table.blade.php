<div>
<button wire:click="open" class="px-4 py-2 m-2 font-bold text-white bg-green-500 rounded hover:bg-green-700">
    Add new product
</button>
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
                      <img class="w-10 h-10 rounded-full" src="{{$product->cover}}" alt="">
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
                  <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                  <a href="#" class="text-red-600 hover:text-red-900">Delee</a>
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
    <form wire:submit.prevent="save">


        <div class="col-span-6 m-4 sm:col-span-4">
            <label class="block text-sm font-medium text-gray-700" for="title">
            Product title 
            </label>
            <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" wire:model.debounce.500ms="title" id="title" type="text" autocomplete="off">
        </div>
        <div class="col-span-6 m-4 sm:col-span-4">
            <label class="block text-sm font-medium text-gray-700" for="price">
            Product price
            </label>
            <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" wire:model.debounce.500ms="price" id="price" type="text" autocomplete="off">
        </div>
        <div class="col-span-6 m-4 sm:col-span-4">
            <label class="block text-sm font-medium text-gray-700" for="quantity">
            Product quantity
            </label>
            <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" wire:model.debounce.500ms="quantity" id="quantity" type="text" autocomplete="off">
        </div>
        <div class="col-span-6 m-4 sm:col-span-4">
            <label class="block text-sm font-medium text-gray-700" for="status">
            Product status
            </label>
            <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" wire:model.debounce.500ms="status" id="status" type="text" autocomplete="off">
        </div>
        <div class="col-span-6 m-4 sm:col-span-4">
            <label class="block text-sm font-medium text-gray-700" for="cover">
            Product cover
            </label>
            <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" wire:model.debounce.500ms="cover" id="cover" type="text" autocomplete="off">
        </div>
        
        <button type="submit" class="inline-flex items-center px-4 py-2 mb-4 ml-4 text-xs font-semibold tracking-widest text-white uppercase transition bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25">
            Save
        </button>
    </form>  
</div>
@endif

</div>