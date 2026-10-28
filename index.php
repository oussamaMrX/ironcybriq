<?php
define('IC_SITE', true);
require __DIR__ . '/includes/helpers.php';



$page = array(
    'key'          => 'home',
    'title'        => 'IronCybriq Solutions - Cybersecurity Excellence',
    'description'  => 'IronCybriq Solutions - Expert independent cybersecurity consulting services. Protect your organization with strategic security advice, risk management, and governance.',
    'keywords'     => 'cybersecurity, security consulting, cyber governance, risk management, security training',
    'canonical'    => 'https://ironcybriq.ma/',
    'preload_hero' => true,
);

$strengths = array(
    array('shield-user', 'Expert Advisors', 'Our team of certified cybersecurity professionals brings decades of combined experience in protecting organizations from evolving threats.'),
    array('chart-line', 'Risk Management', "Comprehensive risk assessment and governance frameworks tailored to your organization's unique security needs and compliance requirements."),
    array('shield-check', 'Comprehensive Security', 'End-to-end cybersecurity solutions from risk assessment to implementation, ensuring your organization stays protected against evolving threats.'),
);

// icon, title, text, matching section on services.php
$services = array(
    array('search', 'Security Assessments', 'Thorough evaluation of your current security posture, identifying vulnerabilities and providing actionable recommendations for improvement.', 'assessments'),
    array('cloud', 'Cloud Security', 'Expert assessment and implementation of cloud security best practices to protect your data and applications in the cloud.', 'cloud'),
    array('handshake', 'Vendor Selection', 'Independent RFP support and vendor evaluation to help you choose secure, reliable technology partners that meet your security standards.', 'vendor'),
    array('book-open', 'Governance & Compliance', 'Develop robust cybersecurity governance frameworks and ensure compliance with industry regulations and standards.', 'governance'),
    array('settings', 'Software Development, Cloud & DevOps', 'Modern web applications and business solutions, supported by cloud deployment and streamlined delivery workflows.', 'development'),
);

require __DIR__ . '/includes/header.php';
?>

<section class="hero theme-dark" aria-labelledby="hero-title">
  <div class="hero__media" aria-hidden="true">
    <img src="assets/img/hero-1536.webp"
         srcset="assets/img/hero-640.webp 640w, assets/img/hero-1024.webp 1024w, assets/img/hero-1536.webp 1536w"
         sizes="100vw" width="1536" height="1024" alt="" fetchpriority="high" decoding="async">
         <!-- deployment-test-123 -->
  </div>

  <div class="container hero__inner">
    <div class="hero__content">
      <p class="eyebrow">IronCybriq Solutions</p>
      <h1 class="hero__title" id="hero-title">Independent Cybersecurity Consulting &amp; Strategic Advisory</h1>
      <p class="hero__lead">Empowering organizations with expert guidance to strengthen security posture and mitigate risk.</p>
      <p class="hero__actions">
        <a class="btn btn--primary btn--lg" href="contact.php">Schedule a Consultation <?= icon('arrow-right') ?></a>
      </p>
    </div>

    <dl class="stats">
      <div class="stat"><dt>Projects Completed</dt><dd>500+</dd></div>
      <div class="stat"><dt>Client Satisfaction</dt><dd>98%</dd></div>
      <div class="stat"><dt>Years Experience</dt><dd>23+</dd></div>
      <div class="stat"><dt>Support Available</dt><dd>24/7</dd></div>
    </dl>
  </div>
</section>

<section class="section theme-light" aria-labelledby="why-title">
  <div class="container split">
    <header class="split__head" data-reveal>
      <h2 class="h2" id="why-title">Why Choose IronCybriq?</h2>
      <p class="lede">We help organizations strengthen their cybersecurity governance, manage risk, and choose secure vendors with expert independent advice.</p>
    </header>

    <ul class="rows split__body" data-stagger>
<?php foreach ($strengths as $item): ?>
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

<section class="section theme-dark" aria-labelledby="services-title">
  <div class="container split">
    <header class="split__head" data-reveal>
      <h2 class="h2" id="services-title">Our Services</h2>
      <p class="lede">Comprehensive cybersecurity solutions to protect your digital infrastructure</p>
      <p class="split__action"><a class="btn btn--primary" href="services.php">View All Services <?= icon('arrow-right') ?></a></p>
    </header>

    <ul class="tiles split__body" data-stagger>
<?php foreach ($services as $item): ?>
      <li data-reveal>
        <a class="tile" href="services.php#<?= e($item[3]) ?>">
          <span class="tile__top">
            <span class="chip"><?= icon($item[0]) ?></span>
            <?= icon('arrow-up-right', 'tile__arrow') ?>
          </span>
          <h3 class="h3"><?= e($item[1]) ?></h3>
          <p><?= e($item[2]) ?></p>
        </a>
      </li>
<?php endforeach; ?>
    </ul>
  </div>
</section>

<section class="section theme-light" aria-labelledby="future-title">
  <div class="container feature">
    <div class="feature__text" data-reveal>
      <h2 class="h2" id="future-title">Protecting Your Digital Future</h2>
      <p class="lede">In today's rapidly evolving threat landscape, organizations need strategic cybersecurity guidance that goes beyond technical solutions.</p>
      <p>IronCybriq Solutions provides independent, expert advice that helps you make informed decisions about your cybersecurity investments and strategies.</p>
      <p>We combine deep technical expertise with business acumen to deliver solutions that protect your assets while supporting your organizational goals.</p>
      <p class="feature__action"><a class="btn btn--primary" href="about.php">Learn More About Us <?= icon('arrow-right') ?></a></p>
    </div>

    <figure class="feature__media frame" data-reveal>
      <img src="assets/img/brand-card.webp" width="507" height="310" loading="lazy" decoding="async"
           alt="IronCybriq Solutions. Strong Advice: Smart Decisions.">
    </figure>
  </div>
</section>

<section class="section section--cta theme-paper" aria-labelledby="cta-title">
  <div class="container">
    <div class="cta theme-dark" data-reveal>
      <div class="cta__text">
        <h2 class="h2" id="cta-title">Ready to Strengthen Your Security?</h2>
        <p class="lede">Contact us today to discuss how we can help protect your organization</p>
      </div>
      <p class="cta__actions"><a class="btn btn--primary btn--lg" href="contact.php">Get In Touch <?= icon('arrow-right') ?></a></p>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
