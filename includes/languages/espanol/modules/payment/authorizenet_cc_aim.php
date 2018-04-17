<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2014 osCommerce

  Released under the GNU General Public License
*/

  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_TEXT_TITLE', 'Método de integración avanzada Authorize.net (AIM)');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_TEXT_PUBLIC_TITLE', 'Tarjeta de crédito');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_TEXT_DESCRIPTION', '<img src="images/icon_info.gif" border="0" />&nbsp;<a href="http://library.oscommerce.com/Package&en&authorizenet&oscom23&aim" target="_blank" style="text-decoration: underline; font-weight: bold;">Ver documentación en línea</a><br /><br /><img src="images/icon_popup.gif" border="0">&nbsp;<a href="http://reseller.authorize.net/application/?id=5559280" target="_blank" style="text-decoration: underline; font-weight: bold;">Visitar la página de Authorize.net</a>&nbsp;<a href="javascript:toggleDivBlock(\'anetInfo\');">(info)</a><span id="anetInfo" style="display: none;"><br /><i>El uso del enlace de arriba para registrarse en Authorize.net otorga a osCommerce una pequeña bonificación financiera por referir a un cliente.</i></span>');

  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_ERROR_ADMIN_CURL', 'Este módulo requiere que cURL esté habilitado en PHP y no se cargará hasta que se haya habilitado en este servidor web.');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_ERROR_ADMIN_CONFIGURATION', 'Este módulo no se cargará hasta que se hayan configurado los parámetros de API Login ID y API Transaction Key. Edite y configure los ajustes de este módulo.');

  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_CREDIT_CARD_OWNER_FIRSTNAME', 'Nombre del propietario de la tarjeta:');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_CREDIT_CARD_OWNER_LASTNAME', 'Apellido del propietario de la tarjeta:');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_CREDIT_CARD_NUMBER', 'Número de tarjeta:');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_CREDIT_CARD_EXPIRES', 'Fecha de expiración de la tarjeta:');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_CREDIT_CARD_CCV', 'Número de código de la tarjeta (CCV):');

  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_TEXT_AVS_A', 'La dirección (calle) coincide, el código postal no');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_TEXT_AVS_B', 'Información de dirección no proporcionada para el control AVS');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_TEXT_AVS_E', 'AVS error');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_TEXT_AVS_G', 'Banco emisor de la tarjeta fuera de EEUU');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_TEXT_AVS_N', 'Sin coincidencia en la dirección (calle) o ZIP');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_TEXT_AVS_P', 'AVS no aplicable para esta transacción');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_TEXT_AVS_R', 'Reintentar: sistema no disponible o tiempo de espera agotado');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_TEXT_AVS_S', 'Servicio no respaldado por el emisor');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_TEXT_AVS_U', 'La información de la dirección no está disponible');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_TEXT_AVS_W', 'El código postal de nueve dígitos coincide, la dirección (Calle) no');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_TEXT_AVS_X', 'Coincidencia de Dirección (Calle) y código postal de nueve dígitos');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_TEXT_AVS_Y', 'Coincidencia de Dirección (Calle) y código postal de cinco dígitos');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_TEXT_AVS_Z', 'Código postal de cinco dígitos coincide, la dirección (Calle) no.');

  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_TEXT_CVV2_M', 'Coincide');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_TEXT_CVV2_N', 'No Coincide');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_TEXT_CVV2_P', 'No Procesado');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_TEXT_CVV2_S', 'Debería haber estado presente');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_TEXT_CVV2_U', 'El emisor no puede procesar la solicitud');

  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_TEXT_CAVV_0', 'CAVV no validado porque se enviaron datos erróneos');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_TEXT_CAVV_1', 'Validación CAVV fallida');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_TEXT_CAVV_2', 'Validación CAVV aprobada');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_TEXT_CAVV_3', 'La validación CAVV no pudo ser realizada; intento del emisor incompleto');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_TEXT_CAVV_4', 'La validación de CAVV no pudo ser realizada; error del sistema del emisor');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_TEXT_CAVV_5', 'Reservado para uso futuro');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_TEXT_CAVV_6', 'Reservado para uso futuro');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_TEXT_CAVV_7', 'Intento de CAVV – validación fallida – emisor disponible (Tarjeta emitida en EE. UU./adquirente no estadounidense)');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_TEXT_CAVV_8', 'Intento de CAVV – validación aprobada – emisor disponible (Tarjeta emitida en EE. UU./adquirente no estadounidense)');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_TEXT_CAVV_9', 'Intento de CAVV – validación fallida – emisor no disponible (Tarjeta emitida en EE. UU./adquirente no estadounidense)');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_TEXT_CAVV_A', 'Intento de CAVV – validación aprobada – emisor no disponible (Tarjeta emitida en EE. UU./adquirente no estadounidense)');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_TEXT_CAVV_B', 'CAVV validación aprobada, sólo información, no hay cesión de responsabilidad');

  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_ERROR_TITLE', 'Ha habido un error al procesar su tarjeta de crédito');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_ERROR_GENERAL', 'Por favor intente nuevamente y si los problemas persisten, intente con otro método de pago.');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_ERROR_DECLINED', 'Esta transacción de tarjeta de crédito ha sido rechazada. Por favor intente de nuevo y si los problemas persisten, intente con otra tarjeta de crédito o método de pago.');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_ERROR_INVALID_EXP_DATE', 'La fecha de vencimiento de la tarjeta de crédito no es válida. Verifique la información de la tarjeta y vuelva a intentarlo.');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_ERROR_EXPIRED', 'La tarjeta de crédito ha expirado. Por favor intente nuevamente con otra tarjeta o método de pago.');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_ERROR_CCV', 'El número de código de la tarjeta de crédito (CCV) no es válido. Verifique la información de la tarjeta y vuelva a intentarlo.');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_ERROR_MERCHANT_ACCOUNT', 'El ID de inicio de sesión API o la clave de transacción no son válidos o la cuenta está inactiva. Revise la configuración de configuración de su módulo y vuelva a intentarlo.');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_ERROR_CURRENCY', 'El código de moneda suministrado no es válido, no es compatible, no está permitido para este comerciante o no tiene un tipo de cambio. Revise la moneda y la configuración de configuración del módulo y vuelva a intentarlo.');

  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_DIALOG_CONNECTION_LINK_TITLE', 'Pruebe la conexión del servidor API');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_DIALOG_CONNECTION_TITLE', 'Prueba de conexión del servidor API');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_DIALOG_CONNECTION_GENERAL_TEXT', 'Prueba de conexión al servidor ...');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_DIALOG_CONNECTION_BUTTON_CLOSE', 'Cerrar');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_DIALOG_CONNECTION_TIME', 'Tiempo de conexión:');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_DIALOG_CONNECTION_SUCCESS', '¡Éxito!');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_DIALOG_CONNECTION_FAILED', '¡Fallo! Revise la configuración del certificado SSL e intente de nuevo.');
  define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_DIALOG_CONNECTION_ERROR', 'Ocurrió un error. Actualice la página, revise su configuración y vuelva a intentarlo.');
?>
