<?php

class LocalController extends BaseController {

	public function changeLocale( $locale ){
		Session::set('locale', trim($locale));
		return Redirect::to('/');
	}

	public static function setLocale(){
		App::setLocale(Session::get('locale'));
	}

	public static function localeTemplate(){
		$local = [
			'en' => 'en',
			'uk' => 'ua',
			'ru' => 'ru',
		];
		unset($local[App::getLocale()]) ;

		return View::make('locale')->with('locale', $local);
	}

}
