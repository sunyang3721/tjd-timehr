$(document).ready(function(){
			$('#tab2').click(function(){
					$('.tab1,.tab3,.tab4,.tab5').hide();
					$('#tab2').attr('class','current');
					$('#tab1,#tab3,#tab4,#tab5').attr('class','');
					$('.tab2').fadeIn('slow');
			});
			$('#tab3').click(function(){
					$('.tab1,.tab2,.tab4,.tab5').hide();
					$('#tab3').attr('class','current');
					$('#tab2,#tab1,#tab4,#tab5').attr('class','');
					$('.tab3').fadeIn('slow');
			});
			$('#tab4').click(function(){
					$('.tab1,.tab2,.tab3,.tab5').hide();
					$('#tab4').attr('class','current');
					$('#tab2,#tab1,#tab3,#tab5').attr('class','');
					$('.tab4').fadeIn('slow');
			});
			$('#tab5').click(function(){
					$('.tab1,.tab2,.tab4,.tab3').hide();
					$('#tab5').attr('class','current');
					$('#tab2,#tab1,#tab4,#tab3').attr('class','');
					$('.tab5').fadeIn('slow');
			});
			$('#tab1').click(function(){
					$('.tab2,.tab3,.tab4,.tab5').hide();
					$('#tab1').attr('class','current');
					$('#tab2,#tab3,#tab4,#tab5').attr('class','');
					$('.tab1').fadeIn('slow');
			});

	});