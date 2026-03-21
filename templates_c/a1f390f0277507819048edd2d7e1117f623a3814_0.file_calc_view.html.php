<?php
/* Smarty version 5.5.1, created on 2026-03-21 18:36:17
  from 'file:C:\xampp\htdocs\kalkulator_oprocentowania/app/calc_view.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_69bed7114ddd51_52021437',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a1f390f0277507819048edd2d7e1117f623a3814' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kalkulator_oprocentowania/app/calc_view.html',
      1 => 1774114571,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_69bed7114ddd51_52021437 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\kalkulator_oprocentowania\\app';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_161452907969bed7112f0e62_41550772', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.html", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_161452907969bed7112f0e62_41550772 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\kalkulator_oprocentowania\\app';
?>

<header>
    <h2>Parametry kredytu</h2>
</header>

<form method="post" action="<?php echo $_smarty_tpl->getValue('app_url');?>
/app/calc.php#app_content">
    <div class="row gtr-uniform">
        <div class="col-12">
            <label for="id_kwota">Kwota kredytu (PLN)</label>
            <input type="text" name="kwota" id="id_kwota" value="<?php echo $_smarty_tpl->getValue('form')['kwota'];?>
" " placeholder="np. 50000"/>
        </div>
        
        <div class="col-6">
            <label for="id_oprocentowanie">Oprocentowanie (%)</label>
            <input type="text" name="oprocentowanie" id="id_oprocentowanie" list="oprocentowanie_lista" value="<?php echo $_smarty_tpl->getValue('form')['oprocentowanie'];?>
" " placeholder="np. 7.5"/>
            <datalist id="oprocentowanie_lista">
                <option value="3"><option value="5"><option value="7"><option value="10">
            </datalist>
        </div>

        <div class="col-6">
            <label for="id_lata">Liczba lat</label>
            <input type="text" name="lata" id="id_lata" value="<?php echo $_smarty_tpl->getValue('form')['lata'];?>
" " placeholder="np. 5" />
        </div>

        <div class="col-12">
            <ul class="actions">
                <li><input type="submit" value="Oblicz ratę" class="primary" /></li>
                <li><a href="<?php echo $_smarty_tpl->getValue('app_url');?>
" class="button">Resetuj</a></li>
            </ul>
        </div>
    </div>
</form>

<?php if ((true && ($_smarty_tpl->hasVariable('messages') && null !== ($_smarty_tpl->getValue('messages') ?? null))) && $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('messages')) > 0) {?>
    <div class="box" style="border-color: #f56a6a;">
        <h4>Wystąpiły błędy:</h4>
        <ul class="alt">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('messages'), 'msg');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('msg')->value) {
$foreach0DoElse = false;
?>
                <li><?php echo $_smarty_tpl->getValue('msg');?>
</li>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </ul>
    </div>
<?php }?>

<?php if ((true && ($_smarty_tpl->hasVariable('result') && null !== ($_smarty_tpl->getValue('result') ?? null)))) {?>
    <div class="box">
        <h3>Twoja miesięczna rata wynosi:</h3>
        <h2 style="color: #585858;"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('result'),2,","," ");?>
 zł</h2>
    </div>
<?php }
}
}
/* {/block 'content'} */
}
