<?php
/*
  $Id: create_order.php,v 1 2003/08/17 23:21:34 frankl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
  
*/

// pull down default text
define('PULL_DOWN_DEFAULT', 'Seleccione');
define('TYPE_BELOW', 'Tipo abajo');

define('JS_ERROR', 'Se han producido errores durante el proceso!\nHaga las siguientes correcciones:\n\n');

define('JS_GENDER', '* Debe elegir un \'Sexo\'\n');
define('JS_FIRST_NAME', '* \'Nombre\' debe tener al menos ' . ENTRY_FIRST_NAME_MIN_LENGTH . ' letras\n');
define('JS_LAST_NAME', '* \'Apellido\' debe tener al menos ' . ENTRY_LAST_NAME_MIN_LENGTH . ' letras\n');
define('JS_DOB', '* La \'Fecha de Nacimiento\' debe tener el formato xx/xx/xxxx (d&iacute;a/mes/a&ntilde;o)\n');
define('JS_EMAIL_ADDRESS', '* El \'email\' debe tener al menos ' . ENTRY_EMAIL_ADDRESS_MIN_LENGTH . ' caracteres\n');
define('JS_ADDRESS', '* La \'Direcci&oacute;n\' debe tener al menos ' . ENTRY_STREET_ADDRESS_MIN_LENGTH . ' letras\n');
define('JS_POST_CODE', '* El \'C&oacute;digo postal\' debe tener al menos ' . ENTRY_POSTCODE_MIN_LENGTH . ' n&uacute;meros\n');
define('JS_CITY', '* La \'Barriada\' debe tener al menos ' . ENTRY_CITY_MIN_LENGTH . ' letras\n');
define('JS_STATE', '* Debe indicar un \'Pa&iacute;s\'\n');
define('JS_STATE_SELECT', '-- Seleccione --');
define('JS_ZONE', '* Seleccione una \'Provincia\' de la lista\n');
define('JS_COUNTRY', '* Debe indicar un \'Pa&iacute;s\'\n');
define('JS_TELEPHONE', '* El \'Tel&eacute;fono\' debe tener al menos ' . ENTRY_TELEPHONE_MIN_LENGTH . ' n&uacute;meros\n');
//define('JS_TELEPHONE_MOVIL', '* El \'Movil\' debe tener al menos ' . ENTRY_TELEPHONE_MOVIL_MIN_LENGTH . ' n&uacute;meros\n');
define('JS_PASSWORD', '* El \'Password\' debe tener al menos ' . ENTRY_PASSWORD_MIN_LENGTH . ' caracteres\n');

define('CATEGORY_COMPANY', 'Detalles empresa');
define('CATEGORY_PERSONAL', 'Detalles persona');
define('CATEGORY_ADDRESS', 'Direcci&oacute;n');
define('CATEGORY_CONTACT', 'Informaci&oacute;n de contacto');
define('CATEGORY_OPTIONS', 'Opciones');
define('CATEGORY_PASSWORD', 'Password');
define('CATEGORY_CORRECT', 'Si este es el cliente correcto, pulse el bot&oacute;n Confirmar a continuaci&oacute;n');
define('ENTRY_CUSTOMERS_ID', 'ID cliente:');
define('ENTRY_CUSTOMERS_ID_TEXT', '&nbsp;');
define('ENTRY_COMPANY', 'Empresa:');
define('ENTRY_COMPANY_ERROR', '');
define('ENTRY_COMPANY_TEXT', '');
define('ENTRY_NIF', 'NIF/CIF:');
define('ENTRY_NIF_ERROR', '');
define('ENTRY_NIF_TEXT', '');
define('ENTRY_GENDER', 'Sexo:');
define('ENTRY_GENDER_FEMALE', 'Mujer');
define('ENTRY_GENDER_MALE', 'Hombre');
define('ENTRY_GENDER_ERROR', '&nbsp;');
define('ENTRY_GENDER_TEXT', '&nbsp;');
define('ENTRY_FIRST_NAME', 'Nombre:');
define('ENTRY_FIRST_NAME_ERROR', '&nbsp;<small><span style="color: #FF0000">m&iacute;nimo ' . ENTRY_FIRST_NAME_MIN_LENGTH . ' letras</span></small>');
define('ENTRY_FIRST_NAME_TEXT', '&nbsp;');
define('ENTRY_LAST_NAME', 'Apellido(s):');
define('ENTRY_LAST_NAME_ERROR', '&nbsp;<small><span style="color: #FF0000">m&iacute;nimo ' . ENTRY_LAST_NAME_MIN_LENGTH . ' letras</span></small>');
define('ENTRY_LAST_NAME_TEXT', '&nbsp;');
define('ENTRY_DATE_OF_BIRTH', 'Fecha de Nacimiento:');
define('ENTRY_DATE_OF_BIRTH_ERROR', '&nbsp;<small><span style="color: #FF0000">(eg. 23/07/1968)</span></small>');
define('ENTRY_DATE_OF_BIRTH_TEXT', '&nbsp;<small>(eg. 23/07/1968) ');
define('ENTRY_EMAIL_ADDRESS', 'email:');
define('ENTRY_EMAIL_ADDRESS_ERROR', '&nbsp;<small><span style="color: #FF0000">m&iacute;nimo ' . ENTRY_EMAIL_ADDRESS_MIN_LENGTH . ' caracteres</span></small>');
define('ENTRY_EMAIL_ADDRESS_CHECK_ERROR', '&nbsp;<small><span style="color: #FF0000">El email no parece ser v&aacute;lido!</span></small>');
define('ENTRY_EMAIL_ADDRESS_ERROR_EXISTS', '&nbsp;<small><span style="color: #FF0000">email ya existe!</span></small>');
define('ENTRY_EMAIL_ADDRESS_TEXT', '&nbsp;');
define('ENTRY_STREET_ADDRESS', 'Direcci&oacute;n:');
define('ENTRY_STREET_ADDRESS_ERROR', '&nbsp;<small><span style="color: #FF0000">m&iacute;nimo ' . ENTRY_STREET_ADDRESS_MIN_LENGTH . ' letras</span></small>');
define('ENTRY_STREET_ADDRESS_TEXT', '&nbsp;');
define('ENTRY_SUBURB', 'Barriada:');
define('ENTRY_SUBURB_ERROR', '');
define('ENTRY_SUBURB_TEXT', '');
define('ENTRY_POST_CODE', 'C&oacute;digo postal:');
define('ENTRY_POST_CODE_ERROR', '&nbsp;<small><span style="color: #FF0000">m&iacute;nimo ' . ENTRY_POSTCODE_MIN_LENGTH . ' n&uacute;meros</span></small>');
define('ENTRY_POST_CODE_TEXT', '&nbsp;');
define('ENTRY_CITY', 'Ciudad:');
define('ENTRY_CITY_ERROR', '&nbsp;<small><span style="color: #FF0000">m&iacute;nimo ' . ENTRY_CITY_MIN_LENGTH . ' letras</span></small>');
define('ENTRY_CITY_TEXT', '&nbsp;');
define('ENTRY_STATE', 'Provincia:');
define('ENTRY_STATE_ERROR', '&nbsp;');
define('ENTRY_STATE_TEXT', '&nbsp;');
define('ENTRY_COUNTRY', 'Pa&iacute;s:');
define('ENTRY_COUNTRY_ERROR', '');
define('ENTRY_COUNTRY_TEXT', '&nbsp;');
define('ENTRY_TELEPHONE_NUMBER', 'Tel&eacute;fono:');
define('ENTRY_TELEPHONE_NUMBER_ERROR', '&nbsp;<small><span style="color: #FF0000">m&iacute;nimo ' . ENTRY_TELEPHONE_MIN_LENGTH . ' n&uacute;meros</span></small>');
define('ENTRY_TELEPHONE_NUMBER_TEXT', '&nbsp;');
define('ENTRY_TELEPHONE_MOVIL_NUMBER', 'Movil:');
//define('ENTRY_TELEPHONE_MOVIL_NUMBER_ERROR', '&nbsp;<small><span style="color: #FF0000">m&iacute;nimo ' . ENTRY_TELEPHONE_MOVIL_MIN_LENGTH . ' n&uacute;meros</span></small>');
define('ENTRY_TELEPHONE_MOVIL_NUMBER_TEXT', '&nbsp;');
define('ENTRY_FAX_NUMBER', 'Fax:');
define('ENTRY_FAX_NUMBER_ERROR', '');
define('ENTRY_FAX_NUMBER_TEXT', '');
define('ENTRY_NEWSLETTER', 'Bolet&iacute;n:');
define('ENTRY_NEWSLETTER_TEXT', '');
define('ENTRY_NEWSLETTER_YES', 'Suscrito');
define('ENTRY_NEWSLETTER_NO', 'No suscrito');
define('ENTRY_NEWSLETTER_ERROR', '');
define('ENTRY_PASSWORD', 'Password:');
define('ENTRY_PASSWORD_CONFIRMATION', 'Confirmaci&oacute;n del password:');
define('ENTRY_PASSWORD_CONFIRMATION_TEXT', '&nbsp;');
define('ENTRY_PASSWORD_ERROR', '&nbsp;<small><span style="color: #FF0000">m&iacute;nimo ' . ENTRY_PASSWORD_MIN_LENGTH . ' caracteres</span></small>');
define('ENTRY_PASSWORD_TEXT', '&nbsp;');
define('PASSWORD_HIDDEN', '--HIDDEN--');

define('CREATE_ORDER_TEXT_EXISTING_CUST', 'La cuenta del cliente ya existe');
define('CREATE_ORDER_TEXT_NEW_CUST', 'Nueva cuenta');
define('CREATE_ORDER_TEXT_NO_CUST', 'Compra sin registro');

define('HEADING_TITLE', 'Nuevo pedido');
define('TEXT_SELECT_CUST', '- Seleccione un cliente (las empresas est&aacute;n al final) -'); 
define('TEXT_SELECT_CURRENCY', '- Seleccione una moneda -');
define('TEXT_SELECT_CURRENCY_TITLE', 'Seleccione una moneda');
define('BUTTON_TEXT_SELECT_CUST', 'Seleccione un cliente:'); 
define('TEXT_OR_BY', 'o seleccione la ID del cliente:'); 
define('TEXT_STEP_1', 'Paso 1 - Selecci&oacute;n de un cliente para rellenar el formulario o introducirlos manualmente');
define('TEXT_STEP_2', 'Paso 2 - Confirme los datos de cliente existentes o introduzca un nuevo cliente, forma de env&iacute;o y datos de facturaci&oacute;n');
define('BUTTON_SUBMIT', 'Seleccione');
define('ENTRY_CURRENCY','Moneda: ');
define('ENTRY_ADMIN','Pedido realizado por:');
define('TEXT_CS','Servicio al cliente');

define('ACCOUNT_EXTRAS','Extras');
define('ENTRY_ACCOUNT_PASSWORD','Password');
define('ENTRY_NEWSLETTER_SUBSCRIBE','Bolet&iacute;n');
define('ENTRY_ACCOUNT_PASSWORD_TEXT','');
define('ENTRY_NEWSLETTER_SUBSCRIBE_TEXT','1 = si &nbsp;&nbsp; 0 = no');
?>