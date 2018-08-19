<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $u = new App\User;
        $u->name = "Fady Farid";
        $u->email = "hello@afady.com";
        $u->password = bcrypt('secret');
        $u->remember_token = str_random(10);
        $u->save();

        $p = new App\Post;
        $p->title = "Seed Post";
        $p->body = "Hello World!";
        $p->is_published = true;
        $p->user_id = $u->id;
        $p->save();

        $cat = new App\Category;
        $cat->title = "General";
        $cat->slug = "general";
        $cat->save();

        $p->categories()->attach($cat);

        $com = new App\Comment;
        $com->body = "First!";
        $com->post_id = $p->id;
        $com->user_id = $u->id;
        $com->save();

        $role_admin = new App\Role;
        $role_admin->title = "Admin";
        $role_admin->slug = "admin";
        $role_admin->level = 3;
        $role_admin->save();

        $role_manager = new App\Role;
        $role_manager->title = "Manager";
        $role_manager->slug = "manager";
        $role_manager->level = 2;
        $role_manager->save();

        $role_writer = new App\Role;
        $role_writer->title = "Writer";
        $role_writer->slug = "writer";
        $role_writer->level = 1;
        $role_writer->save();

        $u->roles()->attach($role_admin);
    }
}
