<?php

// Home
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Dashboard', route('dashboard'));
});

// Dashboard > Project
Breadcrumbs::for('project', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Project', route('project.index'));
});
