<?php
require_once "lib/mercadopago.php";
 
$mp = new MP('7657905071534031', 'uKbA1hwm0ikxbKU3WGnSadZPAr8Urmso');
$preference_data = array(
	"items" => array(
		array(
			"id" => "Code",
			"title" => "Title of what you are paying for",
			"currency_id" => "USD",
			"picture_url" =>"https://www.mercadopago.com/org-img/MP3/home/logomp3.gif",
			"description" => "Description",
			"category_id" => "Category",
			"quantity" => 1,
			"unit_price" => 10.2
		)
	),
	"payer" => array(
		"name" => "user-name",
		"surname" => "user-surname",
		"email" => "user@email.com",
		"date_created" => "2014-07-28T09:50:37.521-04:00",
		"phone" => array(
			"area_code" => "11",
			"number" => "4444-4444"
		),
		"identification" => array(
			"type" => "DNI",
			"number" => "12345678"
		),
		"address" => array(
			"street_name" => "Street",
			"street_number" => 123,
			"zip_code" => "1430"
		)
	),
	"back_urls" => array(
		"success" => "http://localhost/mercado_pago/mercadopagosj/return.php",
		"cancelled" => "http://localhost/mercado_pago/mercadopagosj/return.php",
		"pending" => "http://localhost/mercado_pago/mercadopagosj/return.php"
	),
	"auto_return" => "approved",
	"payment_methods" => array(
		"excluded_payment_methods" => array(
			array(
				"id" => "amex",
			)
		),
		"excluded_payment_types" => array(
			array(
				"id" => "ticket"
			)
		),
		"installments" => 24,
		"default_payment_method_id" => null,
		"default_installments" => null,
	),
	"shipments" => array(
		"receiver_address" => array(
			"zip_code" => "1430",
			"street_number"=> 123,
			"street_name"=> "Street",
			"floor"=> 4,
			"apartment"=> "C"
		)
	),
	"notification_url" => "https://www.your-site.com/ipn",
	"external_reference" => "Reference_1234",
	"expires" => false,
	"expiration_date_from" => null,
	"expiration_date_to" => null
);
$preference = $mp->create_preference($preference_data);
?>

<!doctype html>
<html>
	<head>
		<title>MercadoPago SDK - Create Preference and Show Checkout Example</title>
	</head>
	<body>

	<?php include("invoice/invoice.html");
	?>
<br><br>
	<div align="center">
	<button>	<a href="<?php echo $preference["response"]["sandbox_init_point"]; ?>" name="MP-payButton" class='blue-ar-l-rn-aron'>Pagar por Mercado Pago</a>  
<script type="text/javascript">
(function(){function $MPC_load(){window.$MPC_loaded !== true && (function(){var s = document.createElement("script");s.type = "text/javascript";s.async = true;s.src = document.location.protocol+"//secure.mlstatic.com/mptools/render.js";var x = document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s, x);window.$MPC_loaded = true;})();}window.$MPC_loaded !== true ? (window.attachEvent ?window.attachEvent('onload', $MPC_load) : window.addEventListener('load', $MPC_load, false)) : null;})();
</script>
</button>
</div>

	
	</body>
</html>