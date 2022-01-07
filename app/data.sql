CREATE TYPE prio AS ENUM ('High', 'Medium', 'Low');

CREATE TABLE subjects (
  id int NOT NULL,
  description varchar(255) NOT NULL,
  fkWorkspace int NOT NULL
) ;


-- SQLINES DEMO *** ---------------------------------------

--
-- SQLINES DEMO *** or table "tasks"
--

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE tasks (
  id int NOT NULL,
  taskDescription text NOT NULL,
  dateTime timestamp(0) NOT NULL,
  priority prio NOT NULL,
  fkWorkspace int NOT NULL,
  fkSubject int DEFAULT NULL,
  status enum('open','closed') NOT NULL
);

-- SQLINES DEMO *** ---------------------------------------

--
-- SQLINES DEMO *** or table "users"
--

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE users (
  id int NOT NULL,
  fName varchar(256) NOT NULL,
  lName varchar(256) NOT NULL,
  email varchar(256) NOT NULL,
  password varchar(256) NOT NULL
) ;

--
-- SQLINES DEMO *** table "users"
--

INSERT INTO users (id, fName, lName, email, password) VALUES
(1, 'Bruno', 'Coimbra Marques', 'brunocm@pm.me', 'test..123'),
(2, 'Silvia', 'Almeida', 'silvia@gmail.com', 'test..123'),
(3, 'ssdfds', 'fdsfsdfsd', 'fsdfsd@gmail.com', 'hjdshfjhsd');

-- SQLINES DEMO *** ---------------------------------------

--
-- SQLINES DEMO *** or table "workspaces"
--

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE workspaces (
  id int NOT NULL,
  name varchar(255) NOT NULL,
  fkuser int NOT NULL
) ;

--
-- SQLINES DEMO *** table "workspaces"
--

INSERT INTO workspaces (id, name, fkuser) VALUES
(1, 'University', 1),
(2, 'SLYGAD', 1);

--
-- SQLINES DEMO *** d tables
--

--
-- SQLINES DEMO ***  "subjects"
--
ALTER TABLE subjects
  ADD PRIMARY KEY (id),
  ADD KEY "fkWorkspace" (fkWorkspace);

--
-- SQLINES DEMO ***  "tasks"
--
ALTER TABLE tasks
  ADD PRIMARY KEY (id),
  ADD KEY "fkSubject" (fkSubject),
  ADD KEY "fkWorkspace" (fkWorkspace) ;

--
-- SQLINES DEMO ***  "users"
--
ALTER TABLE users
  ADD PRIMARY KEY (id);

--
-- SQLINES DEMO ***  "workspaces"
--
ALTER TABLE workspaces
  ADD PRIMARY KEY (id),
  ADD KEY "fkuser" (fkuser);

--
-- SQLINES DEMO *** r dumped tables
--


--
-- SQLINES DEMO *** r table "workspaces"
--

--
-- SQLINES DEMO *** umped tables
--

--
-- SQLINES DEMO *** able "subjects"
--
ALTER TABLE subjects
  ADD CONSTRAINT subjects_ibfk_1 FOREIGN KEY (fkWorkspace) REFERENCES workspaces (id);

--
-- SQLINES DEMO *** able "tasks"
--
ALTER TABLE tasks
  ADD CONSTRAINT tasks_ibfk_2 FOREIGN KEY (fkWorkspace) REFERENCES workspaces (id),
  ADD CONSTRAINT tasks_ibfk_3 FOREIGN KEY (fkSubject) REFERENCES "subjects" (id);

--
-- SQLINES DEMO *** able "workspaces"
--
ALTER TABLE workspaces
  ADD CONSTRAINT workspaces_ibfk_1 FOREIGN KEY (fkuser) REFERENCES users (id);
COMMIT;

/* SQLINES DEMO *** ER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/* SQLINES DEMO *** ER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/* SQLINES DEMO *** ON_CONNECTION=@OLD_COLLATION_CONNECTION */;
