<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
    <title>Tasks</title>
</head>
<body>
    <header>
    </header>
    <main>
        <div class="wrapper">
            <div class="addTask">
                <input id="inputTask" type="text" placeholder="type here the task">
                <button id="addTaskButton">ADD</button>
            </div>
            <div id="tasks" class="tasks">
            </div>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>

<script>
    const tasks = [];
    if(JSON.parse(localStorage.getItem('tasks')) == null){
        localStorage.setItem('tasks', JSON.stringify(tasks))
    }
    const storedTasks = JSON.parse(localStorage.getItem('tasks'))
    storedTasks.forEach(function (item, index) {
        tasks.push(item)
        document.getElementById('tasks')
            .innerHTML += `
            <div class="task">
                <p>${item}</p>
                <button class="fa fa-trash-o"></button>
            </div>
            `;
    });

    document.getElementById('addTaskButton')
        .addEventListener('click', function(e){
            var inputTaskValue = document.getElementById("inputTask").value;
            tasks.push(inputTaskValue)
            localStorage.setItem('tasks', JSON.stringify(tasks));
            document.getElementById('tasks')
                .innerHTML += `
                <div class="task">
                    <p>${inputTaskValue}</p>
                    <button class="fa fa-trash-o"></button>
                </div>
                `;
        });

</script>