<?php
/* Smarty version 5.5.1, created on 2026-03-20 07:38:24
  from 'file:main.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_69bceb60b413d2_66795558',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd27eaa539c659a45dc965b55046aa946f3b1be07' => 
    array (
      0 => 'main.html',
      1 => 1773988348,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_69bceb60b413d2_66795558 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\kalkulator_oprocentowania\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, false);
?>
<!DOCTYPE HTML>
<html>
<head>
    <title><?php echo (($tmp = $_smarty_tpl->getValue('page_title') ?? null)===null||$tmp==='' ? "Kalkulator Kredytowy" ?? null : $tmp);?>
</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->getValue('app_url');?>
/assets/css/main.css" />
    <style>html { scroll-behavior: smooth; }</style>
</head>
<body class="is-preload">
    <div id="wrapper">
        
                <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_84328680969bceb60b3e739_69934815', 'intro');
?>


        <div id="main">
            <div class="inner">
                <section id="app_content">
                    <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_167656104969bceb60b40408_90298021', 'content');
?>

                </section>
            </div>
        </div>

        <footer id="footer">
            <div class="inner">
                <ul class="copyright">
                    <li>Kalkulator Kredytowy</li>
                    <li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
                </ul>
            </div>
        </footer>
    </div>

    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('app_url');?>
/assets/js/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('app_url');?>
/assets/js/main.js"><?php echo '</script'; ?>
>
</body>
</html><?php }
/* {block 'intro'} */
class Block_84328680969bceb60b3e739_69934815 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\kalkulator_oprocentowania\\templates';
?>

            <?php if (!(true && ($_smarty_tpl->hasVariable('result') && null !== ($_smarty_tpl->getValue('result') ?? null))) && $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('messages')) == 0) {?>
                <header id="header" style="height: 100vh; display: flex; flex-direction: column; justify-content: center; background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('<?php echo $_smarty_tpl->getValue('app_url');?>
/images/pic16.jpg'); background-size: cover; background-position: center; color: white; padding: 2em;">
                    <div class="inner">
                        <a href="<?php echo $_smarty_tpl->getValue('app_url');?>
" class="logo">
                            <span class="symbol"><img src="<?php echo $_smarty_tpl->getValue('app_url');?>
/images/logo.svg" alt="" /></span>
                            <span class="title">Kalkulator Kredytowy</span>
                        </a>
                        <div style="margin-top: 2em;">
                            <ul class="actions">
                                <li><a href="#app_content" class="button primary">Zacznij liczyć</a></li>
                            </ul>
                        </div>
                    </div>
                </header>
            <?php }?>
        <?php
}
}
/* {/block 'intro'} */
/* {block 'content'} */
class Block_167656104969bceb60b40408_90298021 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\kalkulator_oprocentowania\\templates';
?>
 
                         
                    <?php
}
}
/* {/block 'content'} */
}
