<?php
define('IC_SITE', true);
require __DIR__ . '/includes/helpers.php';

$page = array(
    'key'         => 'services',
    'title'       => 'Services | IronCybriq Solutions',
    'description' => 'Comprehensive cybersecurity services including advisory, governance, risk management, cloud security, and vendor selection support.',
    'canonical'   => 'https://ironcybriq.ma/services.php',
);

// id, icon, title, description, bullet points
$services = array(
    array('advisory', 'messages-square', 'Cybersecurity Advisory',
        'Strategic guidance from experienced cybersecurity professionals who understand both technical security and business requirements. We provide independent, unbiased advice to help you make informed decisions about your security investments.',
        array('Security strategy development', 'Technology roadmap planning', 'Security architecture review', 'Best practices implementation')),
    array('governance', 'scale', 'Cyber Governance & Risk Management',
        'Establish robust governance frameworks and comprehensive risk management programs that align with your business objectives and regulatory requirements.',
        array('Governance framework development', 'Risk assessment and analysis', 'Compliance program design', 'Policy and procedure development', 'Risk monitoring and reporting')),
    array('cloud', 'cloud', 'Cloud Security Assessment',
        'Comprehensive evaluation of your cloud infrastructure, applications, and data protection measures. We help you implement cloud security best practices and ensure proper configuration.',
        array('Cloud architecture security review', 'Configuration assessment', 'Identity and access management', 'Data protection strategies', 'Cloud compliance validation')),
    array('vendor', 'file-text', 'Vendor RFP & Selection Support',
        'Independent evaluation and support throughout the vendor selection process. We help you identify secure, reliable technology partners that meet your specific security and business requirements.',
        array('RFP development and review', 'Vendor security evaluation', 'Technical assessment', 'Contract security review', 'Implementation support')),
    array('training', 'graduation-cap', 'Premium Training Retreats',
        "Exclusive, immersive training experiences designed to enhance your team's cybersecurity knowledge and skills. Our retreats combine expert instruction with hands-on exercises in a focused learning environment.",
        array('Executive security briefings', 'Technical skills workshops', 'Incident response training', 'Security awareness programs', 'Customized curriculum development')),
    array('assessments', 'search', 'Security Assessments & Audits',
        'Thorough evaluation of your security controls, processes, and infrastructure to identify vulnerabilities and provide actionable recommendations for improvement.',
        array('Security posture assessment', 'Penetration testing', 'Vulnerability scanning', 'Security audit and review', 'Remediation planning')),
    array('development', 'settings', 'Software Development, Cloud & DevOps',
        'We develop modern web applications and business solutions, supported by reliable cloud deployment and streamlined delivery workflows. Our services cover web development, backend systems, API integrations, cloud configuration, and CI/CD automation, with a focus on maintainability, reliability, and security-conscious development.',
        array('Web development: Laravel, PHP, React', 'Backend development and API integration', 'Database development: MySQL', 'Cloud services: Microsoft Azure', 'CI/CD and deployment automation using appropriate tools such as GitHub Actions')),
);

require __DIR__ . '/includes/header.php';
?>

<section class="page-head theme-dark">
  <div class="container page-head__inner">
    <h1 class="h1">Our Services</h1>
    <p class="page-head__lead">We provide comprehensive cybersecurity solutions designed to strengthen your organization's security posture, manage risk effectively, and ensure compliance with industry standards.</p>
  </div>
</section>

<section class="section theme-light" aria-label="Our services">
  <div class="container">
    <div class="services">
<?php foreach ($services as $service): ?>
      <article class="service" id="<?= e($service[0]) ?>" data-reveal>
        <header class="service__head">
          <span class="chip"><?= icon($service[1]) ?></span>
          <h2 class="h3 service__title"><?= e($service[2]) ?></h2>
        </header>
        <div class="service__body">
          <p><?= e($service[3]) ?></p>
          <ul class="ticks">
<?php foreach ($service[4] as $point): ?>
            <li><?= e($point) ?></li>
<?php endforeach; ?>
          </ul>
        </div>
      </article>
<?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section section--cta theme-paper" aria-labelledby="cta-title">
  <div class="container">
    <div class="cta theme-dark" data-reveal>
      <div class="cta__text">
        <h2 class="h2" id="cta-title">Ready to Get Started?</h2>
        <p class="lede">Contact us today to discuss your cybersecurity needs and learn how we can help protect your organization.</p>
      </div>
      <p class="cta__actions"><a class="btn btn--primary btn--lg" href="contact.php">Contact Us <?= icon('arrow-right') ?></a></p>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
