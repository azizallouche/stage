
const all_status = document.querySelectorAll(".status");
let draggableTodo = null;
let vv = "";
let vvv="#";
let task1="no_status";
let task2="not_started";
let task3="in_progress";
let task4="completed";
let place = "";


function dragStart() {
  draggableTodo = this;
  setTimeout(() => {
    this.style.display = "none";
  }, 0);
  console.log("dragStart");
}

function dragEnd() {
  draggableTodo = null;
  setTimeout(() => {
    this.style.display = "block";
  }, 0);
  vv=JSON.stringify("#"+this.id);
  let c =vv.replace('\"', '');
  let str2 = c.substring(0, c.length - 1);
  let nom = str2.replace(/\d+/g, '')
  nom = nom.replace("#", '')
  if((nom == "no_status")&&(place == "not_started")) {
    not_started.append(this);
    let idd = str2.replace('#no_status', '');
    this.id = task2.concat(idd);

  }
  else if ((nom == "not_started")&&(place == "in_progress")){
    in_progress.append(this);
    let idd = str2.replace('#not_started', '');
    this.id = task3.concat(idd);

  }
  else if ((nom == "in_progress")&&(place == "completed")){
    completed.append(this);
    let idd = str2.replace('#in_progress', '');
    this.id = task4.concat(idd);

  }
}

all_status.forEach((status) => {
  status.addEventListener("dragover", dragOver);
  status.addEventListener("dragenter", dragEnter);
  status.addEventListener("dragleave", dragLeave);
  status.addEventListener("drop", dragDrop);
});

function dragOver(e) {
  e.preventDefault();

  //   console.log("dragOver");
}

function dragEnter() {
  this.style.border = "1px dashed #ccc";
  // console.log(this);
}

function dragLeave() {
  this.style.border = "none";
  //vv=JSON.stringify("#"+(not_started.getElementsByClassName("todo")[not_started.getElementsByClassName("todo").length -1])["id"]);

  console.log('leave');

  }
function drag1(vv){

  not_started.append(vv);
}
function dragDrop() {
  this.style.border = "none";
 place=JSON.stringify(this.id);
  place =place.replace('\"', '');
  place = place.substring(0, place.length - 1);
 console.log(place);
}

/* modal */
const btns = document.querySelectorAll("[data-target-modal]");
const close_modals = document.querySelectorAll(".close-modal");
const overlay = document.getElementById("overlay");

btns.forEach((btn) => {
  btn.addEventListener("click", () => {
    document.querySelector(btn.dataset.targetModal).classList.add("active");
    overlay.classList.add("active");
  });
});

close_modals.forEach((btn) => {
  btn.addEventListener("click", () => {
    const modal = btn.closest(".modal");
    modal.classList.remove("active");
    overlay.classList.remove("active");
  });
});

window.onclick = (event) => {
  if (event.target == overlay) {
    const modals = document.querySelectorAll(".modal");
    modals.forEach((modal) => modal.classList.remove("active"));
    overlay.classList.remove("active");
  }
};

/* create todo  */
const todo_submit = document.getElementById("todo_submit");

todo_submit.addEventListener("click", createTodo);

function createTodo() {
  const todo_div = document.createElement("div");
  const input_val = document.getElementById("todo_input").value;
  const txt = document.createTextNode(input_val);

  todo_div.appendChild(txt);
  todo_div.classList.add("todo");
  todo_div.setAttribute("draggable", "true");

  /* create span */
  const span = document.createElement("span");
  const span_txt = document.createTextNode("\u00D7");
  span.classList.add("close");
  span.appendChild(span_txt);

  todo_div.appendChild(span);

  no_status.appendChild(todo_div);

  span.addEventListener("click", () => {
    span.parentElement.style.display = "none";
  });
  //   console.log(todo_div);

  todo_div.addEventListener("dragstart", dragStart);
  todo_div.addEventListener("dragend", dragEnd);

  document.getElementById("todo_input").value = "";
  todo_form.classList.remove("active");
  overlay.classList.remove("active");
}

const close_btns = document.querySelectorAll(".close");

close_btns.forEach((btn) => {
  btn.addEventListener("click", () => {
    btn.parentElement.style.display = "none";
  });
});

window.onscroll = function() {myFunction()};

var navbar = document.getElementById("site-header");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
function drop(vv)
{
  not_started.appendChild(vv);
}