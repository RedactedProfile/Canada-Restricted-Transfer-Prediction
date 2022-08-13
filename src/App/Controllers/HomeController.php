<?php

namespace App\Controllers;

use Core\BaseController;
use App\Repositories;

require_once __DIR__ . '/../../Core/BaseController.php';
require_once __DIR__ . '/../Repositories/RefRepository.php';

class HomeController extends BaseController
{
    public function index()
    {
        $reference = Repositories\RefRepository::getReference(5933703);

        return $this->render('home', [
            'reference' => $reference
        ]);
    }
}
