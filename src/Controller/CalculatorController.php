<?php

namespace App\Controller;

use Exception;
use Psr\Log\LoggerInterface;
use App\Utilities\InputValidator;
use App\Service\CalculatorService;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CalculatorController extends AbstractController
{
    public function __construct(private readonly CalculatorService $calculatorService, private readonly LoggerInterface $logger)
    {

    }

    #[Route('/{operation}/{operand_x}/{operand_y}', name: 'add_calculator', methods: ['GET'])]
    public function calculate($operand_x, $operand_y, $operation): JsonResponse
    {
        try {
            InputValidator::validate($operand_x, $operand_y);
            $result = $this->calculatorService->calculate($operand_x, $operand_y, $operation);
        } catch (Exception $e) {
            $this->logger->error('File: ' . $e->getFile() . ' line: ' . $e->getLine() . ' message: ' . $e->getMessage());

            return $this->json($e->getMessage());
        }

        // $finalResult['result'] = $result;
        $finalResult = ['result' => $result];

        return $this->json($finalResult);
    }






    

}
