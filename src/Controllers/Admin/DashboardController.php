<?php 

namespace Ductong\Mvcoop\Controllers\Admin;

use Ductong\Mvcoop\Commons\Controller;

class DashboardController extends Controller
{
    public function index() {
        return $this->renderViewAdmin('dashboard');
    }
}