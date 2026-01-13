<?php

use Livewire\Volt\Component;
use App\Models\Movement;

new class extends Component {
    public $code;

    public function with()
    {
        return ['movements' => Movement::all()];
    }
}; ?>

<div>

    <flux:separator class="my-4" />

    <div class='flex flex-col md:flex-row justify-between py-4 gap-2 items-center'>
        <flux:input label="{{ __('Code filter') }}" wire:model.live.debounce.500ms='code' />
        <flux:button icon='document-plus' variant="primary" color="green" :href="route('movements.new')" />
    </div>
    <div class="overflow-x-auto bg-white dark:bg-zinc-800 shadow-md rounded-lg">
        <table class="table-auto border-collapse border bg-zinc-50 dark:bg-zinc-800 w-full overflow-x-auto">
            <thead class="bg-linear-to-t from-sky-400 to-indigo-400 ">
                <tr>
                    <th class="p-2 text-white">{{ __('Movement Type') }}</th>
                    <th class="p-2 text-white">{{ __('Correlative') }}</th>
                    <th class="p-2 text-white">{{ __('Store') }}</th>
                    <th class="p-2 text-white">{{ __('Date') }}</th>
                    <th class="p-2 text-white">{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($movements as $movement)
                    <tr class="hover:bg-zinc-200 dark:hover:bg-zinc-600">

                        <td class="p-2 text-center">{{ $movement->movement_type()->first()->code }}</td>
                        <td class="p-2 text-center">{{ $movement->correlative }}</td>
                        <td class="p-2 text-center">{{ $movement->store()->first()->code }}</td>
                        <td class="p-2 text-center">{{ $movement->movement_date }}</td>
                        <td class="p-2 text-center"><flux:button icon="magnifying-glass" href="{{route('movements.edit', ['corr'=>$movement->correlative])}}" /></td>

                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>

</div>

