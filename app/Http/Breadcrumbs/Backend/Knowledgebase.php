<?php

Breadcrumbs::register('admin.knowledgebases.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.knowledgebases.management'), route('admin.knowledgebases.index'));
});

Breadcrumbs::register('admin.knowledgebases.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.knowledgebases.index');
    $breadcrumbs->push(trans('menus.backend.knowledgebases.create'), route('admin.knowledgebases.create'));
});

Breadcrumbs::register('admin.knowledgebases.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.knowledgebases.index');
    $breadcrumbs->push(trans('menus.backend.knowledgebases.edit'), route('admin.knowledgebases.edit', $id));
});
