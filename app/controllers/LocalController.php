<?php

/**
 * Class LocalController
 */
class LocalController extends BaseController
{

    /**
     * Edit locale
     *
     * @param $locale
     * @return Redirect
     */
    public function changeLocale($locale)
    {
        Session::set('locale', trim($locale));
        return Redirect::to('/');
    }

    /**
     * Set locale
     */
    public static function setLocale()
    {
        App::setLocale(Session::get('locale'));
    }

    /**
     * get locale template
     * @return $this
     */
    public static function localeTemplate()
    {
        $local = [
            'en' => 'en',
            'uk' => 'ua',
            'ru' => 'ru',
        ];
        unset($local[App::getLocale()]);

        return View::make('locale')->with('locale', $local);
    }

}
