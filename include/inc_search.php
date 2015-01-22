<?php
		// requête recherche de la ville ds tables villes
		
		$rep = $bdd -> prepare ('SELECT id, villes_nom FROM villes WHERE villes_nom LIKE ?') or die (print_r($bdd->errorInfo()));
		
		$rep -> execute (array('%'.$search_ville.'%'));
		
		$nb_rows = $rep -> rowCount(); //méthode qui compte le nb de lignes 
		
			if ($nb_rows > 0)
			{
				while ($row = $rep -> fetch())
				{
				$search_result [$row['id']] = $row ['villes_nom'];
				}
			
				$rep -> closeCursor();
			
				// boucle foreach pour récuper les ville_id
			
				foreach ($search_result as $key => $value)
				{
				$resultID = $key;
			
				//enregistrement des résultats dans la table user_search
				
				$regist = $bdd -> prepare ('INSERT INTO user_search (userID, resultID) VALUES (:userID, :resultID)');
				$regist -> execute (array(
									'userID' => $userID,
									'resultID' => $resultID
										));
				}	
			
				$regist -> closeCursor();
			
			}
			
			//requête affichage historique de recherche
			// GROUP évite d'afficher les doublons
			// ORDER BY permet de classer les villes par ordre alphabétique
			
			$history = $bdd -> prepare ('
			SELECT v.villes_nom ville, s.resultID resultID
			FROM villes v
			INNER JOIN user_search s
			ON s.resultID = v.id
			WHERE s.userID = ?
			GROUP BY ville 
			ORDER BY ville
			') or die(print_r($bdd->errorInfo()));
			
			$history -> execute (array($userID));
			
				while ($history_row = $history -> fetch())
				{
				$result_history [$history_row['resultID']] = $history_row['ville'];
				}
			
				$history -> closeCursor();
?>			