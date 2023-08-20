function addNotes() {
        var title = document.getElementById("title").value;
        var note = document.getElementById("note").value;
        var user_id = document.getElementById("user_id").value;
 
        var ajax = new XMLHttpRequest();
        ajax.open("POST", "includes/functions.php?addNote", true);
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        ajax.send("title=" + title + "&note=" + note + "&user_id=" + user_id);
 
        ajax.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
				refreshNotes();
                loadNotes();
            }
        };
 
        return false;
    }


 function loadNotes() {
        var ajax = new XMLHttpRequest();
        ajax.open("GET", "includes/functions.php?loadNote", true);
        ajax.send();
        
        ajax.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var data = JSON.parse(this.responseText);
        
                var html = "";
                for (var a = 0; a < data.length; a++) {
                    var id = data[a].id;
        
                        html += " <div class='card p-3 mb-2'><p><b>" + data[a].title + "</b>";
					html += "<br><span>" + data[a].note + "</span></p>";
					html += " <div><span id='post-date' class='text-secondary badge badge-secondary text-light float-left'><small>" 
					+ data[a].date_created + "</small></span>";
					html += "<button type='button' class='badge text-light bg-danger float-right' onclick='deleteNote("+data[a].id+", "+data[a].user_id+")'>Delete</button></div></div>";
        
                }
        
                document.getElementById("data").innerHTML += html;
            }
        };
        }

function refreshNotes() {
	var html = "";
	document.getElementById("data").innerHTML = html;
}        

function viewNotes(){
        var ajax = new XMLHttpRequest();
    ajax.open("GET", "includes/functions.php?viewNote", true);
    ajax.send();

    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);

            var html = "";
            for (var a = 0; a < data.length; a++) {
                var id = data[a].id;

                    html += " <div class='card p-3 mb-2'><p><b>" + data[a].title + "</b>";
					html += "<br><span>" + data[a].note + "</span></p>";
					html += " <div><span id='post-date' class='text-secondary badge badge-secondary text-light float-left'><small>" 
					+ data[a].date_created + "</small></span>";
					html += "<button type='button' class='badge text-light bg-danger float-right' onclick='deleteNote("+data[a].id+", "+data[a].user_id+")'>Delete</button></div></div>";

            }

            document.getElementById("data").innerHTML += html;
        }
    };
    }
	
function deleteNote(id, user_id) {
	var ajax = new XMLHttpRequest();
	ajax.open("POST", "includes/functions.php?deleteNote");
	ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajax.send("id=" + id + "&user_id=" + user_id);
	
	ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
			refreshNotes();
			loadNotes();
        }
    };
	
	
}


function addProject() {
    
        var project_type = document.getElementById("project_type").value;
        var project_name = document.getElementById("project_name").value;
        var client_name = document.getElementById("client_name").value;
        var client_contact = document.getElementById("client_contact").value;
        var location = document.getElementById("location").value;
        var cost = document.getElementById("cost").value;
        var start_date = document.getElementById("start_date").value;
        var end_date = document.getElementById("end_date").value;
        var team_assigned = document.getElementById("team_assigned").value;
        var added_by = document.getElementById("added_by").value;

        var ajax = new XMLHttpRequest();
        ajax.open("POST", "includes/functions.php?addProject", true);
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        ajax.send("project_type=" + project_type + "&project_name=" + project_name + "&client_name=" + client_name
        + "&client_contact=" + client_contact + "&location=" + location + "&cost=" + cost + "&start_date=" + start_date
        + "&end_date=" + end_date + "&team_assigned=" + team_assigned + "&added_by=" + added_by);
 
        ajax.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
            }

        };
        //$('#addProjectModal').modal('hide');
        $('.modal-backdrop').remove();
        location.reload();
    
        return false;
    }


function addEmployee() {
    
        var firstname = document.getElementById("firstname").value;
        var lastname = document.getElementById("lastname").value;
        var middlename = document.getElementById("middlename").value;
        var birthday = document.getElementById("birthday").value;
        var address = document.getElementById("address").value;
        var marital_status = document.getElementById("marital_status").value;
        var position = document.getElementById("position").value;
        var team_assigned = document.getElementById("team_assigned3").value;
        var hired_date  = document.getElementById("hired_date").value;
        var added_by = document.getElementById("added_by").value;

        var ajax = new XMLHttpRequest();
        ajax.open("POST", "includes/functions.php?addEmployee", true);
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        ajax.send("firstname=" + firstname + "&middlename=" + middlename + "&lastname=" + lastname
        + "&birthday=" + birthday + "&address=" + address + "&marital_status=" + marital_status + "&position=" + position
        + "&team_assigned=" + team_assigned + "&hired_date=" + hired_date + "&added_by=" + added_by);
 
        ajax.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
            }

        };
        $ ("#addEmployeeModal").modal ("hide"); 
        location.reload();
    
        return false;
    }

function addMaterials(){
    var name = document.getElementById("name").value;
    var brand = document.getElementById("brand").value;
    var unit = document.getElementById("unit").value;
    var quantity = document.getElementById("quantity").value;
    var added_by = document.getElementById("added_by").value;
    var subproject_id = document.getElementById("subproject_id").value;

    var ajax = new XMLHttpRequest();
    ajax.open("POST", "includes/functions.php?addMaterials", true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send("name=" + name + "&subproject_id=" + subproject_id + "&brand=" + brand
    + "&unit=" + unit + "&quantity=" + quantity + "&added_by=" + added_by);

    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
        }

    };
    //$('#addProjectModal').modal('hide');
    $ ("#addMaterialModal").modal ("hide"); 
    location.reload();
    return false;
}

function editMaterials(){
    var name = document.getElementById("name1").value;
    var brand = document.getElementById("brand1").value;
    var unit = document.getElementById("unit1").value;
    var quantity = document.getElementById("quantity1").value;
    var id = document.getElementById("id1").value;

    var ajax = new XMLHttpRequest();
    ajax.open("POST", "includes/functions.php?editMaterials", true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send("id=" + id + "&name=" + name + "&brand=" + brand
    + "&unit=" + unit + "&quantity=" + quantity);

    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
        }

    };
    //$('#addProjectModal').modal('hide');
    $ ("#editMaterialModal").modal ("hide"); 
    location.reload();
    return false;
}

function loadProject(){
    var ajax = new XMLHttpRequest();
    ajax.open("GET", "includes/functions.php?loadProject", true);
    ajax.send();
 
    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var project = JSON.parse(this.responseText);
            
            var html = "";
            for (var a = 0; a < project.length; a++) {
                var id = project[a].id;
                var status = project[a].status;
                html += "<tr>";
                html += "<td>" + project[a].project_type + "</td>";
                html += "<td>" + project[a].project_name + "</td>";
                html += "<td>" + project[a].start_date + "</td>";
                html += "<td>" + project[a].end_date + "</td>";
                if(status=="Active")
                {
                    html += "<td><span class='badge badge-success badge-sm'>" + project[a].status + "</span></td>";  
                }
                else{
                    html += "<td><span class='badge badge-danger badge-sm'>" + project[a].status + "</span></td>";
                }
                html += "<td><button id='todo-btn' class='btn btn-sm btn-outline-dark' href='#viewProjectModal' role='button' data-bs-toggle='modal'><i class='fas fa-search'></i> View Project</button></td>";
                html += "</tr>";
            }
            
          
        }
    };

}





function viewSubProject(project_id) {
    var ajax = new XMLHttpRequest();
    ajax.open("GET", "includes/functions.php?loadSubProject&project-id=" + project_id, true);
    ajax.send();
    
    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var data1 = JSON.parse(this.responseText);
    
            var html = "";
            for (var a = 0; a < data1.length; a++) {
                var id = data1[a].id;
    
                    html += "<tr><td style='width:50px;'>" + data1[a].work_type + "</td>";
                    html += " <td style='width:10px;'><span class='badge badge-info'>" + data1[a].progress + "%</span></td>";
                    html += " <td style='width:250px;'><span>" + data1[a].start_date +  "-" + data1[a].end_date + "</span></td>";
                    html += " <td><a type='button' class='btn btn-sm btn-outline-primary' href='info.php?id="+ data1[a].id +"&project-id="+data1[a].project_id+"'>info</a></td>" ;
                    html += "</tr>" ;
            }
    
            document.getElementById("data2").innerHTML += html;
        }
    };
    }

function viewPercent(project_id) {
        var ajax = new XMLHttpRequest();
        ajax.open("GET", "includes/functions.php?loadPercent&project-id=" + project_id, true);
        ajax.send();
        
        ajax.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var data1 = JSON.parse(this.responseText);
        
                var html = "";
                for (var a = 0; a < data1.length; a++) {
                    var id = data1[a].id;
        
                    if(data1[a].p==null){
                        html += "<span class='badge badge-info'>0%</span>";
                       }
                       else{
                           html += "<span class='badge badge-info'>" + (data1[a].p/data1[a].i).toFixed(2) + "%</span>";
                       }
                }
        
                document.getElementById("data3").innerHTML += html;
            }
        };
        }


function viewPercent2(project_id) {
            var ajax = new XMLHttpRequest();
            ajax.open("GET", "includes/functions.php?loadPercent2&project-id=" + project_id, true);
            ajax.send();
            
            ajax.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    var data1 = JSON.parse(this.responseText);
            
                    var html = "";
                    for (var a = 0; a < data1.length; a++) {
                        var id = data1[a].id;
                        if(data1[a].p==null){
                         html += "<span class='badge badge-info'>0%</span>";
                        }
                        else{
                            html += "<span class='badge badge-info'>" + (data1[a].p/data1[a].i).toFixed(2) + "%</span>";
                        }
    
                    }
            
                    document.getElementById("data4").innerHTML += html;
                }
            };
            }
    
  

function viewNewSubProject(project_id) {
        var ajax = new XMLHttpRequest();
        ajax.open("GET", "includes/functions.php?viewNewSubProject&project-id=" + project_id, true);
        ajax.send();
        
        ajax.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var data1 = JSON.parse(this.responseText);
        
                var html = "";
                for (var a = 0; a < data1.length; a++) {
                    var id = data1[a].id;
        
                        html += "<tr style='background-color:#c8fad8;'><td style='width:50px;'>" + data1[a].work_type + "</td>";
                        html += " <td style='width:10px;'><span class='badge badge-info'>" + data1[a].progress + "%</span></td>";
                        html += " <td style='width:250px;'><span>" + data1[a].start_date +  "-" + data1[a].end_date + "</span></td>";
                        html += " <td><a type='button' class='btn btn-sm btn-outline-primary' href='info.php?id="+ data1[a].id +"&project-id="+data1[a].project_id+"'>info</a></td>" ;
                        html += "</tr>" ;
                }
        
                document.getElementById("data2").innerHTML += html;
            }
        };
        }
      



function addSubProject() {
    var work_type = document.getElementById("work_type").value;
    var start_date2 = document.getElementById("start_date2").value;
    var end_date2 = document.getElementById("end_date2").value;
    var team_assigned2 = document.getElementById("team_assigned2").value;
    var user_id = document.getElementById("user_id").value;
    var project_id = document.getElementById("project_id").value;


    var ajax = new XMLHttpRequest();
    ajax.open("POST", "includes/functions.php?addSubProject", true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send("project_id=" + project_id + "&work_type=" + work_type + "&start_date=" + start_date2  + "&end_date=" + end_date2 + "&team_assigned=" + team_assigned2 + "&user_id=" + user_id);

    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            viewNewSubProject(project_id);
        }
    };
    $ ("#addSubProjectModal").modal ("hide"); 

        return false;
}


function editEmployee(){

    var confirm_password = document.getElementById("confirm_password").value;
    var firstname = document.getElementById("firstname1").value;
    var lastname = document.getElementById("lastname1").value;
    var middlename = document.getElementById("middlename1").value;
    var birthday = document.getElementById("birthday1").value;
    var id = document.getElementById("id4").value;
    var address = document.getElementById("address1").value;
    var marital_status = document.getElementById("marital_status1").value;
    var position = document.getElementById("position1").value;
    var team_assigned = document.getElementById("team_assigned4").value;

    var ajax = new XMLHttpRequest();
    ajax.open("POST", "includes/functions.php?editEmployee", true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send("id=" + id + "&firstname=" + firstname + "&middlename=" + middlename
    + "&lastname=" + lastname + "&birthday=" + birthday + "&address=" + address
    + "&marital_status=" + marital_status + "&position=" + position + 
    "&team_assigned=" + team_assigned +  "&confirm_password=" + confirm_password);

    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
        }
      

    };
    //$('#addProjectModal').modal('hide');
    $ ("#viewEmployeeModal").modal ("hide"); 
    location.reload();
    return false;
}

function editDeployment() {

    var project_id5 = document.getElementById("project-list").value;
    var subproject_id5 = document.getElementById("subproject-list").value;
    var id= document.getElementById("id5").value;

    var ajax = new XMLHttpRequest();
    ajax.open("POST", "includes/functions.php?editDeployment", true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send("id=" + id + "&project_id=" + project_id5 + "&subproject_id=" + subproject_id5);

    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
        }
      

    };
    //$('#addProjectModal').modal('hide');
    $ ("#deploymentModal").modal ("hide"); 
    //location.reload();
    window.location.href = 'employee.php';

    return false;
}