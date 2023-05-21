<?php
    declare(strict_types = 1);

    class Faq {
        public int $id;
        public string $ans;
        public string $quest;

    public function __construct(int $id, string $quest, string $ans){
        $this->id = $id;
        $this->title = $quest;
        $this->body = $ans;
    }
    static function getMaxId(PDO $db): int{
        $stmt=$db->prepare('
            SELECT MAX(id) AS id_max 
            FROM FAQ;
        ');
        $stmt->execute();
        if($foundHashtag= $stmt ->fetch()){
            return (int)$foundHashtag['id_max'];
        }
    }
    static function getAllFAQ(PDO $db){
        $stmt=$db->prepare('
            SELECT * FROM FAQ
        ');
        $stmt->execute();
        $faq=array();
        while($row=$stmt->fetch()){
            $faq = new Faq($row['id'], $row['quest'], $row['ans']);
            $faq[] = $faq;
        }
        return $faq;
    }
    static function createFAQ(PDO $db, int $id, string $quest, string $ans){
        $stmt=$db->prepare('
            INSERT INTO FAQ(id, quest, ans)
            VALUES(?,?,?);
        ');
        $stmt->execute(array($id,$quest,$ans));
    }
    public function getQuest():string{
        return $this->quest;
    }
    public function getAns(): string{
        return $this->ans;
    }
    }
?>