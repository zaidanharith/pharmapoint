# PharmaPoint+ : A Modern Web-Based Digital Pharmacy Solution

**PharmaPoint+** is a digital pharmacy web application designed to help users seamlessly search, select, and purchase medicines online. This project is built with **Laravel** as the backend framework, **Supabase** (PostgreSQL) as the database solution, and **Tailwind CSS** to ensure a responsive and modern user interface. The application is deployed on **Heroku**, a cloud platform that provides scalable hosting and easy deployment workflows for modern web applications.

## 👥 Contributors

-   [Anggita Salsabilla](https://www.instagram.com/anggita.salsabilla/) – 23/516001/TK/56775
-   [Chaira Nastya Warestri](https://www.instagram.com/chairanastya/) – 23/514942/TK/56550
-   [Zaidan Harith](https://www.instagram.com/zaidanharith_/) – 23/512629/TK/56334

## 🚀 Key Features

PharmaPoint+ is equipped with a range of powerful and user-centric features to ensure a seamless and secure online pharmacy experience:

-   **🔐 User Registration & Authentication**  
    Secure user sign-up and login system with role-based access control.

-   **📊 Role-Based Dashboards**  
    Dynamic dashboard interfaces that adapt based on the user's role — user, admin, or owner — providing relevant data and controls.

-   **💊 Medicine Management (CRUD)**  
    Admins and owners can add, update, delete, and manage complete medicine data easily through an intuitive backend interface.

-   **🔎 Medicine Catalog with Smart Search**  
    A fully searchable and filterable catalog that allows users to explore medicines by name or category.

-   **🧾 Product Details & Online Ordering**  
    Users can view detailed product information and place orders directly through the platform.

-   **📂 Transaction History & Order Tracking**  
    Comprehensive transaction records and order status tracking for users and admins.

-   **🏷️ Category System**  
    Medicines are organized into categories to enhance browsing and filtering experience.

-   **✅ Data Validation & Security**  
    All inputs are validated to ensure data integrity and prevent malicious entries, ensuring a secure environment for all users.

-   **🔄 Role Upgrade Management**  
    Owners can promote standard users to admin level, supporting flexible and scalable team management.

## 🛠️ Tech Stack

[![Laravel](https://img.shields.io/badge/Laravel-E63946?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-0EA5E9?style=for-the-badge&logo=tailwind-css&logoColor=white)](https://tailwindcss.com)
[![Supabase](https://img.shields.io/badge/Supabase-2BC48A?style=for-the-badge&logo=supabase&logoColor=white)](https://supabase.com)
[![PostgreSQL](https://img.shields.io/badge/PostgreSQL-336699?style=for-the-badge&logo=postgresql&logoColor=white)](https://www.postgresql.org)
[![Heroku](https://img.shields.io/badge/Heroku-430098?style=for-the-badge&logo=heroku&logoColor=white)](https://www.heroku.com)

-   **🖥️ Backend: Laravel**

    Laravel powers the backend by managing database migrations, models, controllers, and route definitions. Migrations handle version-controlled table structures, ensuring smooth schema evolution. Models serve as data representations and encapsulate business logic linked to database tables. Controllers process user requests, interact with models, and return appropriate views. Laravel’s routing system maps URLs to controllers, creating a clean, well-structured flow throughout the application.

-   **🎨 Frontend: Tailwind CSS**

    The frontend leverages Blade, Laravel’s powerful templating engine, to build dynamic and organized views with clean syntax. Blade promotes separation of concerns, making UI development more maintainable and scalable. Tailwind CSS, a utility-first CSS framework, accelerates styling by enabling responsive, consistent layouts without writing custom CSS from scratch. The combination of Blade and Tailwind CSS provides high flexibility in building sleek, user-friendly interfaces.

-   **🗄️ Database: Supabase (PostgreSQL)**

    Supabase is a backend-as-a-service platform offering a robust PostgreSQL database and other services such as authentication and real-time subscriptions. In this project, Supabase is used as the primary database solution due to its ease of integration, scalability, and secure architecture. PostgreSQL itself is a reliable, ACID-compliant relational database system capable of handling large datasets with high performance. Supabase simplifies database management, enabling rapid development with real-time updates, secure storage, and seamless authentication workflows.

-   **☁️ Deployment: Heroku**  
    Heroku is used as the cloud deployment platform for this application, offering a seamless and scalable environment to host Laravel-based projects. Its developer-friendly platform-as-a-service (PaaS) model enables fast Git-based deployments, making it ideal for rapid iteration and continuous integration workflows. With Heroku, developers can manage scaling through dynos, integrate various add-ons such as monitoring, databases, and caching, and enable automated SSL for secure access. Thanks to its simplicity and built-in support for Laravel, Heroku serves as a practical and efficient solution for deploying modern web applications like PharmaPoint+.
