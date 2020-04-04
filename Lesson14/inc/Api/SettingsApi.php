<?php

/**
 * @package  AlecadddPlugin::Inc\Api\SettingsApi.php
 */

namespace Inc\Api;

class AdminPageApi {

    protected $amdin_pages = [];

    public function register() {

        if (!empty($this->amdin_pages)) {
            add_action('admin_menu', array($this, '_addAdminMenu'));
        }
    }

    public function _addAdminMenu() {
        foreach ($this->amdin_pages as $page) {
            add_menu_page(
                    $page['page_title'],
                    $page['menu_title'],
                    $page['capability'],
                    $page['menu_slug'],
                    $page['callback'],
                    $page['icon_url'],
                    $page['position']
            );
        }
    }

    public function addPages(array $pages) {
        $this->amdin_pages = $pages;
        return $this;
    }

}
