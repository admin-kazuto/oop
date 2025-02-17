<?php 
namespace App\Client\Controller;
use App\Client\Model\HomeModel;
class HomeController extends controller {
    private $homeController;
    public function __construct(){
        $this->homeController=  new HomeModel();
    }

    public function Home(){
        return $this -> view('client.home');
    }
}

?>