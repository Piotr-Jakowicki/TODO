<?php
class Todo{
    private $db;
    private $id;


    public function __construct()
    {
        $this->db = DB::getInstance();
        $this->id = $_SESSION['id'];
    }

    public function fetchData(){
        $this->db->query('SELECT tasks.*, prioryty.name as pname FROM tasks INNER JOIN prioryty ON prioryty.id = tasks.prioryty WHERE user_id = :id');
        $this->db->bind(':id',$this->id);
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function create(string $task, string $comment, int $prioryty){
        $this->db->query('INSERT INTO tasks (task, comment, prioryty, user_id) VALUES (:task, :comment, :prioryty, :user_id)');
        $this->db->bind(':task',$task);
        $this->db->bind(':comment',$comment);
        $this->db->bind(':prioryty',$prioryty);
        $this->db->bind(':user_id',$this->id);
        if($this->db->execute()){
            echo "Udalo sie";
            //MSG
        } else {
            echo "nie udao sie";
            //MSG
        }
    }

    public function delete($id){
        $this->db->query('DELETE FROM tasks where id = :id');
        $this->db->bind(':id',$id);
        $this->db->execute();
        //MSG
    }

    public function find($params){
        $sql = 'SELECT tasks.*, prioryty.name as pname FROM tasks INNER JOIN prioryty ON prioryty.id = tasks.prioryty WHERE user_id = :id';
        if($params[1] != 0){
            $sql .= ' AND tasks.prioryty = :prioryty';
        }
        if($params[0] != NULL){
            $sql .= ' AND tasks.task LIKE CONCAT("%", :search, "%")';
        }
        
        $this->db->query($sql);
        $this->db->bind(':id',$this->id);
        if($params[1] != 0){
            $this->db->bind(':prioryty',$params[1]);
        }
        if($params[0] != NULL){
            $this->db->bind(':search',$params[0]);
        }
        
        $this->db->execute();
        return $this->db->resultSet();

    }

    public function single($id){
        $this->db->query('SELECT * FROM tasks WHERE id = :id');
        $this->db->bind(':id',$id);
        $this->db->execute();
        return $this->db->first();
    }

    public function update($task, $comment, $prioryty,$id){
        $this->db->query('UPDATE tasks SET tasks.task = :task, tasks.comment = :comment, tasks.prioryty = :prioryty WHERE id = :id');
       
        $this->db->bind(':task',$task);
        $this->db->bind(':comment',$comment);
        $this->db->bind(':prioryty',$prioryty);
        $this->db->bind(':id',$id);
        $this->db->execute();
    }
}