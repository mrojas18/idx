<?php

namespace App\Orchid\Screens;

use App\Models\Categoria;
use App\Models\Gasto;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Group;

class PlanGastoEditScreen extends Screen
{

    public $gasto;
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Gasto $gasto): iterable
    {
        return [
            'gasto' => $gasto
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'PlanGastoEditScreen';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Create post')
                ->icon('pencil')
                ->method('createOrUpdate')
                ->canSee(!$this->gasto->exists),

            Button::make('Update')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->gasto->exists),

            Button::make('Remove')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->gasto->exists),
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
            Layout::rows([  
                Group::make([
                    Input::make('gasto.concepto')
                    ->title('Concepto')
                    ->placeholder('Introduzca la descripción del gasto')
                    ->help('Detalle del gasto')
                    ->horizontal(),

                    Relation::make('gasto.categoria')
                        ->fromModel(Categoria::class, 'nombre')
                        ->title('Categoria')
                        ->help('Seleccione la categoria')
                        ->empty('Selecionar categoria')
                        ->horizontal(),
                ]), 

                Group::make([
                    Input::make('gasto.monto_ars')
                        ->title('Monto ARS')
                        ->placeholder('Introduzca el monto del gasto')
                        ->help('Monto del gasto')
                        ->mask([
                            'alias' => 'currency',
                            'prefix' => '',
                            'suffix' => '',
                            'radixPoint' => ',',
                            'groupSeparator' => '.',
                            'decimalSeparator' => ',',
                            'allowMinus' => false,
                            //'min'=>1, 
                            'numericInput' => true
                        ])->horizontal(),
                    Input::make('gasto.monto_usd')
                        ->title('Monto USD')
                        ->placeholder('Introduzca el monto del gasto')
                        ->help('Monto del gasto')
                        ->mask([
                            'alias' => 'currency',
                            'prefix' => '',
                            'suffix' => '',
                            'radixPoint' => ',',
                            'groupSeparator' => '.',
                            'decimalSeparator' => ',',
                            'allowMinus' => false,
                            //'min'=>1, 
                            //'numericInput' => true
                        ])->horizontal(),
                ]),
                Group::make([
                    DateTimer::make('gasto.mes')
                        ->title('Fecha Gasto')
                        ->format('m-Y')
                        ->serverFormat('Y-m-d')
                        ->help('Fecha de pago del gasto')
                        ->horizontal(),

                    DateTimer::make('gasto.fecha_pago')
                        ->title('Fecha de pago')
                        ->format('d-m-Y')
                        ->serverFormat('Y-m-d')
                        ->help('Fecha de pago del gasto')
                        ->horizontal()
                ]), 
                Group::make([
                    Button::make('Create post')
                        ->icon('pencil')
                        ->method('createOrUpdate')
                        ->canSee(!$this->gasto->exists),

                    Button::make('Update')
                        ->icon('note')
                        ->method('createOrUpdate')
                        ->canSee($this->gasto->exists),

                    Button::make('Remove')
                        ->icon('trash')
                        ->method('remove')
                        ->canSee($this->gasto->exists),
                ])->alignStart()
            ])
        ];
    }
}
