<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\OperacionRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

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
        //CRUD::setFromDb(); // set columns from db columns.

        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('tipo')->type('number');
         */
        CRUD::column('instrumento_id')->label("Acción")->attibute("nombre")->type("select");
        CRUD::column('tipo')->type('enum')->label("Tipo");
        CRUD::column('fecha')->type('date')->label("Fecha");
        CRUD::column('cantidad')->type('number')->label("Cantidad");
        //CRUD::column('cotizacion')->type('number')->label("Cotizacion")->prefix("ARS ");
        CRUD::column('usd')->type('number')->label("USD");
        CRUD::column('ars')->type('number')->label("ARS");
        //CRUD::column('cuenta_id')->label("Cuenta")->type('select')->attribute('nombre');
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
        
        CRUD::field('usd')->type('number')->label("Monto USD");
        CRUD::field('ars')->type('number')->label("Monto ARS");
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
}
