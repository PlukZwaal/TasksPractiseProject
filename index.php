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
            <div class="taskErrors">
                <p id="inputTaskError"></p>
            </div>
            <div id="tasks" class="tasks">
            </div>
            <div class="clearAllTasks">
                <button id="clearAllTasksButton">Clear All Tasks</button>
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
    storedTasksCount = 0;
    const storedTasks = JSON.parse(localStorage.getItem('tasks'));
    storedTasks.forEach(function (item, index) {
        tasks.push(item)
        document.getElementById('tasks')
            .innerHTML += `
            <div class="task">
                <p>${item}</p>
                <button id="removeTaskButton-${storedTasksCount}" class="fa fa-trash-o"></button>
            </div>
            `;
        storedTasksCount++;
    });
    if(storedTasksCount < 1){
        document.getElementById("clearAllTasksButton").style.display = "none";
    }
    document.getElementById('addTaskButton')
        .addEventListener('click', function(e){
            var inputTaskValue = document.getElementById("inputTask").value;
            if(inputTaskValue.length < 1){
                document.getElementById("inputTaskError").innerHTML = "The task can not be empty!";
            } else {
                tasks.push(inputTaskValue)
                localStorage.setItem('tasks', JSON.stringify(tasks));
                document.getElementById('tasks')
                    .innerHTML += `
                    <div class="task">
                        <p>${inputTaskValue}</p>
                        <button class="fa fa-trash-o"></button>
                    </div>
                    `;  
                location.reload();   
                if(document.getElementById("clearAllTasksButton").style.display == "none"){
                    document.getElementById("clearAllTasksButton").style.display = "block";
                }
            }
        });
    document.getElementById('clearAllTasksButton')
    .addEventListener('click', function(e){
        localStorage.clear();
        location.reload();
    });
    for(let i = 0; i < storedTasksCount; i++){
            document.getElementById('removeTaskButton-' + i)
                .addEventListener('click', function(e){
                    console.log(i);
                    tasks.splice(i, 1);
                    localStorage.setItem('tasks', JSON.stringify(tasks));
                    location.reload();
                })
        }
    console.log(tasks)
</script>