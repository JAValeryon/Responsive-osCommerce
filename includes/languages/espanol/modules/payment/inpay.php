<?php
/*
 $Id: inpay.php VER: 1.0.3443 $
 osCommerce, Open Source E-Commerce Solutions
 http://www.oscommerce.com
 Copyright (c) 2008 osCommerce
 Released under the GNU General Public License
 */

  define('MODULE_PAYMENT_INPAY_TEXT_TITLE', 'Inpay - Transferencias bancarias instantáneas en línea');
  define('MODULE_PAYMENT_INPAY_TEXT_PUBLIC_TITLE', 'Paga con tu banco online- instantáneo y 100% seguro');
  define('MODULE_PAYMENT_INPAY_TEXT_PUBLIC_HTML', '<img src="https://resources.inpay.com/images/oscommerce/inpay_checkout.png" alt="Pagos seguros usando inpay" /><br /><br />
  <table cellspacing="5">
  	  <tr><td><img src="https://resources.inpay.com/images/oscommerce/inpay_check.png" alt="Pagos 100% seguros usando inpay" /></td><td class="main">Pagos 100% seguros usando inpay <span style="color: #666;">- nuestro nivel de seguridad coincide con la seguridad de su banco en línea.</span></td></tr>
  	  <tr><td><img src="https://resources.inpay.com/images/oscommerce/inpay_check.png" alt="Pagos instantáneos usando inpay" /></td><td class="main">Pagos instantáneos usando inpay <span style="color: #666;">- nuestro sistema garantiza que recibirá su pedido lo antes posible.</span></td></tr>
  	  <tr><td><img src="https://resources.inpay.com/images/oscommerce/inpay_check.png" alt="Pago anónimo con inpay" /></td><td class="main">Pago anónimo con inpay <span style="color: #666;">- no es necesario que compartas tu número de tarjeta de crédito ni ninguna otra información personal.</span></td></tr>
  </table><a href="http://inpay.com/shoppers" style="text-decoration: underline;" target="_blank" class="main">Haga clic aquí para leer más acerca de Inpay</a><br />');
  define('MODULE_PAYMENT_INPAY_TEXT_DESCRIPTION', '<strong>¿Qué es inpay?</strong><br />
  	  Inpay es una opción de pago extra para tiendas virtuales, que permite a los clientes pagar usando su banco en línea, instantáneamente y en todo el mundo.<br />
  	  <br />
  	  <strong>Aumenta las ganancias</strong><br />
	Al permitir que los compradores paguen usando su banco en línea, ahora puede vender a clientes que de otro modo no pueden o no quieren pagar hoy.<br />
<br />
<strong>Aumenta el tamaño del mercado</strong><br />
Al ofrecer a sus clientes la opción de pago Inpay, aumenta su participación en el mercado no solo para los titulares de tarjetas de crédito y débito, sino también para los usuarios de bancos en línea de todo el mundo.<br />
<br />
<strong>Sin riesgo</strong><br />
Con Inpay no hay riesgo de fraude con tarjeta de crédito o cualquier tipo de contracargos. Esto significa que cuando te pagan, ¡sigues pagando! Con Inpay, incluso puede vender a clientes de regiones de  \'alto riesgo\' , incluidas todas las partes de Asia y Europa del Este.<br /><br />
  <a href="http://inpay.com/" style="text-decoration: underline;" target="_blank">Lea más o regístrese en inpay.com</a><br />');
  // ------------- e-mail settings ---------------------------------
  define('EMAIL_TEXT_SUBJECT', 'Pago confirmado por inpay');
  define('EMAIL_TEXT_ORDER_NUMBER', 'Número de pedido:');
  define('EMAIL_TEXT_INVOICE_URL', 'Factura detallada:');
  define('EMAIL_TEXT_DATE_ORDERED', 'Fecha del pedido:');
  define('EMAIL_TEXT_PRODUCTS', 'Productos');
  define('EMAIL_TEXT_SUBTOTAL', 'Sub-Total:');
  define('EMAIL_TEXT_TAX', 'Impuestos:        ');
  define('EMAIL_TEXT_SHIPPING', 'Envío: ');
  define('EMAIL_TEXT_TOTAL', 'Total:    ');
  define('EMAIL_TEXT_DELIVERY_ADDRESS', 'Dirección de envío');
  define('EMAIL_TEXT_BILLING_ADDRESS', 'Dirección de facturación');
  define('EMAIL_TEXT_PAYMENT_METHOD', 'Método de pago');
  define('EMAIL_SEPARATOR', '------------------------------------------------------');
  define('TEXT_EMAIL_VIA', 'via'); 
  
?>