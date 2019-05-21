<?php

Breadcrumbs::register('admin.managesessions.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.managesessions.management'), route('admin.managesessions.index'));
});

Breadcrumbs::register('admin.managesessions.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.managesessions.index');
    $breadcrumbs->push(trans('menus.backend.managesessions.create'), route('admin.managesessions.create'));
});

Breadcrumbs::register('admin.managesessions.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.managesessions.index');
    $breadcrumbs->push(trans('menus.backend.managesessions.edit'), route('admin.managesessions.edit', $id));
});
