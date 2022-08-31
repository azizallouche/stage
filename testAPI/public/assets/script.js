

const all_status = document.querySelectorAll(".status");
let draggableTodo = null;
let vv = "";
let vvv="#";
let task1="no_status";
let task2="not_started";
let task3="in_progress";
let task4="completed";
let place = "";
let prevv = [];
let block= null;

function dragStart() {
  draggableTodo = this;
  setTimeout(() => {
    this.style.display = "none";
  }, 0);
  console.log(ss);
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
  console.log(nom);

  if((nom == "no_status")&&(place == "not_started")) {
   let idd = str2.replace('#no_status', '');
    ////////////////////////////////////////////////////////////////////////
    swal("How much time will take you to finish this task:", {
      content: "input",
    })
        .then((value) => {
          this.style.visibility="visible";
          not_started.append(this);
          swal(`you set it up to: ${value}h`);
          let data = {size:parseInt(value)}
          $.ajax({
            type: 'PUT',
            url: "http://127.0.0.1:8000/api/ticketfrees/"+idd,
            contentType: 'application/json',
            data: JSON.stringify(data), // access in body
          });


          /* Ajax est lancé lors du remplissage du champ texte dont l’id est « search » pour faire la recherche */
          $.ajax({
            /* l’url est une chaine de caractères contenant l’adresse où la requête est envoyée */
            'async': false,
            'global': false,
            'url': "http://127.0.0.1:8000/api/ticketfrees",

            'dataType': "json",
            /*Cette fonction permet de vider le contenu du tableau pour recevoir le nouveau contenu*/
            'success' : function(retour){
              if(retour){
                $('#not_started').empty();
                $('#no_status').empty();
                $('#in_progress').empty();
                $('#completed').empty();
                $('#not_started').append("<h2 style=\"margin-bottom:30px;color: #3d5af1; \">&nbsp;&nbsp;Not Started</h2>");
                $('#no_status').append("<h2 style=\"margin-bottom:30px;color: #3d5af1; \">&nbsp;&nbsp;&nbsp;&nbsp;No Status</h2>");
                $('#in_progress').append("<h2 style=\"margin-bottom:30px;color: #3d5af1; \">&nbsp;&nbsp;In Progress</h2>");
                $('#completed').append("<h2 style=\"margin-bottom:30px;color: #3d5af1; \">&nbsp;&nbsp;Completed</h2>");
                var role = "" ;

                $.ajax({
                  /* l’url est une chaine de caractères contenant l’adresse où la requête est envoyée */
                  'async': false,
                  'global': false,
                  'url': "http://127.0.0.1:8000/api/users?email="+document.getElementById("ses").textContent,

                  'dataType': "json",
                  /*Cette fonction permet de vider le contenu du tableau pour recevoir le nouveau contenu*/
                  'success' : function(retour){
                    if(retour){
                      $.each(retour, function(i, obj) {
                        if (obj.roles[0] == "ROLE_ADMIN")
                        {role = "admin" ;}
                      });
                    }

                    else
                    {

                    }
                  },
                });
                if (role == "admin")
                {
                  $("#no_status").append("<button id=\"create-user\" class=\"b\">Add task</button>");       }

                $.each(retour, function(i, obj) {


                  console.log(retour);

                  if(obj.state == "no_status") {
                    $('#no_status').append("<div class=\"todo\" id =\"no_status" + obj.idTicket + "\" onclick=\"affiche("+obj.idTicket+")\" draggable=\"true\" > <div class=\"card mb-5 mb-lg-0\" > <div  class=\"aa\"> <ul style=\"list-style-type: none;\"> <li class=\"name\" ><strong>&nbsp;&nbsp;" + obj.feature + "</strong></li> <li class=\"name1\">Assigned By <strong>" + obj.assignedBy + "</strong></li> </ul> </div> </div> </div>");
                  }
                  else if (obj.state == "not_started"){
                    $('#not_started').append("<div class=\"todo\" id =\"not_started" + obj.idTicket + "\" onclick=\"affiche("+obj.idTicket+")\" draggable=\"true\" > <div class=\"card mb-5 mb-lg-0\" > <div  class=\"aa\"> <ul style=\"list-style-type: none;\"> <li class=\"name\" ><strong style=\"font-size: 18px;\">&nbsp;&nbsp;" + obj.feature + "</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong style=\"font-size: 14px;\" >"+obj.size+"h </strong></li> <li class=\"name1\">Assigned By <strong>" + obj.assignedBy + "</strong></li> </ul> </div> </div> </div>");
                  }
                  else if (obj.state == "in_progress"){
                    $('#in_progress').append("<div class=\"todo\" id =\"in_progress" + obj.idTicket + "\" onclick=\"affiche("+obj.idTicket+")\" draggable=\"true\" > <div class=\"card mb-5 mb-lg-0\" > <div  class=\"aa\"> <ul style=\"list-style-type: none;\"> <li class=\"name\" ><strong>&nbsp;&nbsp;" + obj.feature + "</strong></li> <li class=\"name1\">Assigned By <strong>" + obj.assignedBy + "</strong></li> </ul> </div> </div> </div>");
                  }
                  else if (obj.state == "completed"){
                    $('#completed').append("<div class=\"todo\" id =\"completed" + obj.idTicket + "\" onclick=\"affiche("+obj.idTicket+")\" draggable=\"true\" > <div class=\"card mb-5 mb-lg-0\" > <div  class=\"aa\"> <ul style=\"list-style-type: none;\"> <li class=\"name\" ><strong>&nbsp;&nbsp;" + obj.feature + "</strong></li> <li class=\"name1\">Assigned By <strong>" + obj.assignedBy + "</strong></li> </ul> </div> </div> </div>");
                  }
                });
                const todos = document.querySelectorAll(".todo");
                todos.forEach((todo) => {
                  todo.addEventListener("dragstart", dragStart);
                  todo.addEventListener("dragend", dragEnd);
                });}
              //$('#t tbody#search').append('<tr><td> '+obj.lieu+'  </td><td>    '+obj.nbPlace+'  </td><td>'+obj.descriptions+' </td><td>'+obj.dateEvent+' </td><td>'+obj.getcategory+' </td><td>'+obj.Description+'</td><td><td><a href="event/'+obj.idEvent+'/edit">Modifier</a></td></tr>');
              else
              {

              }
            },
          });


        });
    ////////////////////////////////////////////////////////////////////////

    this.style.visibility="visible";
    not_started.append(this);


    prevv.push(nom+idd);
    this.id = task2.concat(idd);
    let data = {state:"not_started"}
    console.log("http://127.0.0.1:8000/api/ticketfrees/"+idd);
    $.ajax({
      type: 'PUT',
      url: "http://127.0.0.1:8000/api/ticketfrees/"+idd,
      contentType: 'application/json',
      data: JSON.stringify(data), // access in body
    });

  }
  else if ((nom == "not_started")&&(place == "in_progress")){
    in_progress.append(this);
    let idd = str2.replace('#not_started', '');
    prevv.push(nom+idd);
    this.id = task3.concat(idd);
    let data = {state:"in_progress"}

    $.ajax({
      type: 'PUT',
      url: "http://127.0.0.1:8000/api/ticketfrees/"+idd,
      contentType: 'application/json',
      data: JSON.stringify(data), // access in body
    });
  }
  else if ((nom == "in_progress")&&(place == "completed")){
    completed.append(this);
    let idd = str2.replace('#in_progress', '');
    prevv.push(nom+idd);
    this.id = task4.concat(idd);
    let data = {state:"completed"}
    console.log("http://127.0.0.1:8000/api/ticketfrees/"+idd);
    $.ajax({
      type: 'PUT',
      url: "http://127.0.0.1:8000/api/ticketfrees/"+idd,
      contentType: 'application/json',
      data: JSON.stringify(data), // access in body
    });
  }
  console.log(prevv);
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
  console.log(dict);
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
function funcreturn()
{
  let pre = prevv[prevv.length -1];
  let newpre = pre.substr(-1);
  let placee = pre.replace(newpre, '');
  let popp =prevv.pop();

  if((placee == "no_status")) {
    block= document.getElementById("not_started"+newpre);

    no_status.append(block);
 let data = {state:"no_status"}
$.ajax({
      type: 'PUT',
      url: "http://127.0.0.1:8000/api/ticketfrees/"+newpre,
      contentType: 'application/json',
      data: JSON.stringify(data), // access in body
    });
}
  else if ((placee == "not_started")){
    block= document.getElementById("in_progress"+newpre);
    not_started.append(block);
    let data = {state:"not_started"}
    $.ajax({
      type: 'PUT',
      url: "http://127.0.0.1:8000/api/ticketfrees/"+newpre,
      contentType: 'application/json',
      data: JSON.stringify(data), // access in body
    });
  }
  else if ((placee == "in_progress")){
    block= document.getElementById("completed"+newpre);
    in_progress.append(block);
    let data = {state:"in_progress"}
    $.ajax({
      type: 'PUT',
      url: "http://127.0.0.1:8000/api/ticketfrees/"+newpre,
      contentType: 'application/json',
      data: JSON.stringify(data),
    });
  }
}