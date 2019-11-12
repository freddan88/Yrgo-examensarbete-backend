<?php

declare(strict_types=1);

/*
|--------------------------------------------------------------------------
| Plate
|--------------------------------------------------------------------------
|
| Plate provides a bunch of handy WordPress defaults to help you get the
| most out of WordPress development.
|
| Please see https://github.com/wordplate/plate
|
*/

// Disable sidebar menu items.
add_theme_support('plate-disable-menu', [
    'edit-comments.php', // comments
    'index.php', // dashboard
    'edit.php', // Posts
    'edit.php?post_type=page', // Pages
    // 'upload.php', // media
    // 'edit.php?post_type=acf-field-group', // custom post type
    // 'tools.php?page=wp-migrate-db', // plugin in tools
    // 'options-general.php?page=menu_editor', // plugin in settings
    // 'admin.php?page=theseoframework-settings', // plugin in menu root
]);

// Disable meta boxes in editor.
add_theme_support('plate-disable-editor', [
    'commentsdiv',
    'commentstatusdiv',
    'linkadvanceddiv',
    'linktargetdiv',
    'linkxfndiv',
    'postcustom',
    'postexcerpt',
    'revisionsdiv',
    'slugdiv',
    'sqpt-meta-tags',
    'trackbacksdiv',
    'categorydiv',
    'tagsdiv-post_tag',
]);

// Disable dashboard widgets.
add_theme_support('plate-disable-dashboard', [
    'dashboard_activity',
    'dashboard_incoming_links',
    'dashboard_plugins',
    'dashboard_recent_comments',
    'dashboard_primary',
    'dashboard_quick_press',
    'dashboard_recent_drafts',
    'dashboard_secondary',
    // 'dashboard_right_now',
]);

// Disable links from admin toolbar.
add_theme_support('plate-disable-toolbar', [
    'archive',
    'comments',
    'wp-logo',
    'edit',
    'appearance',
    'view',
    'new-content',
    'updates',
    'search',
]);

// Disable dashboard tabs.
add_theme_support('plate-disable-tabs', ['help']);

// Set custom permalink structure.
add_theme_support('plate-permalink', '/%postname%/');

// Set custom login logo.
// add_theme_support('plate-login-logo', asset('assets/example.png'));

// Set custom footer text.
// add_theme_support('plate-footer-text', 'Adminpanel för: <a href="http://www.leemann.se/fredrik" target="_blank">Hemsida</a>');