# ZIRCONIUM
Final year project for software development developed by Group 4.

1. Step 1 Pull the Zirconium Project
Pull the repository by using github desktop into your localhost(xampp) htdocs folder.

2. Step 2 Composer
Downloading Composer;
- "https://getcomposer.org/Composer-Setup.exe" Copy this link and run it on your local browser.
- Download the setup.exe and put it anywhere on your windows directory.
- Run the setup.exe
- Select "install for all users (recommended)"
- "Yes" to allow this app to make changes.
- On installation options, make sure developer mode is (UNCHECKED) then click next.
- Select "browse" to select your xampp (php.exe)

    SIDE NOTE
    Where to find php.exe?
    i.    Find the folder where you downloaded xampp with.
    ii.   Open from Xampp -> php folder.
    iii.  Select php.exe
    
- On proxy settings, make sure you leave everything and click next.
- Click Install.
- Click Next and Finish.

Next step is to enable your composer;
- Open command prompt (cmd)
- Direct it to your xampp folder.

    SIDE NOTE USING THE TERMINAL
    i.  Use cd command to nagivate
    ii.   "cd /" is to nagivate to root directory.
    iii.  "cd ~" to nagivate your home directory.
    iv.   "cd .." to nagivate up one directory level.
    v.    "cd -" to go back to previous directory.
    vi.   "dir" to see all the current files and folders in your current directory.

- Type "cd /"
- Make sure your xampp folder is in the correct drive! Ex: My xampp folder in in "D:" drive. Therefore i will type "D:".
- Once your directory looks like this Ex: "D:\Xampp"
- Type "composer" and enter
- If the output of composer is there then
- Type "cd htdocs" Your directory must look like this "D:\Xampp\htdocs"
- Type "cd ZIRCONIUM-main" Your directory must look like this "D:\Xampp\htdocs\ZIRCONIUM-main"
- Type "composer update" and wait till it updates

Now you have succesfully downloaded composer on your computer.

3. Step 3 Database
- Start Apache and MySQL on your xampp and click on admin for MySQL.
- Click on new on the left bar right below the "phpmyadmin" logo.
- Name the database "sdzirconium" and click create.
- Once created, click on sdzirconium database.
- Once click on the database, click import on middle top of the page.
- Select the file from the "sdzirconium.sql" sql file from Database folder in ZIRCONIUM.
- This is the directory: htdocs -> ZIRCONIUM -> Database -> sdzirconium.sql
- Click "go" button on the bottom-right of the page.
- If there's no tables, you may need to refresh the page.

4. Step 4 Running the website
- On a new tab, type "localhost".
- Now you should be running the website!

5. Step 5 Adding products to the website
- Click supplier login on the footer of the website
- Click super admin login
- The username "admin" and password is "admin"
- Click on Products on the left bar and click Add products.
- Enter all of the product details and the price should have a decimal "Ex:0.00"
- To select the images, please select from "ZIRCONIUM-main/superadmin/img/" from the directory.
- You also can add your images but please put it inside "ZIRCONIUM-main/superadmin/img/" from the directory.
- Click on save changes and there you go!

If there is any questions, please do not hesitate to contact me (Lito) at "+60 13-317-4100" or email me at "danielyusoff08@gmail.com".
