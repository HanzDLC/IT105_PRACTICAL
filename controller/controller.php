<?php
class Controller
{
    public $model = null;

    function __construct()
    {
        require_once('model/model.php');
        $this->model = new Model();
    }

    public function getPage()
    {
        $command = null;

        if (isset($_REQUEST['command']))
            $command = $_REQUEST['command'];

        switch ($command) {
            case 0:
                include_once('view/home.php');
                break;
            case 1:
                // Fetch the dog records for the gallery
                $dogs = $this->model->getDogList();
                include_once('view/gallery.php');  // Load the gallery view
                break;
            case 2:
                include_once('view/about-us.php');
                break;
            case 'viewBooks':
                {
                    $books = $this->model->getBookList();
                    include 'view/viewbooklist2.php';
                    break;
                }
            case 'viewDogs':
                {
                    $breed = isset($_REQUEST['breed']) ? $_REQUEST['breed'] : null;
                    $dogs = $this->model->getDogsByBreed($breed);
                    include 'view/viewdoglist.php';
                    break;
                }
            case 'viewSpecific':
                {
                    // Get the dog name from the URL parameters
                    $dog_name = isset($_REQUEST['dog_name']) ? $_REQUEST['dog_name'] : null;

                    // Fetch the specific dog's details using the model
                    $dog = $this->model->fetchDogByName($dog_name);

                    // Load the specific view for displaying the dog's details
                    include 'view/viewdogdetails.php';
                    break;
                }
        }
    }
}
?>
