 CREATE TABLE IF NOT EXISTS authors(
    id SERIAL NOT NULL,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    PRIMARY KEY (id)
);

 CREATE TABLE IF NOT EXISTS categories(
    id SERIAL NOT NULL,
    name VARCHAR(50) NOT NULL,
    PRIMARY KEY (id)
);

 CREATE TABLE IF NOT EXISTS books(
    id SERIAL NOT NULL,
    name VARCHAR(50) NOT NULL,
    book_cover VARCHAR(255) NOT NULL,
    author_id INT NOT NULL,
    published_at DATE NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (author_id)
    REFERENCES authors(id)
    ON DELETE CASCADE
);


 CREATE TABLE IF NOT EXISTS books_categories(
    id SERIAL NOT NULL,
    category_id INT NOT NULL,
    book_id INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (category_id)
    REFERENCES categories (id),
    FOREIGN KEY (book_id)
    REFERENCES books (id)
);


 CREATE TABLE IF NOT EXISTS to_pay(
    id SERIAL NOT NULL,
    value DECIMAL(10,2) NOT NULL,
    fees INT NOT NULL,
    PRIMARY KEY (id)
);

 CREATE TABLE IF NOT EXISTS address(
    id SERIAL NOT NULL,
    street VARCHAR(50) NOT NULL,
    state VARCHAR(50) NOT NULL,
    house VARCHAR(50) NOT NULL,
    complement TEXT NOT NULL,
    PRIMARY KEY (id)
);

 CREATE TABLE IF NOT EXISTS customers(
    id SERIAL NOT NULL,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    is_paid BOOLEAN NOT NULL,
    to_pay_id INT NOT NULL,
    address_id INT NOT NULL,
    FOREIGN KEY (to_pay_id)
    REFERENCES to_pay (id),
     FOREIGN KEY (address_id)
    REFERENCES address (id),
    PRIMARY KEY (id)
);


 CREATE TABLE IF NOT EXISTS rental_book
 (
    id SERIAL NOT NULL,
    book_id INT NOT NULL,
    customer_id INT NOT NULL,
    rental_date DATE NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (book_id)
    REFERENCES books (id),
    FOREIGN KEY (customer_id)
    REFERENCES customers (id)
);


 CREATE TABLE IF NOT EXISTS users
(
    id SERIAL NOT NULL,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NOT NULL,
    updated_at TIMESTAMP NOT NULL,
    PRIMARY KEY (id)
);
