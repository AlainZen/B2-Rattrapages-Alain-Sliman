<?php

namespace App\DataFixtures;

use App\Entity\Restaurant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RestaurantFixtures extends Fixture
{
    // Définir des constantes pour les références
    public const MONGOO_CHATELET = 'mongoo-chatelet';
    public const MONGOO_OPERA = 'mongoo-opera';
    public const MONGOO_DEFENSE = 'mongoo-defense';
    public const MONGOO_BASTILLE = 'mongoo-bastille';
    public const MONGOO_MONTPARNASSE = 'mongoo-montparnasse';
    public const MONGOO_ETOILE = 'mongoo-etoile';
    public const MONGOO_REPUBLIQUE = 'mongoo-republique';
    public const MONGOO_NATION = 'mongoo-nation';

    public function load(ObjectManager $manager): void
    {
        $restaurants = [
            [
                'name' => 'Mongoo Châtelet',
                'location' => '23 Rue de Rivoli, 75004 Paris',
                'reference' => self::MONGOO_CHATELET
            ],
            [
                'name' => 'Mongoo Opéra',
                'location' => '12 Boulevard des Capucines, 75009 Paris',
                'reference' => self::MONGOO_OPERA
            ],
            [
                'name' => 'Mongoo La Défense',
                'location' => '15 Esplanade du Général de Gaulle, 92800 Puteaux',
                'reference' => self::MONGOO_DEFENSE
            ],
            [
                'name' => 'Mongoo Bastille',
                'location' => '8 Rue du Faubourg Saint-Antoine, 75012 Paris',
                'reference' => self::MONGOO_BASTILLE
            ],
            [
                'name' => 'Mongoo Montparnasse',
                'location' => '35 Boulevard du Montparnasse, 75006 Paris',
                'reference' => self::MONGOO_MONTPARNASSE
            ],
            [
                'name' => 'Mongoo Étoile',
                'location' => '41 Avenue des Champs-Élysées, 75008 Paris',
                'reference' => self::MONGOO_ETOILE
            ],
            [
                'name' => 'Mongoo République',
                'location' => '10 Place de la République, 75011 Paris',
                'reference' => self::MONGOO_REPUBLIQUE
            ],
            [
                'name' => 'Mongoo Nation',
                'location' => '25 Avenue du Trône, 75012 Paris',
                'reference' => self::MONGOO_NATION
            ],
        ];

        foreach ($restaurants as $restaurantData) {
            $restaurant = new Restaurant();
            $restaurant->setName($restaurantData['name']);
            $restaurant->setLocation($restaurantData['location']);
            
            $manager->persist($restaurant);
            
            // Ref utilisée dans EmployeeFixtures
            $this->addReference($restaurantData['reference'], $restaurant);
        }

        $manager->flush();
    }
}