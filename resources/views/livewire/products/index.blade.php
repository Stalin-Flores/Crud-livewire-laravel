<div>
    @if (session('status'))
    <!-- success Alert -->
    <div class="relative w-full overflow-hidden rounded-lg border border-green-500 bg-surface text-on-surface dark:bg-surface-dark dark:text-on-surface-dark mb-4" role="alert" id="alertMessage">
        <div class="flex w-full items-center gap-2 bg-success/10 p-4">
            <div class="bg-green-500/15 text-green-500 rounded-full p-1" aria-hidden="true">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-6" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z" clip-rule="evenodd" />
                </svg>
            </div>
            <div class="ml-2">
                <h3 class="text-sm font-semibold text-success">¡Éxito!</h3>
                <p class="text-xs font-medium sm:text-sm">{{ session('status') }}</p>
            </div>
            <button class="ml-auto" aria-label="dismiss alert" onclick="document.getElementById('alertMessage').style.display='none'">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor" fill="none" stroke-width="2.5" class="size-4 shrink-0">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>
    <script>
        // Ocultar la alerta después de 5 segundos
        setTimeout(function() {
            const alert = document.getElementById('alertMessage');
            if (alert) {
                alert.style.display = 'none';
            }
        }, 3000); // 5000 milisegundos = 5 segundos
    </script>
    @endif
<!-- primary Button with Icon -->
<a href="{{route('products.create')}}" wire:navigate class="mb-6 inline-block">
    <button type="button" class="inline-flex justify-center items-center gap-2 whitespace-nowrap rounded-radius bg-primary border border-primary px-4 py-2 text-sm font-medium tracking-wide text-on-primary transition hover:opacity-75 text-center focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed dark:bg-primary-dark dark:border-primary-dark dark:text-on-primary-dark dark:focus-visible:outline-primary-dark">
        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-5 fill-on-primary dark:fill-on-primary-dark" fill="currentColor">
            <path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
        </svg>
        Crear Producto
    </button>
</a>

<div class="overflow-hidden w-full overflow-x-auto rounded-radius border border-outline dark:border-outline-dark">

    
    <table class="w-full text-left text-sm text-on-surface dark:text-on-surface-dark">
        <thead class="border-b border-outline bg-surface-alt text-sm text-on-surface-strong dark:border-outline-dark dark:bg-surface-dark-alt dark:text-on-surface-dark-strong">
            <tr>
                <th scope="col" class="p-4">ID del Producto</th>
                <th scope="col" class="p-4">Nombre</th>
                <th scope="col" class="p-4">Stock</th>
                <th scope="col" class="p-4">Precio</th>
                <th scope="col" class="p-4">Fecha de Creación</th>
                <th scope="col" class="p-4">Acciones</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-outline dark:divide-outline-dark">
            {{-- recorrer los productos y mostrarlos en la tabla --}}
            @forelse ($products as $product)
                <tr>
                    <td class="p-4">{{ $product->id }}</td>
                    <td class="p-4">{{ $product->nombre }}</td>
                    <td class="p-4">{{ $product->stock }}</td>
                    <td class="p-4">${{ $product->precio}}</td>
                    <td class="p-4">{{ $product->created_at->format('d/m/Y') }}</td>
                    <td class="p-4">
                        <div class="flex gap-2">
                            <a href="{{route('products.edit', $product)}}" wire:navigate>
                                <button type="button" class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-radius bg-info border border-info px-3 py-2 text-sm font-medium tracking-wide text-on-info transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-info active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed dark:bg-info-dark dark:border-info-dark dark:text-on-info-dark dark:focus-visible:outline-info-dark">
                                    Editar
                                </button>
                            </a>
                            <button type="button" wire:click="delete({{ $product->id }})" wire:confirm.prompt="¿Estás seguro?\n\nEscribe ELIMINAR para confirmar|ELIMINAR" class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-lg bg-red-600 border border-red-600 px-3 py-2 text-sm font-medium tracking-wide text-white transition hover:bg-red-700 hover:border-red-700 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600 active:bg-red-800 disabled:opacity-75 disabled:cursor-not-allowed dark:bg-red-600 dark:border-red-600 dark:hover:bg-red-700">
                                Eliminar
                            </button>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    {{-- si no se encuentran productos, mostrar un mensaje --}}
                    <td colspan="5" class="p-4 text-center text-sm text-on-surface-weak dark:text-on-surface-dark-weak">
                        No hay productos disponibles
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="p-4">
        {{-- enlaces de paginación --}}
        {{ $products->links() }} 
    </div>
</div>

</div>
