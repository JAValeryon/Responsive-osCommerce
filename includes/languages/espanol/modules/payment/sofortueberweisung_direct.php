<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2006 - 2007 Henri Schmidhuber (http://www.in-solution.de)
  Copyright (c) 2007 osCommerce

  Released under the GNU General Public License
*/

  if (!defined('MODULE_PAYMENT_SOFORTUEBERWEISUNG_DIRECT_STATUS')) {
    define('MODULE_PAYMENT_SOFORTUEBERWEISUNG_DIRECT_TEXT_DESCRIPTION', '<div align="center"><a href=' . tep_href_link('ext/modules/payment/sofortueberweisung/install.php', 'install=sofortueberweisung_direct', 'SSL') . '>' . tep_image('ext/modules/payment/sofortueberweisung/autoinstaller.gif', 'Autoinstalador (recomendado)') . '</a></div><br /><img src="images/icon_popup.gif" border="0">&nbsp;<a href="https://www.sofortueberweisung.de/cms/index.php?vpartner=21" target="_blank" style="text-decoration: underline; font-weight: bold;">Visitar sitio web de Sofort</a>&nbsp;<a href="javascript:toggleDivBlock(\'sofortueberweisungInfo\');">(info)</a><span id="sofortueberweisungInfo" style="display: none;"><br /><i>El uso del enlace de arriba para registrarse en Sofort otorga a osCommerce una pequeña bonificación financiera por referir a un cliente.</i></span><br /><br />Número de cuenta de prueba:<br /><br />Código bancario (BLZ): 88888888');
  } else {
    define('MODULE_PAYMENT_SOFORTUEBERWEISUNG_DIRECT_TEXT_DESCRIPTION', '<img src="images/icon_popup.gif" border="0">&nbsp;<a href="https://www.sofortueberweisung.de/cms/index.php?vpartner=21" target="_blank" style="text-decoration: underline; font-weight: bold;">Visitar la página web de Sofort</a>&nbsp;<a href="javascript:toggleDivBlock(\'sofortueberweisungInfo\');">(info)</a><span id="sofortueberweisungInfo" style="display: none;"><br /><i>El uso del enlace de arriba para registrarse en Sofort otorga a osCommerce una pequeña bonificación financiera por referir a un cliente.</i></span><br /><br />Número de cuenta de prueba:<br /><br />Código bancario (BLZ): 88888888');
  }

  define('MODULE_PAYMENT_SOFORTUEBERWEISUNG_DIRECT_TEXT_TITLE', 'Sofort Directo');
  define('MODULE_PAYMENT_SOFORTUEBERWEISUNG_DIRECT_TEXT_PUBLIC_TITLE', 'Sofort');

  // checkout_payment Informationen via Bild
  define('MODULE_PAYMENT_SOFORTUEBERWEISUNG_DIRECT_TEXT_DESCRIPTION_CHECKOUT_PAYMENT', '
    <table border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><a href="#" onclick="window.open(\'https://www.sofortueberweisung.de/cms/index.php?vpartner=21\', \'Popup\',\'toolbar=yes,status=no,menubar=no,scrollbars=yes,width=690,height=500\'); return false;">' . tep_image('ext/modules/payment/sofortueberweisung/images/sofortueberweisung.gif', 'Sofort es el servicio gratuito de pago certificado por TÜV de Payment Network AG. Sus beneficios: no hay registro adicional, débito automático de su cuenta bancaria en línea, los más altos estándares de seguridad y envío inmediato de artículos en existencia. Para el pago con Sofort necesita sus datos de acceso a eBanking, Cuenta bancaria, número de cuenta bancaria, PIN y TAN.') . '</a></td>
      </tr>
    </table>');

  define('MODULE_PAYMENT_SOFORTUEBERWEISUNG_DIRECT_TEXT_DESCRIPTION_CHECKOUT_CONFIRMATION', '
    <table border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td class="main"><p>Después de confirmar el pedido, se le redirigirá al sistema de pago de Sofort y podrá realizar una transferencia en línea allí.</p><p>Para esto necesita sus datos de acceso a eBanking, cuenta bancaria, número de cuenta bancaria, PIN y TAN. Más información se puede encontrar aquí: <a href="#" onclick="window.open(\'https://www.sofortueberweisung.de/cms/index.php?vpartner=21\', \'Popup\',\'toolbar=yes,status=no,menubar=no,scrollbars=yes,width=690,height=500\'); return false;">http://www.sofortueberweisung.de</a>.</p></td>
      </tr>
    </table>');

 // im Verwendungszweck werden folgende Platzhalter ersetzt:
 // {{order_date}} durch Bestelldatum
 // {{customer_id}} durch Kundennummer der Datenbank
 // {{customer_name}}  durch Kundenname
 // {{customer_company}} durch Kundenfirma
 // {{customer_email}} durch Email des Kunden

  define('MODULE_PAYMENT_SOFORTUEBERWEISUNG_DIRECT_TEXT_V_ZWECK_1', STORE_NAME);  // max 27 Zeichen
  define('MODULE_PAYMENT_SOFORTUEBERWEISUNG_DIRECT_TEXT_V_ZWECK_2', 'Nr. {{orderid}} ID-Cli. {{customer_id}}'); // max 27 Zeichen
  define('MODULE_PAYMENT_SOFORTUEBERWEISUNG_DIRECT_TEXT_EMAIL_FOOTER', '');
  define('MODULE_PAYMENT_SOFORTUEBERWEISUNG_DIRECT_TEXT_REDIRECT', 'Serás redirigido a Sofortueberweisung.de. Si esto no sucede, presione el botón');

  define('MODULE_PAYMENT_SOFORTUEBERWEISUNG_DIRECT_TEXT_ERROR_HEADING', 'El siguiente error fue informado por Sofort durante el proceso:');
  define('MODULE_PAYMENT_SOFORTUEBERWEISUNG_DIRECT_TEXT_ERROR_MESSAGE', 'El pago a través de Sofort lamentablemente no es posible, o fue cancelado a petición del cliente. Por favor, elija un método de pago diferente.');
  define('MODULE_PAYMENT_SOFORTUEBERWEISUNG_DIRECT_TEXT_CHECK_ERROR', 'Verificación de transacción de transferencia inmediata fallida. Por favor revise manualmente');
?>
