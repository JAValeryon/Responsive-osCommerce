privacy_title = Privacy Policy

privacy_body = <h3>API Credentials</h3>

<p> La aplicación de PayPal para osCommerce Online Merchant permite a los propietarios de tiendas configurar y configurar automáticamente la aplicación con sus credenciales API de PayPal sin la necesidad de ingresarlas manualmente. Esto se realiza de forma segura al otorgar acceso a osCommerce para recuperar las credenciales API de la cuenta PayPal de los propietarios de la tienda. </p>

<p> Al otorgar acceso a osCommerce, se puede recuperar la siguiente información limitada de la cuenta de PayPal de los propietarios de la tienda: </p>

<ul>
  <li> Nombre de usuario de la API </li>
  <li> Contraseña de API </li>
  <li> Firma API </li>
  <li> ID de cuenta </ li>
</ul>

<p> No se tiene acceso a otra información de la cuenta (por ejemplo, nombre de usuario o contraseña de la cuenta de PayPal, saldo de la cuenta, historial de transacciones, etc.). </p>

<p> El nombre de usuario de API, la contraseña de API, la firma de API y la información de ID de cuenta se utilizan para configurar automáticamente los módulos de PayPal incluidos en la aplicación de PayPal, que incluyen: </p>

<ul>
  <li>PayPal Payments Standard</li>
  <li>PayPal Express Checkout</li>
  <li>PayPal Payments Pro (Pago directo)</li>
  <li>PayPal Payments Pro (Solución alojada)</li>
  <li>Log In with PayPal</li>
</ul>

<p> El proceso se inicia utilizando los botones "Recuperar credenciales reales (Live)" y "Recuperar credenciales de prueba (Sandbox)" que se muestran en las páginas de administración de inicio y credenciales de la aplicación de PayPal. El propietario de la tienda se dirige de forma segura al sitio web de PayPal, donde se le solicita que otorgue acceso a osCommerce para recuperar las credenciales de la API, y luego se le redirige a su tienda en línea para continuar con la configuración de la aplicación de PayPal. Esto se realiza con los siguientes pasos: </p>

<ol>
  <li> El propietario de la tienda hace clic en "Recuperar credenciales activas" o "Recuperar credenciales de Sandbox" y se dirige de forma segura a una página de inicialización en el sitio web de osCommerce que registra la solicitud y redirige inmediatamente al propietario de la tienda a una página de embarque en PayPal sitio web. osCommerce registra la siguiente información en la solicitud:
    <ul>
      <li> Una ID de sesión generada de forma exclusiva. </li>
      <li> Una ID secreta para hacer coincidir con la ID de la sesión. </li>
      <li> La URL de la aplicación de PayPal de los propietarios de la tienda (para redirigir al propietario de la tienda de nuevo). </li>
      <li> La dirección IP del propietario de la tienda. </li>
    </ul>
  </li>
  <li> PayPal solicita al propietario de la tienda que inicie sesión en su cuenta de PayPal existente o que cree una cuenta nueva. </li>
  <li> PayPal le pide al propietario de la tienda que conceda permiso de osCommerce para recuperar sus credenciales de API. </li>
  <li> PayPal redirecciona al propietario de la tienda a la página de inicialización en el sitio web de osCommerce. </li>
  <li> osCommerce recupera y almacena de forma segura la siguiente información de PayPal:
    <ul>
      <li> Nombre de usuario de la API </li>
      <li> Contraseña de API </li>
      <li> Firma API </li>
      <li> ID de cuenta </​​li>
    </ul>
  </li>
  <li> El propietario de la tienda se redirige automáticamente a su aplicación de PayPal. </li>
  <li> La aplicación de PayPal realiza una llamada HTTPS segura al sitio web de osCommerce para recuperar las credenciales de la API. </li>
  <li> El sitio web osCommerce autentica la llamada HTTPS segura, envía las credenciales de la API y descarta localmente las credenciales API y la URL de la aplicación PayPal almacenadas en los pasos 1 y 5. </li>
  <li> La aplicación de PayPal se configura con las credenciales de la API. </li>
</ol>

<div class = "pp-panel pp-panel-warning">
  <p> Las credenciales API recuperadas de la cuenta PayPal de los propietarios de la tienda solo se utilizan para configurar la aplicación PayPal. osCommerce almacena temporalmente las credenciales de API como se describe en esta política de privacidad, y descarta las credenciales de API tan pronto como el proceso finaliza. También se ejecuta un script de fondo para descartar cualquier información almacenada para procesos que no se han finalizado. </p>
</div>

<div class = "pp-panel pp-panel-info">
  <p> osCommerce ha trabajado estrechamente con PayPal para garantizar que la aplicación de PayPal cumpla con estrictas políticas de privacidad y seguridad. </p>
</div>

<h3> Módulos de PayPal </h3>

<p> Los módulos de PayPal envían a PayPal información sobre el propietario de la tienda, la tienda en línea y el cliente para procesar las transacciones API. Estos incluyen los siguientes módulos: </p>

<ul>
  <li>PayPal Payments Standard</li>
  <li>PayPal Express Checkout</li>
  <li>PayPal Payments Pro (Pago directo)</li>
  <li>PayPal Payments Pro (Solución alojada)</li>
  <li>Log In with PayPal</li>
</ul>

<p> La siguiente información se incluye en las llamadas API enviadas a PayPal: </p>

<ul>
  <li> Información de la cuenta de PayPal del propietario del vendedor / tienda, incluida la dirección de correo electrónico y las credenciales de la API. </li>
  <li> Direcciones de envío y facturación del cliente. </li>
  <li> Información del producto, incluidos el nombre, el precio y la cantidad. </li>
  <li> Información de envío e impuestos aplicable al pedido. </li>
  <li> El total y la moneda del pedido. </li>
  <li> URLs de la tienda para procesar, verificar y finalizar transacciones de PayPal, incluidas las URL de éxito, cancelaciones y de IPN. </li>
  <li> Identificación de la solución de comercio electrónico. </li>
</ul>

<div class = "pp-panel pp-panel-info">
  <p> Los parámetros de cada transacción enviada ay recibida de PayPal se pueden inspeccionar en la página de registro de la aplicación de PayPal. </p>
</div>

<h3> Actualizaciones de la aplicación </h3>

<p> La aplicación de PayPal para el comerciante en línea de osCommerce comprueba automáticamente el sitio web de osCommerce para las actualizaciones que están disponibles para la aplicación. Esta comprobación se realiza una vez cada 24 horas y, si hay una actualización disponible, se muestra una notificación para permitir que la aplicación descargue y aplique la actualización. </p>

<p> También se realiza una comprobación manual de las actualizaciones disponibles en la página de información de la aplicación de PayPal. </p>

<h3> Bibliotecas alojadas en Google (jQuery y jQuery UI) </h3>

<p> Si jQuery o jQuery UI no están cargados en la herramienta de administración, las páginas de administración de la aplicación de PayPal cargan automáticamente las bibliotecas de forma segura a través de las bibliotecas alojadas en Google. </p>
