<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\OperacionRequest;
use App\Models\Operacion;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\CRUD\app\Library\Widget;

use function Laravel\Prompts\select;

/**
 * Class OperacionCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class OperacionCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Operacion::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/operacion');
        CRUD::setEntityNameStrings('operacion', 'operacions');
        
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::button('update')->stack('top')->view('crud::buttons.quick')->meta([
            'access' => true,
            'label' => 'Actualizar',
            'icon' => 'la la-sync',
            'wrapper' => [
               'element' => 'a',
                'href' => url('/api/token'),
                //'target' => '_blank',
                'title' => 'Send a new email to this user',
                /* 'href' => function ($entry, $crud) {
                    return url("/api/token");
                }, */
                'ajax' => true, // <- just add `ajax` and it's ready to make ajax request
            ],
            'ajax' => [
               // optional attributes
                'method' => 'GET',
                'refreshCrudTable' => true, // to refresh table on success
                'success_title' => "Actualización de cotizaciones",
                'success_message' => 'las cotizaciones se actualizaron correctamente',
                'error_title' => 'Error',
                'error_message' => 'There was an error sending the payment reminder. Please try again.',
            ],
        ]);
        //CRUD::setFromDb(); // set columns from db columns.
        // dynamic data to render in the following widget
        $sumaUsd = Operacion::sum("usd"); 
        $sumaUsdActual = Operacion::with('instrumento')->get()->sum(function ($operacion) {
            return $operacion->usdActual;
        });
        //add div row using 'div' widget and make other widgets inside it to be in a row
        Widget::add()->to('before_content')->type('div')->class('row')->content([

            //widget made using fluent syntax
            Widget::make()
                ->type('progress_white')
                ->class('card border-0   mb-2')
                ->progressClass('progress-bar bg-primary')
                ->value("USD ".number_format($sumaUsd, 2, ',', '.'))
                ->description('Monto invertido')
                ->progress(100 * (int)$sumaUsd / 15000)
               ->hint(  number_format(15000-$sumaUsd, 2, ',', '.') . ' para la meta.'),

            //widget made using the array definition
            Widget::make()
                ->type('progress_white')
                ->class('card mb-2')
                ->progressClass('progress-bar bg-primary')
                ->value("USD ".number_format($sumaUsdActual, 2, ',', '.'))
                ->description('Monto Actual')
               ->progress(100 * (int)$sumaUsd / 15000)
               ->hint(  number_format(15000-$sumaUsdActual, 2, ',', '.') . ' para la meta.'),
        ]);
        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('tipo')->type('number');
         */
        CRUD::column('instrumento_id')->label("Acción")->attibute("nombre")->type("select");
        CRUD::column('tipo')->type('enum')->label("Tipo");
        //CRUD::column('fecha')->type('date')->label("Fecha");
        CRUD::column('cantidad')->type('number')->label("Cantidad");
        //CRUD::column('cotizacion')->type('number')->label("Cotizacion")->prefix("ARS ");
        CRUD::column('usd')->type('number')->label("USD")->decimals(2)->dec_point(",")->thousands_sep(".");
        //CRUD::column('ars')->type('number')->label("ARS");
        CRUD::column('usdActual')->type('number')->label("USD Actual")->decimals(2)->dec_point(",")->thousands_sep(".");
        //CRUD::column('cuenta_id')->label("Cuenta")->type('select')->attribute('nombre');

        CRUD::button('export')->stack('top')->view('crud::buttons.quick');
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(OperacionRequest::class);
        CRUD::setFromDb(); // set fields from db columns.

        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */

        CRUD::field('instrumento_id')->type('select')->label("Instrumento");
        CRUD::field('tipo')->type('enum')->label("Tipo de Operacion");
        CRUD::field('fecha')->type('date')->label("Fecha");
        CRUD::field('cantidad')->type('number')->label("Cantidad");
        CRUD::field('cotizacion')->type('number')->label("Cotizacion");

        CRUD::field('ars')->type('number')->label("Monto ARS")->attributes(['step' => '0.01'])->prefix("ARS");
        CRUD::field('usd')->type('number')->label("Monto USD")->attributes(['step' => '0.01'])->prefix('USD');

        CRUD::field('cuenta_id')->type('select')->label("Cuenta")->attribute('nombre');
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    // if you just want to show the same columns as inside ListOperation
    protected function setupShowOperation()
    {

        CRUD::column('instrumento_id')->label("Acción")->attibute("nombre")->type("select");
        CRUD::column('tipo')->type('enum')->label("Tipo");
        CRUD::column('fecha')->type('date')->label("Fecha");
        CRUD::column('cantidad')->type('number')->label("Cantidad");
        //CRUD::column('cotizacion')->type('number')->label("Cotizacion")->prefix("ARS ");
        CRUD::column('usd')->type('number')->label("USD");
        CRUD::column('ars')->type('number')->label("ARS");
        CRUD::column('usdActual')->type('number')->label("USD Actual")->decimals(2)->dec_point(",")->thousands_sep(".");
        CRUD::column('cuenta_id')->label("Cuenta")->type('select')->attribute('nombre');
    }
}
