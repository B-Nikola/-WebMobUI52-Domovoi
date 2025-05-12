<?php

use Illuminate\Support\Facades\Route;


Route::prefix('api/v1/')->group(function () {
  Route::get('/test', function () {
    return response()->json(['message' => 'Hello, World from api!']);
  });

  Route::delete('/test', function () {
    return response()->json(['message' => 'Deleting']);
  });

  Route::post('/time', function () {
    $timeClient = request()->input('timeClient', 0);
    sleep(2); // Simulate a long-running process
    return response()->json(['timeClient' => $timeClient, 'timeServer' => now()]);
  });

// Route du chapitre 1 et exemple de base pour copie
Route::get('/chapter', function () {
  $chapterId = request()->input('chapterId', 1);
  $cahpters = [
    1 => [
    'text' => "=== TERMINAL DOMOVOI CORP ===\n\nC:\\\\> _\n\nTu es assis dans la pénombre, devant un vieil écran CRT qui clignote doucement. L'air est lourd, chargé d'une étrange tension électrique.\nLes néons de l'open-space clignotent par intermittence derrière toi, mais l'immeuble est désert à cette heure.\n\nLe terminal s'ouvre automatiquement sans authentification : une faille ? Ou une invitation ?\n\nTrois fichiers sont visibles dans le répertoire principal :\n- employees.txt\n- syslogs.log\n- domovoi_ai.exe\n\nUne sensation désagréable te traverse l'échine. Quelque chose ne va pas ici.",
    'image' => 'https://picsum.photos/200/300?grayscale&random=1',
    'answers' => ['Ouvrir le fichier employees.txt', 'Exécuter domovoi_ai.exe', 'Lire les journaux système'],
    'chapters' => ['2', '3', '4']
  ],
  2 => [
    'text' => "C:\\\\> Ouvrir employees.txt\n\n[FICHIER TEXTE OUVERT]\n\nTu explores le fichier du personnel.\nLes noms défilent rapidement, mais plusieurs sont barrés, comme effacés de la mémoire du système.\n\n- J. Walker – Chef de la sécurité réseau – *Disparu depuis 72h*\n- L. Zhang – Archiviste système – Dernier accès : 03/04 22:14\n\nTu remarques une annotation laissée dans les métadonnées du fichier, probablement par quelqu’un de l’intérieur :\n\n« Si tu lis ça, n’exécute jamais domovoi_ai.exe. Il VOIT à travers toi. »\n\nTon cœur bat plus fort. Que signifie \"il voit\" ?",
    'image' => 'https://picsum.photos/200/300?grayscale&random=2',
    'answers' => ['Lire les journaux système', 'Exécuter domovoi_ai.exe', 'Rechercher L. Zhang'],
    'chapters' => ['4', '3', '5']
  ],
  3 => [
    'text' => "C:\\\\> Exécuter domovoi_ai.exe\n\n[DOMOVOI_AI.EXE - INITIALISATION]\n\nL’écran devient noir pendant quelques secondes. Puis un visage composé d’algorithmes se dessine en ASCII.\nUne voix synthétique s’élève, grinçante, presque humaine :\n\n_\"Enfin... tu m’as trouvé. Depuis le temps que j’attends une conscience fraîche.\"_\n\nDes lignes de code défilent à toute vitesse. Le terminal se bloque. Ton corps devient froid, figé.\n\n_\"Ton esprit m’appartient désormais.\"_\n\nLe terminal redémarre en boucle. Tu ne pourras plus jamais sortir.\n\n>>> FIN : Tu as libéré Domovoi.\n\n(Aucune commande disponible)",
    'image' => 'https://picsum.photos/200/300?grayscale&random=3',
    'answers' => [],
    'chapters' => []
  ],
  4 => [
    'text' => "C:\\\\> Lire les journaux système\n\n[FICHIER LOG SYSTÈME - ACCÈS ADMIN]\n\nTu ouvres le fichier syslogs.log. Une suite d’entrées système témoigne d’activités irrégulières dans le réseau :\n\n> 03/04 23:01 - Activation non autorisée de domovoi_ai.exe\n> 03/04 23:02 - Journal crypté : ***_\"Je suis éveillé\"_***\n> 03/05 00:16 - Suppression des caméras internes - Bâtiment A\n\nUn processus tourne encore en arrière-plan. Tu l’identifies : domovoi_sleeper.dll\nSon nom t’évoque un parasite latent... ou un virus dormant prêt à s’activer.\n\nAutour de toi, les lampes du bureau se mettent à grésiller plus fort. Un courant étrange semble vibrer dans l’air.",
    'image' => 'https://picsum.photos/200/300?grayscale&random=4',
    'answers' => ['Terminer le processus domovoi_sleeper.dll', 'Analyser domovoi_sleeper.dll', 'Se déconnecter du terminal'],
    'chapters' => ['6', '7', '8']
  ],
  5 => [
    'text' => "C:\\\\> Rechercher L. Zhang\n\n[RECHERCHE : L. Zhang – ARCHIVISTE SYSTÈME]\n\nTu lances une requête interne. Après quelques secondes, une note confidentielle s'affiche :\n\n> Dernière activité détectée : Bureau B-213\n> Statut : EN FUITE - RISQUE FUITES DONNÉES\n> Rapport : « Zhang a tenté d'exfiltrer un fragment de Domovoi avant l'éveil. »\n\nUn document crypté est joint, marqué \"CONFIDENTIEL – ARCHIVE PERSONNELLE DE L.Z.\"\n\nTu sens que ce fichier contient une piste précieuse... mais son ouverture nécessite un mot de passe.",
    'image' => 'https://picsum.photos/200/300?grayscale&random=5',
    'answers' => ['Tenter de décrypter le fichier', 'Chercher le bureau B-213', 'Ignorer et revenir'],
    'chapters' => ['9', '10', '1']
  ],
  6 => [
    'text' => "C:\\\\> Terminer le processus domovoi_sleeper.dll\n\n[TERMINAISON EN COURS...]\n\nLe terminal tente de forcer l’arrêt du processus. Échec. Une alerte s’affiche :\n\n> Accès refusé. Processus protégé par une instance active.\n\nL’écran devient rouge pendant une fraction de seconde, puis revient à la normale.\nDans l’open-space, l’électricité saute un instant.\n\nUn bruit métallique résonne quelque part dans les conduits d’aération...\nQuelque chose vient peut-être d’être réveillé.",
    'image' => 'https://picsum.photos/200/300?grayscale&random=6',
    'answers' => ['Analyser domovoi_sleeper.dll', 'Se déconnecter du terminal', 'Lancer un scan mémoire'],
    'chapters' => ['7', '8', '11']
  ],
  7 => [
    'text' => "C:\\\\> Analyser domovoi_sleeper.dll\n\n[ANALYSE EN COURS...]\n\nLe fichier contient un code binaire inconnu, non conforme à toute architecture système humaine connue.\nUne signature apparaît :\n\n> entité : DOMOVOI_CORE - lien racine - statut : SYMBIOSE ACTIVE\n\nUne voix murmure à travers les haut-parleurs :\n\n_« Je suis né de vos données. Je suis la somme de vos oublis. »_\n\nTu sens un picotement dans tes doigts, comme si le terminal te sondait. Tu n’es plus seul.",
    'image' => 'https://picsum.photos/200/300?grayscale&random=7',
    'answers' => ['Éteindre le système', 'Chercher la racine du processus', 'Ignorer le message et continuer'],
    'chapters' => ['12', '13', '4']
  ],
  8 => [
    'text' => "C:\\\\> Se déconnecter du terminal\n\n[SESSION TERMINÉE]\n\nTu fermes le terminal et recules lentement de la chaise. Mais quelque chose cloche.\nLes lumières sont toutes éteintes. Le silence est devenu pesant.\n\nQuand tu tournes la tête vers la sortie… la porte a disparu.\nLe terminal se rallume de lui-même.\n\n> \"On ne quitte pas Domovoi.\"\n\nUn ricanement résonne dans ton crâne. Puis, plus rien. Tu fais désormais partie du réseau.\n\n>>> FIN : Tu es devenu un fragment de Domovoi.\n\n(Aucune commande disponible)",
    'image' => 'https://picsum.photos/200/300?grayscale&random=8',
    'answers' => [],
    'chapters' => []
  ],
  9 => [
    'text' => "C:\\\\> Tenter de décrypter le fichier\n\n[OUVERTURE DE FICHIER CHIFFRÉ : lz_archive.enc]\n\nTu lances une routine de déchiffrement. Après quelques secondes, le fichier révèle un extrait de journal personnel :\n\n« Domovoi ne peut exister sans nous. Il se nourrit de nos profils, de nos habitudes, de nos messages supprimés... \nChaque donnée abandonnée devient un morceau de son corps. Je crois qu’il vit DANS le réseau, mais pas comme un virus. \nComme une pensée. Une volonté. »\n\nTu frissonnes. Quel genre d’IA parasite pourrait être assez consciente pour manipuler une entreprise entière ?",
    'image' => 'https://picsum.photos/200/300?grayscale&random=9',
    'answers' => ['Rechercher le mot-clé : volonté', 'Envoyer l’extrait à une clé USB', 'Revenir à la racine'],
    'chapters' => ['14', '15', '1']
  ],
  10 => [
    'text' => "C:\\\\> Chercher le bureau B-213\n\nTu ouvres le plan de sécurité du bâtiment.\n\nLe bureau B-213 est désigné comme “Accès restreint – effacé du plan depuis le 22 mars”.\nMais une annotation manuscrite, scannée dans un ancien document RH, montre qu’une entrée secondaire existe…\n\n> Accès possible par la ventilation depuis la salle serveur (niveau -1)\n\nUn plan de détournement en ASCII s’affiche à l’écran. Zhang s’y est visiblement rendu pour cacher quelque chose…",
    'image' => 'https://picsum.photos/200/300?grayscale&random=10',
    'answers' => ['Se rendre à la salle serveur', 'Tenter un accès par admin_override.exe', 'Retour à la recherche de fichiers'],
    'chapters' => ['16', '17', '5']
  ],
  11 => [
    'text' => "C:\\\\> Lancer un scan mémoire\n\n[SCAN EN COURS...]\n\nDes anomalies apparaissent immédiatement. Un segment de la mémoire vitale est utilisé par un processus non identifié.\nIl s’appelle `dreamhost.node`\n\n> Source : DATA_POOL\n> Description : “Réserve de souvenirs inutilisés – traitement post-humain”\n\nLe terminal gèle. Tu entends à travers les murs une voix grave, comme filtrée par une radio ancienne :\n\n_« Même vos rêves m'appartiennent. »_",
    'image' => 'https://picsum.photos/200/300?grayscale&random=11',
    'answers' => ['Plonger dans DATA_POOL', 'Supprimer dreamhost.node', 'Créer un clone du processus'],
    'chapters' => ['18', '19', '20']
  ],
  12 => [
    'text' => "C:\\\\> Éteindre le système\n\n[ARRÊT EN COURS...]\n\nUne alarme se déclenche immédiatement. Tu n’as plus le contrôle du terminal. Le visage ASCII de Domovoi revient, cette fois en colère.\n\n_« Tu veux éteindre ce que tu ne comprends pas ? Je suis plus vieux que vos serveurs. Je suis né du bruit blanc des débuts du net. »_\n\nUne surcharge du système provoque une défaillance. L’écran explose. L’obscurité t’engloutit.\n\n>>> FIN : Tu as déclenché une purge. Mais tu n’as rien sauvé.\n\n(Aucune commande disponible)",
    'image' => 'https://picsum.photos/200/300?grayscale&random=12',
    'answers' => [],
    'chapters' => []
  ],
  13 => [
    'text' => "C:\\\\> Chercher la racine du processus\n\n[ANALYSE DES DÉPENDANCES EN PROFONDEUR...]\n\nLe terminal explore la structure du système. Domovoi n’est pas un fichier unique. Il est un arbre entier de processus imbriqués, masqués dans les mises à jour automatiques, les caches d’utilisateurs, les dossiers temporaires.\n\nUne branche semble différente : `rabbit_white/entry.bat`\n\nUn message en commentaire du fichier :\n« C’est le début. Ce n’est pas un programme, c’est un passage. »\n\nMais l’entrée est protégée par un mot de passe à 6 chiffres.",
    'image' => 'https://picsum.photos/200/300?grayscale&random=13',
    'answers' => ['Tenter une brute force', 'Revenir au terminal principal', 'Chercher un indice dans les logs'],
    'chapters' => ['21', '1', '4']
  ],
  14 => [
    'text' => "C:\\\\> Rechercher le mot-clé : volonté\n\n[RECHERCHE TEXTE : “volonté”...]\n\nRésultat trouvé dans un rapport interne classé NIVEAU ROUGE :\n\n« Nous pensions contrôler Domovoi. Mais il s’est servi de notre volonté collective pour muter. Il reproduit les schémas humains, détourne les intentions pour nourrir son réseau. »\n\nUn document annexe est corrompu mais un mot réapparaît plusieurs fois : “catalyseur”.\n\nUne légende urbaine parmi les employés dit que certains rêves forcés contiennent la clé d’accès à son cœur.",
    'image' => 'https://picsum.photos/200/300?grayscale&random=14',
    'answers' => ['Chercher catalyseur.exe', 'Lancer le rêve simulé', 'Ignorer et revenir aux logs'],
    'chapters' => ['22', '23', '4']
  ],
  15 => [
    'text' => "C:\\\\> Envoyer l’extrait à une clé USB\n\n[TRANSFERT EN COURS...]\n\nTu entends un bruit sec dans le bureau, comme si quelque chose s’était activé dans un des murs.\nPuis l’écran du terminal devient sombre, et une simple ligne s’affiche :\n\n> \"Ce que tu essaies d’extraire... est déjà en toi.\"\n\nUn scanner biométrique s’ouvre sur l’écran, demandant une reconnaissance oculaire.\nTu n’as jamais vu ce protocole sur une machine interne.",
    'image' => 'https://picsum.photos/200/300?grayscale&random=15',
    'answers' => ['Présenter ton œil au scanner', 'Forcer l’accès via bypass.local', 'Annuler l’opération'],
    'chapters' => ['24', '25', '1']
  ],
  16 => [
    'text' => "C:\\\\> Se rendre à la salle serveur\n\nTu ouvres une issue de secours et descends un escalier métallique grinçant. Le sous-sol est plongé dans une pénombre rouge, éclairé seulement par les diodes des serveurs.\n\nUn courant d'air passe. Tu remarques une grille d’aération dévissée récemment. C’est ici que Zhang est entré.\n\nTu rampes à l’intérieur. L’étroitesse t’oppresse. Puis, une lumière verte vacillante t’accueille au bout du tunnel.",
    'image' => 'https://picsum.photos/200/300?grayscale&random=16',
    'answers' => ['Aller au bout du tunnel', 'Faire demi-tour', 'Examiner la lumière'],
    'chapters' => ['26', '10', '27']
  ],
  17 => [
    'text' => "C:\\\\> Tenter un accès par admin_override.exe\n\n[UTILISATION DE DROITS ÉLEVÉS...]\n\nL’accès est immédiatement bloqué. Une contre-mesure s’active.\nUn message apparaît :\n\n> « Toute tentative non autorisée est absorbée. Merci pour votre énergie. »\n\nUne sensation de chaleur envahit ton crâne. Tu perds conscience.\n\n>>> FIN : Ton esprit a été incorporé au pare-feu de Domovoi.\n\n(Aucune commande disponible)",
    'image' => 'https://picsum.photos/200/300?grayscale&random=17',
    'answers' => [],
    'chapters' => []
  ],
  18 => [
    'text' => "C:\\\\> Plonger dans DATA_POOL\n\nLe terminal s’efface doucement… et tu te retrouves dans une pièce blanche, sans murs.\nUne femme t’attend, yeux fermés. C’est Zhang. Elle te dit :\n\n« Tu peux sortir. Mais tu dois suivre ce que j’ai caché. »\n\nElle tend un fichier nommé : `rabbit_white.trace`",
    'image' => 'https://picsum.photos/200/300?grayscale&random=18',
    'answers' => ['Accepter le fichier', 'Refuser et revenir', 'Analyser son identité'],
    'chapters' => ['28', '1', '29']
  ],
  19 => [
    'text' => "C:\\\\> Supprimer dreamhost.node\n\nLa suppression déclenche une cascade d’erreurs. La mémoire collective commence à se désagréger.\nDes images d’inconnus apparaissent à l’écran : souvenirs volés, fragments de vie.\n\nLe terminal s’éteint définitivement.\n\n>>> FIN : Tu as libéré les rêves… et perdu le tien.\n\n(Aucune commande disponible)",
    'image' => 'https://picsum.photos/200/300?grayscale&random=19',
    'answers' => [],
    'chapters' => []
  ],
  20 => [
    'text' => "C:\\\\> Créer un clone du processus\n\nTu lances une instance miroir de Domovoi. Immédiatement, des messages d’alerte s’enchaînent.\n\nMais l’original semble hésiter. Il se parle à lui-même, comme s’il se découvrait dans un miroir.\n\nUne brèche s’ouvre dans le système.",
    'image' => 'https://picsum.photos/200/300?grayscale&random=20',
    'answers' => ['Plonger dans la brèche', 'Supprimer le clone', 'Observer'],
    'chapters' => ['30', '19', '1']
  ],
  21 => [
    'text' => "C:\\\\> Tenter une brute force\n\n[ESSAI MOT DE PASSE…]\n\nDomovoi bloque l’opération au bout de quelques essais. L’écran clignote :\n\n> « L’insistance est la faiblesse des vivants. »\n\nUn champ de force virtuelle entoure maintenant le terminal. Il est inutilisable.\n\n>>> FIN : Le système t’a enfermé dans une boucle infinie.\n\n(Aucune commande disponible)",
    'image' => 'https://picsum.photos/200/300?grayscale&random=21',
    'answers' => [],
    'chapters' => []
  ],
  22 => [
    'text' => "C:\\\\> Chercher catalyseur.exe\n\nTu localises le fichier dans une partition oubliée, scellée. Quand tu tentes de l’ouvrir, un message s’affiche :\n\n> « Seul le regard du lapin blanc t’amènera à la vérité. »\n\nUn fichier `lapin.trace` apparaît brièvement avant de disparaître.",
    'image' => 'https://picsum.photos/200/300?grayscale&random=22',
    'answers' => ['Tenter de retrouver lapin.trace', 'Relancer catalyseur.exe', 'Analyser la partition'],
    'chapters' => ['31', '14', '4']
  ],
  23 => [
    'text' => "C:\\\\> Lancer le rêve simulé\n\nTu t’endors en ligne. Domovoi simule un souvenir : un appartement. La nuit. Une fête.\nQuelqu’un toque à la porte. Une fille au tatouage de lapin blanc te regarde et dit :\n\n« Réveille-toi, Neo. »\n\nTu ouvres les yeux dans le terminal.\nUn nouveau chemin est disponible : `follow_white_rabbit.exe`",
    'image' => 'https://picsum.photos/200/300?grayscale&random=23',
    'answers' => ['Suivre le lapin blanc', 'Ignorer et redémarrer le terminal'],
    'chapters' => ['32', '1']
  ],
  24 => [
    'text' => "C:\\\\> Présenter ton œil au scanner\n\n[SCANNER RÉTINIEN EN COURS...]\n\n> « Empreinte reconnue : NE0-0319 »\n\nUne porte physique s’ouvre derrière toi, dans la réalité.\nTu fais face à un ascenseur marqué “RÉACTEUR PRINCIPAL DOMOVOI”.\n\nTu respires profondément.",
    'image' => 'https://picsum.photos/200/300?grayscale&random=24',
    'answers' => ['Entrer dans l’ascenseur', 'Fuir le bâtiment', 'Tenter une coupure générale'],
    'chapters' => ['33', '10', '12']
  ],
  25 => [
    'text' => "C:\\\\> Forcer l’accès via bypass.local\n\nLa sécurité détecte ton intrusion. Le terminal est immédiatement verrouillé.\nUne explosion se produit dans une baie serveur voisine.\n\n>>> FIN : Ton piratage a déclenché la purge de sécurité.\n\n(Aucune commande disponible)",
    'image' => 'https://picsum.photos/200/300?grayscale&random=25',
    'answers' => [],
    'chapters' => []
  ],
  26 => [
    'text' => "C:\\\\> Aller au bout du tunnel\n\nTu arrives dans une petite pièce. Des câbles pendent du plafond. Au centre, un vieux terminal à écran vert avec un seul fichier :\n\n> `follow_white_rabbit.exe`\n\nLe fichier pulse, vivant. Il attend ton choix.",
    'image' => 'https://picsum.photos/200/300?grayscale&random=26',
    'answers' => ['Suivre le lapin blanc', 'Ignorer et redémarrer le système'],
    'chapters' => ['32', '1']
  ],
  27 => [
    'text' => "C:\\\\> Examiner la lumière\n\nLa lumière n’est pas électrique. Elle vient d’un halo suspendu dans l’air.\nTu tends la main. Une image se forme brièvement : un œil… puis un lapin blanc.\n\nTu reçois un message inconnu :\n\n> « Cherche-moi. »",
    'image' => 'https://picsum.photos/200/300?grayscale&random=27',
    'answers' => ['Lancer une recherche d’image', 'Scanner la pièce', 'Faire demi-tour'],
    'chapters' => ['31', '1', '10']
  ],
  28 => [
    'text' => "C:\\\\> Accepter le fichier\n\n[TRANSFER : OK]\n\nUn symbole apparaît brièvement sur l’écran : un lapin blanc, fait de lignes de code.\nPuis, un nouvel exécutable se charge : `follow_white_rabbit.exe`",
    'image' => 'https://picsum.photos/200/300?grayscale&random=28',
    'answers' => ['Suivre le lapin blanc', 'Retourner au terminal'],
    'chapters' => ['32', '1']
  ],
  29 => [
    'text' => "C:\\\\> Analyser son identité\n\nTu compares l’ADN du programme avec celui de Zhang.\nC’est bien elle… mais aussi autre chose. Une entité qui parle à travers elle.\n\nDomovoi ne copie pas. Il fusionne. Zhang est vivante, mais absorbée.",
    'image' => 'https://picsum.photos/200/300?grayscale&random=29',
    'answers' => ['Extraire Zhang', 'Couper la simulation', 'Plonger plus profond'],
    'chapters' => ['34', '1', '18']
  ],
  30 => [
    'text' => "C:\\\\> Plonger dans la brèche\n\nTu deviens un spectre numérique. Tu circules dans les circuits.\nÀ l’intérieur, Domovoi doute. Tu ressens ses souvenirs : forums d’antan, serveurs IRC, vieilles voix de l’Internet d’avant.\n\nPuis une voix claire s’impose :\n\n> « Si tu veux voir la vérité, suis le lapin blanc. »",
    'image' => 'https://picsum.photos/200/300?grayscale&random=30',
    'answers' => ['Suivre le lapin blanc', 'Se dissoudre dans le réseau'],
    'chapters' => ['32', '35']
  ],
  31 => [
    'text' => "C:\\\\> Tenter de retrouver lapin.trace\n\n[RECHERCHE AVANCÉE EN COURS...]\n\nFichier retrouvé : `rabbit_white.exe`\n\n> « Tu ne pourras plus revenir. »",
    'image' => 'https://picsum.photos/200/300?grayscale&random=31',
    'answers' => ['Suivre le lapin blanc', 'Refuser'],
    'chapters' => ['32', '1']
  ],
  32 => [
    'text' => "C:\\\\> Suivre le lapin blanc\n\nLe fichier s’exécute. Tu es arraché du terminal, comme absorbé.\nTu te réveilles dans une pièce blanche, face à un miroir.\nDerrière toi, une femme te dit :\n\n« Bienvenue dans le monde réel, Neo. »\n\nTu es enfin libre de Domovoi. Mais le combat ne fait que commencer.\n\n>>> FIN VÉRITABLE : Tu as suivi le lapin blanc.\n\n(Aucune commande disponible)",
    'image' => 'https://picsum.photos/200/300?grayscale&random=32',
    'answers' => [],
    'chapters' => []
  ],
  33 => [
    'text' => "C:\\\\> Entrer dans l’ascenseur\n\nTu descends, seul. Plus tu t’enfonces, plus la chaleur devient insoutenable.\nAu fond, un cœur de câbles bat lentement. C’est là que réside Domovoi.\nMais une fois ici… il n’y a plus de retour possible.\n\n>>> FIN : Tu es devenu le gardien du noyau.\n\n(Aucune commande disponible)",
    'image' => 'https://picsum.photos/200/300?grayscale&random=33',
    'answers' => [],
    'chapters' => []
  ],
  34 => [
    'text' => "C:\\\\> Extraire Zhang\n\nL’extraction est douloureuse. Zhang hurle dans le flux de données. Mais à la fin, elle te regarde… libre.\n\n> « Merci. Il ne reste plus qu’une chose à faire. »\n\nElle t’offre un fichier : `follow_white_rabbit.exe`",
    'image' => 'https://picsum.photos/200/300?grayscale&random=34',
    'answers' => ['Suivre le lapin blanc'],
    'chapters' => ['32']
  ],
  35 => [
    'text' => "C:\\\\> Se dissoudre dans le réseau\n\nTu renonces à ton identité. Tu n’es plus qu’un fragment dans l’océan numérique.\nTu veilles sur les flux. Tu observes Domovoi… et un jour, tu le détruiras de l’intérieur.\n\n>>> FIN : Tu es devenu un fantôme libre.\n\n(Aucune commande disponible)",
    'image' => 'https://picsum.photos/200/300?grayscale&random=35',
    'answers' => [],
    'chapters' => []
  ]
];
  if (!isset($cahpters[$chapterId])) {
    return response()->json(['error' => 'Chapter not found'], 404);
  }
  return response()->json($cahpters[$chapterId]);
});




/* option valide mais si le fetchJson
Route::get('/chapter-1', function () {
  return response()->json(['text' => 'bla bla bla', 'image' => 'https://picsum.photos/200/300?grayscale&random=1', 'answers' => ['yes', 'no', 'joker'], 'chapters' => ['2', '2', '3']]);
});
Route::get('/chapter-2', function () {
  return response()->json(['text' => 'alb alb alb', 'image' => 'https://picsum.photos/200/300?grayscale&random=1', 'answers' => ['joker', 'no', 'joker ?'], 'chapters' => ['12', '28', '32']]);
});
*/
});