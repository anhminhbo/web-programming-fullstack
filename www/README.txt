# web-programming-fullstack demo video link: https://youtu.be/yMKzBmlOCuE
# Github url: https://github.com/anhminhbo/web-programming-fullstack
Web Programming Fullstack Pomodoro Music

#Contribution
Nguyễn Cường Anh Minh s3931605: 30%
Nguyễn Nguyên Khương s3924577: 30%
Nguyễn Thái Kỳ Anh s3914486: 25%
Trương Hoàng Tuấn Kiệt s3926873: 15%

# User account
email: nca.minh8897@gmail.com
pass: Anh123

email: 12@gmail.com
pass: Anh123

# Admin Account 
email: admin@rmit.edu.vn
password: admin
or access directly via: http://127.0.0.1:{portNumber}/www/admin/admin-index.php?page=1

# Step to start the application
- On the terminal of the root folder, type this php -S 127.0.0.1:5000
- Access the http://127.0.0.1:5000/www/register/register.php to register a user account and follow the step through login and test user site.
- Access: http://127.0.0.1:5000/www/admin/login/adminloginpage.php and type in Admin account provided above to start testing the admin site.

# DB description
# User Account
accounts.db: outside document root
[0]: email
[1]: password
[2]: first name
[3]: last name
[4]: created at

# Profile img
profilePicture.db: inside profileImgRepo folder
[0]: email
[1]: profile img name

# Upload img
uploadImgRepo.db: inside uploadImgRepo folder
[0]: email
[1]: upload img name
[2]: description
[3]: sharing level 
 - 1: Public
 - 2: Internal
 - 3: Private
 
[4]: created at
[5]: first name
[6]: last name
