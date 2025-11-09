<div>
    <form wire:submit="save" class="space-y-4 max-w-2xl p-4 bg-surface dark:bg-surface-dark-alt rounded-lg shadow-md">
    
    <div>
        <x-form.input wire:model="form.nombre" label="Nombre" name="for.nombre" placeholder="Ingresa el nombre del producto" />
        @error('form.nombre') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>

    <div>
        <x-form.input wire:model="form.stock" label="Stock" name="for.stock" placeholder="Ingresa la cantidad en stock" />
        @error('form.stock') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>

    <div>
        <x-form.input wire:model="form.precio" label="Precio" name="for.precio" placeholder="Ingresa el precio en $" />
        @error('form.precio') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>

    <div class="flex w-full max-w-md flex-col gap-1 text-on-surface dark:text-on-surface-dark">
        <label for="descripcion" class="w-fit pl-0.5 text-sm">Descripcion</label>
        <textarea id="descripcion" wire:model="form.descripcion" class="w-full rounded-radius border border-outline bg-surface-alt px-2.5 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark" rows="3" placeholder="Ingresa una descripción del producto"></textarea>
        @error('form.descripcion') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>
<!-- primary Button -->
<button type="submit" class="whitespace-nowrap rounded-radius bg-primary border border-primary px-4 py-2 text-sm font-medium tracking-wide text-on-primary transition hover:opacity-75 text-center focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed dark:bg-primary-dark dark:border-primary-dark dark:text-on-primary-dark dark:focus-visible:outline-primary-dark">
    @if(request()->routeIs('products.create'))
        Crear Producto
    @else
        Actualizar Producto
    @endif
</button>
        
    </form>
</div>
    