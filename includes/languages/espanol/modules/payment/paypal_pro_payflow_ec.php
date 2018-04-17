<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2014 osCommerce

  Released under the GNU General Public License
*/

  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_EC_TEXT_TITLE', 'Pago exprés de PayPal (Edición Payflow)');
  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_EC_TEXT_PUBLIC_TITLE', 'PayPal (incluyendo tarjetas de crédito y débito)');
  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_EC_TEXT_DESCRIPTION', '<img src="images/icon_info.gif" border="0" />&nbsp;<a href="http://library.oscommerce.com/Package&en&paypal&oscom23&express_checkout" target="_blank" style="text-decoration: underline; font-weight: bold;">Ver DocumentaciónOnline</a><br /><br /><img src="images/icon_popup.gif" border="0" />&nbsp;<a href="https://www.paypal.com" target="_blank" style="text-decoration: underline; font-weight: bold;">Visitar el Sitio web de PayPal</a>');

  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_EC_ERROR_EXPRESS_MODULE', 'PayPal exige que se habilite el módulo de pago de PayPal Payments Pro (Edición Payflow) si este módulo se va a activar. Este módulo no se cargará hasta que se haya instalado el módulo PayPal Payments Pro (Edición Payflow).');
  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_EC_ERROR_ADMIN_CURL', 'Este módulo requiere que cURL esté habilitado en PHP y no se cargará hasta que se haya habilitado en este servidor web.');
  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_EC_ERROR_ADMIN_CONFIGURATION', 'Este módulo no se cargará hasta que se hayan configurado los parámetros de Proveedor (Vendor) y Contraseña. Edite y configure los ajustes de este módulo.');
 
  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_EC_TEXT_BUTTON', 'Comprar con PayPal');
  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_EC_BUTTON', 'https://www.paypal.com/es_ES/ES/i/btn/btn_xpressCheckout.gif');

  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_EC_TEXT_COMMENTS', 'Comentarios:');

  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_EC_EMAIL_PASSWORD', 'Se ha creado una cuenta de forma automática para usted con la siguiente dirección de correo electrónico y contraseña:' . "\n\n" . 'Correo electrónico de su cuenta de la tienda: %s' . "\n" . 'Contraseña de su cuenta de la tienda: %s' . "\n\n");

  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_EC_ERROR_GENERAL', 'Error: se ha producido un problema general con la transacción. Inténtalo de nuevo.');
  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_EC_ERROR_CFG_ERROR', 'Error: Error de configuración del módulo de pago. Verifique las credenciales de inicio de sesión.');
  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_EC_ERROR_ADDRESS', 'Error: La ciudad, la provincia y el código postal del envío no concuerdan. Inténtalo de nuevo.');
  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_EC_ERROR_DECLINED', 'Error: esta transacción ha sido rechazada. Inténtalo de nuevo.');
  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_EC_ERROR_INVALID_CREDIT_CARD', 'Error: la información de la tarjeta de crédito proporcionada no es válida. Inténtalo de nuevo.');  
  
  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_EC_DIALOG_CONNECTION_LINK_TITLE', 'Probar la conexión con el servidor API');
  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_EC_DIALOG_CONNECTION_TITLE', 'Prueba de conexión con el servidor API');
  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_EC_DIALOG_CONNECTION_GENERAL_TEXT', 'Probando la coneción con el servidor..');
  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_EC_DIALOG_CONNECTION_BUTTON_CLOSE', 'Cerrar');
  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_EC_DIALOG_CONNECTION_TIME', 'Tiempo de conexion:');
  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_EC_DIALOG_CONNECTION_SUCCESS', 'Éxito!');
  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_EC_DIALOG_CONNECTION_FAILED', 'Ha fallado! Por favor, compruebe la configuración de certificados SSL y vuelva a intentarlo.');
  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_EC_DIALOG_CONNECTION_ERROR', 'Ha ocurrido un error. Por favor, actualice la página, revise la configuración y vuelva a intentarlo.');  

  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_EC_ERROR_NO_SHIPPING_AVAILABLE_TO_SHIPPING_ADDRESS', 'Actualmente no está disponible ningun modo de Envío para la dirección de envío seleccionada. Por favor seleccione o cree una nueva dirección de envío para su compra.');
  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_EC_WARNING_LOCAL_LOGIN_REQUIRED', 'Por favor, entre en su cuenta para comprobar el pedido.');
  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_EC_NOTICE_CHECKOUT_CONFIRMATION', 'Por favor, revise y confirme su pedido a continuación. Su pedido no se tramitará hasta que se haya confirmado.');  
?>
