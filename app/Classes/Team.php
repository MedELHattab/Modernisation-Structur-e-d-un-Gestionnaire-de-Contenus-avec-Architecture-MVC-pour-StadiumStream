<?php  
     namespace App\Classes;
     class Team {
        private ?int $id;
        private ?string $name;
        private ?string $coach;
        private ?int $number;


        public function __construct(?int $id = null, ?string $name = null, ?string $coach = null, ?int $number = null) {
            $this->id = $id;
            $this->name = $name;
            $this->coach = $coach;
            $this->number = $number;
        }

        public function getId(): ?int {
            return $this->id;
        }
    
        public function setId(?int $id): void {
            $this->id = $id;
        }
        
    
        public function getName(): ?string {
            return $this->name;
        }
    
        public function setName(?string $name): void {
            $this->name = $name;
        }
        public function getCoach(): ?string {
            return $this->coach;
        }
    
        public function setCoach(?string $coach): void {
            $this->coach = $coach;
        }
    
        public function getNumber(): ?int {
            return $this->number;
        }
    
        public function setNumber(?int $number): void {
            $this->number = $number;
        }
    }
    