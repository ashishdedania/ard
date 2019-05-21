<?php

Breadcrumbs::register('admin.clinicalservices.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.clinicalservices.management'), route('admin.clinicalservices.index'));
});

Breadcrumbs::register('admin.clinicalservices.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.clinicalservices.index');
    $breadcrumbs->push(trans('menus.backend.clinicalservices.create'), route('admin.clinicalservices.create'));
});

Breadcrumbs::register('admin.clinicalservices.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.clinicalservices.index');
    $breadcrumbs->push(trans('menus.backend.clinicalservices.edit'), route('admin.clinicalservices.edit', $id));
});
