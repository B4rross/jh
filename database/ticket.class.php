<?php
    declare(strict_types=1);

    class Ticket {
        public int $id;
        public string $title;
        public DateTime $date;
        public string $description;
        public string $status;
        public int $creatorId;
        public ?int $assigneeId;
        public ?int $departmentId;
        

        public function __construct(int $id, string $title, DateTime $date, string $description, string $status, int $creatorId, ?int $assigneeId, ?int $departmentId) {
            $this->id = $id;
            $this->title = $title;
            $this->date = $date;
            $this->description = $description;
            $this->status = $status;
            $this->creatorId = $creatorId;
            $this->assigneeId = $assigneeId;
            $this->departmentId = $departmentId;
        }
    }


?>