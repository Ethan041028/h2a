<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="site-header">
    <div class="container">
        <!-- Logo -->
        <div class="logo">
            <a href="<?php echo home_url(); ?>">
                <?php
                if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                    // Texte alternatif si aucun logo n'est défini
                    echo '<span class="site-title">« Marianne »</span>';
                    echo '<span class="site-subtitle">BELAIR - LUXEMBOURG</span>';
                }
                ?>
            </a>
        </div>

        <!-- Menu de navigation principal et sélecteur de langue -->
        <div class="main-navigation-wrapper">
            <nav class="main-navigation" aria-label="Navigation principale">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'main-menu',
                    'container' => false,
                    'menu_class' => 'nav-menu',
                ));
                ?>
            </nav>

            <!-- Sélecteur de langue -->
            <div class="language-selector">
                <select aria-label="Sélecteur de langue">
                    <option value="fr">FR</option>
                    <option value="en">EN</option>
                </select>
            </div>
        </div>
    </div>
</header>

<?php wp_footer(); ?>
</body>
</html>