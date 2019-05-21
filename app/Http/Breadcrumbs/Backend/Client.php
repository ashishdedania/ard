<?php

Breadcrumbs::register('admin.clients.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.clients.management'), route('admin.clients.index'));
});

Breadcrumbs::register('admin.clients.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.clients.index');
    $breadcrumbs->push(trans('menus.backend.clients.create'), route('admin.clients.create'));
});

Breadcrumbs::register('admin.clients.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.clients.index');
    $breadcrumbs->push(trans('menus.backend.clients.edit'), route('admin.clients.edit', $id));
});
