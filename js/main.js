var Azores =
{
  ilhas: [
		{
			nome:'Santa Maria',
			concelhos:[
				{
					nome:'Vila do Porto',
					lat:"38º 32.5'",
					log:"27º 45.6'"
				}
			]
		},
		{
			nome:'São Miguel',
			concelhos:[
				{
					nome:'Lagoa',
					lat:"38º 32.5'",
					log:"27º 45.6'"
				},
				{
					nome:'Povoação',
					lat:"38º 32.5'",
					log:"27º 45.6'"
				},
				{
					nome:'Nordeste',
					lat:"38º 32.5'",
					log:"27º 45.6'"
				},
				{
					nome:'Ponta Delgada',
					lat:"38º 32.5'",
					log:"27º 45.6'"
				},
				{
					nome:'Ribeira Grande',
					lat:"38º 32.5'",
					log:"27º 45.6'"
				},
				{
					nome:'Vila Franca do Campo',
					lat:"38º 32.5'",
					log:"27º 45.6'"
				}
			]
		},
		{
			nome:'Terceira',
			concelhos:[
				{
					nome:'Angra do Heroísmo',
					lat:"38º 39.0'",
					log:"27º 13.4'"
				},
				{
					nome:'Praia da Vitória',
					lat:"38º 43.9'",
					log:"27º 03.5'"
				}
			]
		},
		{
			nome:'São Jorge',
			concelhos:[
				{
					nome:'Velas',
					lat:"38º 40.8'",
					log:"28º 12.3'"
				},
				{
					nome:'Calheta',
					lat:"38º 36.0'",
					log:"28º 00.7'"
				}
			]
		},
		{
			nome:'Faial',
			concelhos:[
				{
					nome:'Horta',
					lat:"38º 32.5'",
					log:"27º 45.6'"
				}
			]
		},
		{
			nome:'Graciosa',
			concelhos:[
				{
					nome:'Santa Cruz das Graciosa',
					lat:"39º 05.0'",
					log:"27º 59.9'"
				},
			]
		},
		{
			nome:'Pico',
			concelhos:[
				{
					nome:'Madalena',
					lat:"38º 32.5'",
					log:"27º 45.6'"
				},
				{
					nome:'Lajes do Pico',
					lat:"38º 32.5'",
					log:"27º 45.6'"
				},
				{
					nome:'São Roque',
					lat:"38º 32.5'",
					log:"27º 45.6'"
				}
			]
		},
		{
			nome:'Flores',
			concelhos:[
				{
					nome:'Santa Cruz das Flores',
					lat:"39º 27.2'",
					log:"31º 07.2'"
				},
				{
					nome:'Lages das Flores',
					lat:"39º 22.6'",
					log:"31º 09.9'"
				}
			]
		},
		{
			nome:'Corvo',
			concelhos:[
				{
					nome:'Vila do Corvo',
					lat:"39º 40.1'",
					log:"31º 06.5'"
				}
			]
		},
	]
};

function ILHAS_SELECT() {
		var $canvas = $('.Ilhas-Select');
		if ($canvas[0]) {
			var data = Azores.ilhas;
						$.each(data, function(index, value) {

								console.log(value);
								$canvas.append('<option value="' + value.nome + '">' +  value.nome + '</option>');
						});
		}
}
// function CONCELHOS_SELECT(ilha) {
// 		var $canvas = $('.Concelhos-Select');
// 		if ($canvas[0]) {
// 			var data = Azores.ilhas;
// 						$.each(data, function(index, value) {
// 								console.log(value);
// 								$canvas.append('<option value="' + value.nome + '">' +  value.nome + '</option>');
// 						});
// 		}
// }

  $(document).ready(function() {
		ILHAS_SELECT();







		$('.StudentAzor').on('click',function(e){
			$('.PricePlans,.FirstPanel' ).fadeOut( 200, function() {
				$( '.SecondPanel,.personalInfo-form' ).fadeIn( 160 );
			});
		});

		$('.NotStudentAzor,.FirstPanel').on('click',function(e){
			$('.PricePlans,.FirstPanel' ).fadeOut( 200, function() {
				$( '.SecondPanel,.personalInfo-form' ).fadeIn( 160 );
			});

		});

		$('.No_one').on('click',function(e){
			$('.PricePlans' ).fadeOut( 200, function() {
				$( '.reservasForm' ).fadeIn( 160 );
			});
		});

	});




	function NextStep(last,next){
		// $('.fieldCurso,.fieldUni').show();
		var hash = location.hash;
		if(hash=='#not_azores_student'){
			$('.fieldCurso,.fieldUni').hide();
		}else if(hash=='#azores_student'){
			$('.fieldCurso,.fieldUni').show();
		}
		if(next=='.PricePlans'){
			$('.SecondPanel' ).fadeOut( 200, function() {
	    	$( '.FirstPanel' ).fadeIn( 100 );
	  	});
			location.hash='#';
		}
		$( last ).fadeOut( 200, function() {
    	$( next ).fadeIn( 100 );
  	});
	}

/*/////////////// AJAX FORM ----------------*/
//
// $(function() {
// // Get the form.
// var form = $('#EncForm');
//
// $(form).submit(function(event) {
// // Stop the browser from submitting the form.
// event.preventDefault();
// var formData = new FormData($(this)[0]);
//
// 	 $.ajax({
// 					type: "POST",
// 					url: form.attr('action'),
// 					data: formData, // serializes the form's elements.
// 					async: false,
// 					success: function(data,status)
// 					{
// 							console.log(data);
// 							console.log(status);
// 							if(data==='1'){
// 								$('#EncForm').fadeOut('slow',function(){
// 									$('.sucess-form').fadeIn();
// 								});
// 							}else{
// 								alert('Aconteceu um problema com seu pedido, por favor tente outra vez');
// 							}
// 					},
// 					error: function (XMLHttpRequest, textStatus, errorThrown) {
//         console.log('AJAX error:' + textStatus);
// 				alert('Aconteceu um problema com seu pedido, por favor tente outra vez');
//     }
// 					cache: false,
// 					contentType: false,
// 					processData: false,
// 					xhr: function() {  // Custom XMLHttpRequest
// 							var myXhr = $.ajaxSettings.xhr();
// 							if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
// 									myXhr.upload.addEventListener('progress', function () {
// 											// faz alguma coisa durante o progresso do upload
// 									}, false);
// 							}
// 					return myXhr;
// 					}
// 				});
// 			return false;
// });
//
// });
