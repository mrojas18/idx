{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<x-backpack::menu-item title="Acciones" icon="la la-question" :link="backpack_url('accion')" />
<x-backpack::menu-item title="Bancos" icon="la la-question" :link="backpack_url('banco')" />
<x-backpack::menu-item title="Cuentas" icon="la la-question" :link="backpack_url('cuenta')" />
<x-backpack::menu-item title="Users" icon="la la-question" :link="backpack_url('user')" />
<x-backpack::menu-item title="Inversions" icon="la la-question" :link="backpack_url('inversion')" />