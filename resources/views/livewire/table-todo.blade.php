<div class="py-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <div class="flex justify-between items-center">
                <select wire:model="rows" class="p-0 h-8 w-16 border-gray-300
                    focus:border-indigo-300
                    focus:ring
                    focus:ring-indigo-200
                    focus:ring-opacity-50
                    rounded-md
                    shadow-sm">
                    <option value="5" selected>5</option>
                    <option value="10">10</option>
                </select>
                <x-jet-input
                  wire:model="search"
                  class="my-3 inline-block"
                  type="search"
                  placeholder="{{ __('Search') }}"
                />
            </div>
            
            <table class="w-full overflow-x-scroll">
                <thead>
                    <tr>
                        <th>
                            <button class="font-bold py-3">
                                {{ __('Name') }}
                            </button>
                        </th>
                        <th>
                            <button class="font-bold py-3"
                              type="button"
                              wire:click="$set('order', 'content')"
                              title="{{ __('Order') }}"
                            >
                                {{__('Task') }}
                            </button>
                        </th>
                        <th>
                           <button class="font-bold py-3"
                              type="button"
                              wire:click="$set('order', 'created_at')"
                              title="{{ __('Order') }}"
                            >
                                {{ __('Date') }}
                            </button>
                        </th>
                        <th>
                            {{ __('Actions') }}
                        </th>
                    </tr>
                   
                </thead>
                <tbody>
                    @foreach ($todos as $todo)
                        <tr>
                            <td class="border-2 p-2">
                                {{ $todo->user->name }}
                            </td>
                            <td class="border-2 p-2" wire:click="orderByColumn('content')">
                                {{ $todo->content }}
                            </td>
                            <td class="border-2 p-2" wire:click="orderByColumn('created_at')">
                                {{ $todo->created_at }}
                            </td>
                            <td class="border-2 p-2">
                                <button type="btn" class="text-red-600" wire:click="destroy({{ $todo->id }})">{{ __('Delete') }}</button>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="my-3">
                {{ $todos->links(); }}
            </div>
        </div>
    </div>
</div>
