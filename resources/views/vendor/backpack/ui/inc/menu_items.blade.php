{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<x-backpack::menu-item title="Bancos" icon="la la-question" :link="backpack_url('banco')" />
<x-backpack::menu-item title="Cuentas" icon="la la-question" :link="backpack_url('cuenta')" />
<x-backpack::menu-item title="Users" icon="la la-question" :link="backpack_url('user')" />
<x-backpack::menu-item title="Operacions" icon="la la-question" :link="backpack_url('operacion')" />
<x-backpack::menu-item title="Instrumentos" icon="la la-question" :link="backpack_url('instrumento')" />