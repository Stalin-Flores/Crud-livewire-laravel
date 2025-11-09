<?php

namespace App\Livewire\Products;

use App\Livewire\Forms\ProductForm;
use App\Models\Product;
use Livewire\Component;

class Create extends Component
{
    public ProductForm $form;

    public function save()
    {
        $this->form->store();
                
        // Mensaje de éxito y redirección
        session()->flash('status', 'Producto creado exitosamente.');
        $this->redirectRoute('products.index', navigate: true);
    }

    public function render()
    {
        return view('livewire.products.create');
    }
}
