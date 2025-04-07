CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    auth_key VARCHAR(255),
    access_token VARCHAR(255)
);

CREATE TABLE carts (
	id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    status ENUM('active', 'completed', 'abandoned') DEFAULT 'active',
    UNIQUE(user_id, status), -- Asegura que cada usuario solo pueda tener un carrito con estado active. Si el carrito está en estado completed, podrá crear uno nuevo.
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE cart_items (
	id INT AUTO_INCREMENT PRIMARY KEY,
    cart_id INT NOT NULL,
    movie_id INT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    added_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    UNIQUE(cart_id, movie_id), -- Impide que un mismo ítem se repita en el carrito
    FOREIGN KEY (cart_id) REFERENCES carts(id),
    FOREIGN KEY (movie_id) REFERENCES movies(id)
);