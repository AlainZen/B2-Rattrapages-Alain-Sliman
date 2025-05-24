<?php

namespace App\Controller;

use App\Repository\EmployeeRepository;
use App\Repository\RestaurantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    #[Route('/', name: 'app_dashboard')]
    public function index(RestaurantRepository $restaurantRepository, EmployeeRepository $employeeRepository): Response
    {
        // Compter le nombre de restaurants
        $restaurantCount = count($restaurantRepository->findAll());
        
        // Compter le nombre d'employés actifs
        $activeEmployeeCount = count($employeeRepository->findBy(['active' => true]));
        
        // Compter le nombre d'employés inactifs
        $inactiveEmployeeCount = count($employeeRepository->findBy(['active' => false]));
        
        // Récup tous les resto avec leurs employés pour les stat
        $restaurants = $restaurantRepository->findAll();
        
        $restaurantStats = [];
        foreach ($restaurants as $restaurant) {
            $activeEmployees = 0;
            $inactiveEmployees = 0;
            
            foreach ($restaurant->getEmployees() as $employee) {
                if ($employee->isActive()) {
                    $activeEmployees++;
                } else {
                    $inactiveEmployees++;
                }
            }
            
            $restaurantStats[] = [
                'name' => $restaurant->getName(),
                'activeEmployees' => $activeEmployees,
                'inactiveEmployees' => $inactiveEmployees,
                'totalEmployees' => $activeEmployees + $inactiveEmployees
            ];
        }

        return $this->render('dashboard/index.html.twig', [
            'restaurant_count' => $restaurantCount,
            'active_employee_count' => $activeEmployeeCount,
            'inactive_employee_count' => $inactiveEmployeeCount,
            'restaurant_stats' => $restaurantStats
        ]);
    }
}