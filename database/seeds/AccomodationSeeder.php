<?php

use App\Accomodation;

use Illuminate\Database\Seeder;


class AccomodationSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run() {
      $accomodations = [
         [
            'title' => "Intero alloggio (casa)",
            'description' => 'Situato a due passi del centro storico di Roma e dalla Stazione Trastevere questo delizioso loft gode di una location privilegiata che permette di esplorare la città a piedi.',
            'number_rooms' => 4,
            'number_bathrooms' => 2,
            'number_beds' => 2,
            'square_mts' => 130,
            'price_per_night' => 30,
            'visibility' => true,
            'country' => 'Italy',
            'city' => 'Roma',
            'province' => 'Roma',
            'type_street' => 'Via',
            'street_name' => 'Muzio Clementi',
            'building_number' => 81,
            'zip' => '00193',
            'lat' => 41.90980,
            'lon' => 12.47235,
            'placeholder' => "",
            'user_id' => 1,
            'check_in' => 12,
            'check_out' => 10,
            'count_services' => 0,
         ],
         [
            'title' => 'Artists House - CENTRUM - Campo de fiori',
            'description' => "Appartamento situato in un palazzo medioevale del 1200. E' stato completamenete ristrutturato, con rifiniture di lusso: wifi, computer, Tv Grande schermo HD, impianto stereo centralizzato, cassaforte a muro.",
            'number_rooms' => 5,
            'number_bathrooms' => 3,
            'number_beds' => 3,
            'square_mts' => 120,
            'price_per_night' => 40,
            'visibility' => true,
            'country' => 'Italy',
            'city' => 'Roma',
            'province' => 'Roma',
            'type_street' => 'Via',
            'street_name' => ' Giorgio Perlasca',
            'building_number' => 13,
            'zip' => '00155',
            'lat' => 41.90235,
            'lon' => 12.56785,
            'placeholder' => "",
            'user_id' => 2,
            'check_in' => 12,
            'check_out' => 10,
            'count_services' => 0,
         ],
         [
            'title' => 'Domus Chiavari House',
            'description' =>   "Situata nell'incantevole quartiere di Campo de Fiori, in uno dei più caratteristici vicoli di Roma, a pochi metri dal Pantheon, Piazza Navona e Piazza Venezia, la Domus Campo de' Fiori offre un grazioso appartamento, finemente decorato e posto al piano terra di un delizioso cortile condominiale. La struttura dispone di angolo cottura attrezzato, macchina da caffè, soggiorno con divano e area dining e bagno con doccia set di cortesia.",
            'number_rooms' => 5,
            'number_bathrooms' => 3,
            'number_beds' => 3,
            'square_mts' => 120,
            'price_per_night' => 40,
            'visibility' => true,
            'country' => 'Italy',
            'city' => 'Roma',
            'province' => 'Roma',
            'type_street' => 'Via',
            'street_name' => 'Salaria', 
            'building_number' => 1223,
            'zip' => '00138',
            'lat' => 41.992283,
            'lon' => 12.51055,
            'placeholder' => "",
            'user_id' => 3,
            'check_in' => 13,
            'check_out' => 10,
            'count_services' => 0,
         ],
         [
            'title' => 'Intero alloggio',
            'description' => "Accogliente monolocale sui Navigli, perfetto per chi vuole visitare Milano. Appena ristrutturato, l'appartamento è in posizione centrale e a pochi passi dal Duomo. La zona è ricca di ristoranti e locali caratteristici per vivere al meglio la città. Ideale per gli studenti degli istituti NABA (distante letteralmente 3 minuti a piedi), IULM e Bocconi.",
            'number_rooms' => 2,
            'number_bathrooms' => 1,
            'number_beds' => 4,
            'square_mts' => 90,
            'price_per_night' => 70,
            'visibility' => true,
            'country' => 'Italy',
            'city' => 'Milano',
            'province' => 'Milano',
            'type_street' => 'Via',
            'street_name' => "dell'Orso",
            'building_number' => 7,
            'zip' => '20121',
            'lat' => 45.4724691,
            'lon' =>  9.1861503,
            'placeholder' => "",
            'user_id' => 4,
            'check_in' => 14,
            'check_out' => 11,
            'count_services' => 0,
         ],
         [
            'title' => 'Intero alloggio',
            'description' => "Elegante appartamento di 90mq in Piazza Tommaseo, a pochi passi dalla stazione metropolitana Conciliazione (linea MM1 - rossa), in un quartiere aristocratico nel pieno centro di Milano.",
            'number_rooms' => 1,
            'number_bathrooms' => 1,
            'number_beds' => 1,
            'square_mts' => 70,
            'price_per_night' => 150,
            'visibility' => true,
            'country' => 'Italy',
            'city' => 'Roma',
            'province' => 'Roma',
            'type_street' => 'Via',
            'street_name' => 'Napo Torriani', 
            'building_number' => 9,
            'zip' => '20124',
            'lat' => 45.4841446,
            'lon' =>  9.20331,
            'placeholder' => "",
            'user_id' => 5,
            'check_in' => 15,
            'check_out' => 11,
            'count_services' => 0,
         ],
         [
            'title' => "PrimoPiano - XXII Marzo",
            'description' => "Loft in contesto ex industriale con posto auto. Living room con zona pranzo, piccola cucina, bagno, soppalco con zona notte.",
            'number_rooms' => 6,
            'number_bathrooms' => 5,
            'number_beds' => 9,
            'square_mts' => 100,
            'price_per_night' => 135,
            'visibility' => true,
            'country' => 'Italy',
            'city' => 'Milano',
            'province' => 'Milano',
            'type_street' => 'Via',
            'street_name' => 'Arcangelo Corelli',
            'building_number' => 56,
            'zip' => '20134',
            'lat' => 45.47319,
            'lon' => 9.25395,
            'placeholder' => "",
            'user_id' => 2,
            'check_in' => 12,
            'check_out' => 10,
            'count_services' => 0,
         ],
         [
            'title' => "Loft Garden",
            'description' => "Soggiornare a pochi passi dal Duomo di Milano, cattedrale simbolo della città e uno dei monumenti più belli e suggestivi al mondo in appartamenti di ricercato design, completi di tutte le comodità possibili per rendere il vostro soggiorno speciale e vivere un sogno a occhi aperti.",
            'number_rooms' => 7,
            'number_bathrooms' => 4,
            'number_beds' => 4,
            'square_mts' => 90,
            'price_per_night' => 115,
            'visibility' => true,
            'country' => 'Italy',
            'city' => 'Milano',
            'province' => 'Milano',
            'type_street' => 'Via',
            'street_name' => 'Caldera',
            'building_number' => 3,
            'zip' => '20153',
            'lat' => 45.480654,
            'lon' =>  9.1040962,
            'placeholder' => "",
            'user_id' => 4,
            'check_in' => 12,
            'check_out' => 10,
            'count_services' => 0,
         ],
         [
            'title' => "Ampia stanza",
            'description' => "Ampia stanza di 25 mq con ingresso indipendente e bagno privato al primo piano di un antico edificio del centro storico, a 200 metri da Piazza della Signoria, Uffizi e Piazza Santa Croce.
            A pochi passi si trovano molti ristoranti tipici e negozi. La via è molto tranquilla e l'affaccio della stanza su una corte interna la rende particolarmente silenziosa.",
            'number_rooms' => 7,
            'number_bathrooms' => 5,
            'number_beds' => 7,
            'square_mts' => 87,
            'price_per_night' => 68,
            'visibility' => true,
            'country' => 'Italy',
            'city' => 'Firenze',
            'province' => 'Firenze',
            'type_street' => 'Via',
            'street_name' => 'degli Orti Oricellari',
            'building_number' => 30,
            'zip' => '50123',
            'lat' => 43.784229,
            'lon' =>  11.2480423,
            'placeholder' => "",
            'user_id' => 4,
            'check_in' => 12,
            'check_out' => 10,
            'count_services' => 0,
         ],
         [
            'title' => "La casa degli Angeli",
            'description' => "Lo spazio è costituito da un grande monolocale con cucina e bagno..per dormire c è un divano letto molto comodo..lo spazio è munito di condizionatore...pala e ventilatore..due televisioni e lavatrice.",
            'number_rooms' => 3,
            'number_bathrooms' => 2,
            'number_beds' => 3,
            'square_mts' => 40,
            'price_per_night' => 87,
            'visibility' => true,
            'country' => 'Italy',
            'city' => 'Firenze',
            'province' => 'Firenze',
            'type_street' => 'Via',
            'street_name' => 'Giulio Caccini',
            'building_number' => 24,
            'zip' => '50141',
            'lat' => 43.80690,
            'lon' =>  11.24392,
            'placeholder' => "",
            'user_id' => 4,
            'check_in' => 12,
            'check_out' => 10,
            'count_services' => 0,
         ],
         [
            'title' => "Vigna Vecchia Modern Studio",
            'description' => "Moderno monolocale di 15mq in grado di ospitare fino a due persone. Collocato al secondo piano (senza ascensore) di uno stabile antico in buone condizioni, l'alloggio si trova in zona Santa Croce, posizione ideale per visitare al meglio la città di Firenze e tutti i principali punti di interesse. Siamo a 5 minuti di distanza a piedi da Piazza della Signoria e 10 da Ponte Vecchio.",
            'number_rooms' => 3,
            'number_bathrooms' => 2,
            'number_beds' => 3,
            'square_mts' => 40,
            'price_per_night' => 87,
            'visibility' => true,
            'country' => 'Italy',
            'city' => 'Firenze',
            'province' => 'Firenze',
            'type_street' => 'Via',
            'street_name' => 'Maragliano',
            'building_number' => 69,
            'zip' => '50144',
            'lat' => 43.78844, 
            'lon' =>  11.23312,
            'placeholder' => "",
            'user_id' => 4,
            'check_in' => 12,
            'check_out' => 10,
            'count_services' => 0,
         ],
         [
            'title' => "La casa degli Angeli",
            'description' => "Lo spazio è costituito da un grande monolocale con cucina e bagno..per dormire c è un divano letto molto comodo..lo spazio è munito di condizionatore...pala e ventilatore..due televisioni e lavatrice.",
            'number_rooms' => 6,
            'number_bathrooms' => 3,
            'number_beds' => 5,
            'square_mts' => 70,
            'price_per_night' => 55,
            'visibility' => true,
            'country' => 'Italy',
            'city' => 'Venezia',
            'province' => 'Venezia',
            'type_street' => 'Piazza',
            'street_name' => '27 Ottobre',
            'building_number' => 91,
            'zip' => '30172',
            'lat' => 45.4952676, 
            'lon' =>  12.242072,
            'placeholder' => "",
            'user_id' => 4,
            'check_in' => 12,
            'check_out' => 10,
            'count_services' => 0,
         ],
         [
            'title' => "Intero alloggio: unità in affitto",
            'description' => "Il soffitto dell'appartamento è il tipico soffitto veneziano con i travi in legno a vista. Il parquet di legno bianco fa risaltare gli spazi e la luminosità dell'appartamento. L'appartamento è stato arredato e restaurato di recente. La zona in cui è ubicato l'appartamento è molto caratteristica e centrale. ",
            'number_rooms' => 6,
            'number_bathrooms' => 3,
            'number_beds' => 5,
            'square_mts' => 70,
            'price_per_night' => 55,
            'visibility' => true,
            'country' => 'Italy',
            'city' => 'Venezia',
            'province' => 'Venezia',
            'type_street' => 'Piazza',
            'street_name' => 'Campo Santa Maria del Giglio',
            'building_number' => 2494,
            'zip' => '30124',
            'lat' => 45.43509, 
            'lon' =>  12.332401,
            'placeholder' => "",
            'user_id' => 4,
            'check_in' => 12,
            'check_out' => 10,
            'count_services' => 0,
         ],
         
      ];
      foreach ($accomodations as $accomodation) {
         $new_accomodation = new Accomodation();

         $new_accomodation->fill($accomodation);

         $new_accomodation->save();
      }
   }
}

