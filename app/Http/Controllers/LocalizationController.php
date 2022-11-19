<?php
    namespace App\Http\Controllers;
    use Illuminate\Support\Facades\App;
    use Illuminate\Http\RedirectResponse;


    class LocalizationController extends Controller{
        /**
         * @param $locale
         * @return RedirectResponse
         */

        public function index($locale)
        {
            /* ici on va aller dire au fichier app de prendre une langue par default */
            App::setLocale($locale);
            session()->put('locale', $locale);
            return redirect()->back();  
        }
    }
