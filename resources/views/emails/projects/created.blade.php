<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <style>
            * {
                font-family: sans-serif;
            }
        </style>
        <title>You have created a new project!</title>
    </head>
    <body>
        <header>
            <h1>New project created!</h1>
        </header>

        <main>
            <h2>{{ $project->title }}</h2>
            <h5>{{ $project->link }}</h5>
            <p>{{ $project->description }}</p>
        </main>
        
    </body>
</html>