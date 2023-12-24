<?php  
     namespace App\Classes;
     class Team {
        private ?int $id;
        private ?string $name;
        private ?string $country;
        private ?string $description;
        private ?string $created_at;


        public function __construct(?int $id = null, ?string $name = null, ?string $description = null, ?string $country = null , ?string $created_at = null) {
            $this->id = $id;
            $this->name = $name;
            $this->country = $country;
            $this->description = $description;
            $this->created_at = $created_at;
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
        public function getCountry(): ?string {
            return $this->country;
        }
    
        public function setCountry(?string $country): void {
            $this->country = $country;
        }
    
        public function getCreatedAt(): ?string {
            return $this->created_at;
        }
    
        public function setCreatedAt(?string $created_at): void {
            $this->created_at = $created_at;
        }
    
        public function getDescription(): ?string {
            return $this->description;
        }
    
        public function setDescription(?string $description): void {
            $this->description = $description;
        }
    }
    