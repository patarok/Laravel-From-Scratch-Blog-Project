# Laravel From Scratch Blog Demo Project

http://laravelfromscratch.com

### Attention!!!

This project extends the like the original accomplished/completed project with a docker-compose setup.    

First clone this repository
```
git clone git@github.com:patarok/Laravel-From-Scratch-Blog-Project.git
```
  
  
## Docker-Compose

### 
It would be a good approach to first get the docker-compose environment running:    
```
docker compose up --build
```

  
  ## Installation

Then install the dependencies, and setup your .env file.

```
composer install
cp .env.example .env
```
you will have to refactor that most likely

Then create the necessary database.

```
php artisan db
create database blog
```

And run the initial migrations and seeders.

```
php artisan migrate --seed
```

## Auth
Not very sophisticated. You will manually have to insert 'username' from 'users' into 'admins'  
...as of now authorization to '/admin/posts'-access, works via Gate configuration.  
You may want/need to play around yourself a little bit.  
I am just delivering a cool boilerplate to learn Laravel 8 in a docker-compose environment  
you may use in real-life dev-life.


## Jeffrey Way on Further Ideas

Of course we only had time in the Laravel From Scratch series to review the essentials of a blogging platform. You can certainly take this many 
steps further. Here are some quick ideas that you might play with.

1. Add a `status` column to the posts table to allow for posts that are still in a "draft" state. Only when this status is changed to "published" should they show up in the blog feed. 
2. Update the "Edit Post" page in the admin section to allow for changing the author of a post.
3. Add an RSS feed that lists all posts in chronological order.
4. Record/Track and display the "views_count" for each post.
5. Allow registered users to "follow" certain authors. When they publish a new post, an email should be delivered to all followers.
6. Allow registered users to "bookmark" certain posts that they enjoyed. Then display their bookmarks in a corresponding settings page.
7. Add an account page to update your username and upload an avatar for your profile.


## Acknowledgements

Thanks to the following people and projects for inspiration, tooling, and support:

- **Laracasts** – THE platform to learn Laravel
- **Jeffrey Way** – original idea, actual original project
- **Oliver Buchmann** – delivered the docker-compose prefab, I beefed up here  

## NOTE
I installed some additional and interesting node packages I used in some projects back in the days.