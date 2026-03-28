<?php
require_once dirname(__FILE__).'/../config.php';

require_once _ROOT_PATH.'/lib/smarty/libs/Smarty.class.php';
$messages = [];

// 1. Pobranie parametrów
function getParams(&$form) {
	$form['kwota'] = $_REQUEST['kwota'] ?? null;
	$form['oprocentowanie'] = $_REQUEST['oprocentowanie'] ?? null;
	$form['lata'] = $_REQUEST['lata'] ?? null;
}

// 2. Walidacja parametrów
function validate(&$form, &$msgs, &$hide_intro) {
	if (!(isset($form['kwota']) && isset($form['oprocentowanie']) && isset($form['lata']))) return false;
	
	$hide_intro = false;
	
	if ($form['kwota'] == "") {
        $msgs[] = 'Nie podano kwoty kredytu';
    }
	if ($form['oprocentowanie'] == "") {
        $msgs[] = 'Nie podano oprocentowania';
    }
	if ($form['lata'] == "") {
        $msgs[] = 'Nie podano planowanego czasu spłaty kredytu';
    }
	if (empty($msgs)) {

		if (!is_numeric($form['kwota'])) {
			$msgs[] = 'Kwota kredytu nie jest liczbą';
		}
		if (!is_numeric($form['lata'])) {
			$msgs[] = 'Czas trwania kredytu nie jest liczbą';
		}
		if (!is_numeric($form['oprocentowanie'])) {
			$msgs[] = 'Oprocentowanie musi być liczbą';
		}
			
		if ($form['kwota'] < 0) {
			$msgs[] = 'Kwota kredytu nie może być ujemna';
		}

		if ($form['lata'] <= 0) {
			$msgs[] = 'Liczba lat musi być większa od zera';
		}

		if ($form['oprocentowanie'] < 0) {
			$msgs[] = 'Oprocentowanie nie może być ujemne';
		}	
	}
	if (count($msgs)>0) return false;
	else return true;
}
		
function process(&$form, &$msgs, &$result) {
	// konwersja
	$kwota = floatval($form['kwota']);
    $lata = intval($form['lata']);
    $oprocentowanie = floatval($form['oprocentowanie']);
	
	$liczba_rat = $lata * 12;

	if ($oprocentowanie != 0) {

		$op_mies = $oprocentowanie / (12 * 100);

		$rata = $kwota * (
			($op_mies * pow(1 + $op_mies, $liczba_rat)) /
			(pow(1 + $op_mies, $liczba_rat) - 1)
		);

	} else {
		$rata = $kwota / $liczba_rat;
	}

	$result = $rata;
}

//inicjacja zmiennych
$messages = array(); 
$form = array();
$result = null;
$hide_intro = false;
 
getParams($form);
if ( validate($form,$messages,$hide_intro) ){
	process($form,$messages,$result);
}

//Przygotowanie danych dla szablonu

$smarty = new Smarty\Smarty();

$smarty->setTemplateDir([
    _ROOT_PATH.'/app/',        
    _ROOT_PATH.'/templates/'   
]);

$smarty->assign('app_url',_APP_URL);
$smarty->assign('root_path',_ROOT_PATH);
$smarty->assign('title','Kalkulator kredytowy');

$smarty->assign('hide_intro',$hide_intro);

$smarty->assign('form',$form);
$smarty->assign('result',$result);
$smarty->assign('messages',$messages);

$smarty->display(_ROOT_PATH.'/app/calc_view.html');
?>