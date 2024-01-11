CREATE TABLE IF NOT EXISTS product_type (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    tax_rate DECIMAL(5,2) NOT NULL
);

CREATE TABLE IF NOT EXISTS product (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    type_id INT NOT NULL,
    price DECIMAL(8,2) NOT NULL,
    image_path VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (type_id) REFERENCES product_type(id)
);

CREATE OR REPLACE FUNCTION update_product_updated_at()
RETURNS TRIGGER AS $$
BEGIN
    NEW.updated_at = CURRENT_TIMESTAMP;
    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER product_update_trigger
BEFORE UPDATE ON product
FOR EACH ROW
EXECUTE FUNCTION update_product_updated_at();

CREATE TABLE IF NOT EXISTS sale (
    id SERIAL PRIMARY KEY,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    total_price DECIMAL(10,2) NOT NULL,
    total_tax DECIMAL(10,2) NOT NULL,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES product(id)
);

CREATE TABLE IF NOT EXISTS image (
    id SERIAL PRIMARY KEY,
    product_id INT NOT NULL,
    path VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES product(id)
);

INSERT INTO product_type (name, tax_rate) VALUES
    ('Eletrônicos', 18.00),
    ('Roupas', 12.00),
    ('Alimentos', 7.00),
    ('Livros', 5.00),
    ('Ferramentas', 15.00);