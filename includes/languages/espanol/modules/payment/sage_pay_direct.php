<?php
/*
  $Id: $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2014 osCommerce

  Released under the GNU General Public License
*/

  define('MODULE_PAYMENT_SAGE_PAY_DIRECT_TEXT_TITLE', 'Sage Pay Direct');
  define('MODULE_PAYMENT_SAGE_PAY_DIRECT_TEXT_PUBLIC_TITLE', 'Tarjeta de crédito (Procesado por Sage Pay)');
  define('MODULE_PAYMENT_SAGE_PAY_DIRECT_TEXT_DESCRIPTION', '<img src="images/icon_info.gif" border="0" />&nbsp;<a href="http://library.oscommerce.com/Package&en&sage_pay&oscom23&direct" target="_blank" style="text-decoration: underline; font-weight: bold;">Ver documentación en línea</a><br /><br /><img src="images/icon_popup.gif" border="0">&nbsp;<a href="https://support.sagepay.com/apply/default.aspx?PartnerID=E194E079-84A9-493C-AB9A-91CB362D3238&PromotionCode=osc3MF" target="_blank" style="text-decoration: underline; font-weight: bold;">Visitar la página web de Sage Pay</a>&nbsp;<a href="javascript:toggleDivBlock(\'sagePayInfo\');">(info)</a><span id="sagePayInfo" style="display: none;"><br /><i>El uso del enlace de arriba para registrarse en Sage Pay otorga a osCommerce una pequeña bonificación financiera por referir a un cliente.</i></span>');

  define('MODULE_PAYMENT_SAGE_PAY_DIRECT_ERROR_ADMIN_CURL', 'Este módulo requiere que cURL esté habilitado en PHP y no se cargará hasta que se haya habilitado en este servidor web.');
  define('MODULE_PAYMENT_SAGE_PAY_DIRECT_ERROR_ADMIN_CONFIGURATION', 'Este módulo no se cargará hasta que se haya configurado el parámetro Nombre de inicio de sesión del proveedor (Vendor Login Name). Edite y configure los ajustes de este módulo.');

  define('MODULE_PAYMENT_SAGE_PAY_DIRECT_CREDIT_CARD_NEW', 'Ingrese una nueva tarjeta');
  define('MODULE_PAYMENT_SAGE_PAY_DIRECT_CREDIT_CARD_TYPE', 'Tipo de tarjeta:');
  define('MODULE_PAYMENT_SAGE_PAY_DIRECT_CREDIT_CARD_OWNER', 'Titular de la tarjeta:');
  define('MODULE_PAYMENT_SAGE_PAY_DIRECT_CREDIT_CARD_NUMBER', 'Número de tarjeta:');
  define('MODULE_PAYMENT_SAGE_PAY_DIRECT_CREDIT_CARD_STARTS', 'Fecha de inicio:');
  define('MODULE_PAYMENT_SAGE_PAY_DIRECT_CREDIT_CARD_STARTS_INFO', '(solo para tarjetas Maestro y American Express)');
  define('MODULE_PAYMENT_SAGE_PAY_DIRECT_CREDIT_CARD_EXPIRES', 'Fecha de caducidad:');
  define('MODULE_PAYMENT_SAGE_PAY_DIRECT_CREDIT_CARD_ISSUE_NUMBER', 'Número de emisión:');
  define('MODULE_PAYMENT_SAGE_PAY_DIRECT_CREDIT_CARD_ISSUE_NUMBER_INFO', '(solo para tarjetas Maestro)');
  define('MODULE_PAYMENT_SAGE_PAY_DIRECT_CREDIT_CARD_CVC', 'Código de seguridad:');
  define('MODULE_PAYMENT_SAGE_PAY_DIRECT_CREDIT_CARD_SAVE', '¡Guardar tarjeta para la próxima compra?');

  define('MODULE_PAYMENT_SAGE_PAY_DIRECT_3DAUTH_TITLE', 'Verificación 3D Secure');
  define('MODULE_PAYMENT_SAGE_PAY_DIRECT_3DAUTH_INFO', 'Haga clic en el botón CONTINUAR para autenticar su tarjeta en el sitio web de su banco.');
  define('MODULE_PAYMENT_SAGE_PAY_DIRECT_3DAUTH_BUTTON', 'CONTINUAR');

  define('MODULE_PAYMENT_SAGE_PAY_DIRECT_ERROR_TITLE', 'Ha habido un error al procesar su tarjeta de crédito');
  define('MODULE_PAYMENT_SAGE_PAY_DIRECT_ERROR_GENERAL', 'Por favor intente nuevamente y si los problemas persisten, intente con otro método de pago.');
  define('MODULE_PAYMENT_SAGE_PAY_DIRECT_ERROR_CARDTYPE', 'El tipo de tarjeta no es compatible. Intente de nuevo con otra tarjeta y, si persisten los problemas, intente con otro método de pago.');
  define('MODULE_PAYMENT_SAGE_PAY_DIRECT_ERROR_CARDOWNER', 'El nombre de los propietarios de la tarjeta se debe proporcionar para completar el pedido. Por favor intente nuevamente y si los problemas persisten, intente con otro método de pago.');
  define('MODULE_PAYMENT_SAGE_PAY_DIRECT_ERROR_CARDNUMBER', 'El número de tarjeta no se pudo procesar. Por favor intente nuevamente y si los problemas persisten, intente con otro método de pago.');
  define('MODULE_PAYMENT_SAGE_PAY_DIRECT_ERROR_CARDSTART', 'La fecha de inicio de la tarjeta no se pudo procesar. Por favor intente nuevamente y si los problemas persisten, intente con otro método de pago.');
  define('MODULE_PAYMENT_SAGE_PAY_DIRECT_ERROR_CARDEXPIRES', 'La fecha de caducidad de la tarjeta no se pudo procesar. Por favor intente nuevamente y si los problemas persisten, intente con otro método de pago.');
  define('MODULE_PAYMENT_SAGE_PAY_DIRECT_ERROR_CARDISSUE', 'El número de emisión de la tarjeta no se pudo procesar. Por favor intente nuevamente y si los problemas persisten, intente con otro método de pago.');
  define('MODULE_PAYMENT_SAGE_PAY_DIRECT_ERROR_CARDCVC', 'El código de seguridad de la tarjeta no se pudo procesar. Por favor intente nuevamente y si los problemas persisten, intente con otro método de pago.');

  define('MODULE_PAYMENT_SAGE_PAY_DIRECT_DIALOG_CONNECTION_LINK_TITLE', 'Pruebe la conexión del servidor API');
  define('MODULE_PAYMENT_SAGE_PAY_DIRECT_DIALOG_CONNECTION_TITLE', 'Prueba de conexión del servidor API');
  define('MODULE_PAYMENT_SAGE_PAY_DIRECT_DIALOG_CONNECTION_GENERAL_TEXT', 'Probando la conexión al servidor..');
  define('MODULE_PAYMENT_SAGE_PAY_DIRECT_DIALOG_CONNECTION_BUTTON_CLOSE', 'Cerrar');
  define('MODULE_PAYMENT_SAGE_PAY_DIRECT_DIALOG_CONNECTION_TIME', 'Tiempo de conexión:');
  define('MODULE_PAYMENT_SAGE_PAY_DIRECT_DIALOG_CONNECTION_SUCCESS', '¡Éxito!');
  define('MODULE_PAYMENT_SAGE_PAY_DIRECT_DIALOG_CONNECTION_FAILED', '¡Fallo! Revise la configuración del certificado Verify SSL e intente de nuevo..');
  define('MODULE_PAYMENT_SAGE_PAY_DIRECT_DIALOG_CONNECTION_ERROR', 'Ocurrió un error. Actualice la página, revise su configuración y vuelva a intentarlo.');
?>
