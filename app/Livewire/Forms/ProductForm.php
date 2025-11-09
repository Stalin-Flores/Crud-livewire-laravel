<?php

namespace App\Livewire\Forms;

use App\Models\Product;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ProductForm extends Form

{
    // Para actualizar un producto existente
    public ?Product $product;


    #[Validate('required|string|max:255')]
    public $nombre = '';

    #[Validate('required|numeric|min:0')]
    public $precio = '';

    #[Validate('nullable|string|max:1000')]
    public $descripcion = '';

    #[Validate('required|integer|min:0')]
    public $stock = 0;

    // Método para cargar los datos de un producto existente en el formulario
    public function setProduct(Product $product): void
    {
        $this->product = $product;
        $this->nombre = $product->nombre;
        $this->precio = $product->precio;
        $this->descripcion = $product->descripcion;
        $this->stock = $product->stock;
    }

    // Método para guardar un nuevo producto
    public function store(){

        $this->validate();

        Product::create([
            'nombre' => $this->nombre,
            'precio' => $this->precio,
            'descripcion' => $this->descripcion,
            'stock' => $this->stock,
        ]);     
    }
    // Método para actualizar un producto existente
    public function update(){
        $this->validate();

        if ($this->product) {
            $this->product->update( $this->all()
            );
        }
    }
}
