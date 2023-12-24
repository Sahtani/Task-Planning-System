<?php
class ProjectController extends Controller{

    public function index($error = "")
    {
        $this->view("home", "", ["error" => $error]);
        $this->view->render();
    }
    public function Add_project()
    {
        if (isset($_POST["submit"])) {

            $name = $_POST["nameprojet"];
            $startdate = $_POST["startdate"];
            $enddate = $_POST["enddate"];

            $this->model("project");
            $Name = $this->validateData($name);
            $this->model->setName($Name);
            $startDate = $this->validateData($startdate);
            $this->model->setName($startDate);

            $endDate = $this->validateData($enddate);
            $this->model->setName($endDate);
            $addproject = $this->model->addproject($projects);
            if ($addproject) {
                $this->index("Project Added Successfully!");
                exit;
            } else {
                $this->index("Project Added Successfully!");
            };
        }
    }
    public function validateData($data)
    {
        if (isset($data) and !empty($data)) {
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

}