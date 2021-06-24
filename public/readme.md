//////////////////
Roles: Guest(not logged in), User(logged in) and Admin(is_admin)
//////////////////

Property Posts:

    Admin can view all posts
    Admin can delete all posts
    Admin can edit/approve all posts 

V    User can create posts
V    User can view all/own posts
V    User can edit own posts
V    User can delete own posts

V    Guest can view all posts (without contact info)

User Profiles:

V   Admin can view all users 
V   Admin can delete all users
V   Admin can edit all users

V    User can create user profile
V    User can view own user profile
V    User can edit own user profile
V    User can delete own user profile

Contact User

    User can contact other User

//////////////////
TODO:
//////////////////


Authorization: user->id == auth::id. 
Policy of Gate? Guest may not visit profiles.

Admin Users view display num properties. 
Join?

Guest vs App Layout
User is logged in to show property, change

Style all class btn
btn m-4 bg-blue-500 text-white py-2 px-4 rounded shadow focus:bg-blue-300

Category filters

///////////////
Packages
///////////////

TinyMCE
Intervention Image
Tailwind Typography