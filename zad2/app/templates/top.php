<?php 
if (!isset($result) && (!isset($messages) || count($messages) == 0)) { 
?>
<header id="header" style="height: 100vh; display: flex; flex-direction: column; justify-content: center; background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('<?php echo _APP_URL; ?>/images/pic16.jpg'); background-size: cover; background-position: center; color: white; padding: 2em;">
    <div class="inner">
        <a href="<?php echo _APP_URL; ?>" class="logo">
            <span class="symbol"><img src="<?php echo _APP_URL; ?>/images/logo.svg" alt="" /></span>
            <span class="title">Kalkulator Kredytowy</span>
        </a>

        <div style="margin-top: 2em;">
            <ul class="actions">
                <li><a href="#app_content" class="button primary">Zacznij liczyć</a></li>
            </ul>
        </div>
    </div>
</header>
<?php } ?>