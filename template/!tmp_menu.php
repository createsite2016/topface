<?php
session_start();

// проверяем есть ли данные о пользователе
if (!empty($_SESSION['login']) or !empty($_SESSION['id'])) {
    $en_menu = 'show';
    $title_menu = "Привет, " . $_SESSION['name']; // приветствуем пользователя
    $link1 = "index.php"; $link1_title = "Главная";
    $link2 = "admin.php"; $link2_title = "Пользователи";
    $link3 = "classes/app.php?act=exit"; $link3_title = "Выход";
}
else {
    $en_menu = 'hide'; // для показа меню есть два свойства show или hide.
}


?>

      <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
        <header class="mdl-layout__header">
          <div class="mdl-layout__header-row">
            <!-- Заголовок -->
            <span class="mdl-layout-title"><?php echo $title_menu;?></span>
            <!-- Add spacer, to align navigation to the right -->
            <div class="mdl-layout-spacer"></div>
            <!-- Navigation. We hide it in small screens. -->
            <nav class="mdl-navigation mdl-layout--large-screen-only">
              <?php
              if (empty($_SESSION['login']) or empty($_SESSION['id'])) { ?>

                    <a class="mdl-navigation__link" href="../index.php">Главная</a>
                    <a class="mdl-navigation__link" href="../login.php">Вход</a>
                    <a class="mdl-navigation__link" href="../singin.php">Регистрация</a>

              <?php } ?>

            </nav>
          </div>
        </header>


<?php
        if ($en_menu == 'show') { ?>


<div class="mdl-layout__drawer">
  <span class="mdl-layout-title">Menu</span>
  <nav class="mdl-navigation">
      <a class="mdl-navigation__link" href="<?php echo $link1;?>"><?php echo $link1_title;?></a>
      <a class="mdl-navigation__link" href="<?php echo $link2;?>"><?php echo $link2_title;?></a>
      <a class="mdl-navigation__link" href="<?php echo $link3;?>"><?php echo $link3_title;?></a>
  </nav>
</div>
<main class="mdl-layout__content">
  <div class="page-content">
<?php }
        if ($en_menu == 'hide') { } ?>
