<?php

$routes = array(
    "/" => array("controller" => "Home"),
    "/working-capital" => array("controller" => "WorkingCapital"),
    "/activate" => array("controller" => "Activation"),
    "/account" => array("controller" => "Account"),
    "/equipment-loans" => array("controller" => "EquipmentLoans"),
    "/offer-financing" => array("controller" => "OfferFinancing"),
    "/resources" => array("controller" => "Help"),
    "/article" => array("controller" => "Article"),
    "/faqs" => array("controller" => "FrequentlyAsked"),
    "/about" => array("controller" => "About"),
    "/success-stories" => array("controller" => "SuccessStories"),
    "/success-story" => array("controller" => "SuccessStories"),
    "/privacy-policy" => array("controller" => "PrivacyPolicy"),
    "/terms" => array("controller" => "Terms"),
    "/careers" => array("controller" => "Careers"),
    "/section179" => array("controller" => "Section179Page"),
    "/lowest-payment-terms" => array("controller" => "LowestPaymentTerms"),
    "/lowest-payment-guarantee" => array("controller" => "LowestPaymentGuarantee"),
    "/sba-loans" => array("controller" => "SBALoans"),
    "/failed-id-check" => array("controller" => "SimpleLanding"),
    "/successful-signing" => array("controller" => "SimpleLanding"),
    "/credit-authorization-agreement" => array("controller" => "CreditAuthorizationAgreement"),
    "/electronic-consent" => array("controller" => "ElectronicConsent"),
    '/ajax' => array(
        'POST' => array('controller' => 'AJAX'),
        'GET' => array('controller' => 'AJAX')
    )
);
