<?php
/*
  $Id: $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2014 osCommerce

  Released under the GNU General Public License
*/

  define('MODULE_PAYMENT_STRIPE_TEXT_TITLE', 'Stripe');
  define('MODULE_PAYMENT_STRIPE_TEXT_PUBLIC_TITLE', 'Tarjeta de crédito');
  define('MODULE_PAYMENT_STRIPE_TEXT_DESCRIPTION', '<img src="images/icon_info.gif" border="0" />&nbsp;<a href="http://library.oscommerce.com/Package&en&stripe&oscom23&stripe_js" target="_blank" style="text-decoration: underline; font-weight: bold;">Ver documentación en línea</a><br /><br /><img src="images/icon_popup.gif" border="0">&nbsp;<a href="https://www.stripe.com" target="_blank" style="text-decoration: underline; font-weight: bold;">Visitar la página web de Stripe</a>');

  define('MODULE_PAYMENT_STRIPE_ERROR_ADMIN_CURL', 'Este módulo requiere que cURL esté habilitado en PHP y no se cargará hasta que se haya habilitado en este servidor web.');
  define('MODULE_PAYMENT_STRIPE_ERROR_ADMIN_CONFIGURATION', 'Este módulo no se cargará hasta que se hayan configurado los parámetros de clave publicable (Publishable Key) y clave secreta (Secret Key). Edite y configure los ajustes de este módulo.');

  define('MODULE_PAYMENT_STRIPE_CREDITCARD_NEW', 'Ingrese una nueva tarjeta');
  define('MODULE_PAYMENT_STRIPE_CREDITCARD_OWNER', 'Titular de la tarjeta:');
  define('MODULE_PAYMENT_STRIPE_CREDITCARD_NUMBER', 'Número de tarjeta:');
  define('MODULE_PAYMENT_STRIPE_CREDITCARD_EXPIRY', 'Fecha de caducidad:');
  define('MODULE_PAYMENT_STRIPE_CREDITCARD_CVC', 'Código de seguridad:');
  define('MODULE_PAYMENT_STRIPE_CREDITCARD_SAVE', '¿Guardar la tarjeta para futuras compras?');

  define('MODULE_PAYMENT_STRIPE_ERROR_TITLE', 'Ha habido un error al procesar su tarjeta de crédito');
  define('MODULE_PAYMENT_STRIPE_ERROR_GENERAL', 'Por favor intente nuevamente y si los problemas persisten, intente con otro método de pago.');
  define('MODULE_PAYMENT_STRIPE_ERROR_CARDSTORED', 'La tarjeta almacenada no se pudo encontrar. Por favor intente nuevamente y si los problemas persisten, intente con otro método de pago.');

  define('MODULE_PAYMENT_STRIPE_DIALOG_CONNECTION_LINK_TITLE', 'Pruebe la conexión del servidor API');
  define('MODULE_PAYMENT_STRIPE_DIALOG_CONNECTION_TITLE', 'Prueba de conexión del servidor API');
  define('MODULE_PAYMENT_STRIPE_DIALOG_CONNECTION_GENERAL_TEXT', 'Probando la conexión al servidor..');
  define('MODULE_PAYMENT_STRIPE_DIALOG_CONNECTION_BUTTON_CLOSE', 'Cerrar');
  define('MODULE_PAYMENT_STRIPE_DIALOG_CONNECTION_TIME', 'Tiempo de conexión:');
  define('MODULE_PAYMENT_STRIPE_DIALOG_CONNECTION_SUCCESS', '¡Éxito!');
  define('MODULE_PAYMENT_STRIPE_DIALOG_CONNECTION_FAILED', '¡Fallo! Revise la configuración del certificado Verify SSL e intente de nuevo..');
  define('MODULE_PAYMENT_STRIPE_DIALOG_CONNECTION_ERROR', 'Ocurrió un error. Actualice la página, revise su configuración y vuelva a intentarlo.');
?>
