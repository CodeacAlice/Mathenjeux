<!doctype html>
<html lang="fr">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Équations et problèmes</title>

  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="/css/stylesheet.css">
  <link rel="stylesheet" type="text/css" href="/css/corpswhite.css">
  <link rel="stylesheet" type="text/css" href="/css/chap.css">

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <!-- jQuery Modal -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Baloo|Nunito:400,700,800" rel="stylesheet">

  <!-- Vue -->
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>
<body>
  <div id="toppage">
    @guest <header-component></header-component>
    @else <header-component iduser="{{ Auth::user()->id }}"></header-component>
    @endguest

    <navbar-component page=''></navbar-component>
  </div>


  <div id="support">
    <!-- <div id="app"> -->
      <div id="triangle3" class="tri"><svg-triangle></svg-triangle></div>
      <div id="triangle4" class="tri"><svg-triangle></svg-triangle></div>
    
      <div id="corps">
        <h2>Équations et problèmes</h2>

        <h3>1- Keskécé ? / Définitions</h3>

        <p>Grosso modo, une équation, c'est quelque chose qui ressemble à ça&nbsp;:</p>
        <div class="equation">3x + 2y - 1 = -7z + 4</div>

        <h4>??? (o_o)"</h4>
        <p>... C'est une égalité. Donc il y a le signe =. Mais ce n'est pas une égalité ordinaire (sinon ça s'appellerait juste égalité), c'est une égalité dans laquelle se trouvent un ou plusieurs nombres qu'on ne connait pas, et qu'on appelle des <strong>inconnues</strong>.</p>
        <p>Voyez ça un peu comme une balance à plateaux, toujours en équilibre, sur laquelle se trouvent des poids dont on connait la masse (représentés par la lettre P) et d'autres dont on ne connait pas la masse&nbsp;:</p>

        <!-- Mettre ici la première balance -->
        <eq-balancea></eq-balancea>

        <h4>Mais comment on sait que c'est égal si on ne connait pas les nombres&nbsp;?</h4>
        <p>Excellente question&nbsp;! Vous aurez en général deux cas possibles&nbsp;:<br>
          - Soit il y a un contexte derrière qui nous dit qu'il y a égalité. Par exemple, le fameux théorème de Pythagore nous permet de dire que dans un triangle rectangle on a a²+b²=c².<br>
          - Ou alors on ne SAIT PAS qu'il y a égalité, mais on VEUT qu'il y ait égalité. On va donc écrire l'équation et essayer de trouver par quels nombres il faut remplacer les inconnues pour qu'il y ait égalité.<br>
        </p>
        <p>
          Le second cas sera le plus fréquent quand vous aurez des exercices sur les équations. Vous aurez la majeure partie du temps une seule inconnue (souvent notée 'x'), on dira donc qu'on a une <strong>équation à une inconnue</strong>. S'il n'y a pas de x² ou d'autres puissances de x, on dira également qu'on a <strong>une équation de degré 1</strong>, ou <strong>équation du premier degré</strong>.<br>
          Gardez également en tête que, même si n'importe quel nombre peut être mis à la place de x, il n'y aura pas toujours égalité... Par exemple, si je pose x+1=2, vous remarquerez que si je remplace x par 0, j'ai quelque chose de faux (1=2), alors que si je le remplace par 1, j'ai quelque chose de vrai (1+1=2). On appelle <strong>solutions de l'équation</strong> les nombres par lesquels on peut remplacer x tout en ayant quelque chose de vrai.<br>
          Quand un exercice vous demande de <strong>résoudre une équation</strong>, cela signifie qu'il faut chercher les solutions, et écrire à la fin de vos calculs : "Les solutions de l'équation sont&nbsp;: (...)".<br>
          Attention&nbsp;: une équation peut ne pas avoir de solution&nbsp;!
        </p>
        <p>Ca fait pas mal de définitions mais prenez le temps de bien les assimiler, sinon vous serez perdus après.<br>
        Des questions&nbsp;?</p>

        <h4>... Pourquoi 'x'&nbsp;?</h4>
        <p>Pour répondre à cette question, il va falloir faire un petit voyage dans le temps.<br>
          Voyez-vous, à une époque on n'utilisait pas la lettre x pour parler d'inconnus. En fait on n'utilisait rien vu qu'on n'aimait pas les nombres inconnus.<br>
          Et puis un jour un mec a eu une idée de génie. Il s'est dit "Hé, mais si cette inconnue c'est un nombre, pourquoi je pourrai pas l'additionner et le multiplier comme les autres nombres&nbsp;?". Et ainsi naquirent les premières équations.
        </p>
        <p>
          Pour autant, elles étaient bien loin de ressembler aux équations d'aujourd'hui, puisque tout était écrit en lettres. Et quand je dis "écrit en lettres", j'entends qu'une équation comme "x+1=2" aurait été écrite "l'inconnue additionnée à un est égale à deux". Avouez que c'est quand même pas extrêmement pratique.<br>
          Ainsi, de la même façon que les ingénieurs d'aujourd'hui travaillent à réduire l'encombrement des ordinateurs, les mathématiciens ont travaillé à réduire l'encombrement des calculs, à coup de symboles et d'abréviations.
        </p>
        <p>
          Sachez cependant que le x n'est qu'une abréviation. Un masque derrière lequel peut se cacher un nombre. Vous pouvez l'appeler "y", "inconnue" ou "jehaislesmaths", ça ne changera RIEN à vos calculs.<br>
          (bon évitez quand même "jehaislesmaths", ça fera mauvaise impression)<br>
          Si la lettre x est souvent utilisée, c'est surtout par habitude. Tout comme sur votre clavier, vous avez l'habitude de valider avec Entrée et de quitter avec Echap, les mathématiciens ont l'habitude d'écrire les inconnues avec x.
        </p>


        <h4>Ok, c'est bien beau tout ça, mais à quoi ça va me servir&nbsp;?</h4>

        <h3>2- À quoi ça sert&nbsp;? / Mettre un problème sous forme d'équation</h3>
        <p>Prenons une scène banale de la vie quotidienne&nbsp;:<br>
          Vous organisez une fête et vous devez acheter la nourriture. Comme vous êtes en manque d'argent (ou juste radin), vous voulez en acheter le moins possible, mais il faut quand même que tous vos invités aient de quoi se rassasier.<br>
          Eh bien ce problème pourra se résoudre à l'aide d'équations.
        </p>
        <p>
          En effet, il y a un nombre que vous ne connaissez pas (mais que vous aimeriez bien connaître)&nbsp;: la quantité de nourriture. Et il y a une égalité (ou du moins une égalité qu'on aimerait avoir)&nbsp;: ce que vous allez acheter d'une part, ce dont les autres auront besoin pour être rassasiés d'autre part.<br>
          Bon, j'ignore combien d'amis vous avez ou ce que vous leur servez d'habitude, mais pour la suite on va supposer que vous avez 9 amis à qui vous allez servir des gâteaux, qu'il leur faut deux parts chacun et que chaque gâteau sera coupé en 6. Le nombre de parts nécessaires sera donc : 9*2, et le nombre de parts que vous allez amener sera 6*nombredegateaux.<br>
          Si on note x le nombre de gâteaux à acheter, on a donc&nbsp;:
        </p>
        <div class="equation">9*2 = 6*x</div>
        <p>Ta-da&nbsp;! Une équation&nbsp;! Dès que vous saurez la résoudre, vous aurez la réponse à votre problème.</p>
        <p>
          Rappelez-vous des points clés de cette méthode&nbsp;:
          <ul>
            <li>Repérer l'inconnue (généralement c'est ce qu'on vous demande de trouver dans la question)</li>
            <li>Répérer les deux trucs égaux. Si vous avez du mal, relisez bien l'énoncé, essayez de voir quelles sont les quantités mentionnées, qu'est-ce qui est calculable, et s'il n'y a pas quelque chose de calculable de deux manières différentes.<br>
            Car c'est aussi ça une équation : relier des choses entre elles. Électricité et magnétisme, force et accélération, énergie et masse... Toutes sont reliées par des équations qui régissent notre monde et nous permettent d'en savoir plus sur celui-ci.<br>
            Mais je m'égare.</li>
            <li>Une fois que vous avez repéré l'inconnue et les trucs égaux, essayez des les écrire avec des nombres, des opérations, et des x (ou tout autre nom que vous aurez donné à l'inconnue). N'oubliez pas le = entre les deux, et vous aurez votre équation&nbsp;!</li>
          </ul>
        </p>


        <h4>Et... j'en fais quoi&nbsp;?</h4>

        <h3>3- Qu'est-ce que j'en fais&nbsp;? / Résoudre une équation</h3>
        <p>
          Tout d'abord, il faut repérer quel type d'équation vous avez.<br>
          En général, vous aurez soit une équation dite <strong>simple</strong>, c'est à dire avec du x et des nombres, soit une équation dite <strong>produit nul</strong>, c'est à dire avec un produit qui est, euh, nul. "Nul" dans le sens "égal à zéro", j'entends.
        </p>
        <p>
          On va commencer par ce que vous verrez le plus souvent&nbsp;: l'équation simple. <br>
          Reprenons la balance de tout à l'heure, et imaginez ceci&nbsp;: vous avez des poids dont vous connaissez la masse, et d'autres dont vous ne connaissez pas la masse (mais qui sont tous identiques). La balance est en équilibre, et votre but est de trouver la masse de ce poids inconnu SANS faire pencher la balance&nbsp;!<br>
          Bien entendu vous pouvez rajouter ou enlever des poids, et vous pouvez aussi multiplier ou diviser le nombre de poids présents (la mutiplication n'étant au fond qu'une addition répétée plusieurs fois).
        </p>

        <!-- Mettre ici la seconde balance -->
        <eq-balanceb></eq-balanceb>

        <p>
          Vous l'aurez remarqué, le seul moyen de réussir est de mettre ou enlever des poids des deux côtés de la balance à chaque fois.<br>
          Il va falloir faire pareil pour les équations : additionner ou multiplier les deux membres de l'équation à chaque étape. En fait, n'importe quelle opération mathématique (mettre au carré, prendre l'inverse...) peut être appliquée à une équation du moment qu'elle affecte les DEUX membres, mais pour l'instant nous allons nous contenter des opérations de base.<br>
          En effet, pour résoudre une équation simple, il vous suffira de suivre les trois étapes suivantes :
          <ul>
            <li>S'il y a des x des deux côtés, en enlever ou en ajouter afin de n'en avoir que d'un seul côté.<br>
            Par exemple si on a 4x+1=2x+7, enlever 2x pour avoir 2x+1=7&nbsp;;</li>
            <li>S'il y a des nombres (sans x donc) des deux côtés, en enlever ou en ajouter afin de n'en avoir que d'un seul côté, celui où il n'y a pas de x.<br>
            Par exemple si on a 2x+1=7, enlever 1 pour avoir 2x=6&nbsp;;</li>
            <li>Enfin, s'il y a un nombre qui multiplie le x, tout diviser par ce nombre.<br>
            Par exemple, si on a 2x=6, diviser par 2 pour avoir x=3.</li>
          </ul>
        </p>

        <p>Passons à présent à l'équation dite <strong>produit nul</strong>.<br>
          Elle ressemblera en général à quelque chose comme&nbsp;:
        </p>
        <div class="equation">(2x-1)*(x-5) = 0</div>
        <p>Pour les résoudre, il faut d'abord les repérer et les mettre sous cette forme. Car une équation produit nul peut d'abord ressembler à ça&nbsp;:</p>
        <div class="equation">x² + 1 = 2x</div>
        <p>Mais peut être transformée en une équation produit nul. En effet :
          <ul>
            <li>x² + 1 = 2x</li>
            <li>x² + 1 - 2x = 0 (on fait -2x de chaque côté)</li>
            <li>(x-1)² = 0 (identité remarquable : (a-b)²&nbsp;=&nbsp;a²-2ab+b²)</li>
          </ul>
        </p>
        <p>
          Pour savoir que c'est une équation produit nul, c'est simple&nbsp;: c'est le seul type d'équation que vous verrez cette année à part les équations simples. Donc dès que vous avez du x² ou quoi que ce soit qui indique que vous n'avez pas une équation simple, vous avez une équation produit nul.<br>
          
          Pour ce qui est de la factorisation, je vous conseille de vous référer au <a>chapitre sur les égalités remarquables [bientôt disponible]</a>, toutes les techniques que vous avez besoin de connaître y sont répertoriées. Et si les formules ne suffisent pas pour votre exercice, peut-être y avait-il un indice dans les questions précédentes...<br>
          Et surtout, n'oubliez pas ce que nous avons vu avec l'équation simple&nbsp;: si vous modifiez un côté de l'équation, vous devez faire la même chose de l'autre côté&nbsp;!
        </p>

        <p>
          Une fois que votre équation est bien factorisée (vous avez un produit d'un côté du = et un 0 de l'autre), il vous faudra sortir cette phrase&nbsp;:
        </p>
        <div class="formule-container"><div class="formule">Un produit est nul si et seulement si au moins l'un de ses facteurs est nul.</div></div>
        <p>
          Sa signification&nbsp;? Multipliez des nombres entre eux et essayez d'avoir zéro&nbsp;: ça ne marchera que si au moins l'un de vos nombres est déjà égal à zéro.<br>
          C'est pareil avec les équations&nbsp;: si vous voulez avoir (x+1)*(3x-2)=0, il faudra avoir soit x+1=0, soit 3x-2=0.<br>
          Vous voulez tester ? Prenons l'équation suivante&nbsp;:
        </p>
        

        <!-- Mettre ici les équations produit nul -->
        <eq-prodnul></eq-prodnul>

        <p>
          Pour résoudre une équation produit nul de type (x+1)*(3x-2)=0, il faudra donc résoudre plusieurs équations simples de type x+1=0. Une fois ces équations résolues, il ne vous restera plus qu'à écrire "Les solutions de l'équation sont&nbsp;:" suivi des solutions que vous aurez trouvées.<br>
          C'est d'ailleurs une méthode très utilisée pour résoudre les équations&nbsp;: factoriser jusqu'à avoir une équation produit nul, puis résoudre chaque équation simple. Il vaut donc mieux assimiler dès maintenant les techniques de factorisation et de résolution.
        </p>


        <h3>4- Fin</h3>
        <p>C'est bon, c'est compris ? Alors testez vos nouvelles connaissances avec ce test !<br>
        Et si vous avez un compte, n'oubliez pas de vous connecter afin de sauvegarder votre progression.</p>

        <evaluation-base idchap="5"></evaluation-base>


      </div> <!-- Fin corps -->

      <div id="endchap"><nav-chap link="equations.php"></nav-chap></div>

     <!-- </div>Fin app -->

  </div> <!-- Fin du support -->

  <div id="bottompage"><footer-component></footer-component></div>
  

  <script type="text/javascript" src="../js/responsive.js"></script>
  <script type="text/javascript" src="../js/app.js"></script>
</body>
</html>