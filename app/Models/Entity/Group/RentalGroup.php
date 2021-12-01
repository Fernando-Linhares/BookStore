<?php
namespace App\Models\Entity\Group;

class RentalGroup
{
    public ?int $id = null;
    
    public bool $is_paided;

    public string $rental_date;

    public string $title;

    public int $to_pay_id;

    public int $customer_id;
    
    public string $first_name;

    public string $last_name;

    public float $value;

    public function getCustomerName(): string
    {
        return $this->first_name . " " .$this->last_name;
    }

    public function getBookTitle(): string
    {
        return $this->title;
    }

    public function getDateLimit(): string
    {
        return $this->rental_date;
    }

    public function getToPayValue(): string
    {
        return $this->value;
    }

    public function expired(): bool
    {
        $date = strtotime($this->rental_date);
        $now = strtotime(date("Y-m-d"));

        return $date < $now;
    }
}