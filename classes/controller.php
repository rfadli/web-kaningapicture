<?php

class controller
{
	public $css;
	public $js;
	public $tambahan;
	public $view;
	public $controller_name;
	
	public function __construct()
	{
		$this->view = array();
		$this->tambahan = new tambahan;
		$this->css = new css;
		
		$this->css->add("/public/css/cform.css");
		$this->css->add("/public/css/tp_twitter_plugin.css");
		$this->css->add("/public/rs-plugin/css/settings.css");
		$this->css->add("/public/css/select.css");
		$this->css->add("/public/css/woocommerce-layout.css");
		$this->css->add("/public/css/woocommerce-smallscreen.css");
		$this->css->add("/public/css/woocommerce.css");
		$this->css->add("/public/css/style.css");
		$this->css->add("/public/css/prettyPhoto.css");
		$this->css->add("/public/css/blue.monday/jplayer.blue.monday.css");
		$this->css->add("/public/css/ui/jquery.ui.all.css");
		$this->css->add("/public/css/responsive.css");
		$this->css->add("/public/css/style-colors.css");
		$this->css->add("/public/css/style-2.css");
		$this->css->add("/public/css/woocommerce.css");
		$this->css->add("/public/css/fonts/mfn-icons.css");
		$this->css->add("/public/css/custom.css");
		$this->css->add("/public/css/skins/green/images.css");
		$this->css->add("/public/js/owl-carousel/owl.carousel.css");
		$this->css->add("/public/js/owl-carousel/owl.theme.css");
		$this->css->add("/public/css/skins/green/images.css");
		$this->css->add("/public/js/mediaelement/mediaelementplayer.min.css");
		$this->css->add("/public/js/mediaelement/wp-mediaelement.css");
		$this->css->add("/public/css/style-colors.css");
		$this->css->add("/public/css/blue.monday/jplayer.blue.monday.css");
		$this->css->add("/public/css/ui/jquery.ui.all.css");
		
		$this->css->add("http://fonts.googleapis.com/css?family=Ubuntu%3A100%2C300%2C400%2C400italic%2C700&amp;ver=4.2");
		//$this->css->add('http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800|Open+Sans+Condensed:300,700');

		$this->js = new js;
		
		$this->js->add("/pubic/js/Clarendon_LT_Std_700.font.js");
		$this->js->add("/public/js/cufon-yui.js");
		$this->js->add("/public/js/jquery/jquery.js");
		$this->js->add("/public/js/mediaelement/mediaelement-and-player.min.js");
		$this->js->add("/public/js/mediaelement/wp-mediaelement.js");
		//$this->js->add("http://maps.google.com/maps/api/js?sensor=false&amp;ver=1.3.4");
		$this->js->add("/public/js/jquery/jquery-migrate.min.js");
		$this->js->add("/public/rs-plugin/js/jquery.themepunch.tools.min.js");
		$this->js->add("/public/rs-plugin/js/jquery.themepunch.revolution.min.js");
		$this->js->add("/public/js/owl-carousel/owl.carousel.css");
		$this->js->add("/public/js/owl-carousel/owl.theme.css");
		//-------------//
		$this->js->add("/public/js/jquery.form.min.js");
		$this->js->add("/public/js/frontend/add-to-cart.min.js");
		$this->js->add("/public/js/select2/select2.min.js");
		$this->js->add("/public/js/jquery-blockui/jquery.blockUI.min.js");
		$this->js->add("/public/js/frontend/woocommerce.min.js");
		$this->js->add("/public/js/jquery-cookie/jquery.cookie.min.js");
		$this->js->add("/public/js/frontend/cart-fragments.min.js");
		$this->js->add("/public/js/jquery/ui/core.min.js");
		$this->js->add("/public/js/jquery/ui/widget.min.js");
		$this->js->add("/public/js/jquery/ui/mouse.min.js");
		$this->js->add("/public/js/jquery/ui/sortable.min.js");
		$this->js->add("/public/js/jquery/ui/tabs.min.js");
		$this->js->add("/public/js/jquery/ui/accordion.min.js");
		$this->js->add("/public/js/owl-carousel/owl.carousel.min.js");
		$this->js->add("/public/js/jquery.jplayer.min.js");
		$this->js->add("/public/js/jquery.plugins.js");
		$this->js->add("/public/js/mfn.menu.js");
		$this->js->add("/public/js/scripts.js");
		
		$phold = '<script type="text/javascript">'."\n";
		$phold .= '$.fn.placeholder();'."\n";
		$phold .= '</script>'."\n";
		$this->tambahan->add($phold);
		
		$pphoto = '<script type="text/javascript">'."\n";
		$pphoto .= '$(function(){'."\n";
		$pphoto .= '"use strict";'."\n";
		$pphoto .= '$(".grid").mixitup();'."\n";
		$pphoto .= '});'."\n";
		$pphoto .= '</script>'."\n";
		$this->tambahan->add($pphoto);
		
		$pmix = '<script type="text/javascript">'."\n";
		$pmix .= '$(document).ready(function(){'."\n";
		$pmix .= '$("a[rel^='.'prettyPhoto'.']").prettyPhoto();});'."\n";
		$pmix .= '</script>'."\n";
		$this->tambahan->add($pmix);
		
		
		$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
		if($path == "/")
		{
			$this->controller_name = 'welcome';
		}
		else {
			$pp = explode("/", $path);
			$this->controller_name = $pp[1];
		}
	
		/*if(!isset($_SESSION['userid']) && ($path != '/account/login') 
			&& ($path != '/account/register') && ($path != '/error/err404'))
		{
			$this->redirect('/account/login');
			exit;
		}	*/
	}
	
	protected function addView($name, $view)
	{
		$p = array(
			'name' => $name,
			'view' => $view
		);
		$this->view[] = $p;
	}
	
	protected function redirect($page)
	{
		header( 'Location: '.$page ) ;
	}
	
	protected function getView($filename, $variable)
	{
		extract($variable);
		ob_start();
		(include $filename);
		$content = ob_get_contents();
		ob_end_clean ();
		return $content;
	}
	
	protected function render($variable)
	{
		$p = array();
		foreach($this->view as $view)
		{
			$p[$view['name']] = $view['view'];
		}
		$p['css'] = $this->css->getCss();
		$p['js'] = $this->js->getJs();
		$p['tambahan'] = $this->tambahan->getTambahan();
		
		$arr = array(
			'controller_name' => $this->controller_name
		);
		$sidebarmenu = $this->getView(DOCVIEW.'template/sidebarmenu.php', $arr);
		$p['sidebarmenu'] = $sidebarmenu;
		
		$db = Db::init();
		$pr = $db->client;
		$pref = $pr->findone(array('_id' => new MongoId(CLIENT_ID)));
		$webtitle = 'sugar';
		if(isset($pref['_id']))
			$webtitle = $pref['company'];
		$p['webtitle'] = $webtitle;
		
		$variable = array_merge($p, $variable);
		$view = $this->getView(DOCVIEW.'template/template-kakiatna.php', $variable);
		echo $view;
	}
}
