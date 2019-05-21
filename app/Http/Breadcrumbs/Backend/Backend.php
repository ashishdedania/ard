<?php

Breadcrumbs::register('admin.dashboard', function ($breadcrumbs) {
    $breadcrumbs->push('Dashboard', route('admin.dashboard'));



    require __DIR__ . '/Search.php';
    require __DIR__ . '/Access/User.php';
    require __DIR__ . '/Access/Role.php';
    require __DIR__ . '/Access/Permission.php';
    require __DIR__ . '/Page.php';
    require __DIR__ . '/Email_Template.php';
    require __DIR__ . '/Setting.php';
    require __DIR__ . '/Blog_Category.php';
    require __DIR__ . '/Blog_Tag.php';
    require __DIR__ . '/Blog_Management.php';
    require __DIR__ . '/Faqs.php';
    require __DIR__ . '/Menu.php';
    require __DIR__ . '/LogViewer.php';

    require __DIR__ . '/Psycologicalconditiontype.php';
    require __DIR__ . '/Clinicalservice.php';
    require __DIR__ . '/Questionbank.php';

    require __DIR__ . '/Search.php';
    require __DIR__ . '/Access/User.php';
    require __DIR__ . '/Access/Role.php';
    require __DIR__ . '/Access/Permission.php';
    require __DIR__ . '/Page.php';
    require __DIR__ . '/Email_Template.php';
    require __DIR__ . '/Setting.php';
    require __DIR__ . '/Blog_Category.php';
    require __DIR__ . '/Blog_Tag.php';
    require __DIR__ . '/Blog_Management.php';
    require __DIR__ . '/Faqs.php';
    require __DIR__ . '/Menu.php';
    require __DIR__ . '/LogViewer.php';

    require __DIR__ . '/Psycologicalconditiontype.php';
    require __DIR__ . '/Clinicalservice.php';
    require __DIR__ . '/Client.php';
    require __DIR__ . '/Managesession.php';
    require __DIR__ . '/Knowledgebase.php';
    require __DIR__ . '/Feedback.php';
    require __DIR__ . '/Report.php';
});

require __DIR__.'/Testimonial.php';
require __DIR__.'/Questiontype.php';