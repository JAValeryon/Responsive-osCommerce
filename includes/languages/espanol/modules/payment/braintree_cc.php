<?php
/*
  $Id: $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2014 osCommerce

  Released under the GNU General Public License
*/

  define('MODULE_PAYMENT_BRAINTREE_CC_TEXT_TITLE', 'Soluciones de pago Braintree');
  define('MODULE_PAYMENT_BRAINTREE_CC_TEXT_PUBLIC_TITLE', 'Tarjeta de crédito');
  define('MODULE_PAYMENT_BRAINTREE_CC_TEXT_DESCRIPTION', '<img src="images/icon_info.gif" border="0" />&nbsp;<a href="http://library.oscommerce.com/Package&en&braintree&oscom23&braintree_js" target="_blank" style="text-decoration: underline; font-weight: bold;">Ver documentación en línea</a><br /><br /><img src="images/icon_popup.gif" border="0">&nbsp;<a href="https://www.braintreepayments.com" target="_blank" style="text-decoration: underline; font-weight: bold;">Visitar la página web de Braintree Payments</a>');

  define('MODULE_PAYMENT_BRAINTREE_CC_ERROR_ADMIN_PHP', 'La versión mínima de PHP que soporta este módulo es %s y no se cargará hasta que el servidor se haya instalado con una versión más reciente.');
  define('MODULE_PAYMENT_BRAINTREE_CC_ERROR_ADMIN_PHP_EXTENSIONS', 'Este módulo requiere las siguientes extensiones PHP y no se cargará hasta que PHP se haya actualizado:<br /><br />%s');
  define('MODULE_PAYMENT_BRAINTREE_CC_ERROR_ADMIN_MERCHANT_ACCOUNTS', 'Este módulo no se cargará hasta que se haya definido una cuenta comercial para la moneda %s.');
  define('MODULE_PAYMENT_BRAINTREE_CC_ERROR_ADMIN_CONFIGURATION', 'Este módulo no se cargará hasta que se hayan configurado los parámetros Merchant ID (ID de comerciante), Public Key (Clave Pública), Private Key (Clave Privada), and Client Side Encryption Key (Clave de cifrado del lado del cliente). Edite y configure los ajustes de este módulo.');

  define('MODULE_PAYMENT_BRAINTREE_CC_CREDITCARD_NEW', 'Ingrese una nueva tarjeta');
  define('MODULE_PAYMENT_BRAINTREE_CC_CREDITCARD_LAST_4', 'Últimos 4 dígitos:');
  define('MODULE_PAYMENT_BRAINTREE_CC_CREDITCARD_OWNER', 'Nombre en la tarjeta:');
  define('MODULE_PAYMENT_BRAINTREE_CC_CREDITCARD_NUMBER', 'Número de tarjeta:');
  define('MODULE_PAYMENT_BRAINTREE_CC_CREDITCARD_EXPIRY', 'Fecha de caducidad:');
  define('MODULE_PAYMENT_BRAINTREE_CC_CREDITCARD_CVV', 'Código de seguridad:');
  define('MODULE_PAYMENT_BRAINTREE_CC_CREDITCARD_SAVE', '¿Guardar la tarjeta para la próxima compra?');

  define('MODULE_PAYMENT_BRAINTREE_CC_CURRENCY_CHARGE', 'La moneda utilizada actualmente para mostrar precios está en %3$s. A su tarjeta de crédito se le cobrará un total de <span style="white-space: nowrap;">%1$s %2$s</span> para este pedido.');

  define('MODULE_PAYMENT_BRAINTREE_CC_ERROR_TITLE', 'Ha habido un error al procesar su tarjeta de crédito');
  define('MODULE_PAYMENT_BRAINTREE_CC_ERROR_GENERAL', 'Por favor intente nuevamente y si los problemas persisten, intente con otro método de pago.');
  define('MODULE_PAYMENT_BRAINTREE_CC_ERROR_CARDOWNER', 'El nombre de los propietarios de la tarjeta se debe proporcionar para completar el pedido. Por favor intente nuevamente y si los problemas persisten, intente con otro método de pago.');
  define('MODULE_PAYMENT_BRAINTREE_CC_ERROR_CARDNUMBER', 'El número de tarjeta no se pudo procesar. Por favor intente nuevamente y si los problemas persisten, intente con otro método de pago.');
  define('MODULE_PAYMENT_BRAINTREE_CC_ERROR_CARDEXPIRES', 'La fecha de caducidad de la tarjeta no se pudo procesar. Por favor intente nuevamente y si los problemas persisten, intente con otro método de pago.');
  define('MODULE_PAYMENT_BRAINTREE_CC_ERROR_CARDCVV', 'El código de seguridad de la tarjeta no se pudo procesar. Por favor intente nuevamente y si los problemas persisten, intente con otro método de pago.');
?>
