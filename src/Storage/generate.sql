CREATE TABLE fighters (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name VARCHAR(100) NOT NULL,
    nickname VARCHAR(50),
    age INT,
    weight_class VARCHAR(50),
    record VARCHAR(20),
    nationality VARCHAR(50),
    team VARCHAR(100)
);

CREATE TABLE fights (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    fighter1_id INT NOT NULL,
    fighter2_id INT NOT NULL,
    event_name VARCHAR(100),
    date DATE,
    winner_id INT,
    method VARCHAR(50),
    
    CHECK (fighter1_id <> fighter2_id),
    
    FOREIGN KEY (fighter1_id) REFERENCES fighters(id) ON DELETE CASCADE,
    FOREIGN KEY (fighter2_id) REFERENCES fighters(id) ON DELETE CASCADE,
    FOREIGN KEY (winner_id) REFERENCES fighters(id) ON DELETE SET NULL
);

CREATE INDEX idx_fighter_weight_class ON fighters(weight_class);
CREATE INDEX idx_fight_event_date ON fights(event_name, date);

INSERT INTO fighters (name, nickname, age, weight_class, record, nationality, team) VALUES
('Georges St-Pierre', 'Rush', 39, 'Welterweight', '26-2-0', 'Canadian', 'Tristar Gym'),
('Khabib Nurmagomedov', 'The Eagle', 32, 'Lightweight', '29-0-0', 'Russian', 'American Kickboxing Academy'),
('Anderson Silva', 'The Spider', 45, 'Middleweight', '34-11-0', 'Brazilian', 'Black House'),
('Conor McGregor', 'The Notorious', 32, 'Lightweight', '22-6-0', 'Irish', 'SBG Ireland'),
('Jon Jones', 'Bones', 33, 'Light Heavyweight', '26-1-0', 'American', 'Jackson-Wink MMA');

INSERT INTO fights (fighter1_id, fighter2_id, event_name, date, winner_id, method) VALUES
(1, 3, 'UFC 101', '2009-08-08', 1, 'Decision'),
(2, 4, 'UFC 229', '2018-10-06', 2, 'Submission'),
(5, 3, 'UFC 214', '2017-07-29', 5, 'KO'),
(1, 2, 'UFC 242', '2019-09-07', 2, 'Submission'),
(4, 5, 'UFC 247', '2020-02-08', 5, 'Decision');
