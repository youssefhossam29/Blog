# Blog Website Repository

Welcome to the repository for our **Blog Website**! This platform is a dynamic and diverse online space where we share captivating stories, insightful articles, and valuable resources across a wide range of topics. From technology and lifestyle to travel and wellness, our blog covers it all.

## Getting Started

To get started with the **Blog Website**, follow these steps:

1. **Clone the Repository:**
   ```bash
   git clone https://github.com/username/blog-website.git
   ```

2. **Install Composer Dependencies:**
   ```bash
   composer install
   ```

3. **Set Up the Environment File:**
   - Duplicate the `.env.example` file:
     ```bash
     cp .env.example .env
     ```
   - Generate the application key:
     ```bash
     php artisan key:generate
     ```

4. **Configure the Database:**
   - Create a new database and update the `.env` file with its name (line 14).

5. **Run Database Migrations:**
   ```bash
   php artisan migrate
   ```

6. **Seed the Database:**
   - Populate the database with dummy data by running:
     ```bash
     php artisan db:seed --class=DataSeeder
     ```

7. **Serve the Application:**
   ```bash
   php artisan serve
   ```

### Admin Login Credentials

To log in as an admin, use the following credentials:

- **Email:** `admin1@gmail.com`
- **Password:** `123456`

## Explore the Codebase

Feel free to explore the codebase to gain a deeper understanding of how our blog website is built and configured. Contributions and feedback are always welcome.

Thank you for your interest in the **Blog Website**! We look forward to building and growing our blog community together.

**Happy Blogging!**

---

This version offers a polished, professional tone while retaining all essential details and instructions.
