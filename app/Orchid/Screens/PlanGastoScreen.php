<?php

namespace App\Orchid\Screens;

use App\Enums\Moneda;
use App\Models\Gasto;
use App\Enums\TipoCategoria;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Screen;
use Orchid\Screen\Actions\Button;
use App\Models\Categoria;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Components\Cells\Currency;
use Orchid\Screen\Components\Cells\DateTimeSplit;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Toast;

class PlanGastoScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'gastos' => Gasto::with('categoria')->latest()->get(),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Gastos planificados';
    }

    public function description(): ?string
    {
        return "Listado de los datos planificados por mes";
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Create new')
                ->icon('pencil')
                ->route('platform.gasto.edit'),
                
            ModalToggle::make('Nuevo gasto')
                ->modal('gastoModal')
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
        /**'concepto', 'monto_ars', 'monto_usd', 'fecha_pago', 'mes', 'fecha_pago', 'categoria_id' */
        return [
            Layout::table('gastos', [

                TD::make('categoria.nombre', 'Categoria')->sort(),
                TD::make('concepto'),

                TD::make('monto_ars', "Monto ARS")
                    ->usingComponent(Currency::class, decimals: 2, decimal_separator: ',', thousands_separator: '.')
                    ->sort(),

                TD::make('monto_usd', "Monto USD")
                    ->usingComponent(Currency::class, decimals: 2, decimal_separator: ',', thousands_separator: '.')
                    ->sort(),

                TD::make('mes', "Mes")
                    ->usingComponent(DateTimeSplit::class, upperFormat: 'M-Y', lowerFormat: 'M',  timeZone: 'America/Argentina')
                    ->sort(),

                TD::make('fecha_pago', "Fecha pago")
                    ->usingComponent(DateTimeSplit::class, upperFormat: 'd-M-Y', lowerFormat: 'l',  timeZone: 'America/Argentina')
                    ->sort(),
                //mostrar mas de un boton en la celda de opciones 

                TD::make('Opciones')
                    ->alignCenter()
                    ->render(function (Gasto $gasto) {
                        return Group::make([
                            Button::make()
                                ->icon('trash')
                                ->confirm('After deleting, the task will be gone forever.')
                                ->method('delete', ['gasto' => $gasto->id]),
                            Button::make()
                                ->icon('pencil')
                                ->method('edit', ['gasto' => $gasto->id])
                        ]);
                    }),
            ]),
            Layout::modal('gastoModal', Layout::rows([
                /**'concepto', 'monto_ars', 'monto_usd', 'mes', 'fecha_pago', 'categoria_id' */
                Input::make('gasto.concepto')
                    ->title('Concepto')
                    ->placeholder('Introduzca la descripción del gasto')
                    ->help('Detalle del gasto'),

                Select::make('gasto.categoria')
                    ->fromModel(Categoria::class, 'nombre')
                    ->title('Categoria')
                    ->help('Seleccione la categoria')
                    ->empty('Selecionar categoria'),

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
                    ]),
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
                    ]),

                DateTimer::make('gasto.mes')
                    ->title('Fecha Gasto')
                    ->format('m-Y')
                    ->serverFormat('Y-m-d')
                    ->help('Fecha de pago del gasto'),

                DateTimer::make('gasto.fecha_pago')
                    ->title('Fecha de pago')
                    ->format('d-m-Y')
                    ->serverFormat('Y-m-d')
                    ->help('Fecha de pago del gasto')

            ]))

                ->title('Registrar gasto')
                ->applyButton('Agregar gasto'),
        ];
    }

    public function create(Request $request)
    {

        $request->validate([
            'gasto.concepto' => 'required|max:255',
            'gasto.categoria' => 'required',
            'gasto.monto_ars' => 'required_without:gasto.monto_usd|min:1',
            'gasto.monto_usd' => 'required_without:gasto.monto_ars|min:1',

        ]);
        //'concepto', 'monto', 'moneda', 'fecha_pago', 'usd', 'fecha', 'categoria_id'





        $valor_ars = $request->input('gasto.monto_ars');
        $valor_usd = $request->input('gasto.monto_usd');
        // Reemplazar puntos y comas
        $valor_ars = str_replace(['.', ','], ['', '.'], $valor_ars);
        $valor_usd = str_replace(['.', ','], ['', '.'], $valor_usd);

        // Formatear como número decimal (opcional, para asegurar dos decimales)
        $valorFormateadoArs = number_format($valor_ars, 2, '.', ''); // Resultado: "50000.00"
        $valorFormateadoUsd = number_format($valor_usd, 2, '.', ''); // Resultado: "50000.00"

        $gasto = new Gasto();
        $gasto->concepto = $request->input('gasto.concepto');
        $gasto->monto_ars = $valorFormateadoArs;
        $gasto->monto_usd = $valorFormateadoUsd;
        $gasto->categoria_id = $request->input('gasto.categoria');
        $gasto->fecha_pago = Carbon::createFromFormat('d-m-Y', $request->input('gasto.fecha_pago'))->format('Y-m-d');;
        $gasto->mes = Carbon::createFromFormat('m-Y', $request->input('gasto.mes'))->firstOfMonth()->format('Y-m-d');;
        $gasto->save();
    }

    public function delete(Gasto $gasto)
    {
        try {
            $gasto->delete();

            Toast::warning('Hello, world! This is a toast message.');
        } catch (\Exception $e) {
            Toast::error('Error al eliminar el gasto: ' . $e->getMessage());
        }
    }
}
