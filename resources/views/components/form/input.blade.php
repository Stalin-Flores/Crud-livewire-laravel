{{-- Componente para renderizar un campo de entrada de formulario con etiqueta --}}
    @props([
        'label', {{-- Etiqueta que se mostrará encima del input --}}
        'name' {{-- Nombre del campo, usado para id, name y autocomplete --}}
    ])

{{-- Contenedor principal del campo de entrada --}}
<div>
            {{-- Contenedor flex para el label y el input --}}
            <div class="flex w-full max-w-xs flex-col gap-1 text-on-surface dark:text-on-surface-dark">
            {{-- Etiqueta del campo --}}
            <label for="{{$name}}" class="w-fit pl-0.5 text-sm">{{$label}}</label>
            {{-- Campo de entrada de texto --}}
            <input
            {{$attributes}} {{-- Atributos adicionales pasados al componente --}}
            id="{{$name}}" {{-- ID único para el input --}}
            type="text" {{-- Tipo de input, por defecto texto --}}
            class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark" {{-- Clases CSS para estilizar el input --}}
            name="{{$name}}" {{-- Nombre del campo para el formulario --}}
            placeholder="Ingresa el nombre del producto" autocomplete="name"/> {{-- Placeholder y autocomplete --}}

            @error($name)
                {{-- Mensaje de error si hay una validación fallida --}}
                <p class="text-red-500">{{ $message }}</p>
            @enderror
</div>
</div>