CREATE TABLE profiles (
	profile_id INT(11) NOT NULL AUTO_INCREMENT,
    profile_pic VARCHAR(255) DEFAULT "default_profile_pic.jpg",
    profile_about TEXT(360) DEFAULT 'Hi, tell us something about yourself.',
    edited_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    id INT,
    PRIMARY KEY (profile_id),
    FOREIGN KEY (id) REFERENCES users(id) ON DELETE CASCADE
)  ENGINE = InnoDB;