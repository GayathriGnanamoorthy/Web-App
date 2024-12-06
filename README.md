# Web-App: Secure Live Chat Application  

This repository contains a live chat application designed with a focus on **real-time communication** and **robust security practices**. The application ensures safe and seamless user interaction through strong security mechanisms like **access control**, **authorization**, **session management**, **authentication**, **safe file uploads**, and **secure handling of client-side information**.  

## Features  

### Core Functionalities  
- **Real-Time Communication:** Enables instant messaging between authenticated users.  
- **Dynamic User Interaction:** Displays personalized content securely.  
- **File Uploads:** Users can share files with strong validation mechanisms.  

### Key Security Features  

#### 1. Access Control  
- **Session-Based Access Restrictions:** Redirects unauthorized users attempting to access restricted pages like `users.php` without a valid session.  
- **Input Validation for Signup/Login:** Ensures only authenticated users can proceed to the chat functionality.  

#### 2. Authentication & Authorization  
- **Form-Based Authentication:** Secures the login and registration process, validating credentials with server-side checks.  
- **Password Hashing:** Ensures passwords are stored securely using strong hashing algorithms like bcrypt.  
- **Role Management:** Assigns permissions based on user roles, safeguarding admin-level features.  

#### 3. Session Management  
- **Session Initialization:** Sessions are securely initialized upon user login and validated for every request.  
- **Automatic Session Timeout:** Limits session lifetime to mitigate risks associated with inactive or stale sessions.  

#### 4. Secure File Uploads  
- **File Type and Size Restriction:** Accepts only valid image formats (`png`, `jpeg`, `jpg`, `gif`) under specified size limits.  
- **Server-Side Validation:** All uploads are validated on the server to prevent malicious content.  

#### 5. User Input Handling  
- **Input Sanitization:** Prevents SQL injection and XSS by sanitizing user-provided data in forms.  
- **Error Feedback:** Displays clear error messages for invalid inputs without revealing sensitive server details.  

#### 6. Storing and Retrieving Client-Side Information  
- **Session Cookies:** Ensures session data is stored securely in cookies with `HttpOnly` and `Secure` flags.  
- **Minimal Client-Side Data:** Limits sensitive information stored in the client environment.  

#### 7. Dynamic Content Security  
- **Output Escaping:** Protects against template injection vulnerabilities by escaping dynamic content.  
- **Content Security Policy (CSP):** Mitigates XSS risks by restricting the execution of unauthorized scripts.  

## Installation  
Clone the repository:   
   git clone https://github.com/GayathriGnanamoorthy/Web-App.git  
