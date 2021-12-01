<?php
namespace App\Models\Repositories;

use App\Models\Entity\{
    Book,
    Customer,
    RentalBook,
    ToPay
};
use App\Models\Entity\Group\RentalGroup;

class RentalRepository
{
    private Book $book;
    private Customer $customer;
    private RentalBook $rental;
    private ToPay $to_pay;

    public function __construct()
    {
        $this->book = new Book;
        $this->customer = new Customer;
        $this->rental = new RentalBook;
        $this->to_pay = new ToPay;
    }

    public function getCustomers()
    {
        return $this->customer->all();
    }

    public function findBook(int $id): Book
    {
        return $this->book->find($id);
    }

    public function getBooks()
    {
        return $this->book->all();
    }

    public function getRentals()
    {
        return $this->rental
        ->join(Book::class)
        ->join(Customer::class)
        ->join(ToPay::class)
        ->get(RentalGroup::class);
    }

    public function store(object $request)
    {
            $this->to_pay->value =  $request->to_pay;
            $this->to_pay->fees = 2;
            $this->to_pay->save();
            $to_pay_id = $this->to_pay->getLast()->id;

            $this->rental->is_paided = 'false';
            $this->rental->rental_date = $request->date;
            $this->rental->book_id = $request->book;
            $this->rental->customer_id = (int) $request->customer;
            $this->rental->to_pay_id = $to_pay_id;

            return $this->rental->save();
    }
}