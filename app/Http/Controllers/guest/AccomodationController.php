<?php

namespace App\Http\Controllers\guest;

use App\Accomodation;
use App\Http\Controllers\Controller;
use App\Service;
use App\View;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccomodationController extends Controller
{
    public function index()
    {
        $accomodations = Accomodation::orderBy('created_at', 'DESC')->where('visibility', true)->get();
        return view('guest.accomodation.index', ['accomodations' => $accomodations]);
    }

    public function show($id)
    {
        $accomodation = Accomodation::findOrFail($id);
        $views = View::all()->where('accomodation_id', $id);
        $actual_ip = request()->ip();

        // CREA UNA VISUALIZZAZIONE DI UN APPARTAMENTO
        // settiamo una variabile (oggi meno 24h)
        $date = new DateTime(now());
        $result = $date->sub(new DateInterval('P1D')); // sottraggo un giorno dalla data attuale = la funzione sottrae P1D (past one day)

        //se l'appartamento non ha visualizzazioni viene creata una view
        if (count($views) === 0) {
            //se non sei loggato crea la viasualizzazione
            if(!isset(Auth::user()->id)){

                $new_view = new View();
    
                $new_view_data = [
                    'user_ip' => $actual_ip,
                    'accomodation_id' => $id,
                ];
    
                $new_view->fill($new_view_data);
                $new_view->save();

            } else if (Auth::user()->id != $accomodation->user_id) {
                //se sei loggato controlla se sei il proprietario
                $new_view = new View();
    
                $new_view_data = [
                    'user_ip' => $actual_ip,
                    'accomodation_id' => $id,
                ];
    
                $new_view->fill($new_view_data);
                $new_view->save();
            }

        } 
        //se l'appartamento ha gia visualizzazioni facciamo ulteriori controlli:
        else {

            $date = new DateTime(now());
            $result = $date->sub(new DateInterval('P1D')); // sottraggo un giorno dalla data attuale = la funzione sottrae P1D (past one day)

            foreach ($views as $view) {
                /* Filtriamo per lo stesso utente che ha creato l'appartamento:
                    - se l'utente non è loggato
                    - se l'utente loggato non è lo stesso che ha creato l'appartamento
                */
                if (!isset(Auth::user()->id) || Auth::user()->id != $accomodation->user_id) {

                    /* Creaiamo una visualizzazione solo se:
                      - il corrente indirizzo ip non è gia stato assegnato ad una view
                      - se sono passate 24h dall'ultima visualizzazione con lo stesso ip
                    */
                    if ($view->user_ip != $actual_ip || ($view->created_at < $result)) {

                        $new_view = new View();

                        $new_view_data = [
                            'user_ip' => $actual_ip,
                            'accomodation_id' => $id,
                        ];

                        $new_view->fill($new_view_data);
                        $new_view->save();
                    }
                }
            }
        }


        return view('guest.accomodation.show', ['accomodation' => $accomodation]);
    }
}
