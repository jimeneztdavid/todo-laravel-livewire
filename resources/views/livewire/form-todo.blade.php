<div class="py-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            
            <form action="#" class="max-w-2xl mx-auto" wire:submit.prevent="storeTodo">
                <x-jet-input
                  class="block my-3 w-full"
                  type="text"
                  autofocus
                  required
                  placeholder="type your task here"
                  wire:model="content"
                  wire:click="closeMessage"
                />

                @error('content')
                    <ul class="my-2">
                        <li class="text-red-500">{{ $message }}</li>
                    </ul>
                @enderror

                @if (isset($message))
                    <p class="text-sm text-green-600 my-3 max-w-md">
                        {{ $message }}
                        <button
                          type="button"
                          class="float-right bg-red-500 py-1 px-2 text-white rounded"
                          title="{{ __('close') }}"
                          wire:click="closeMessage"
                        >X</button>
                    </p>
                @endif

                <x-jet-button type="submit">Store</x-jet-button>
            </form>
        </div>
    </div>
</div>
