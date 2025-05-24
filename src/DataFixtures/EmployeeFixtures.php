<?php

namespace App\DataFixtures;

use App\Entity\Employee;
use App\Entity\Restaurant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class EmployeeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $employees = [
            // Employees pour Mongoo Chatelet
            [
                'name' => 'Jean Dupont',
                'email' => 'jean.dupont@mongoo.fr',
                'active' => true,
                'restaurant' => RestaurantFixtures::MONGOO_CHATELET
            ],
            [
                'name' => 'Marie Laurent',
                'email' => 'marie.laurent@mongoo.fr',
                'active' => true,
                'restaurant' => RestaurantFixtures::MONGOO_CHATELET
            ],
            [
                'name' => 'Lucas Martin',
                'email' => 'lucas.martin@mongoo.fr',
                'active' => false,
                'restaurant' => RestaurantFixtures::MONGOO_CHATELET
            ],

            // Employees pour Mongoo Opéra
            [
                'name' => 'Sophie Petit',
                'email' => 'sophie.petit@mongoo.fr',
                'active' => true,
                'restaurant' => RestaurantFixtures::MONGOO_OPERA
            ],
            [
                'name' => 'Maxime Dubois',
                'email' => 'maxime.dubois@mongoo.fr',
                'active' => true,
                'restaurant' => RestaurantFixtures::MONGOO_OPERA
            ],

            // Employees pour Mongoo La Défense
            [
                'name' => 'Claire Leroy',
                'email' => 'claire.leroy@mongoo.fr',
                'active' => true,
                'restaurant' => RestaurantFixtures::MONGOO_DEFENSE
            ],
            [
                'name' => 'Thomas Moreau',
                'email' => 'thomas.moreau@mongoo.fr',
                'active' => true,
                'restaurant' => RestaurantFixtures::MONGOO_DEFENSE
            ],

            // Employees pour Mongoo Bastille
            [
                'name' => 'Julie Roux',
                'email' => 'julie.roux@mongoo.fr',
                'active' => true,
                'restaurant' => RestaurantFixtures::MONGOO_BASTILLE
            ],
            [
                'name' => 'Antoine Vincent',
                'email' => 'antoine.vincent@mongoo.fr',
                'active' => false,
                'restaurant' => RestaurantFixtures::MONGOO_BASTILLE
            ],

            // Employees pour Mongoo Montparnasse
            [
                'name' => 'Camille Simon',
                'email' => 'camille.simon@mongoo.fr',
                'active' => true,
                'restaurant' => RestaurantFixtures::MONGOO_MONTPARNASSE
            ],

            // Employees pour Mongoo Étoile
            [
                'name' => 'Nicolas Girard',
                'email' => 'nicolas.girard@mongoo.fr',
                'active' => true,
                'restaurant' => RestaurantFixtures::MONGOO_ETOILE
            ],
            [
                'name' => 'Emma Blanc',
                'email' => 'emma.blanc@mongoo.fr',
                'active' => true,
                'restaurant' => RestaurantFixtures::MONGOO_ETOILE
            ],

            // Employees pour Mongoo République
            [
                'name' => 'Paul Mercier',
                'email' => 'paul.mercier@mongoo.fr',
                'active' => true,
                'restaurant' => RestaurantFixtures::MONGOO_REPUBLIQUE
            ],

            // Employees pour Mongoo Nation
            [
                'name' => 'Laura Faure',
                'email' => 'laura.faure@mongoo.fr',
                'active' => true,
                'restaurant' => RestaurantFixtures::MONGOO_NATION
            ],
            [
                'name' => 'David Rousseau',
                'email' => 'david.rousseau@mongoo.fr',
                'active' => false,
                'restaurant' => RestaurantFixtures::MONGOO_NATION
            ],
        ];

        foreach ($employees as $employeeData) {
            $employee = new Employee();
            $employee->setName($employeeData['name']);
            $employee->setEmail($employeeData['email']);
            $employee->setActive($employeeData['active']);
            $employee->setRestaurant(
                $this->getReference($employeeData['restaurant'], Restaurant::class)
            );

            $manager->persist($employee);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            RestaurantFixtures::class,
        ];
    }
}
