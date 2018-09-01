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
        $role_admin->title = config('roles.ADMIN.title');
        $role_admin->slug = config('roles.ADMIN.slug');
        $role_admin->level = config('roles.ADMIN.level');
        $role_admin->save();

        $role_manager = new App\Role;
        $role_manager->title = config('roles.MANAGER.title');
        $role_manager->slug = config('roles.MANAGER.slug');
        $role_manager->level = config('roles.MANAGER.level');
        $role_manager->save();

        $role_writer = new App\Role;
        $role_writer->title = config('roles.WRITER.title');
        $role_writer->slug = config('roles.WRITER.slug');
        $role_writer->level = config('roles.WRITER.level');
        $role_writer->save();

        $u->roles()->attach($role_admin);
    }
}
