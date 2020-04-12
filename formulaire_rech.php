<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Rechercher un pharmacie</title>
<body>
    <div style="position:absolute; top:28%; left:32%; align="center"">
      <div id="div_1" align="center">
        <form method="POST" action="recherche.php">
            <h3>faire votre recherche</h3>
            <table>
	   <tr><td colspan="2" align="center"><hr></td></tr>
                <tr>
                    <td><label>nom *</label></td>
                    <td><input type="text" name="nom" ></td>
                </tr>
                <tr>
                    <td><label>Adresse *</label></td>
                    <td><input type="text" name="adresse" ></td>
                </tr>
                <tr>
                <tr>
                    <td><label>spécialité *</label></td>
                    <td><input type="text" name="sp" ></td>
                </tr>	
                    <td colspan="2" align="center"><hr><input type="submit" value="rechercher"></td>
                </tr>
            </table>
            <br>
        </form>
</body>
</html>