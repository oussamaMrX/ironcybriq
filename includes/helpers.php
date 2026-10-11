<?php
/**
 * Small template helpers shared by every page.
 * Written to stay compatible with PHP 7.0+ (no newer syntax).
 */
if (!defined('IC_SITE')) { http_response_code(404); exit; }

/** Site configuration (see site.php). */
function site($key = null)
{
    static $config = null;
    if ($config === null) {
        $config = require __DIR__ . '/site.php';
    }
    return $key === null ? $config : $config[$key];
}

/** Escape a value for HTML output. */
function e($value)
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/** Inline SVG icon from the sprite in sprite.php. */
function icon($name, $class = '')
{
    $class = trim('icon ' . $class);
    return '<svg class="' . e($class) . '" aria-hidden="true" focusable="false"><use href="#i-' . e($name) . '"/></svg>';
}

/** Asset URL with a cache-busting version taken from the file's mtime. */
function asset($path)
{
    $file = dirname(__DIR__) . '/' . $path;
    return $path . (is_file($file) ? '?v=' . filemtime($file) : '');
}
// deployment-test-456
