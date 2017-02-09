//Добавление информации о клинике/сети клиник
function addInfoAboutClinic(id){
	var div = document.getElementById('modal-content');
	var html = '<div class="row">';
    html += '<div class="col-lg-10 col-lg-offset-1">';
      html += '<form class="form-horizontal" role="form">';
        html += '<div class="form-group">';
          html += '<label for="name" class="col-sm-2 control-label">Название</label>';
          html += '<div class="col-sm-10">';
            html += '<input type="text" class="form-control" id="name" placeholder="Название">';
          html += '</div>';
        html += '</div>';
        html += '<div class="form-group">';
          html += '<label for="adress" class="col-sm-2 control-label">Адрес</label>';
          html += '<div class="col-sm-10">';
            html += '<input type="text" class="form-control" id="adress" placeholder="Адрес">';
          html += '</div>';
        html += '</div>';
        html += '<div class="form-group">';
          html += '<label for="phone" class="col-sm-2 control-label">Телефон</label>';
          html += '<div class="col-sm-10">';
            html += '<input type="text" class="form-control" id="phone" placeholder="Телефон">';
          html += '</div>';
        html += '</div>';
        html += '<div class="form-group">';
          html += '<label for="email" class="col-sm-2 control-label">Email</label>';
          html += '<div class="col-sm-10">';
            html += '<input type="email" class="form-control" id="email" placeholder="Email">';
          html += '</div>';
        html += '</div>';
        html += '<div class="form-group">';
          html += '<label for="site" class="col-sm-2 control-label">Сайт</label>';
          html += '<div class="col-sm-10">';
            html += '<input type="text" class="form-control" id="site" placeholder="Сайт">';
          html += '</div>';
        html += '</div>';
        html += '<div class="form-group">';
          html += '<div class="col-sm-offset-2 col-sm-10">';
            html += '<button type="button" onclick="saveInfoAboutClinic('+ id +')" class="btn btn-default">Сохранить</button>';
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

function saveInfoAboutClinic(id){
  var name = document.getElementById('name').value;
  var adress = document.getElementById('adress').value;
  var phone = document.getElementById('phone').value;
  var email = document.getElementById('email').value;
  var site = document.getElementById('site').value;
  $.ajax({
    url: '/clinic/default/createinfo',
    type: 'GET',
    data: {
      'id': id, 
      'name': name,
      'adress': adress,
      'phone': phone,
      'email': email,
      'site': site,
    },
    success: function(data){
      console.log(data);
    },
    error: function(){
      console.log('Внутренняя ошибка сервера');
    }
  });
}