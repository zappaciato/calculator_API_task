<?php

namespace App\Controller;

use App\Service\CalculatorService;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CalculatorController extends AbstractController
{
    public function __construct(private readonly CalculatorService $calculatorService)
    {

    }


    #[Route('/add/{operand_x}/{operand_y}', name: 'add_calculator', methods: ['GET'])]
    public function add($operand_x, $operand_y): JsonResponse
    {
        $result = $this->calculatorService->add($operand_x, $operand_y);

        return $this->json([
            $result
        ]);
    }

    #[Route('/subtract/{operand_x}/{operand_y}', name: 'subtract_calculator', methods: ['GET'])]
    public function subtract($operand_x, $operand_y): JsonResponse
    {
        $result = $this->calculatorService->subtract($operand_x, $operand_y);

        return $this->json([
            $result
        ]);
    }

    #[Route('/multiply/{operand_x}/{operand_y}', name: 'multiply_calculator', methods: ['GET'])]
    public function multiply($operand_x, $operand_y): JsonResponse
    {
        $result = $this->calculatorService->multiply($operand_x, $operand_y);

        return $this->json([
            $result
        ]);
    }

    #[Route('/divide/{operand_x}/{operand_y}', name: 'divide_calculator', methods: ['GET'])]
    public function divide($operand_x, $operand_y): JsonResponse
    {
        $result = $this->calculatorService->divide($operand_x, $operand_y);

        return $this->json([
            $result
        ]);
    }
}
