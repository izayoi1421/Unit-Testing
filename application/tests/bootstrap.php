<?php
if (!defined('BASEPATH')) {
    define('BASEPATH', realpath(dirname(__FILE__) . '/../../system/') . DIRECTORY_SEPARATOR);
}

define('APPPATH', dirname(__FILE__) . '/../');
define('EXT', '.php');
define('ENVIRONMENT', 'testing');
define('VIEWPATH', APPPATH . 'views' . DIRECTORY_SEPARATOR);

require_once APPPATH . '../system/core/CodeIgniter.php';
