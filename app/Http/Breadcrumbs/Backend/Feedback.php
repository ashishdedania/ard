<?php

Breadcrumbs::register('admin.feedback.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.feedback.management'), route('admin.feedback.index'));
});

Breadcrumbs::register('admin.feedback.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.feedback.index');
    $breadcrumbs->push(trans('menus.backend.feedback.create'), route('admin.feedback.create'));
});

Breadcrumbs::register('admin.feedback.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.feedback.index');
    $breadcrumbs->push(trans('menus.backend.feedback.edit'), route('admin.feedback.edit', $id));
});
