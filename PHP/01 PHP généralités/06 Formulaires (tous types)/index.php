<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Transmettre donnees</title>
    
  </head>
  <body>


    <form method="post" action="traitement.php">
		<p>
			<table>
				<tr>
					<td>Prénom</td>
					<td><input type="text" name="prenom" /></td>
				</tr>
				<tr>
					<td>Nom</td>
					<td><input type="text" name="nom" /></td>
				</tr>
			</table>
			<button type="submit">Envoyer</button>
            
            <!-- case a cocher -->
            <!-- renvoie on si coché sinon rien -->
			<p>
				<label for="case">Je suis majeur (fonctionnel)<input type="checkbox" name="maj" id="case"/></label>
			</p>

            <!-- zone de texte -->
            <!-- variable $_POST['message'] -->
            <p>
                <textarea name="message" rows="8" cols="45">  
                Message ici.
                </textarea>
            </p>

            <!-- liste deroulante -->
            <p>
                <select name="choix">
                <option value="choix1">Choix 1</option>
                <option value="choix2">Choix 2</option>
                <option value="choix3">Choix 3</option>
                </select>
            </p>

            <!-- boutons d'options -->
            <p>
                Buvez-vous du café ?
                <input type="radio" name="cafe" value="oui" id="oui" cheched="checked" /><label for="oui">Oui</label>
                <input type="radio" name="cafe" value="non" id="non" /><label for="non">Non</label>
            </p>

            <!-- champs cachés -- sert a transmettre infos fixes -->
            <input type="hidden" name="pseudo" value="Fabino" />


	</form>


</body>
</html>