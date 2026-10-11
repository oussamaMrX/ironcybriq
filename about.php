<?php
define('IC_SITE', true);
require __DIR__ . '/includes/helpers.php';

$page = array(
    'key'         => 'about',
    'title'       => 'About Us | IronCybriq Solutions',
    'description' => 'Learn about IronCybriq Solutions - independent cybersecurity consulting firm providing expert security advice, risk management, and governance solutions.',
    'canonical'   => 'https://ironcybriq.ma/about.php',
);

$capabilities = array(
    array('lightbulb', 'Independent Advice', 'We provide unbiased, vendor-neutral guidance to help you make informed security decisions without external pressures or conflicts of interest.'),
    array('shield', 'Security Solutions', 'We deliver comprehensive cybersecurity solutions including assessments, governance frameworks, and strategic consulting to protect your critical assets and data.'),
    array('settings', 'System Protection', 'We help you implement robust security controls and governance frameworks that protect your critical systems and data from evolving threats.'),
);

$values = array(
    array('Integrity', 'We maintain the highest standards of honesty and ethical conduct in all our engagements. Our independence ensures that our recommendations are always in your best interest.'),
    array('Excellence', 'We are committed to delivering exceptional quality in every project. Our team continuously updates their knowledge to stay current with the latest threats and best practices.'),
    array('Collaboration', 'We work closely with your team to understand your unique challenges and develop solutions that fit your organizational culture and business objectives.'),
    array('Innovation', 'We leverage cutting-edge methodologies and tools while maintaining a focus on practical, implementable solutions that deliver real value.'),
);

$reasons = array(
    array('Independent Perspective', 'No vendor relationships mean unbiased recommendations tailored to your needs'),
    array('Deep Expertise', 'Our team brings decades of combined experience across various industries and security domains'),
    array('Practical Solutions', 'We focus on actionable recommendations that you can implement effectively'),
    array('Comprehensive Services', 'From security assessments to governance frameworks, we provide end-to-end cybersecurity solutions'),
    array('Training Support', "When needed, we offer premium training retreats to enhance your team's security capabilities"),
    array('Proven Track Record', "We've helped hundreds of organizations improve their security posture and reduce risk"),
    array('Ongoing Support', "We're committed to your long-term success, not just short-term engagements"),
);

require __DIR__ . '/includes/header.php';
?>

<section class="page-head theme-dark">
  <div class="container page-head__inner page-head__inner--solo">
    <h1 class="h1">About IronCybriq Solutions</h1>
  </div>
</section>

<section class="section theme-light" aria-labelledby="mission-title">
  <div class="container feature feature--flip">
    <div class="feature__text" data-reveal>
      <h2 class="h2" id="mission-title">Our Mission</h2>
      <p class="lede">We strengthen organizations by providing independent cybersecurity consulting that protects systems and empowers teams. Our mission is to deliver expert security advice, risk management, and governance solutions that ensure secure digital infrastructure.</p>
      <p>We believe that effective cybersecurity requires strategic thinking, strong governance, and practical solutions. We also offer premium training retreats to enhance your team's internal capabilities when needed.</p>
    </div>

    <figure class="feature__media frame frame--plate" data-reveal>
      <img src="assets/img/illustration.webp" width="653" height="545" decoding="async" alt="About IronCybriq">
    </figure>
  </div>
</section>

<section class="section theme-paper" aria-labelledby="what-title">
  <div class="container split">
    <header class="split__head" data-reveal>
      <h2 class="h2" id="what-title">What We Do</h2>
      <p class="lede">IronCybriq Solutions is an independent cybersecurity consulting firm specializing in helping organizations navigate the complex landscape of digital security. We provide expert advice that is free from vendor bias, allowing you to make decisions based solely on what's best for your organization.</p>
    </header>

    <ul class="rows split__body" data-stagger>
<?php foreach ($capabilities as $item): ?>
      <li class="row" data-reveal>
        <span class="chip"><?= icon($item[0]) ?></span>
        <div class="row__body">
          <h3 class="h3"><?= e($item[1]) ?></h3>
          <p><?= e($item[2]) ?></p>
        </div>
      </li>
<?php endforeach; ?>
    </ul>
  </div>
</section>

<section class="section theme-light" aria-labelledby="values-title">
  <div class="container">
    <h2 class="h2 section-title" id="values-title" data-reveal>Our Values</h2>
    <ul class="values" data-stagger>
<?php foreach ($values as $item): ?>
      <li class="value" data-reveal>
        <?= icon('circle-check', 'value__icon') ?>
        <h3 class="h3"><?= e($item[0]) ?></h3>
        <p><?= e($item[1]) ?></p>
      </li>
<?php endforeach; ?>
    </ul>
  </div>
</section>

<section class="section theme-paper" aria-labelledby="why-title">
  <div class="container split">
    <header class="split__head" data-reveal>
      <h2 class="h2" id="why-title">Why Choose Us?</h2>
    </header>

    <dl class="defs split__body" data-stagger>
<?php foreach ($reasons as $item): ?>
      <div class="defs__row" data-reveal>
        <dt><?= e($item[0]) ?></dt>
        <dd><?= e($item[1]) ?></dd>
      </div>
<?php endforeach; ?>
    </dl>
  </div>
</section>

<section class="section section--cta theme-light" aria-labelledby="cta-title">
  <div class="container">
    <div class="cta theme-dark" data-reveal>
      <div class="cta__text">
        <h2 class="h2" id="cta-title">Ready to Work With Us?</h2>
        <p class="lede">Let's discuss how IronCybriq Solutions can help strengthen your organization's cybersecurity posture.</p>
      </div>
      <p class="cta__actions">
        <a class="btn btn--primary btn--lg" href="contact.php">Contact Us <?= icon('arrow-right') ?></a>
        <a class="btn btn--ghost btn--lg" href="services.php">View Our Services</a>
      </p>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
