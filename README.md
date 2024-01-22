## About Mail Modifier

Mail Modifier uses a custom middleware to check if a composed Email Body contains any html tags or not and updates the Email body with our provided mail template:

- [Custom Middleware to intercept and change Email body](app/Http/Middleware/ModifyEmailBody.php).
- [Use / endpoint to open form](http://127.0.0.1:8000/mail).
- **Laravel mailing & Mailtrap for sending mails**.

### Mailtrap Account Creds

- **MAIL_MAILER=smtp**
- **MAIL_HOST=sandbox.smtp.mailtrap.io**
- **MAIL_PORT=2525**
- **MAIL_USERNAME=17b1c99c813c05**
- **MAIL_PASSWORD=1260bec19afdd1**
- **MAIL_ENCRYPTION=null**
- **MAIL_FROM_ADDRESS="testuser@gmail.com"**
- **MAIL_FROM_NAME="${APP_NAME}"**