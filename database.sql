CREATE TABLE expense_category (
                                  id INTEGER PRIMARY KEY AUTOINCREMENT ,
                                  name TEXT DEFAULT NULL
);

CREATE TABLE role (
                      id INTEGER PRIMARY KEY AUTOINCREMENT,
                      name TEXT
);

CREATE TABLE expense_status (
                                id INTEGER PRIMARY KEY AUTOINCREMENT,
                                description TEXT
);

CREATE TABLE user(
                     id INTEGER PRIMARY KEY  AUTOINCREMENT ,
                     last_name TEXT,
                     first_name TEXT,
                     email TEXT,
                     profile_picture_url TEXT NULL,
                     role INTEGER NOT NULL,
                     FOREIGN KEY (role) REFERENCES role(id) ON DELETE CASCADE
);

CREATE TABLE expense (
                         id INTEGER PRIMARY KEY AUTOINCREMENT,
                         amount INTEGER NOT NULL,
                         creation_datetime TEXT NOT NULL,
                         modification_datetime TEXT NULL,
                         description TEXT NULL,
                         receipt TEXT NULL,
                         asking_user INTEGER NOT NULL,
                         user_validator INTEGER NULL,
                         category INTEGER NOT NULL,
                         status INTEGER NOT NULL,
                         FOREIGN KEY (asking_user) REFERENCES user (id) ON DELETE CASCADE,
                         FOREIGN KEY (user_validator) REFERENCES user (id) ON DELETE CASCADE,
                         FOREIGN KEY (category) REFERENCES expense_category (id) ON DELETE CASCADE,
                         FOREIGN KEY (status) REFERENCES expense_status (id) ON DELETE CASCADE
);

CREATE TABLE permission (
                            id INTEGER PRIMARY KEY AUTOINCREMENT ,
                            name TEXT NOT NULL
);

CREATE TABLE role_permission (
                                 role INTEGER NOT NULL,
                                 permission INTEGER NOT NULL,
                                 PRIMARY KEY (role, permission),
                                 FOREIGN KEY (role) REFERENCES role (id) ON DELETE CASCADE,
                                 FOREIGN KEY (permission) REFERENCES permission (id) ON DELETE CASCADE
);
