### README for AI Department Pursuits System (Automated Lecture Assignment System)

---

# AI Department Pursuits System - Automated Lecture Assignment System

Welcome to the **AI Department Pursuits System**, a smart web application designed to streamline and automate lecture assignments in educational institutions. This project leverages predefined criteria to ensure efficient, optimized scheduling of lectures to their respective modules.  

This was a **mini-project** developed during my third year of pursuing **Computer Science** at **DMI St. John the Baptist University**, Lilongwe, Malawi. The project was built using **PHP** and MySQL as part of my academic coursework to gain hands-on experience in creating practical solutions for real-world problems.

---

## Project Overview

The **AI Department Pursuits System** addresses common challenges in lecture scheduling, such as time conflicts, module overload, and inefficiencies in manual scheduling processes. By automating this task, the system ensures that:

- Lectures are allocated based on predefined rules and constraints.
- Faculty members’ availability is respected.
- Time slots are effectively managed.

---

## Features

1. **Automated Lecture Assignment**:
   - Assigns lectures to modules using predefined scheduling rules.
   - Avoids conflicts in faculty schedules and time slots.

2. **Admin Dashboard**:
   - Manage faculty, modules, and schedules.
   - Generate and review automated schedules.

3. **Module Management**:
   - Add, update, or delete module details.

4. **Faculty Management**:
   - Maintain a database of lecturers with their availability and qualifications.

5. **Optimized Scheduling**:
   - Ensures balanced allocation of modules to time slots and faculty.

---

## Tech Stack

- **Backend**: PHP
- **Database**: MySQL
- **Frontend**: HTML, CSS, and JavaScript
- **Server**: Apache (recommended XAMPP/WAMP for local deployment)

---

## Installation Instructions

To set up the project locally, follow these steps:

1. **Clone the Repository**:  
   ```bash
   git clone https://github.com/yourusername/AI-Department-Pursuits-System.git
   ```

2. **Set Up the Database**:
   - Import the `lecture_assignment.sql` file (provided in the repository) into your MySQL database.
   - Update the database connection details in `config.php`.

3. **Start Your Local Server**:
   - Use XAMPP or WAMP to run Apache and MySQL services.

4. **Place the Files in the Server Directory**:
   - Copy the project files into the `htdocs` folder (or equivalent) of your local server.

5. **Run the Application**:
   - Open your browser and navigate to:  
     ```
     http://localhost/AI-Department-Pursuits-System/
     ```

---

## Learning Journey

This project was an excellent opportunity to apply theoretical knowledge from coursework to solve a practical problem. It introduced me to key concepts such as:

- PHP and MySQL integration.
- Algorithmic scheduling approaches for resolving conflicts.
- Building user-friendly web interfaces.
- Managing and structuring larger PHP projects.

---

## Screenshots

(Add screenshots of the project here to visually showcase its features.)

---

## Acknowledgements

I would like to express my gratitude to:

- **DMI St. John the Baptist University** for the support and guidance throughout the project.
- Various online resources and tutorials that helped me enhance my understanding of PHP and web development concepts.

---

## Future Enhancements

While functional, the project can benefit from the following improvements:

1. **Improved UI/UX**:
   - Upgrade the interface with modern libraries like Bootstrap or TailwindCSS.

2. **Advanced Scheduling Algorithms**:
   - Integrate AI-driven optimization techniques for even better scheduling.

3. **Security Enhancements**:
   - Add features such as role-based access control, CSRF protection, and encrypted data storage.

4. **Scalability**:
   - Adapt the system for larger institutions with more complex scheduling needs.
