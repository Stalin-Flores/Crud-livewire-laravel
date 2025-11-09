<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    // Habilitar la paginación en el componente
    use WithPagination;

    public function delete (Product $product)
    {
        $product->delete();
        session()->flash('status', 'Producto eliminado exitosamente.');
        $this->redirectRoute('products.index', navigate: true);
    }
    
    public function render()
    {
        return view('livewire.products.index', [
            // Obtener los productos paginados de 10 en 10
            'products' => Product::latest()->paginate(10),
        ]);
    }
}
