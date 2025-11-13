-- Create tables
CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    username VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE artworks (
    id SERIAL PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    artist VARCHAR(100),
    category VARCHAR(50),
    price NUMERIC(10,2),
    image VARCHAR(255)
);

-- Sample data (image filenames correspond to files in uploads/)
INSERT INTO artworks (title, artist, category, price, image) VALUES
('Mountain Serenity', 'Nevita Triya', 'Landscape', 2500000, 'Mountain1.jpg'),
('Majestic Eagle', 'Nafila Firyal', 'Wildlife', 2200000, 'Eagle1.jpg'),
('Sea Horizon', 'Fellicia Salsabilah', 'Seascape', 2700000, 'Sea1.jpg');
