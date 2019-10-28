
CREATE TABLE `affiliation_management` (
  `affilation_number` int(11) NOT NULL,
  `school_number` int(11) NOT NULL,
  `department_number` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `responsible_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE `chat_undecided` (
  `chat_number` int(11) NOT NULL,
  `last_chat_number` int(11) NOT NULL,
  `desired_time` datetime NOT NULL,
  `body` varchar(300) NOT NULL,
  `input_time` datetime NOT NULL,
  `approval_flag` bit(1) NOT NULL DEFAULT b'0',
  `student_number` int(11) DEFAULT NULL,
  `teacher_number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE `country` (
  `country_number` int(11) NOT NULL,
  `country_name` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE `country_img` (
  `img_number` int(11) NOT NULL,
  `country_number` int(11) NOT NULL,
  `img_path` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE `course_category` (
  `category_number` int(11) NOT NULL,
  `category_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE `course_overview` (
  `course_number` int(11) NOT NULL,
  `course_name` varchar(30) NOT NULL,
  `event_date` datetime NOT NULL,
  `body` varchar(300) NOT NULL,
  `category` int(11) NOT NULL,
  `img_path` varchar(50) NOT NULL,
  `course_creator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE `course_participant` (
  `course_number` int(11) NOT NULL,
  `student_number` int(11) NOT NULL,
  `attendance_flag` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE `department` (
  `school_number` int(11) NOT NULL,
  `department_number` int(11) NOT NULL,
  `department_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE `learning_category` (
  `category_number` int(11) NOT NULL,
  `category_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `learning_record` (
  `management_number` int(11) NOT NULL,
  `student_number` int(11) NOT NULL,
  `category_number` int(11) NOT NULL,
  `lerning_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE `push_notification` (
  `push_number` int(11) NOT NULL,
  `all_push_flag` bit(1) NOT NULL DEFAULT b'0',
  `course_number` int(11) NOT NULL,
  `teacher_number` int(11) NOT NULL,
  `push_time` datetime NOT NULL,
  `body` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE `push_send_list` (
  `pushnumber` int(11) NOT NULL,
  `management_number` int(11) NOT NULL,
  `student_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE `school` (
  `school_number` int(11) NOT NULL,
  `school_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE `study_abroad_plan` (
  `management_number` int(11) NOT NULL,
  `target_school` int(11) NOT NULL,
  `start_study_abroad` date NOT NULL,
  `end_study_abroad` date NOT NULL,
  `target_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE `target_school` (
  `target_school_number` int(11) NOT NULL,
  `country_number` int(11) NOT NULL,
  `school_name` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE `teacher` (
  `teacher_number` int(11) NOT NULL,
  `school_number` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE `teacher_password` (
  `teacher_number` int(11) NOT NULL,
  `hash` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE `teacher_responsible_country` (
  `teacher_number` int(11) NOT NULL,
  `country_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE `user` (
  `student_number` int(11) NOT NULL,
  `affiliation_number` int(11) NOT NULL,
  `kanji_sei` varchar(50) CHARACTER SET utf8 NOT NULL,
  `kanji_mei` varchar(50) CHARACTER SET utf8 NOT NULL,
  `kana_sei` varchar(50) NOT NULL,
  `kana_mei` varchar(50) NOT NULL,
  `study_abroad_plan` int(11) NOT NULL,
  `first_login_flag` bit(1) DEFAULT b'0',
  `password_change_flag` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE `word_lerning` (
  `student_number` int(11) NOT NULL,
  `word_number` int(11) NOT NULL,
  `answer_count` int(11) NOT NULL,
  `correctness_decision` bit(10) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE `word_name` (
  `management_number` int(11) NOT NULL,
  `word_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `japanese_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `phonetic_symbol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
ALTER TABLE `affiliation_management`
  ADD PRIMARY KEY (`affilation_number`),
  ADD KEY `department_number` (`department_number`,`school_number`),
  ADD KEY `affiliationidentification_ibfk_2` (`responsible_number`);
ALTER TABLE `chat_undecided`
  ADD PRIMARY KEY (`chat_number`),
  ADD KEY `student_number` (`student_number`),
  ADD KEY `teacher_number` (`teacher_number`);
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_number`),
  ADD UNIQUE KEY `country_number` (`country_number`),
  ADD UNIQUE KEY `country_country_name_uindex` (`country_name`);
ALTER TABLE `country_img`
  ADD PRIMARY KEY (`img_number`),
  ADD KEY `country_number` (`country_number`);
ALTER TABLE `course_category`
  ADD PRIMARY KEY (`category_number`);
ALTER TABLE `course_overview`
  ADD PRIMARY KEY (`course_number`),
  ADD KEY `category` (`category`),
  ADD KEY `course_creator` (`course_creator`);
ALTER TABLE `course_participant`
  ADD PRIMARY KEY (`course_number`,`student_number`),
  ADD KEY `student_number` (`student_number`);
ALTER TABLE `department`
  ADD PRIMARY KEY (`school_number`,`department_number`) USING BTREE,
  ADD UNIQUE KEY `department_number` (`department_number`);
ALTER TABLE `learning_category`
  ADD PRIMARY KEY (`category_number`);
ALTER TABLE `learning_record`
  ADD PRIMARY KEY (`management_number`),
  ADD KEY `category_number` (`category_number`),
  ADD KEY `student_number` (`student_number`);
ALTER TABLE `push_notification`
  ADD PRIMARY KEY (`push_number`),
  ADD KEY `teacher_number` (`teacher_number`);
ALTER TABLE `push_send_list`
  ADD PRIMARY KEY (`pushnumber`,`management_number`),
  ADD KEY `push_send_list_user_student_number_fk` (`student_number`);
ALTER TABLE `school`
  ADD PRIMARY KEY (`school_number`),
  ADD UNIQUE KEY `school_school_name_uindex` (`school_name`);
ALTER TABLE `study_abroad_plan`
  ADD PRIMARY KEY (`management_number`),
  ADD UNIQUE KEY `management_number` (`management_number`) USING BTREE,
  ADD KEY `study_abroad_plan_target_school_target_school_number_fk` (`target_school`);
ALTER TABLE `target_school`
  ADD PRIMARY KEY (`target_school_number`),
  ADD KEY `country_number` (`country_number`);
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_number`),
  ADD UNIQUE KEY `responsible_number` (`teacher_number`),
  ADD KEY `teacher_school_school_number_fk` (`school_number`);
ALTER TABLE `teacher_password`
  ADD PRIMARY KEY (`teacher_number`),
  ADD UNIQUE KEY `teacher_password_hash_uindex` (`hash`);
ALTER TABLE `teacher_responsible_country`
  ADD PRIMARY KEY (`teacher_number`),
  ADD KEY `country_number` (`country_number`);
ALTER TABLE `user`
  ADD PRIMARY KEY (`student_number`),
  ADD KEY `affiliation_number` (`affiliation_number`),
  ADD KEY `student_number` (`student_number`),
  ADD KEY `user_study_abroad_plan_management_number_fk` (`study_abroad_plan`);
ALTER TABLE `word_lerning`
  ADD PRIMARY KEY (`student_number`,`word_number`),
  ADD KEY `word_number` (`word_number`);
ALTER TABLE `word_name`
  ADD PRIMARY KEY (`management_number`);
ALTER TABLE `affiliation_management`
  MODIFY `affilation_number` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `chat_undecided`
  MODIFY `chat_number` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `country`
  MODIFY `country_number` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `country_img`
  MODIFY `img_number` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `course_category`
  MODIFY `category_number` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `course_overview`
  MODIFY `course_number` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `learning_category`
  MODIFY `category_number` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `learning_record`
  MODIFY `management_number` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `push_notification`
  MODIFY `push_number` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `school`
  MODIFY `school_number` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `study_abroad_plan`
  MODIFY `management_number` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `target_school`
  MODIFY `target_school_number` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `word_name`
  MODIFY `management_number` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `affiliation_management`
  ADD CONSTRAINT `affiliation_management_ibfk_1` FOREIGN KEY (`department_number`,`school_number`) REFERENCES `department` (`department_number`, `school_number`),
  ADD CONSTRAINT `affiliation_management_ibfk_2` FOREIGN KEY (`responsible_number`) REFERENCES `teacher` (`teacher_number`);
ALTER TABLE `chat_undecided`
  ADD CONSTRAINT `chat_undecided_ibfk_1` FOREIGN KEY (`student_number`) REFERENCES `user` (`student_number`),
  ADD CONSTRAINT `chat_undecided_ibfk_2` FOREIGN KEY (`teacher_number`) REFERENCES `teacher` (`teacher_number`);
ALTER TABLE `country_img`
  ADD CONSTRAINT `country_img_ibfk_1` FOREIGN KEY (`country_number`) REFERENCES `country` (`country_number`);
ALTER TABLE `course_overview`
  ADD CONSTRAINT `course_overview_ibfk_1` FOREIGN KEY (`category`) REFERENCES `course_category` (`category_number`),
  ADD CONSTRAINT `course_overview_ibfk_2` FOREIGN KEY (`course_creator`) REFERENCES `teacher` (`teacher_number`);
ALTER TABLE `course_participant`
  ADD CONSTRAINT `course_participant_ibfk_1` FOREIGN KEY (`course_number`) REFERENCES `course_overview` (`course_number`),
  ADD CONSTRAINT `course_participant_ibfk_2` FOREIGN KEY (`student_number`) REFERENCES `user` (`student_number`);
ALTER TABLE `department`
  ADD CONSTRAINT `department_school_school_number_fk` FOREIGN KEY (`school_number`) REFERENCES `school` (`school_number`);
ALTER TABLE `learning_record`
  ADD CONSTRAINT `learning_record_ibfk_1` FOREIGN KEY (`category_number`) REFERENCES `learning_category` (`category_number`),
  ADD CONSTRAINT `learning_record_ibfk_2` FOREIGN KEY (`student_number`) REFERENCES `user` (`student_number`);
ALTER TABLE `push_notification`
  ADD CONSTRAINT `push_notification_ibfk_1` FOREIGN KEY (`teacher_number`) REFERENCES `teacher` (`teacher_number`);
ALTER TABLE `push_send_list`
  ADD CONSTRAINT `push_send_list_push_notification_push_number_fk` FOREIGN KEY (`pushnumber`) REFERENCES `push_notification` (`push_number`),
  ADD CONSTRAINT `push_send_list_user_student_number_fk` FOREIGN KEY (`student_number`) REFERENCES `user` (`student_number`);
ALTER TABLE `study_abroad_plan`
  ADD CONSTRAINT `study_abroad_plan_target_school_target_school_number_fk` FOREIGN KEY (`target_school`) REFERENCES `target_school` (`target_school_number`);
ALTER TABLE `target_school`
  ADD CONSTRAINT `target_school_ibfk_1` FOREIGN KEY (`country_number`) REFERENCES `country` (`country_number`);
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_school_school_number_fk` FOREIGN KEY (`school_number`) REFERENCES `school` (`school_number`);
ALTER TABLE `teacher_password`
  ADD CONSTRAINT `teacher_password_teacher_teacher_number_fk` FOREIGN KEY (`teacher_number`) REFERENCES `teacher` (`teacher_number`);
ALTER TABLE `teacher_responsible_country`
  ADD CONSTRAINT `teacher_responsible_country_ibfk_1` FOREIGN KEY (`country_number`) REFERENCES `country` (`country_number`),
  ADD CONSTRAINT `teacher_responsible_country_ibfk_2` FOREIGN KEY (`teacher_number`) REFERENCES `teacher` (`teacher_number`);
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`affiliation_number`) REFERENCES `affiliation_management` (`affilation_number`),
  ADD CONSTRAINT `user_study_abroad_plan_management_number_fk` FOREIGN KEY (`study_abroad_plan`) REFERENCES `study_abroad_plan` (`management_number`);
ALTER TABLE `word_lerning`
  ADD CONSTRAINT `word_lerning_ibfk_1` FOREIGN KEY (`student_number`) REFERENCES `user` (`student_number`),
  ADD CONSTRAINT `word_lerning_ibfk_2` FOREIGN KEY (`word_number`) REFERENCES `word_name` (`management_number`);
COMMIT;