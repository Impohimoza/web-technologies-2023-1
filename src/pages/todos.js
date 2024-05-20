import Auth from "../services/auth.js";
import location from "../services/location.js";
import loading from "../services/loading.js";
import Todo from "../services/todo.js";
import Form from "../components/form.js"
import TodoList from "../components/todo-list.js";

const init = async () => {
    const { ok: isLogged } = await Auth.me()

    if (!isLogged) {
        return location.login()
    } else {
        loading.stop();
    }

    const todoListEl = document.getElementById('todo-list');
    const todoList = new TodoList(todoListEl);

    const formEl = document.getElementById('todo-add-form');
    new Form(formEl, {
        'todo-text': (value) => {
            if (value.length < 1) {
                return 'Пустая задача';
            }

            return false;
        },
    }, (values) => {
        Todo.add(values['todo-text']).then((res) => {
            if(res) {
                todoList.todos.push(res.data);
                todoList.render();
            }
        });
    })
    // create POST /todo { description: string }
    // get get /todo/1 - 1 это id
    // getAll get /todo
    // update put /todo/1 - 1 это id { description: string }
    // delete delete /todo/1 - 1 это id
}

if (document.readyState === 'loading') {
    document.addEventListener("DOMContentLoaded", init)
} else {
    init()
}
