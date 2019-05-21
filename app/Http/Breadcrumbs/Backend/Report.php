<?php

Breadcrumbs::register('admin.reports.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.reports.management'), route('admin.reports.index'));
});

Breadcrumbs::register('admin.reports.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.reports.index');
    $breadcrumbs->push(trans('menus.backend.reports.create'), route('admin.reports.create'));
});

Breadcrumbs::register('admin.reports.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.reports.index');
    $breadcrumbs->push(trans('menus.backend.reports.edit'), route('admin.reports.edit', $id));
});
