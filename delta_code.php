<div class="content_wr_float" itemscope="">
	<div class="news_detail_wrapp big item web_form" itemprop="articleBody">
		<div class="calcdate">
<div style="margin-bottom: 10px;"><span style="font-size: 18px;font-weight: 600;">Расшифровать дату в один клик:</span></div>
<form class="calcdateCalc" action="" method="post">
 <input type="hidden" name="calcdate[событие]" value="Успешно" data-id="event1" disabled=""> 
 <input type="hidden" name="calcdate[событие]" value="Не распознан" data-id="event2" disabled=""> 
 <label>Код с крышки аккумулятора * <input type="text" name="calcdate[код]"></label> 
 <input type="hidden" name="calcdate[дата]" data-id="result"> 
 <label>Email * <input type="email" name="calcdate[email]"></label> 
 <input class="btn btn-default" type="submit">
</form>
			<div class="calcdateQueryText">
				Помогите расшифровать код _
			</div>
			<div class="calcdateResults">
				<div class="calcdateError">
					Некорректно введён код, попробуйте снова
				</div>
				<div class="calcdateResult">
				</div>
				<div class="calcdateAtt">
					Дата производства может являться не точной. <br>
					 Актуальную дату необходимо подтверждать у Производителя.
				</div>
				<div class="calcdateMailSent">
					Ваш запрос отправлен, ответ будет выслан на указанный вами e-mail адрес
				</div>
				<div class="calcdateMailFailed">
				</div>
			</div>
			<form class="calcdateQuery" action="" method="post">
				<div class="calcdateQueryInvite">
					Упс... Похоже у нас не получилось распознать дату производства вашего аккумулятора в автоматическом режиме. Сервис пока может определять не все даты.
				</div>
			</form>
			<div class="calcdateResults">
				<div class="calcdatePromo">
				</div>
			</div>
		</div>
		 <script>
(function(){
	function f(){
		if(arguments.callee.done)return;
		arguments.callee.done=true;
		var RE_EMAIL=/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9а-яА-ЯёЁ]+\.)+[a-zA-Zа-яА-ЯёЁ]{2,}))$/;
		function dbg(){for(var i in arguments)console.log(arguments[i]);return arguments[i];}
		function calcdate(s){
			var re=[
						// №1: 31.01.2018: год(2014+/2011+)-месяц-день
						// vbg17 = 17.07.2015
					/^\s*([a-z]?)([a-z])([a-z])(\d+)\s*$/i,
						// №2: 17.11.2018: 9 и 10+ символов, год-месяц-день
						// AG11H7GK70 = 2011/07/11
					/^\s*\d*?([a-z])([a-z])(\d\d)\w+\s*$/i,
						// №3: 28.11.2018: кварталы 2018
						// X1316 = 2018/05, 06X1330 = 2018/05
					/^\s*(?:\d\d)?(_|B|W|X|Q|L|E|A|Y|H|G|M)(\d\d)(\d\d)\s*$/i,
						// №4: 27.12.2018: 10-11-значный с 1-й буквой - «J» (2010)
						// JL20HB7GK5 = 2010/12/20
					/^\s*(j)([a-z])(\d\d)(\w+)\s*$/i
				],
				MD=[31,29,	31,30,31,	30,31,31,	30,31,30, 31],
				v3Y={'_': '2018','X': '2018','E': '2018','H': '2018','B': '2019','Q': '2019','A': '2019','G': '2019','W': '2020','L': '2020','Y': '2020','M': '2020'},							// код => год
				v3Q={'_': '1','B': '1','W': '1','X': '2','Q': '2','L': '2','E': '3','A': '3','Y': '3','H': '4','G': '4','M': '4'},						// код => квартал, с 1
				v3M={'49': 'Апрель','13': 'Май','05': 'Июнь','12': 'Июль','96': 'Август','84': 'Сентябрь','22': 'Октябрь','31': 'Ноябрь','57': 'Декабрь','09': 'Январь','26': 'Февраль','19': 'Март','32': 'Апрель','41': 'Май','08': 'Июнь','61': 'Июль','92': 'Август','75': 'Сентябрь','53': 'Октябрь','02': 'Ноябрь','64': 'Декабрь','71': 'Январь','48': 'Февраль','85': 'Март','69': 'Апрель','11': 'Май','90': 'Июнь','81': 'Июль','62': 'Сентябрь','28': 'Октябрь','73': 'Ноябрь','44': 'Декабрь'},						// код => месяц, имя
				MI={'Январь': '0','Февраль': '1','Март': '2','Апрель': '3','Май': '4','Июнь': '5','Июль': '6','Август': '7','Сентябрь': '8','Октябрь': '9','Ноябрь': '10','Декабрь': '11'},	// месяц, имя => номер, с 0
				i,r;
			for(i in re)if(r=re[i].exec(s)){//console.log(i,r);
				// "Костыль" для "xch22=>22.03.2017", временно, удалить, когда стал не нужным.
				if(/^\s*xch22\s*$/i.test(s))r=[2017,2,22];else
				// "Костыль" для "02G5327=>27.02.2020", временно, удалить, когда стал не нужным.
				if(/^\s*02G5327\s*$/i.test(s))r=[2020,01,27];else
				// "Костыль" для "02G5327=>27.02.2020", временно, удалить, когда стал не нужным.
				if(/^\s*JD02E7YK2\s*$/i.test(s))r=[2016,03,02];else
				// "Костыль" для "02L1108=>08.12.2019", временно, удалить, когда стал не нужным.
				// if(/^\s*02L1108\s*$/i.test(s))r=[2019,11,08];else
				// "Костыль" для "DDE05=>05.10.2019", временно, удалить, когда стал не нужным.
				// if(/^\s*DDE05\s*$/i.test(s))r=[2019,09,05];
				switch(i-0+1){
					case 1:	r=	[	(r[1]?2014:2011)+r[2].toUpperCase().charCodeAt(0)-65,
									r[3].toUpperCase().charCodeAt(0)-65,
									r[4]];
					break;
					case 2:	r=	[	r[1].toUpperCase().charCodeAt(0)-65+2011,
									r[2].toUpperCase().charCodeAt(0)-65,
									r[3]];
					break;
					case 3:	var m=MI[v3M[r[2]]],y=v3Y[r[1].toUpperCase()]||2018;
							if(Math.floor(m/3)+1!=v3Q[r[1].toUpperCase()])continue;
							r=	[	y,m,r[3]];
					break;
					case 4:	r=	[	2010,
									r[2].toUpperCase().charCodeAt(0)-65,
									r[3]];
					break;
					default:	continue;
				}
				if(r[0]>2021)continue;
				if(r[1]>11)continue;
				if(r[2]<'00'||parseInt(r[2])>MD[r[1]])continue;
				//console.log(r);
				return r;
			}
			return false;
		}
		function formatdate(d,f){
			var a=[];
			switch(f){
				case 0:
					a[0]=d[2];
					a[1]='Января,Февраля,Марта,Апреля,Мая,Июня,Июля,Августа,Сентября,Октября,Ноября,Декабря'.split(',')[d[1]];
					a[2]=d[0];
					break;
			}
			return a.join(' ');
		}
		function checkCodeFormat(s){
			return /^[^а-яёА-ЯЁ]+$/.test(s)&&/[a-zA-Z]/.test(s);
		}
		$('.calcdate').each(function(){
			var T=$(this),F=T.children('.calcdateCalc'),Q=T.children('.calcdateQuery'),
				FB=F.find('[type=submit]'),QB=Q.find('[type=submit]'),
				R=T.children('.calcdateResults').children(),I=F.find('input[type=text]:eq(0)'),
				QT=T.find('.calcdateQueryText').html();
			F.submit(function(e){
				var r=I.val().replace(/\s+/g,''),_,m=F.find('[type=email]').eq(0);
				if(!r||m&&!RE_EMAIL.test(m=m.val()))
					R.hide().filter('.calcdateError')
						.text(	!r?'Введите код':
								m?'Неверный e-mail':
								'Введите e-mail')
					.show();
				else{
					R.hide().filter('.calcdateError').toggle(!(_=checkCodeFormat(r)))
						.text(_?'':'Некорректно введён код, попробуйте снова');
					if(_){
						r=calcdate(_=r); // _=r;r=false;
						r=r?formatdate(r,0):'';
						F.find('[data-id=result]').prop('disabled',!r).val(r);
						if(r)$('.calcdateAtt').show();
						$('.calcdatePromo').show();
						F.find('[data-id=event1]').prop('disabled',!r);
						F.find('[data-id=event2]').prop('disabled',!!r);
						$.post('',$(this).serialize());
						if(r)Q.hide();
						else{
							Q.show()
								.find('textarea:eq(0)').val(QT.replace('_',_)).end()
								.find('[data-id=code]').val(_).end()
								.find('input:visible').get(0).focus();
							if(!(_=Q.find('[type=email]').eq(0)).val())_.val(m);
							FB.prop('disabled',true);
						}
						R.filter('.calcdateResult').toggle(!!r).html(r);
					}
				}
				e&&e.preventDefault&&e.preventDefault();
				return false;
			});
			Q.submit(function(e){
				QB.prop('disabled',true);
				R.hide();
				$.post('',$(this).serialize(),function(s){
					if(s==='OK'){
						R.filter('.calcdateMailSent').show();
						Q.hide();
						I.get(0).focus();
					}else
						R.filter('.calcdateMailFailed').html(s).show();
					QB.prop('disabled',false);
				});
				e&&e.preventDefault&&e.preventDefault();
				return false;
			});
			I.keydown(function(e){Q.hide();R.hide();FB.prop('disabled',false);});
		});
	}
	document.addEventListener("DOMContentLoaded",f);
	$(f);
})();
</script>
		<div class="clear">
		</div>
	</div>
</div>
