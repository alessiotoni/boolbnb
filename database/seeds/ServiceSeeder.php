<?php

use App\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $services = [
            [
                'description' => 'Situato a due passi del centro storico di Roma e dalla Stazione Trastevere questo delizioso loft gode di una location privilegiata che permette di esplorare la città a piedi.',
                'title' => 'wi-fi'
            ],
            [
                'description' => 'Situato a due passi del centro storico di Roma e dalla Stazione Trastevere questo delizioso loft gode di una location privilegiata che permette di esplorare la città a piedi.',
                'title' => 'garage'
            ],
            [
                'description' => 'Situato a due passi del centro storico di Roma e dalla Stazione Trastevere questo delizioso loft gode di una location privilegiata che permette di esplorare la città a piedi.',
                'title' => 'tv'
            ],
            [
                'description' => 'Situato a due passi del centro storico di Roma e dalla Stazione Trastevere questo delizioso loft gode di una location privilegiata che permette di esplorare la città a piedi.',
                'title' => 'piscina'
            ],
            [
                'description' => 'Situato a due passi del centro storico di Roma e dalla Stazione Trastevere questo delizioso loft gode di una location privilegiata che permette di esplorare la città a piedi.',
                'title' => 'lavatrice'
            ],
            [
                'description' => 'Situato a due passi del centro storico di Roma e dalla Stazione Trastevere questo delizioso loft gode di una location privilegiata che permette di esplorare la città a piedi.',
                'title' => 'lavastoviglie'
            ],
            [
                'description' => 'Situato a due passi del centro storico di Roma e dalla Stazione Trastevere questo delizioso loft gode di una location privilegiata che permette di esplorare la città a piedi.',
                'title' => 'ingresso privato'
            ],
            [
                'description' => 'Situato a due passi del centro storico di Roma e dalla Stazione Trastevere questo delizioso loft gode di una location privilegiata che permette di esplorare la città a piedi.',
                'title' => 'aria condizionata'
            ],
            [
                'description' => 'Situato a due passi del centro storico di Roma e dalla Stazione Trastevere questo delizioso loft gode di una location privilegiata che permette di esplorare la città a piedi.',
                'title' => 'riscaldamento'
            ],
            [
                'description' => 'Situato a due passi del centro storico di Roma e dalla Stazione Trastevere questo delizioso loft gode di una location privilegiata che permette di esplorare la città a piedi.',
                'title' => 'balcone'
            ],
            [
                'description' => 'Situato a due passi del centro storico di Roma e dalla Stazione Trastevere questo delizioso loft gode di una location privilegiata che permette di esplorare la città a piedi.',
                'title' => 'idromassaggio'
            ],
            [
                'description' => 'Situato a due passi del centro storico di Roma e dalla Stazione Trastevere questo delizioso loft gode di una location privilegiata che permette di esplorare la città a piedi.',
                'title' => 'acqua calda'
            ],
            [
                'description' => 'Situato a due passi del centro storico di Roma e dalla Stazione Trastevere questo delizioso loft gode di una location privilegiata che permette di esplorare la città a piedi.',
                'title' => 'essenziali'
            ],
            [
                'description' => 'Situato a due passi del centro storico di Roma e dalla Stazione Trastevere questo delizioso loft gode di una location privilegiata che permette di esplorare la città a piedi.',
                'title' => 'cassaforte'
            ]
        ];

        foreach ($services as $service) {
            $new_servicesaccomodations = new Service();

            $new_servicesaccomodations->fill($service);
            // $new_servicesaccomodations->title = $service;


            $new_servicesaccomodations->save();
        }
    }
}
