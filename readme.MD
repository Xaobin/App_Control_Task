## Authentication Web/EmailL/Session/Bootstrap

##### **Description**
##### Project to understand the package UI and authentication Web, native of Laravel, Email Send to user's verification

##### **Author:** 

**Installations**

##### 01) Laravel Project
        composer create-project --prefer-dist laravel/laravel App_control_task "8.5.9"
##### 02) Install nodeJs and NPM
##### 03) Install Laravel Ui:
        composer require laravel/ui:^3.2
##### 04) Ui Bootstrap:
        php artisan ui bootstrap --auth
        npm install
        npm run dev
##### 05) Make a Controller of project and a Model
        php artisan make:controller --resource TaskController --model:Task
##### 06) Configure email variables in .env, if you use Gmail, configure generate App password (Manage Account>Security>2 Steps verification>Active Passwords for App_Folder )
##### 07) Create a Template email with Markdown: folders: (App_Folder/resource/views/emails/message.blade.php) and (App_Folder/app/mail/MessageMail.php)
        php artisan make:mail MessageMail --markdown emails.message
##### 08) Create a set of views to customize the email template, folder: (App_Folder/resource/views/vendor/mail)
        php artisan vendor: publish (option 14)
##### 09) Continue creating the Notification Class to Reset Password, folder: (App_Folder/app/Notifications/)
        php artisan make:notification ResetPasswwordNotification
        php artisan make:notification VerifyEmailNotification
##### 10) Only the responsible user receives a new email. Folders: (/app/Mail/) and (Resource/views)
        php artisan make:mail NewTaskMail --markdown emails.new_task
##### 11) Other Commands to continue the application
        php artisan make:model Task.
        php artisan migrate.
        php artisan serve.
        php artisan create:migration create_tasks_table.
        php artisan make:migration create_tasks_table.
        php artisan make:migration alter_table_tasks_relation_users.
        php artisan migrate.
##### 12) Change the route home: in the (app/providers/RouteServiceProvider.php):
>  public const HOME = '/task';
##### 13) Install laravel excel and mpdf, installation site: [L I N K](https://docs.laravel-excel.com/3.1/getting-started/installation.html)
        php composer require maatwebsite/excel=^3.1.0 --ignore-platform-reqs
        php artisan vendor:publish --provider "maatwebsite\Excel\ExcelProvider" --tag=config
        php artisan make:export TaskExport --model=Task
        php composer require mpdf/mpdf=^8.0.10 --ignore-platform-reqs

##### 14) Copy the codes of [App_Task](https://github.com/Xaobin/App_Control_Task/tree/main/app_task).

#### List of importants files

* [MessageMail Controller](https://github.com/Xaobin/App_Control_Task/blob/main/app_task/app/Mail/MessageMail.php) - Was used to test the receive email
* [NewTaskMail Controller](https://github.com/Xaobin/App_Control_Task/blob/main/app_task/app/Mail/NewTaskMail.php) - Attention to methods: construct and build
* [Routes Web](https://github.com/Xaobin/App_Control_Task/blob/main/app_task/routes/web.php) - Routes Web in laravel framework, details os use with email routes
* _.env_ - Configuration file, ex: MAIL_PASWORD=****
* [Vendor Publish](https://github.com/Xaobin/App_Control_Task/tree/main/app_task/resources/views/vendor/mail) - Files Created after command vendor:publish
* [Reset Password Notification](https://github.com/Xaobin/App_Control_Task/blob/main/app_task/app/Notifications/ResetPasswordNotification.php) - Notification created - Attention to method: toMail
* [Verify Email Notification](https://github.com/Xaobin/App_Control_Task/blob/main/app_task/app/Notifications/VerifyEmailNotification.php) - Attention to methods: toMail,  buildMailMessage, verificationUrl, createUrlUsing, toMailUsing.
* [Reset Password Controller](https://github.com/Xaobin/App_Control_Task/blob/main/app_task/app/Http/Controllers/Auth/ResetPasswordController.php) - Atttention rules() method, validation
* [View of email verification](https://github.com/Xaobin/App_Control_Task/blob/main/app_task/resources/views/auth/verify.blade.php) - A view of verify
* [Migrations of task](https://github.com/Xaobin/App_Control_Task/tree/main/app_task/database/migrations) - Laravel migrations
* [View New_task with Markdown component](https://github.com/Xaobin/App_Control_Task/blob/main/app_task/resources/views/emails/new_task.blade.php) - Component in view with markdown
* [Route Service Provider](https://github.com/Xaobin/App_Control_Task/blob/main/app_task/app/Providers/RouteServiceProvider.php) - Attention to const HOME
* [View Index Task](https://github.com/Xaobin/App_Control_Task/blob/main/app_task/resources/views/task/index.blade.php) - Only a Main view of task, list all taks
* [View Create Task](https://github.com/Xaobin/App_Control_Task/blob/main/app_task/resources/views/task/create.blade.php) - A view to create task
* [View Edit Task](https://github.com/Xaobin/App_Control_Task/blob/main/app_task/resources/views/task/edit.blade.php) - A view to Edit task
* [View Show Task](https://github.com/Xaobin/App_Control_Task/blob/main/app_task/resources/views/task/show.blade.php) - A view to Show task
* [LAYOUT MAIN app.blade.php](https://github.com/Xaobin/App_Control_Task/blob/main/app_task/resources/views/layouts/app.blade.php) - Main Layout of App, will use the @guest ..@endguest or @auth..@endauth methods

#### Scaffolding of command: php artisan ui (Front_end) --auth (Laravel native command)

* Package.json - dependences js
* Routes/web.php - Routes added
* app/Http/controllers/Auth - Controllers of authenticate codes - [L i n k](https://github.com/Xaobin/App_Control_Task/tree/main/app_task/app/Http/Controllers/Auth)
* app/Model/User.php - Attention to Trait Notifiable and Methods: sendPasswordResetNotification and sendEmailVerificationNotification. $this->notify came of trait. [L i n k](https://github.com/Xaobin/App_Control_Task/blob/main/app_task/app/Models/User.php)
* public/css/app.css - [L i n k](https://github.com/Xaobin/App_Control_Task/blob/main/app_task/public/css/app.css)
* public/js/app.js - [L i n k](https://github.com/Xaobin/App_Control_Task/blob/main/app_task/public/css/app.js)
* Resource/views => [Home.blade.php](https://github.com/Xaobin/App_Control_Task/blob/main/app_task/resources/views/home.blade.php)
* Resource/views => [A u t h](https://github.com/Xaobin/App_Control_Task/tree/main/app_task/resources/views/auth)
* Resource/Views => [L a y o u t s](https://github.com/Xaobin/App_Control_Task/tree/main/app_task/resources/views/layouts)
* Resources/js/Bootstrap - Configurations, definitions, front end - [L i n k](https://github.com/Xaobin/App_Control_Task/blob/main/app_task/resources/js/bootstrap.js)

#### Table of Authentication's Flow

|HTML Method|Controller and Method|Route|Vendor/laravel/ui/auth-backend (Trait)|
|---|---|---|---|
|GET/LOGIN|LoginController@showLoginForm|auth.login|AutenticatedUsers|
|POST/LOGIN|LoginController@login|auth.login|AutenticatedUsers|
|GET/REGISTER|RegisterController@showRegistrationForm|auth.register|RegisterUsers|
|POST/REGISTER|RegisterController@register|auth.register|RegisterUsers|
|GET/HOME|HomeController@index|home|--------|

#### Flow to undertand Reset Password
![Flow of Laravel Framework!](https://images2.imgbox.com/a9/2f/tvJhEquf_o.png "Flow - Laravel Framework")

#### php artisan routes:list
![Flow of Laravel Framework!](https://images2.imgbox.com/ee/cb/r4owaiZE_o.png "Flow - Laravel Framework")
![Flow of Laravel Framework!](https://images2.imgbox.com/07/0c/g83gUq3G_o.png "Flow - Laravel Framework")

#### Useful Links

* Laravel Sending Email - TutorialsPoint - [L I N K](https://www.tutorialspoint.com/laravel/laravel_sending_email.htm#)
* Login And Registration Email Verification in Laravel 8 - OnLineWebTutor -  [L I N K](https://onlinewebtutorblog.com/login-and-registration-email-verification-in-laravel-8/)
* Laravel Mail: How to Send Emails Easily in Laravel - Iankumu -  [LI N K](https://www.iankumu.com/blog/laravel-send-emails/)
* Envio de Email no Laravel - EspeciaizaTI  - [L I N K](https://blog.especializati.com.br/envio-de-e-mails-no-laravel/)
* Como enviar emails com Gmail e Laravel - Laraveling -  [L I N K](https://laraveling.tech/como-enviar-emails-gmail-laravel/)
* Laravel 8 Authentication with Laravel UI - LaraInfo - [L I N K](https://larainfo.com/blogs/laravel-8-authentication-with-laravel-ui)
* Laravel UI Login Register Email Verification in Laravel 8 - OnlineWebTutor - [L I N K](https://onlinewebtutorblog.com/laravel-ui-login-register-email-verification-in-laravel-8/)







