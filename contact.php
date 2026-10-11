<?php
define('IC_SITE', true);
require __DIR__ . '/includes/helpers.php';

$page = array(
    'key'         => 'contact',
    'title'       => 'Contact Us | IronCybriq Solutions',
    'description' => 'Contact IronCybriq Solutions for independent cybersecurity consulting, security assessments, and advisory services. Get in touch with our expert team.',
    'canonical'   => 'https://ironcybriq.ma/contact.php',
);

$site    = site();
$contact = $site['contact'];

$serviceOptions = array(
    'Cybersecurity Advisory',
    'Governance & Risk Management',
    'Cloud Security Assessment',
    'Vendor Selection Support',
    'Training Retreats',
    'Security Assessment',
    'Other',
);

/* ---------------------------------------------------------------------------
 * Form handling. Works with JavaScript (fetch, JSON reply) and without it
 * (normal POST, page re-rendered with the result).
 * ------------------------------------------------------------------------ */

function ic_field($key, $max, $multiline = false)
{
    $value = isset($_POST[$key]) && is_string($_POST[$key]) ? $_POST[$key] : '';
    $value = str_replace("\r\n", "\n", $value);
    if (!$multiline) {
        $value = preg_replace('/[\r\n\t]+/', ' ', $value);
    }
    $value = trim($value);
    return function_exists('mb_substr') ? mb_substr($value, 0, $max, 'UTF-8') : substr($value, 0, $max);
}

function ic_send($to, $from, array $v)
{
    $subject = 'Website contact: ' . $v['service'];
    $body    = "Name: {$v['name']}\n"
             . "Email: {$v['email']}\n"
             . "Company: {$v['company']}\n"
             . "Phone: {$v['phone']}\n"
             . "Service interest: {$v['service']}\n\n"
             . $v['message'] . "\n";
    $headers = array(
        'MIME-Version: 1.0',
        'Content-Type: text/plain; charset=UTF-8',
        'From: IronCybriq Website <' . $from . '>',
        'Reply-To: ' . $v['email'],   // already validated, cannot contain line breaks
    );
    return @mail($to, '=?UTF-8?B?' . base64_encode($subject) . '?=', $body, implode("\r\n", $headers));
}

$values = array('name' => '', 'email' => '', 'company' => '', 'phone' => '', 'service' => '', 'message' => '');
$status = null; // null | 'sent' | 'error'

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $values = array(
        'name'    => ic_field('name', 120),
        'email'   => ic_field('email', 190),
        'company' => ic_field('company', 160),
        'phone'   => ic_field('phone', 40),
        'service' => ic_field('service', 80),
        'message' => ic_field('message', 5000, true),
    );

    $isBot = ic_field('website', 200) !== ''; // honeypot field, hidden from people
    $valid = $values['name'] !== ''
          && $values['message'] !== ''
          && filter_var($values['email'], FILTER_VALIDATE_EMAIL) !== false
          && in_array($values['service'], $serviceOptions, true);

    if ($isBot) {
        $status = 'sent'; // pretend success, send nothing
    } elseif (!$valid) {
        $status = 'error';
    } else {
        $status = ic_send($site['mail']['to'], $site['mail']['from'], $values) ? 'sent' : 'error';
    }

    if ($status === 'sent') {
        $values = array_fill_keys(array_keys($values), '');
    }

    $accept = isset($_SERVER['HTTP_ACCEPT']) ? $_SERVER['HTTP_ACCEPT'] : '';
    if (strpos($accept, 'application/json') !== false) {
        header('Content-Type: application/json; charset=UTF-8');
        header('Cache-Control: no-store');
        echo json_encode(array('ok' => $status === 'sent'));
        exit;
    }
}

require __DIR__ . '/includes/header.php';
?>

<section class="page-head theme-dark">
  <div class="container page-head__inner">
    <h1 class="h1">Contact Us</h1>
    <p class="page-head__lead">Ready to strengthen your cybersecurity posture? Get in touch with our team to discuss your needs and learn how we can help protect your organization.</p>
  </div>
</section>

<section class="section theme-paper" aria-label="Contact">
  <div class="container contact">

    <div class="card contact__form" data-reveal>
      <h2 class="h3" id="message">Send Us a Message</h2>

      <div class="alert alert--success" id="form-success" role="status"<?= $status === 'sent' ? '' : ' hidden' ?>>
        <?= icon('circle-check') ?>
        <p>Message sent! We will get back to you soon.</p>
      </div>
      <div class="alert alert--error" id="form-error" role="alert"<?= $status === 'error' ? '' : ' hidden' ?>>
        <?= icon('circle-alert') ?>
        <p>Something went wrong. Please check your details and try again, or email us directly.</p>
      </div>

      <form class="form" id="contact-form" method="post" action="contact.php#message">
        <div class="form__grid">
          <div class="field">
            <label for="f-name">Full Name <span class="req" aria-hidden="true">*</span></label>
            <input class="input" id="f-name" name="name" type="text" autocomplete="name" maxlength="120" required value="<?= e($values['name']) ?>">
          </div>
          <div class="field">
            <label for="f-email">Email Address <span class="req" aria-hidden="true">*</span></label>
            <input class="input" id="f-email" name="email" type="email" autocomplete="email" maxlength="190" required value="<?= e($values['email']) ?>">
          </div>
          <div class="field">
            <label for="f-company">Company Name</label>
            <input class="input" id="f-company" name="company" type="text" autocomplete="organization" maxlength="160" value="<?= e($values['company']) ?>">
          </div>
          <div class="field">
            <label for="f-phone">Phone Number</label>
            <input class="input" id="f-phone" name="phone" type="tel" autocomplete="tel" maxlength="40" value="<?= e($values['phone']) ?>">
          </div>
          <div class="field field--wide">
            <label for="f-service">Service Interest <span class="req" aria-hidden="true">*</span></label>
            <select class="input select" id="f-service" name="service" required>
              <option value="">Select Service Interest</option>
<?php foreach ($serviceOptions as $option): ?>
              <option<?= $values['service'] === $option ? ' selected' : '' ?>><?= e($option) ?></option>
<?php endforeach; ?>
            </select>
          </div>
          <div class="field field--wide">
            <label for="f-message">Tell us about your cybersecurity needs <span class="req" aria-hidden="true">*</span></label>
            <textarea class="input textarea" id="f-message" name="message" rows="6" maxlength="5000" required><?= e($values['message']) ?></textarea>
          </div>
        </div>

        <div class="hp" aria-hidden="true">
          <label for="f-website">Website</label>
          <input id="f-website" name="website" type="text" tabindex="-1" autocomplete="off">
        </div>

        <button class="btn btn--primary btn--lg form__submit" type="submit"><?= icon('send') ?> Send Message</button>
      </form>
    </div>

    <section class="panel contact__info theme-dark" aria-labelledby="info-title" data-reveal>
      <h2 class="h3" id="info-title">Get In Touch</h2>
      <ul class="info">
        <li class="info__item">
          <span class="chip"><?= icon('mail') ?></span>
          <h3 class="label">Email</h3>
          <div class="info__values">
<?php foreach ($contact['emails'] as $address): ?>
            <p><a href="mailto:<?= e($address) ?>"><?= e($address) ?></a></p>
<?php endforeach; ?>
          </div>
        </li>
        <li class="info__item">
          <span class="chip"><?= icon('phone') ?></span>
          <h3 class="label">Phone</h3>
          <div class="info__values">
            <p><a href="tel:<?= e($contact['phone']['tel']) ?>"><?= e($contact['phone']['display']) ?></a></p>
            <p class="info__note"><?= e($contact['hours']) ?></p>
          </div>
        </li>
        <li class="info__item">
          <span class="chip"><?= icon('map-pin') ?></span>
          <h3 class="label">Office</h3>
          <div class="info__values">
            <p><?= e($contact['office']) ?></p>
          </div>
        </li>
        <li class="info__item">
          <span class="chip"><?= icon('clock') ?></span>
          <h3 class="label">Response Time</h3>
          <div class="info__values">
            <p><?= e($contact['response']) ?></p>
          </div>
        </li>
      </ul>
    </section>

  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
