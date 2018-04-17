<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2010 osCommerce

  Released under the GNU General Public License
*/

  $moneybookers_ping_button = '';
  if (defined('MODULE_PAYMENT_MONEYBOOKERS_STATUS') && tep_not_null(MODULE_PAYMENT_MONEYBOOKERS_SECRET_WORD)) {
    $moneybookers_ping_button = '<p><img src="images/icons/locked.gif" border="0">&nbsp;<a href=' . tep_href_link('ext/modules/payment/moneybookers/activation.php', 'action=testSecretWord', 'SSL') . ' style="text-decoration: underline; font-weight: bold;">Comprobar Palabra Secreta</a></p>';
  }

  define('MODULE_PAYMENT_MONEYBOOKERS_TEXT_TITLE', 'Moneybookers - Módulo principal');
  define('MODULE_PAYMENT_MONEYBOOKERS_TEXT_PUBLIC_TITLE', 'Moneybookers eWallet');
  define('MODULE_PAYMENT_MONEYBOOKERS_TEXT_DESCRIPTION', '<img src="images/icon_popup.gif" border="0">&nbsp;<a href="http://www.moneybookers.com/partners/oscommerce" target="_blank" style="text-decoration: underline; font-weight: bold;">Visite el sitio web de Moneybookers</a>' . $moneybookers_ping_button);
  define('MODULE_PAYMENT_MONEYBOOKERS_RETURN_TEXT', 'Continuar y volver a ' . STORE_NAME);
  define('MODULE_PAYMENT_MONEYBOOKERS_LANGUAGE_CODE', 'ES');

  define('MB_ACTIVATION_TITLE', 'Activación de Cuenta Moneybookers');
  define('MB_ACTIVATION_ACCOUNT_TITLE', 'Verificar cuenta');
  define('MB_ACTIVATION_ACCOUNT_TEXT', 'La activación de Quick Checkout de Moneybookers le permite realizar pagos directos desde tarjetas de crédito, tarjetas de débito y más de otras 60 opciones de pago locales en más de 200 países, además de Moneybookers eWallet.<br /><br />Para tener acceso a la red de pago internacional de Moneybookers <a href="http://www.moneybookers.com/partners/oscommerce" target="_blank">por favor regístrese aquí</a> para una cuenta gratis si aún no tienes una.');
  define('MB_ACTIVATION_EMAIL_ADDRESS', 'Email de su cuenta Moneybookers:');
  define('MB_ACTIVATION_ACTIVATE_TITLE', 'Activación de cuenta');
  define('MB_ACTIVATION_ACTIVATE_TEXT', 'Se ha enviado una solicitud de activación a Moneybookers. Tenga en cuenta que el proceso de verificación para utilizar Quick Checkout de Moneybookers podría demorar hasta 72 horas.<strong>Moneybookers se pondrá en contacto contigo cuando se haya completado el proceso de verificación.</strong><br /><br /><i>Después de la activación, Moneybookers le dará acceso a una nueva sección en su cuenta de Moneybookers llamada "Herramientas de comerciante" (Merchant Tools). Elija una palabra secreta (no use su contraseña para esto) e ingréselo en la sección de herramientas del comerciante y en la configuración del módulo de pago en la página siguiente.</i>');
  define('MB_ACTIVATION_NONEXISTING_ACCOUNT_TITLE', 'Cuenta errónea');
  define('MB_ACTIVATION_NONEXISTING_ACCOUNT_TEXT', 'La dirección de correo electrónico no es una cuenta de Moneybookers registrada. Por favor <a href="http://www.moneybookers.com/partners/oscommerce" target="_blank">regístrese aquí</a> para comenzar a vender con Moneybookers.');
  define('MB_ACTIVATION_SECRET_WORD_TITLE', 'Comprobación de Palabra Secreta');
  define('MB_ACTIVATION_SECRET_WORD_SUCCESS_TEXT', 'La palabra secreta se ha configurado <strong>correctamente</strong>! Las transacciones ahora se pueden verificar de forma segura con la pasarela de pago.');
  define('MB_ACTIVATION_SECRET_WORD_FAIL_TEXT', '¡La configuración de palabra secreta ha <strong>fallado</strong>! Revise la palabra secreta en su cuenta de "Herramientas de comerciante" (Merchant Tools) de Moneybookers y la configuración del módulo de pago.');
  define('MB_ACTIVATION_SECRET_WORD_ERROR_TITLE', 'Error');
  define('MB_ACTIVATION_SECRET_WORD_ERROR_EXCEEDED', 'Se ha excedido el número máximo de intentos. Por favor intente de nuevo en una hora.');
  define('MB_ACTIVATION_CORE_REQUIRED_TITLE', 'Se requiere el módulo principal de Moneybookers');
  define('MB_ACTIVATION_CORE_REQUIRED_TEXT', 'El módulo de pago principal de Moneybookers es necesario para respaldar las opciones de pago de Quick Checkout de Moneybookers. Continúe para instalar y configurar el módulo de pago principal.');
  define('MB_ACTIVATION_VERIFY_ACCOUNT_BUTTON', 'Verificar cuenta');
  define('MB_ACTIVATION_CONTINUE_BUTTON', 'Continuar y configurar el módulo de pago');
  define('MB_ACTIVATION_SUPPORT_TITLE', 'Soporte');
  define('MB_ACTIVATION_SUPPORT_TEXT', '¿Tienes preguntas? Comuníquese con Moneybookers por correo electrónico a <a href="mailto:ecommerce@moneybookers.com">ecommerce@moneybookers.com</a> o por teléfono +44 (0) 870 383 0762. Su pregunta también puede ser respondida en el  <a href="http://forums.oscommerce.com/forum/78-moneybookers/" target="_blank">Foro de apoyo a la comunidad de osCommerce</a>.');
?>
