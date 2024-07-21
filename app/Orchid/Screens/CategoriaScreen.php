<?php

namespace App\Orchid\Screens;

use App\Enums\TipoCategoria;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Screen;
use Orchid\Screen\Actions\Button;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\TD;

class CategoriaScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'categorias' => Categoria::latest()->get(),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Gestión de Categorias';
    }

    public function description(): ?string
    {
        return 'Listado de categorias';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Nueva categoria')
            ->modal('categoriaModal')
            ->method('create')
            ->icon('plus'),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::table('categorias', [
                TD::make('nombre'),
                TD::make('tipo')
                    ->sort()
                    ->filter(TD::FILTER_SELECT,TipoCategoria::array())
                    ->render(function (Categoria $categoria) {
                        return $categoria->tipo->label(); // Mostrar la etiqueta en lugar del valor
                    }),
                TD::make('Opciones')
                    ->alignRight()
                    ->render(function (Categoria $categoria) {
                        return Button::make('Eliminar')
                            ->icon('trash')
                            ->confirm('After deleting, the task will be gone forever.')
                            ->method('delete', ['categoria' => $categoria->id]);
                    }),
            ]),
            Layout::modal('categoriaModal', Layout::rows([
                Input::make('categoria.nombre')
                    ->title('Nombre')
                    ->placeholder('Introduzca el nombre de la categoria')
                    ->help('Nombre de la categoria a registrar'),
                Select::make('categoria.tipo')
                    ->options(TipoCategoria::array())
                    ->empty('Seleccione el tipo de categoria')
                    ->title('Tipo de categoria')
                    ->help('indica el tipo de categoria Ingreso o egreso'),
               
            ]))
                ->title('Registrar categoria')
                ->applyButton('Agregar categoria'),
        ];
    }

    public function create(Request $request)
    {
        // Validate form data, save task to database, etc.
        $request->validate([
            'categoria.nombre' => 'required|max:255',
            'categoria.tipo' => 'required'
        ]);

        $categoria = new Categoria();
        $categoria->nombre = $request->input('categoria.nombre');
        $categoria->tipo = $request->input('categoria.tipo');
        $categoria->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return void
     */
    public function delete(Categoria $categoria){
        $categoria->delete(); //Deletes the category
    }

}
