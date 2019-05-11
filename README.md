#IS601 Final Project - FAQ
Link to the project: https://nitikornmini3.herokuapp.com/

#To run the FAQ project:                                                                                                   
1. Git clone https://github.com/NitikornP/IS601-Final-Project.git
2. CD into FAQ and run composer install
3. Copy .env.example to .env file
4. Setup database / with sqlite or other ( https://laravel.com/docs/5.6/database)
5. Run php artisan key:generate and  php artisan migrate:refresh
 
#Epic#1
This feature allows users to edit only questions or answers they have created.
#User Story
1. As a user, I want to be the only person who can edit my question so that others won't be able to edit it.
2. As a user, I want to be the only person who can delete my question so that others won't be able to delete it.
3. As a user, I want to be the only person who can edit my answer so that others won't be able to edit it.
4. As a user, I want to be the only person who can delete my answer so that others won't be able to delete it.

#Epic#2
This feature allows users to view all questions, find their own questions, and search for particular ones.
#User Story  
1. As a user, I want to see all the questions with the name of the creators so that I know who posted them.
2. As a user, I want to see all the answers with the name of the creators so that I know who posted them.
3. As a user, I want to search for a particular question so that I can view the question I'm interested in and give my answer as I want.
4. As a user, I want to find only the questions I've created so that I can distinguish them from others.
5. As a user, I want to view the most recently created question first so that I can see which question is the most relevant.