<?php

Breadcrumbs::register('admin.psycologicalconditiontypes.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.psycologicalconditiontypes.management'), route('admin.psycologicalconditiontypes.index'));
});

Breadcrumbs::register('admin.psycologicalconditiontypes.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.psycologicalconditiontypes.index');
    $breadcrumbs->push(trans('menus.backend.psycologicalconditiontypes.create'), route('admin.psycologicalconditiontypes.create'));
});

Breadcrumbs::register('admin.psycologicalconditiontypes.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.psycologicalconditiontypes.index');
    $breadcrumbs->push(trans('menus.backend.psycologicalconditiontypes.edit'), route('admin.psycologicalconditiontypes.edit', $id));
});
