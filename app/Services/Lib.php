<?php
namespace App\Services;

use App;
use Auth;
use Config;
use Request;
use App\Http\Controllers\Auth\Model\User;

Class Lib{
	/**
	 * @param string $prefix
	 * @param string $controller
	 * @param string $action
	 * @param string $args
	 * @return \Illuminate\Http\RedirectResponse|void
	 */
	public function callAction($prefix = '', $bundle = '', $controller = '', $action = 'Index', $args = '')
	{
		if($bundle)
			config::set('app.title',upperCaseSpacefirst(trim($bundle)));
		else
			config::set('app.title',upperCaseSpacefirst(trim($prefix)));


		Config::set('app.prefix', trim($prefix));
		Config::set('app.bundle', trim($bundle));
		Config::set('app.controller',trim($controller));
		Config::set('app.action', trim($action));
		Config::set('app.random', str_random());

		// create controller
		$controller_file = 'App\\Http\\Controllers\\'
			. ($bundle ? $bundle. '\\' : '')
			. ($prefix ? (studly_case($prefix) . '\\')  : '')
			. (studly_case($controller) ? studly_case($controller) : $prefix)
			. "Controller";

		// not exist controller
		if (!class_exists($controller_file)) {
			alert('please check controller file exist or namespace set in controller file !!!');
			return abort(404);
		}

		// check Admin access
		if($prefix != 'Auth' && $prefix != 'Home'){
			$role = User::role();
			if(!in_array($role, Config::get('ACL.' . lcfirst($prefix) . '_access'))) {
				return redirect('Auth/login');
			}
			// check the role access specific action or controller
			if (Config::get('ACL.'.$role)) {
				if (in_array(@$prefix . '.' . @$bundle . '.' . @$controller,  Config::get('ACL.'.$role)) ||	in_array(@$prefix . '.'  . @$bundle . '.' . @$controller . '.' . @$action, Config::get('ACL.'.$role))) {
					return abort(403);
				}
			}
		}

		$params = explode("/", $args);
		if ($params && preg_match('/\d+/', $params[0])) {
			Config::set('app.id', $params[0]);
		}
		$app = app();
		if (preg_match('/^\d+$/', $action)) {
			$params = array($action);
			Config::set('app.id', $action);
		}
		$action = !method_exists($controller_file, $action) ? 'Index' : $action;
		$controller = $app->make($controller_file);
		return $controller->callAction(ucfirst($action), $params);
		
	}

	/**
	 * @param string $partname
	 * @param bool|false $siteurl_perfix
	 * @return string
	 */
	public function getCurrentURL($partname = '', $siteurl_perfix = false)
	{
		$url = config('app.url') ;
		$locale = Request::segment(1);
		if(in_array($locale,Config::get('app.locales'))){
			$localization = '/'. $locale;
		} else {
			$localization = '';
		}
		$prefix = config('app.prefix');
		
		switch ($partname) {
			case 'locale':
				$url .= @$localization ;
				break;
			case 'prefix':
				$url .= @$localization . '/' . config('app.prefix');
				break;
			case 'bundle':
				$url .= @$localization . '/' . $prefix . '/' . config('app.bundle');
				break;
			case 'controller':
				$url .= @$localization . '/' . $prefix . '/' . config('app.bundle') . '/' . config('app.controller');
				break;
			case 'action':
				$url .= @$localization . '/' . config('app.prefix') . '/' . config('app.bundle') . '/' . config('app.controller') . '/' . config('app.action');
				break;
		}
		return $url;
	}

	public function getLocale()
	{
		$segment = Request::segment(1);
		if (in_array($segment, Config::get('app.locales'))) {
			return $segment;
		}
		return null;
	}

	/**
	 * @param $val
	 */
	public function alert($val)
	{
		if(!headers_sent()) echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">';
		$res = addcslashes(print_r($val, 1), "\r\n\t\"\'");
		echo "<script>alert('$res')</script>";
	}

	/**
	 * @param $str
	 * @return mixed
	 */
	public function upperCaseSpacefirst($str)
	{
		return trim(preg_replace('/([A-Z])/',' '.'$1',$str)) ;
	}

	/**
	 * @param $role
	 * @return bool
	 */
	public function is_Auth($role)
	{
		$auth_role = User::role();
		if ($auth_role == $role)
			return true;
		return false;
	}

	public function ftArray($bundle, $controller, $file = 'list')
	{
		return include app_path().'/Http/Controllers/' . $bundle . '/Config/' . $controller.'_'.$file . '.php';
	}



}