<?php
/**
 * Site-wide configuration: the single source of truth for navigation and
 * contact details. Every string here is carried over verbatim from the
 * original IronCybriq website.
 */
if (!defined('IC_SITE')) { http_response_code(404); exit; }

return array(
    'name'       => 'IronCybriq Solutions',
    'descriptor' => 'Independent Cybersecurity Consulting & Training',
    'copyright'  => '© 2025 IronCybriq Solutions. All rights reserved.',
    'base_url'   => 'https://ironcybriq.ma',

    'nav' => array(
        'home'     => array('label' => 'Home',     'href' => 'index.php'),
        'services' => array('label' => 'Services', 'href' => 'services.php'),
        'about'    => array('label' => 'About',    'href' => 'about.php'),
        'contact'  => array('label' => 'Contact',  'href' => 'contact.php'),
    ),

    'contact' => array(
        'emails'   => array('mostafa.essemmar@ironcybriq.ma', 'contact@ironcybriq.ma'),
        // Non-breaking spaces keep the number on one line at any width
        'phone'    => array('display' => "+212\u{00A0}667\u{00A0}980\u{00A0}006", 'tel' => '+212667980006'),
        'hours'    => 'Available Monday - Friday, 9 AM - 6 PM EST',
        'office'   => 'Meknès, Morocco',
        'response' => 'We typically respond within 24 hours during business days.',
    ),

    /*
     * Contact form delivery. Messages from contact.php are sent to "to" using
     * PHP's mail(). Both addresses are the site's existing contact address;
     * change them here to re-route the form.
     */
    'mail' => array(
        'to'   => 'contact@ironcybriq.ma',
        'from' => 'contact@ironcybriq.ma',
    ),
);
