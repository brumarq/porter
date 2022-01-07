
CREATE TABLE subjects (
  id int NOT NULL,
  description varchar(255) NOT NULL,
  fkWorkspace int NOT NULL
) ;

--
-- SQLINES DEMO *** table "subjects"
--

INSERT INTO subjects (id, description, fkWorkspace) VALUES
(1, 'Web Development', 1),
(12, 'Test', 1),
(13, 'test2', 1),
(14, 'Kak', 1),
(15, 'Giftcard project', 2);

-- SQLINES DEMO *** ---------------------------------------

--
-- SQLINES DEMO *** or table "tasks"
--

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE tasks (
  id int NOT NULL,
  taskDescription text NOT NULL,
  dateTime timestamp(0) NOT NULL,
  priority enum('High','Medium','Low') NOT NULL,
  fkWorkspace int NOT NULL,
  fkSubject int DEFAULT NULL,
  status enum('open','closed') NOT NULL
);

--
-- SQLINES DEMO *** table "tasks"
--

INSERT INTO tasks (id, taskDescription, dateTime, priority, fkWorkspace, fkSubject, status) VALUES
(13, 'dfsdfsd', '2022-01-06 01:56:00', 'High', 1, 1, 'closed'),
(14, 'sfdsfdsf', '2022-01-27 02:03:00', 'High', 1, 1, 'closed'),
(15, 'dfsdf', '2022-01-27 06:12:00', 'High', 1, 1, 'closed'),
(16, 'sdfdsfds', '2022-01-14 05:16:00', 'High', 1, 1, 'open'),
(17, 'dsfsdf', '2022-01-20 17:58:00', 'High', 1, 1, 'closed'),
(18, 'sdsds', '2022-01-15 18:06:00', 'High', 1, NULL, 'closed'),
(19, 'sdsds', '2022-01-15 18:06:00', 'High', 1, NULL, 'closed'),
(20, 'sadsad', '2021-12-30 19:51:00', 'High', 1, 1, 'closed'),
(21, 'sadsad', '2021-12-30 19:51:00', 'High', 1, 13, 'closed'),
(22, 'Vaccum Floor', '2022-01-12 23:00:00', 'Low', 1, 12, 'closed'),
(23, 'Vaccum Floor', '2022-01-12 23:00:00', 'Low', 1, NULL, 'closed'),
(24, 'Vaccum Floor', '2022-01-12 23:00:00', 'Low', 1, NULL, 'closed'),
(25, 'Vaccum Floor', '2022-01-12 23:00:00', 'Low', 1, NULL, 'closed'),
(26, 'dfdfdfd', '2022-01-14 12:29:00', 'High', 1, NULL, 'open'),
(27, 'dsfsdfsdf', '2022-01-13 12:49:00', 'High', 2, NULL, 'open'),
(28, 'dsfsdfsdf', '2022-01-13 12:49:00', 'High', 2, 15, 'open'),
(29, 'sdfddfsfsd', '2022-01-27 17:08:00', 'High', 1, 13, 'open');

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
