<?php
/*
  $Id: $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2014 osCommerce

  Released under the GNU General Public License
*/

  define('MODULE_PAYMENT_SAGE_PAY_SERVER_TEXT_TITLE', 'Servidor Sage Pay');
  define('MODULE_PAYMENT_SAGE_PAY_SERVER_TEXT_PUBLIC_TITLE', 'Tarjeta de crédito o tarjeta bancaria (procesada por Sage Pay)');
  define('MODULE_PAYMENT_SAGE_PAY_SERVER_TEXT_DESCRIPTION', '<img src="images/icon_info.gif" border="0" />&nbsp;<a href="http://library.oscommerce.com/Package&en&sage_pay&oscom23&direct" target="_blank" style="text-decoration: underline; font-weight: bold;">Ver documentación en línea</a><br /><br /><img src="images/icon_popup.gif" border="0">&nbsp;<a href="https://support.sagepay.com/apply/default.aspx?PartnerID=E194E079-84A9-493C-AB9A-91CB362D3238&PromotionCode=osc3MF" target="_blank" style="text-decoration: underline; font-weight: bold;">Visitar la página web de Sage Pay</a>&nbsp;<a href="javascript:toggleDivBlock(\'sagePayInfo\');">(info)</a><span id="sagePayInfo" style="display: none;"><br /><i>El uso del enlace de arriba para registrarse en Sage Pay otorga a osCommerce una pequeña bonificación financiera por referir a un cliente.</i></span>');
  
  define('MODULE_PAYMENT_SAGE_PAY_SERVER_ERROR_ADMIN_CURL', 'Este módulo requiere que cURL esté habilitado en PHP y no se cargará hasta que se haya habilitado en este servidor web.');
  define('MODULE_PAYMENT_SAGE_PAY_SERVER_ERROR_ADMIN_CONFIGURATION', 'Este módulo no se cargará hasta que se haya configurado el parámetro Nombre de inicio de sesión del proveedor (Vendor Login Name). Edite y configure los ajustes de este módulo.');

  define('MODULE_PAYMENT_SAGE_PAY_SERVER_ERROR_TITLE', 'Ha habido un error al procesar su tarjeta de crédito');
  define('MODULE_PAYMENT_SAGE_PAY_SERVER_ERROR_GENERAL', 'Por favor intente nuevamente y si los problemas persisten, intente con otro método de pago.');  

  define('MODULE_PAYMENT_SAGE_PAY_SERVER_DIALOG_CONNECTION_LINK_TITLE', 'Pruebe la conexión del servidor API');
  define('MODULE_PAYMENT_SAGE_PAY_SERVER_DIALOG_CONNECTION_TITLE', 'Prueba de conexión del servidor API');
  define('MODULE_PAYMENT_SAGE_PAY_SERVER_DIALOG_CONNECTION_GENERAL_TEXT', 'Probando la conexión al servidor..');
  define('MODULE_PAYMENT_SAGE_PAY_SERVER_DIALOG_CONNECTION_BUTTON_CLOSE', 'Cerrar');
  define('MODULE_PAYMENT_SAGE_PAY_SERVER_DIALOG_CONNECTION_TIME', 'Tiempo de conexión:');
  define('MODULE_PAYMENT_SAGE_PAY_SERVER_DIALOG_CONNECTION_SUCCESS', '¡Éxito!');
  define('MODULE_PAYMENT_SAGE_PAY_SERVER_DIALOG_CONNECTION_FAILED', '¡Fallo! Revise la configuración del certificado Verify SSL e intente de nuevo..');
  define('MODULE_PAYMENT_SAGE_PAY_SERVER_DIALOG_CONNECTION_ERROR', 'Ocurrió un error. Actualice la página, revise su configuración y vuelva a intentarlo.');
?>
