## create book table 
CREATE TABLE books (
    id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    author_id INT NOT NULL,
    publisher_id INT NOT NULL,
    publish_date DATE NOT NULL,
    edition VARCHAR(255) NOT NULL,
    volume VARCHAR(255) NOT NULL,
    isnb int zerofill NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    description TEXT,
    cover_image VARCHAR(255),
    book_status int NOT NULL,
    PRIMARY KEY (id)
);

## create book category table
CREATE TABLE book_category (
    id INT NOT NULL AUTO_INCREMENT,
    book_id INT NOT NULL,
    category_id INT NOT NULL,
    PRIMARY KEY (id)
);

## create posts table
CREATE TABLE posts (
    id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    post_text TEXT NOT NULL,
    user_id INT NOT NULL,
    likes INT NOT NULL,
    post_status INT NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);

## create friends TABLE 
CREATE TABLE friends (
    id INT NOT NULL AUTO_INCREMENT,
    user_id INT NOT NULL,
    friend_id INT NOT NULL,
    PRIMARY KEY (id)
);

## create book borrow table
CREATE TABLE book_borrow (
    id INT NOT NULL AUTO_INCREMENT,
    book_id INT NOT NULL,
    user_id INT NOT NULL,
    borrow_date DATE NOT NULL,
    return_date DATE NOT NULL,
    PRIMARY KEY (id)
);
## insert data into book_borrow table
INSERT INTO book_borrow (book_id, user_id, borrow_date, return_date) VALUES (1, 1, '2019-01-01', '2019-01-10');
INSERT INTO book_borrow (book_id, user_id, borrow_date, return_date) VALUES (2, 1, '2019-01-01', '2019-01-10');
INSERT INTO book_borrow (book_id, user_id, borrow_date, return_date) VALUES (3, 1, '2019-01-01', '2019-01-10');
INSERT INTO book_borrow (book_id, user_id, borrow_date, return_date) VALUES (4, 1, '2019-01-01', '2019-01-10');
## create book review table
CREATE TABLE book_review (
    id INT NOT NULL AUTO_INCREMENT,
    book_id INT NOT NULL,
    user_id INT NOT NULL,
    review_text TEXT NOT NULL,
    review_date DATE NOT NULL,
    PRIMARY KEY (id)
);