<?php
class Task extends Db{
    private $idTask;
    private $titleTask;
    private $descTask;
    private $deadline;
    private $status;
    public $conn;

        function __construct()
        {
                $Dbinstance = new Db();
               $this->conn= $Dbinstance->connect();
    }
   public function getIdta(){
        return $this->idTask;
    }

    public function setIdta($idTask){
        $this->idTask =$idTask;

    }
    public function getTitle()
    {
        return $this->titleTask;
    }

    public function setTitle($titleTask)
    {
        $this->titleTask = $titleTask;
    }

    public function getDescta(){
        return $this->descTask;
    }

    public function setDescta($descTask){
        $this->descTask =$descTask;
    }
    public function getDeadline(){
        return $this->deadline;
    }

    public function setdeadline($deadline){
        $this->deadline = $deadline;
    }
    public function getStatut(){
        return $this->status;
    }

    public function setStatus($status){
        $this->status = $status;
    }


    public function addTask($user_id,$project_id){
        $user_id = $_SESSION["user-id"];
        $stmt=$this->conn->prepare("INSERT INTO task (title,description,status,deadline,user_id,id_project) values(:title,:description,:status,:deadline,:user_id,:id_project)");
        $stmt->bindParam(':title', $this->titleTask);
        $stmt->bindParam(':description', $this->descTask);
        $stmt->bindParam(':status', $this->status);
        $stmt->bindParam(':deadline', $this->deadline);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':id_project', $project_id);
        if($stmt->execute()){
            return true;
        }

    }
    public function getTasks(){

        
    }}