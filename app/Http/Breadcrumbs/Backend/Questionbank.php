<?php

Breadcrumbs::register('admin.questionbanks.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.questionbanks.management'), route('admin.questionbanks.index'));
});

Breadcrumbs::register('admin.questionbanks.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.questionbanks.index');
    $breadcrumbs->push(trans('menus.backend.questionbanks.create'), route('admin.questionbanks.create'));
});

Breadcrumbs::register('admin.questionbanks.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.questionbanks.index');
    $breadcrumbs->push(trans('menus.backend.questionbanks.edit'), route('admin.questionbanks.edit', $id));
});
