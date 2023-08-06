Partie 1 - Gestion du login

Dans cette partie on utilise le formulaire pour gerer un équivalent du login. Le nom d'utilisateur est rentré via une requete de type POST , le script vérifie donc cette clé et la sauvegarde.
On teste ensuite l'affichage ou non en s'appuyant sur la valeur enregistrée dans la session. C'est cette superglobale qui va nous servir.
On prépare les zones a afficher selon l'état de la connexion. Les deux fichiers utilisent le même process pour cette gestion.

Partie 2 - Gestion des fruits

Dans cette partie nous mettons en place la gestion des fruits. On utilise les cookies pour sauvegarder la liste des fruits sur le navigateur du client.
Afin d'avoir une liste par défaut on teste si on a recu un cookie du client, dans ce cas on décode le json pour le transformer en liste de fruits, sinon on créé une liste, on l'encode en json pour la renvoyer au client.
Dans tous les cas on a une liste de fruits a afficher.
On prépare une zone de formulaire pour l'ajout d'un fruit via une requete POST.

Partie 3 - Gestion du panier

Le panier est accessible via les deux pages donc il est stocké en session.
L'ajout des fruits dans le panier se fait sur l'index via une requete POST. Il faut structurer le fruit pour le manipuler correctement.
Dans la page du panier on fait les calculs pour afficher d'une part le total du prix par fruit. puis le total a payer.
Evidemment le panier se détruit quand la session est finie...

Init de la liste des fruits

Seule la page de la liste des fruits initialise la liste (envoyé via cookie) hors si on se loggue la première fois sur le panier et qu'on va sur la page de la liste ben les fruits ne sont pas recu par le client (puisque le cookie est envoyé a ce moment donc pas encore reçu). Il faut donc implémenter l'initialisation de la liste (envoyer dans le cookie sur cette page aussi ).
Pour voir le delta : se positionner sur la branche gestion panier :
    • se mettre sur la page panier 
    • supprimer le cookie "fruits" 
    • se délogger (si necessaire) 
    • se logger 
    • aller sur la liste des fruits 
    • rafraichir la page. 