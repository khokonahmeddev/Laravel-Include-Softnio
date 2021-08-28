## Author

Name : `Khorshed alam`
Email: `khokonahmed.8282@gmail.com`


## Use Case

## Note 

If you want to clone and use this project .To you
`composer install` and `.env`  

Create the database and remember these things for future usage
`Database Name`
`Username` `Password`

## Only module use

And if you want to use the module in any other project, you need to follow the command below 

# Modules name space 
`app\Modules`

## Provider Register

First, include the last line in the app.php provider with the help of config

`App\Modules\Softnio\Providers\SoftnioServiceProvider::class,`

## Config auth name space change

Change the model name space of the providers array in auth.php with the help of config

`'providers' => [
'users' => [
'driver' => 'eloquent',
'model' => App\Modules\Softnio\Models\User::class,
],`

# Css asset folder

For css, you need to copy the asset folder from the public folder. Let's include the asset folder in your project

## Vue js component register

Copy the js folder with the help of resources. Let's include in your project

## note

I could not use JQuery drop zone with vue js, so I had to install it in the drop zone by npm. JQuery's date picker
doesn't work with vue js, so the default date picker is used.

## package.json

` "dependencies": {
"vue2-dropzone": "^3.6.0"
}`,

## warning

There is no need for the default model migration of Laravel. Delete it to make your project last. Because these come with the help of modules

## Composer install
`composer install`

## Node js install
`npm install`

## Npm run 
`npm run dev`
of
`npm run watch`

## Database setup & email setup

`.env` file


## Note

My development server is Laravel Valet. The path of css and js may be a problem on your server
You can use the modules of this project

If Session store not set on request
Then you need to register the kernel 

Up to HandleCors
`protected $middleware = [
`\Illuminate\Session\Middleware\StartSession::class,`
]`

