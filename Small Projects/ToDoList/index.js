const ul = document.querySelector("ul");
const form = document.querySelector("form");
const input = document.querySelector("form > input");

form.addEventListener("submit", (event) => {
  event.preventDefault();
  const value = input.value;
  input.value = "";
  addTodo(value);
});

const todos = [
  {
    text: "je suis une todo",
    done: false,
    editMode: false,
  },
  {
    text: "faire du javascript",
    done: true,
    editMode: false,
  },
];

const displayTodo = () => {
  const todosNode = todos.map((todo, index) => {
    if (todo.editMode) {
      return createTodoEditElement(todo, index);
    } else {
      return createTodoElement(todo, index);
    }
  });

  ul.innerHTML = ``;
  ul.append(...todosNode);
};

function createTodoElement(todo, index) {
  const li = document.createElement("li"); // ajoute qqchose dans html ? (non cree juste l'elemt)
  //
  const buttonDelete = document.createElement("button");
  buttonDelete.innerHTML = "Supprimer"; // textContent ca marche
  //
  const buttonEdit = document.createElement("button");
  buttonEdit.innerHTML = "Editer"; // textContent ca marche
  //

  buttonDelete.addEventListener("click", (event) => {
    deleteTodo(index);
    event.stopPropagation();
  });

  buttonEdit.addEventListener("click", (event) => {
    event.stopPropagation();
    toggleEditMode(index);
  });

  li.innerHTML = `
    <span class="todo ${todo.done ? "done" : ""}"></span>
    <p>${todo.text}</p>
    `;

  li.addEventListener("click", (event) => {
    toggleTodo(index);
    event.stopPropagation();
  });

  li.append(buttonEdit, buttonDelete);

  return li; // pourquoi return li (car li def dans fct dc var loc)
}

const createTodoEditElement = (todo, index) => {
  const li = document.createElement("li");
  //
  const input = document.createElement("input"); // pas en conflit avec l'autre var input car loc dans fct
  input.type = "text";
  input.value = todo.text;
  //
  const buttonSave = document.createElement("button");
  buttonSave.innerHTML = "Sauver";
  //
  const buttonCancel = document.createElement("button");
  buttonCancel.innerHTML = "Annuler";
  buttonCancel.addEventListener("click", (event) => {
    event.stopPropagation();
    toggleEditMode(index);
  });
  //
  buttonSave.addEventListener("click", (event) => {
    editTodo(index, input);
  });
  //
  li.append(input, buttonSave, buttonCancel);
  return li;
};

const addTodo = (text) => {
  todos.push({
    text: text,
    done: false,
  });
  displayTodo();
};

const deleteTodo = (index) => {
  todos.splice(index, 1);
  displayTodo();
};

const toggleTodo = (index) => {
  todos[index].done = !todos[index].done;
  displayTodo();
};

const toggleEditMode = (index) => {
  todos[index].editMode = !todos[index].editMode;
  displayTodo();
};

const editTodo = (index, input) => {
  const value = input.value;
  todos[index].text = value;
  todos[index].editMode = false;
  displayTodo();
};

displayTodo(); // sinon se declenche qu'apres le 1er envoi de todo
