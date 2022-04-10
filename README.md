# Porter
A platform to keep track of your notes and assignments. Prefect for your studies.

![image](https://user-images.githubusercontent.com/44119479/162631202-ac4057f1-5a92-44e2-9802-37bf91b6efc2.png)

## Description
During my studies I have had a hard time keeping all my notes, assignments, tasks and calendar in only one place. There is notion.so that gives those options, however, notion gives us to many options and I feel overwhelmed and end up customizing it instead of organizing my studies. So, instead of using someone else's application, why not build one myself.  

The goal is to have a home page with all the information needed and also make it look very minimalist and simple so it is not overwhelming. First, we can create different users with their own workspaces. I want to have the option to store all my notes that are related to different projects/courses/subjects. The note taking should be done in markup language and then transform it into plain web text. In the home page there should also be a list with all my deadlines, that are obviously also related to the different  projects/courses/subjects. I want to have a to-do list in which I can add tasks that I have to do throughout the day, they do not have to be related to anything, but it should be possible to do so. 

## Technologies
- Frontend: HTML, CSS (Bootstrap), JavaScript
- Backend: PHP, MySQL

## Usage
In a terminal, run:
```bash
docker-compose up
```

NGINX will now serve files in the app/public folder. Visit localhost in your browser to check.
PHPMyAdmin is accessible on localhost:8080

If you want to stop the containers, press Ctrl+C. 
Or run:
```bash
docker-compose down
```
