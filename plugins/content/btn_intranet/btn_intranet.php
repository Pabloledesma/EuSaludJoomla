<?php

defined( '_JEXEC' ) or die('Restricted Access');

class plgContentbtn_intranet extends JPlugin 
{
	/**
	 * Load the language file on instantiation. Note this is only available in Joomla 3.1 and higher.
	 * If you want to support 3.0 series you must override the constructor
	 *
	 * @var    boolean
	 * @since  3.1
	 */
	protected $autoloadLanguage = true;
 
	/**
	 * Captura la ip del servidor y dependiendo de su valor muestra un boton con la url condicinal
	 */
	 function onContentPrepare( $content, $article, $params, $limitstart )
	 {
		
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		    $ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
		    $ip = $_SERVER['REMOTE_ADDR'];
		}
		var_dump($ip);
		//Si la ip es local, cambia la url del botón
		if( stripos($ip, '192.168.0') != false || $ip === '127.0.0.1' ){
			$url = 'http://eusalud.app/auth/login';
		} else {
			$url = 'http://190.145.10.194/auth/login';
		}
		$btn = "<p style='text-align: center;'><a class='btn btn-green' href='" . $url ."'>Intranet</a></p>"; 
		$article->text = str_replace('[btn_intranet]', $btn, $article->text);

		return true;
	}
}