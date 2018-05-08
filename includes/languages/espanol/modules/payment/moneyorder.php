<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

  define('MODULE_PAYMENT_MONEYORDER_TEXT_TITLE', 'Cheque / Giro postal');
  
  if ( defined('MODULE_PAYMENT_MONEYORDER_STATUS') ) {  
    define('MODULE_PAYMENT_MONEYORDER_TEXT_DESCRIPTION', 'Hacer pagadero a:&nbsp;' . MODULE_PAYMENT_MONEYORDER_PAYTO . '<br /><br />Enviar a:<br />' . STORE_NAME . '<br />' . nl2br(STORE_ADDRESS) . '<br /><br />' . 'Su pedido no se enviará hasta que recibamos el pago.');
    define('MODULE_PAYMENT_MONEYORDER_TEXT_EMAIL_FOOTER', "Hacer pagadero a: ". MODULE_PAYMENT_MONEYORDER_PAYTO . "\n\nEnviar a:\n" . STORE_NAME . "\n" . STORE_ADDRESS . "\n\n" . 'Su pedido no se enviará hasta que recibamos el pago.');
  }
  else {
    define('MODULE_PAYMENT_MONEYORDER_TEXT_DESCRIPTION', 'Hacer pagadero a:&nbsp;<br /><br />Enviar a:<br />' . STORE_NAME . '<br />' . nl2br(STORE_ADDRESS) . '<br /><br />' . 'Su pedido no se enviará hasta que recibamos el pago.');
    define('MODULE_PAYMENT_MONEYORDER_TEXT_EMAIL_FOOTER', "Hacer pagadero a: \n\nEnviar a:\n" . STORE_NAME . "\n" . STORE_ADDRESS . "\n\n" . 'Su pedido no se enviará hasta que recibamos el pago.');
  }
?>
