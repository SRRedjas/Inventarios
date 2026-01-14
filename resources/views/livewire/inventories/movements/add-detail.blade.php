<?php

use Livewire\Volt\Component;
use App\Models\Movement;
use App\Models\Product;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Flux\Flux;

new class extends Component {
    use WithoutUrlPagination, WithPagination;
    public Movement $movement;
    public $code;

    public $product;

    public $productFilter;
    public $codeFilter;

    public $name;
    public $uoms;

    public function codeSearch()
    {
        $product = Product::where('code', 'like', '%' . $this->code . '%')
            ->orWhere('codebar', '=', $this->code)
            ->first();

        if ($product) {
            $this->name = $product->name;
            $this->product = $product;
            $this->uoms = $this->product->uoms()->get();
        } else {
            $this->reset(['product', 'name']);
            LivewireAlert::title('No encontrado')->error()->toast(true)->text('Producto no encontrado')->show();
        }
    }

    public function selectProduct($id)
    {
        $product = Product::findorFail($id);
        $this->name = $product->name;
        $this->code = $product->code;
        $this->product = $product;
        $this->uoms = $this->product->uoms()->get();
        Flux::modal('search-code')->close();
    }

    public function with()
    {
        return [
            'products' => Product::where('status', '=', 1)
                ->when($this->productFilter, function ($query) {
                    $query->where('name', 'like', '%' . $this->productFilter . '%');
                })
                ->when($this->codeFilter, function ($query) {
                    $query->where('code', 'like', '%' . $this->codeFilter . '%');
                })
                ->paginate(10),
        ];
        $this->resetPage();
    }
}; ?>

<div class="flex flex-col gap-4">

    <flux:field>
        <flux:label>
            Codigo de Articulo o de barra
        </flux:label>
        <flux:error name="code" />
        <div class="flex flex-col sm:flex-row flex-nowrap  gap-4">
            <div class="flex gap-1">
                <flux:input wire:model="code" wire:change="codeSearch" placeholder="EQPO1" />

                <flux:modal.trigger name="search-code">
                    <flux:button variant="primary" icon="magnifying-glass"></flux:button>
                </flux:modal.trigger>
            </div>
            <flux:input wire:model="name" readonly placeholder="Nombre articulo" />

        </div>
    </flux:field>

    @if ($product)
        <div class="flex items-center gap-2 justify-between">
            <flux:field>
                <flux:label name="cantidad">
                    Cantidad
                </flux:label>
                <flux:input type="number" wire:model="cantidad" />
            </flux:field>



            <flux:field>
                <flux:label name="cantidad">
                    Unidad de medida
                </flux:label>
                <flux:select wire:model="uom">
                    <flux:select.option value="">Seleccione unidad de medida</flux:select.option>
                    @foreach ($uoms as $uom)
                        <flux:select.option value="{{ $uom->id }}">{{ $uom->sym }} - {{ $uom->name }}
                        </flux:select.option>
                    @endforeach
                </flux:select>
            </flux:field>
        </div>
    @endif














    <flux:modal name="search-code">

        <div class=" mx-auto">
            <div class="grid grid-cols-2 gap-2 p-4 ">
                <flux:input label="Buscar por codigo" wire:model.live="codeFilter" placeholder="Codigo..." />
                <flux:input label="Buscar por Nombre" wire:model.live="productFilter" placeholder="Articulo..." />
            </div>
            <ul class="border p-4">
                @foreach ($products as $product)
                    <li class="flex items-center justify-between border-b p-2 hover:bg-amber-400 rounded-xl">
                        <span>{{ $product->code }}</span>
                        <span>{{ $product->name }}</span>
                        <flux:button wire:click="selectProduct({{ $product->id }})" variant="primary"
                            icon="arrow-top-right-on-square" />

                    </li>
                @endforeach
            </ul>
            {{ $products->links() }}
        </div>
    </flux:modal>

</div>
