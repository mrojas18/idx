<?php

namespace App\Orchid\Screens;

use App\Models\Banco;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Screen\Fields\Input;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\TD;

class BancoScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'bancos' => Banco::latest()->get(),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Bancos';
    }

    public function description(): ?string
    {
        return 'Listado de bancos';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Add Banco')
                ->modal('bancoModal')
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
            Layout::table('bancos', [
                TD::make('nombre'),
                TD::make('Actions')
                    ->alignRight()
                    ->render(function (Banco $banco) {
                        return Button::make('Delete Banco')
                            ->confirm('After deleting, the task will be gone forever.')
                            ->method('delete', ['banco' => $banco->id]);
                    }),
            ]),
            Layout::modal('bancoModal', Layout::rows([
                Input::make('banco.nombre')
                    ->title('Nombre')
                    ->placeholder('Enter task name')
                    ->help('The name of the task to be created.'),
            ]))
                ->title('Registrar banco')
                ->applyButton('Agregar banco'),
        ];
    }


    /**
 * @param \Illuminate\Http\Request $request
 *
 * @return void
 */
public function create(Request $request)
{
    // Validate form data, save task to database, etc.
    $request->validate([
        'banco.nombre' => 'required|max:255',
    ]);

    $task = new Banco();
    $task->nombre = $request->input('banco.nombre');
    $task->save();
}

    /**
     * @param Banco $banco
     *
     * @return void
     */
    public function delete(Banco $banco)
    {
        $banco->delete();
    }
}
