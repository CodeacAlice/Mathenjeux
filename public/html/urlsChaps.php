<div id="otherChaps">
<?php
  $reqNo = $bdd->query("SELECT number FROM chapters WHERE title = '".$title."'");
  $no = $reqNo->fetch()['number'];
?>

  <!-- Lien vers le chapitre précédent -->
  <div id="chappr">
<?php 
  if ($no > 1) {
    $noprec = $no -1;
    $reqPr = $bdd->query("SELECT link, done FROM chapters WHERE number = '".$noprec."'");
    $pr = $reqPr->fetch();
    if ($pr['done']) {?>
      <a href="<?= $pr['link'] ?>" class="chapdispo">
        <?php echo file_get_contents($level."assets/icons/left-arrow.svg"); ?>
        <p class="notmobile">Chapitre précédent</p>
      </a>
    <?php ;} else {?>
      <a class="chapnotdispo">
        <?php echo file_get_contents($level."assets/icons/left-arrow.svg"); ?> 
        <p class="notmobile">Chapitre précédent<br>[bientôt disponible]</p>
      </a>
    <?php ;}
  }
  else {?>
    <a class="chapnotdispo">
      <?php echo file_get_contents($level."assets/icons/left-arrow.svg"); ?> 
      <p class="notmobile">[Premier chapitre]</p>
    </a>
  <?php
  ;}
?>
  </div>


  <!-- Liste des chapitres -->
  <div id="chapli"
  ><a href="../listechap.php" class="chapdispo">
    <p class="notmobile">Liste des</p> 
    <?php echo file_get_contents($level."assets/icons/chapitres.svg"); ?>
     <p class="notmobile">chapitres</p>
  </a>
</div>


  <!-- Lien vers le chapitre suivant -->
  <div id="chapsu">
<?php 
  $reqTotno = $bdd->query("SELECT COUNT(*) FROM chapters");
  $totNo = $reqTotno->fetch()['COUNT(*)'];

  if ($no < $totNo) {
    $nosuiv = $no + 1;
    $reqSu = $bdd->query("SELECT link, done FROM chapters WHERE number = '".$nosuiv."'");
    $su = $reqSu->fetch();
    if ($su['done']) {?>
      <a href="<?= $su['link'] ?>" class="chapdispo">
        <p class="notmobile">Chapitre suivant</p>
        <?php echo file_get_contents($level."assets/icons/right-arrow.svg"); ?>
      </a>
    <?php ;} else {?>
      <a class="chapnotdispo"> 
        <p class="notmobile">Chapitre suivant<br>[bientôt disponible]</p>
        <?php echo file_get_contents($level."assets/icons/right-arrow.svg"); ?>
      </a>
    <?php ;}
  }
  else {?>
    <a class="chapnotdispo"> 
      <p class="notmobile">[Dernier chapitre]</p>
      <?php echo file_get_contents($level."assets/icons/right-arrow.svg"); ?>
    </a>
  <?php ;}
?>
</div>


</div>