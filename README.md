#### HELPDESK TICKETING SYSTEM ####


#### Objective - Idea
1. Create a new ticket - User
2. Reply on ticket - Admin
3. Reject or Resolve ticket - Admin
4. Email(SMTP) *yopmail notification when admin update ticket - User
5. Give ticket title & description - User
6. Upload a attachment - User 



#### Table Structure
1. Tickets
 - title (string) {required}
 - description (text) {required}
 - status (open{default}, resolved, rejected)
 - attachment (string) {nullable}
 - user_id (int) {required} filled by laravel/ backend
 - status_changed_by_id (int) {nullable}

2. Replies
 - body (text) {required}
 - user_id (int) {required} filled by laravel/ backend
 - ticket_id (int) {required} filled by laravel/ backend   


 // fetch all users
    // $users = DB::select("select * from users");
    // $users = DB::table('users')->where('id', 1)->first();
    // $users = User::find(18);

    // create new users

    //FACADE
    // $users = DB::insert('insert into users(name, email, password) values (?,?,?)',[
    //     'Mail',
    //     'mail1@gmail.com',
    //     'password'
    // ]);

    //QUERY BUILDER
    // $user = DB::table('users')->insert([
    //     'name' => 'Ayem',
    //     'email' => 'mail7@gmail.com',
    //     'password' => 'password'
    // ]);

    // ELOQUENT ORM
    // $user = User::create([
    //     'name' => 'Ayemi',
    //     'email' => 'mail9@gmail.com',
    //     'password' => 'password',
    // ]);

    // update user

    //FACADE
    // $user = DB::update("update users set email=? where id=?", ['ayem@d,.com ','2']);

    //QUERY BUILDER
    // $user = DB::table('users')->where('name','Ayem')->update(['name'=>'where']);

    // ELOQUENT ORM
    // $user = User::find(6);
    // $user->update([
    //     'name' => 'Ahhyummiii..',
    // ]);

    // delete a user

    //FACADE
    // $user = DB::delete("delete from users where id=?", ['2']);

    //QUERY BUILDER
    // $user = DB::table('users')->where('name','where')->delete();

    // ELOQUENT ORM
    // $user = User::find(1);
    // $user->delete();

    // DUMP&DIE
    // dd($users->name);