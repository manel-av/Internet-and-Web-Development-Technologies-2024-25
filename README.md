# Internet and Web Development Technologies - Swapealo Second-Hand Store

## About This Course
This hands-on course immersed me in full-stack web development by building "Swapealo," a second-hand e-commerce platform. Over six practical sessions, I implemented core web technologies including HTML5, CSS, JavaScript, PHP, and PostgreSQL while following MVC architecture principles.

## Project Overview
**Swapealo** is a sustainable marketplace for pre-owned goods with these key features:
- User registration/login with secure password hashing
- Product catalog with category filtering
- Shopping cart functionality
- Order processing system
- User profile management with image uploads

## Technical Implementation

### Core Technologies
- **Frontend**: Vanilla JavaScript with Fetch API for AJAX requests
- **Backend**: PHP 7.4 with PostgreSQL database
- **Security**: Parameterized queries, password hashing (bcrypt), input validation
- **Architecture**: MVC pattern with custom router

### Database Structure
*Five main tables: users, products, categories, orders, and order_lines*

### Key Features Developed

#### Session 1-2: Foundation
- Implemented basic access control with .htaccess
- Designed responsive layouts for product listings
- Created registration/login forms (non-functional initially)

#### Session 3: Dynamic Content
- AJAX-powered product listings using Fetch API
- Shopping cart system using PHP sessions
- User registration with password_hash()

#### Session 4: Security & Validation
- Client-side form validation with JavaScript
- Server-side input filtering (XSS prevention)
- Session-based authentication

#### Session 6: Final Features
- Order confirmation system
- User profile editing with image uploads
- Order history view

## Development Environment
- **Server**: Apache 2.4 on deic-docencia.uab.cat
- **Database**: PostgreSQL 13.7
- **Tools**: 
  - VS Code with PHP Intelephense
  - pgAdmin for database management

## Challenges & Solutions
1. **State Management**: Implemented PHP sessions for cart persistence
2. **Security**: Used parameterized queries to prevent SQL injection
3. **File Uploads**: Created secure image handling system with proper permissions
4. **AJAX Integration**: Developed RESTful endpoints for dynamic content

## Final Thoughts
Building Swapealo gave me practical experience in:
- Full-stack web development without frameworks
- Secure authentication implementation
- MVC architecture in practice
- Database design and optimization
