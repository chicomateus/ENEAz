var Azores = {
    ilhas: [{
        nome: 'Santa Maria',
        concelhos: [{
            nome: 'Vila do Porto',
            lat: "38º 32.5'",
            log: "27º 45.6'"
        }]
    }, {
        nome: 'São Miguel',
        concelhos: [{
            nome: 'Lagoa',
            lat: "38º 32.5'",
            log: "27º 45.6'"
        }, {
            nome: 'Povoação',
            lat: "38º 32.5'",
            log: "27º 45.6'"
        }, {
            nome: 'Nordeste',
            lat: "38º 32.5'",
            log: "27º 45.6'"
        }, {
            nome: 'Ponta Delgada',
            lat: "38º 32.5'",
            log: "27º 45.6'"
        }, {
            nome: 'Ribeira Grande',
            lat: "38º 32.5'",
            log: "27º 45.6'"
        }, {
            nome: 'Vila Franca do Campo',
            lat: "38º 32.5'",
            log: "27º 45.6'"
        }]
    }, {
        nome: 'Terceira',
        concelhos: [{
            nome: 'Angra do Heroísmo',
            lat: "38º 39.0'",
            log: "27º 13.4'"
        }, {
            nome: 'Praia da Vitória',
            lat: "38º 43.9'",
            log: "27º 03.5'"
        }]
    }, {
        nome: 'São Jorge',
        concelhos: [{
            nome: 'Velas',
            lat: "38º 40.8'",
            log: "28º 12.3'"
        }, {
            nome: 'Calheta',
            lat: "38º 36.0'",
            log: "28º 00.7'"
        }]
    }, {
        nome: 'Faial',
        concelhos: [{
            nome: 'Horta',
            lat: "38º 32.5'",
            log: "27º 45.6'"
        }]
    }, {
        nome: 'Graciosa',
        concelhos: [{
            nome: 'Santa Cruz das Graciosa',
            lat: "39º 05.0'",
            log: "27º 59.9'"
        }, ]
    }, {
        nome: 'Pico',
        concelhos: [{
            nome: 'Madalena',
            lat: "38º 32.5'",
            log: "27º 45.6'"
        }, {
            nome: 'Lajes do Pico',
            lat: "38º 32.5'",
            log: "27º 45.6'"
        }, {
            nome: 'São Roque',
            lat: "38º 32.5'",
            log: "27º 45.6'"
        }]
    }, {
        nome: 'Flores',
        concelhos: [{
            nome: 'Santa Cruz das Flores',
            lat: "39º 27.2'",
            log: "31º 07.2'"
        }, {
            nome: 'Lages das Flores',
            lat: "39º 22.6'",
            log: "31º 09.9'"
        }]
    }, {
        nome: 'Corvo',
        concelhos: [{
            nome: 'Vila do Corvo',
            lat: "39º 40.1'",
            log: "31º 06.5'"
        }]
    }, ]
};

function ILHAS_SELECT() {
    var $canvas = $('.Ilhas-Select');
    if ($canvas[0]) {
        var data = Azores.ilhas;
        $.each(data, function(index, value) {

            $canvas.append('<option value="' + value.nome + '">' + value.nome + '</option>');
        });
    }
}

function CONCELHOS_SELECT(ilha) {
  console.log(ilha);
    var $canvas = $('.Concelhos-Select');
    if ($canvas[0]) {
        var data = Azores.ilhas;

        var ilhas = data.filter(function(ilhas) {
            return ilhas.nome === ilha;
        })[0];

        $('.Concelhos-Select option').each(function() {
          //  if ($(this).is(':hidden')) {
                $(this).remove();
          //  }
        });
        $.each(ilhas.concelhos, function(index, value) {
            $canvas.append('<option value="' + value.nome + '">' + value.nome + '</option>');
        });
    }
}




$(document).ready(function() {

    ILHAS_SELECT();

    $('.StudentAzor').on('click', function(event) {
        event.stopPropagation();
        $('.PricePlans,.FirstPanel').addClass('animated fadeOut').delay(250).hide().removeClass('animated fadeOut');
        $('.SP_EUA,.personalInfo-form').delay(100).fadeIn(600, function() {
              $('input.ref').val('1');
            });
    });

    $('.NotStudentAzor,.FirstPanel').on('click', function(event) {
        event.stopPropagation();
        $('.PricePlans,.FirstPanel').addClass('animated fadeOut').delay(150).hide().removeClass('animated fadeOut');
        $('.SP_NEA,.personalInfo-form').delay(150).fadeIn(600, function() {
              $('input.ref').val('2');
            });

    });

    // $('.No_one').on('click', function(e) {
    //     $('.PricePlans').fadeOut(200, function() {
    //         $('.reservasForm').fadeIn(160, function() {
    //           $('input.ref').val('3');
    //         });
    //     });
    // });



    //EVENTES
    $('.Ilhas-Select').on('change', function() {
        CONCELHOS_SELECT(this.value)
    })







});




function NextStep(last, next) {
    // $('.fieldCurso,.fieldUni').show();
    var hash = location.hash;
    if (hash == '#not_azores_student') {
        $('.fieldCurso,.fieldUni').hide();
    } else if (hash == '#azores_student') {
        $('.fieldCurso,.fieldUni').show();
    }
    if (next == '.PricePlans') {
        $('.SecondPanel, .personalInfo-form').addClass('animated fadeOut').delay(150).hide().removeClass('animated fadeOut');

            $('.PricePlans,.FirstPanel').delay(150).fadeIn(600);

        location.hash = '#';
    }else{
        $(last).fadeOut(600, function() {
            $(next).fadeIn(350);
        });
      }
}

/////////////// AJAX FORM ----------------*/

$(function() {
// Get the form.
var form = $('#EncForm');

form.submit(function(event) {
// Stop the browser from submitting the form.
event.preventDefault();
var formData = form.serialize();
  console.log(formData);
  	 $.ajax({
					type: "POST",
					url: form.attr('action'),
					data: formData, // serializes the form's elements.
					async: false,
					success: function(data,status)
					{
							console.log(data);
							// if(data=="OK"){
                $('.SP_NEA,.SP_EUA,.SecondPanel,.gopInfo-form').fadeOut(200, function() {
                  $('.ThirdPanel,.FirstPanel').fadeIn(160);
                });
							// }else{
							// 	alert('Aconteceu um problema com seu pedido, por favor tente outra vez');
							// }
					},
					error: function (XMLHttpRequest, textStatus, errorThrown) {
        console.log('AJAX error:' + textStatus);
				alert('Aconteceu um problema com seu pedido, por favor tente outra vez');
    }


				});
			return false;
});

});
