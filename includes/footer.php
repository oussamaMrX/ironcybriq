<?php
/** Closes <main>, renders the site footer and loads the script. */
if (!defined('IC_SITE')) { http_response_code(404); exit; }

$site    = site();
$contact = $site['contact'];
$email   = $site['mail']['to'];
?>
</main>

<footer class="site-footer theme-dark">
                                                                           <!-- deployment-test-123 -->
  <div class="container">
    <div class="site-footer__grid">
      <div class="site-footer__brand">
        <a class="brand" href="index.php">
          <img src="<?= e(asset('assets/img/logo.png')) ?>" width="365" height="132" alt="IronCybriq Solutions" loading="lazy">
        </a>
        <p><?= e($site['descriptor']) ?></p>
      </div>

      <nav class="site-footer__nav" aria-label="Footer">
        <ul>
<?php foreach ($site['nav'] as $item): ?>
          <li><a href="<?= e($item['href']) ?>"><?= e($item['label']) ?></a></li>
<?php endforeach; ?>
        </ul>
      </nav>

      <ul class="site-footer__contact">
        <li><?= icon('mail') ?><a href="mailto:<?= e($email) ?>"><?= e($email) ?></a></li>
        <li><?= icon('phone') ?><a href="tel:<?= e($contact['phone']['tel']) ?>"><?= e($contact['phone']['display']) ?></a></li>
        <li><?= icon('map-pin') ?><span><?= e($contact['office']) ?></span></li>
      </ul>
    </div>

    <p class="site-footer__legal"><?= e($site['copyright']) ?></p>
  </div>
</footer>

<script src="<?= e(asset('assets/js/site.js')) ?>" defer></script>
</body>
</html>
