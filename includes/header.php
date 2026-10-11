<?php
/**
 * Document head, skip link, site header and navigation.
 * Expects $page = array('key', 'title', 'description', 'canonical', ['keywords'], ['preload']).
 */
if (!defined('IC_SITE')) { http_response_code(404); exit; }

$site = site();
$key  = isset($page['key']) ? $page['key'] : '';
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= e($page['title']) ?></title>
<meta name="description" content="<?= e($page['description']) ?>">
<?php if (!empty($page['keywords'])): ?>
<meta name="keywords" content="<?= e($page['keywords']) ?>">
<?php endif; ?>
<link rel="canonical" href="<?= e($page['canonical']) ?>">
<meta name="theme-color" content="#0a1c2b">
<link rel="icon" type="image/png" href="<?= e(asset('assets/img/favicon.png')) ?>">
<link rel="apple-touch-icon" href="<?= e(asset('assets/img/apple-touch-icon.png')) ?>">
<link rel="preload" href="assets/fonts/geist-latin-wght.woff2" as="font" type="font/woff2" crossorigin>
<?php if (!empty($page['preload_hero'])): ?>
<link rel="preload" as="image" type="image/webp" fetchpriority="high" href="assets/img/hero-1024.webp"
      imagesrcset="assets/img/hero-640.webp 640w, assets/img/hero-1024.webp 1024w, assets/img/hero-1536.webp 1536w" imagesizes="100vw">
<?php endif; ?>
<link rel="stylesheet" href="<?= e(asset('assets/css/site.css')) ?>">
<script>document.documentElement.className = 'js';</script>
</head>
<body class="page-<?= e($key) ?>">
<a class="skip-link" href="#main">Skip to content</a>
<?php require __DIR__ . '/sprite.php'; ?>

<header class="site-header theme-dark" data-header>
  <div class="container site-header__inner">
    <a class="brand" href="index.php">
      <img src="<?= e(asset('assets/img/logo.png')) ?>" width="365" height="132" alt="IronCybriq Solutions">
    </a>

    <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="site-nav" data-nav-toggle>
      <span class="nav-toggle__bars" aria-hidden="true"></span>
      <span class="sr-only">Toggle navigation</span>
    </button>

    <nav class="site-nav" id="site-nav" aria-label="Main" data-nav>
      <ul class="site-nav__list">
<?php foreach ($site['nav'] as $navKey => $item): ?>
<?php if ($navKey === 'contact'): ?>
        <li class="site-nav__cta"><a class="btn btn--primary btn--sm" href="<?= e($item['href']) ?>"<?= $key === $navKey ? ' aria-current="page"' : '' ?>><?= e($item['label']) ?></a></li>
<?php else: ?>
        <li><a class="site-nav__link" href="<?= e($item['href']) ?>"<?= $key === $navKey ? ' aria-current="page"' : '' ?>><?= e($item['label']) ?></a></li>
<?php endif; ?>
<?php endforeach; ?>
      </ul>
    </nav>
  </div>
</header>

<main id="main">
