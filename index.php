<?php

require "fonctions/queryAgent.php";

$agent = new queryAgent();

$response = $agent->find('agent',1);

while($data = $response->fetch()){
?>
    Nom: <?php echo $data['prenoms'] ; ?>
    <br/>

<?php  
}
$response->closeCursor(); 

?>

