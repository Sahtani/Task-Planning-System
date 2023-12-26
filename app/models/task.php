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
        $this->idTask = $$idTask;

    }
    public function getDescta(){
        return $this->descTask;
    }

    public function setDescta($descTask){
        $this->descTask = $$descTask;
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


    public function addtask($user_id,$prject_id){
        $user_id = $_SESSION["user-id"];
        $stmt=$this->conn->prepare("INSERT INTO task (title,description,status,deadline,user_id,id_project) values(:title,:description,:status,:deadline,:user_id,:id_project)");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':deadline', $deadline);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':id_project', $prject_id);
        if($stmt->execute()){
            return true;
        }

    }
    public function getTasks(){

        
    }}