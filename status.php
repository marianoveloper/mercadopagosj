<?php
	$status = $explode['1'];
	$name = $_SESSION['name'];
	$sobrenome = $_SESSION['sobrenombre'];
	$email = $_SESSION['email'];
	$telefone = $_SESSION['telefono'];
	$valor = $_SESSION['valor'];
	switch($status){
		case "success":
		    $textoStatus = "PAGO APROBADO";
		    $classStatus = "alert alert-success";
		    $mensajeStatus = "Pago confirmado!";
	    	sendMail($name, $sobrenome, $email, $telefone, $valor, 'Aprobado');
		break;
		case "failure":
		   $textoStatus = "PAGO RECHAZADO";
		   $classStatus = "alert alert-danger";
		   $mensajeStatus = "Su pago fue rechazado. Intente otro metodo de pago.";
		break;
		case "pending":
   	     	$classStatus = "alert alert-warning";
	    	$mensajeStatus = "Pago pendiente. Aguarde!";
		    sendMail($name, $sobrenome, $email, $telefone, $valor, 'Pendiente');
		break;
	}
	?>
<div class="col-sm" align="center">
    <h4>
        <?php echo titulo_site;?> | STATUS</h4>
    <hr>
    <div>
        <?php echo $textoStatus;?>
    </div>
    <hr>
    <div class='<?php echo $classStatus;?>'>
        <?php echo $mensajeStatus;?>
    </div>
    <p align="right"><a href="" class="btn btn-outline-primary btn-lg">Volver al inicio</a></p>
    <hr>
</div>
</div>