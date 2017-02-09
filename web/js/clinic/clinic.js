//Добавление информации о клинике/сети клиник
function addInfoAboutClinic(){
	var div = document.getElementById('modal-content');
	var html = '<div class="row">';
	html += '<div class="col-lg-10 col-lg-offset-1">';
	html += '<form class="form-horizontal" role="form">';
	html += '<div class="form-group">';
    html += '<label for="inputEmail3" class="col-sm-2 control-label">Email</label>';
    html += '<div class="col-sm-10">';
    html += '<input type="email" class="form-control" id="inputEmail3" placeholder="Email">';
    html += '</div>';
  	html += '</div>';
  	html += '<div class="form-group">';
    html += '<div class="col-sm-offset-2 col-sm-10">';
    html += '<button type="submit" class="btn btn-default">Войти</button>';
    html += '</div>';
  	html += '</div>';
	html += '</form>';
	html += '</div>';
	html += '</div>';
	div.innerHTML = html;
	$('#default-modal .modal-header center h2').text('Прикреплённые документы');
	$('#default-modal').modal({
        keyboard: false
    });
}